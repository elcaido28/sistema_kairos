<?php
 /**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the HRSALE License
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.hrsale.com/license.txt
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to hrsalesoft@gmail.com so we can send you a copy immediately.
 *
 * @author   HRSALE
 * @author-email  hrsalesoft@gmail.com
 * @copyright  Copyright © hrsale.com. All Rights Reserved
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends MY_Controller {
	
	 public function __construct() {
        parent::__construct();
		//load the model
		$this->load->model("Tickets_model");
		$this->load->model("Xin_model");
		$this->load->library('email');
		$this->load->model("Designation_model");
		$this->load->model("Department_model");
	}
	
	/*Function to set JSON output*/
	public function output($Return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
	}
	
	 public function index()
     {
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$system = $this->Xin_model->read_setting_info(1);
		if($system[0]->module_inquiry!='true'){
			redirect('admin/dashboard');
		}
		$data['title'] = $this->Xin_model->site_title();
		$data['all_employees'] = $this->Xin_model->all_employees();
		$data['all_companies'] = $this->Xin_model->get_companies();
		$data['breadcrumbs'] = $this->lang->line('left_tickets');
		$data['path_url'] = 'tickets';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('43',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['subview'] = $this->load->view("admin/tickets/ticket_list", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}		  
     }
	 
	 // get company > employees
	 public function get_employees() {

		$data['title'] = $this->Xin_model->site_title();
		$id = $this->uri->segment(4);
		
		$data = array(
			'company_id' => $id
			);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("admin/tickets/get_employees", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
	 }
 
    public function ticket_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("admin/tickets/ticket_list", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$ticket = $this->Tickets_model->get_tickets();
		
		$data = array();

        foreach($ticket->result() as $r) {
			 			  		
		// get user > employee_
		$employee = $this->Xin_model->read_user_info($r->employee_id);
		// employee full name
		if(!is_null($employee)){
			$employee_name = $employee[0]->first_name.' '.$employee[0]->last_name;
		} else {
			$employee_name = '--';	
		}
		// priority
		if($r->ticket_priority==1): $priority = $this->lang->line('xin_low'); elseif($r->ticket_priority==2): $priority = $this->lang->line('xin_medium'); elseif($r->ticket_priority==3): $priority = $this->lang->line('xin_high'); elseif($r->ticket_priority==4): $priority = $this->lang->line('xin_critical');  endif;
		 
		 // status
		 if($r->ticket_status==1): $status = $this->lang->line('xin_open'); elseif($r->ticket_status==2): $status = $this->lang->line('xin_closed'); endif;
		 // ticket date and time
		 $created_at = date('h:i A', strtotime($r->created_at));
		 $_date = explode(' ',$r->created_at);
		 $edate = $this->Xin_model->set_date_format($_date[0]);
		 $_created_at = $edate. ' '. $created_at;
		$p_company = $this->Xin_model->read_company_info($r->company_id);
		if(!is_null($p_company)){
			$company = $p_company[0]->name;
		} else {
			$company = '--';	
		}
		
		$data[] = array(
			'<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view_details').'"><a href="'.site_url().'admin/tickets/details/'.$r->ticket_id.'"><button type="button" class="btn icon-btn btn-xs btn-outline-info waves-effect waves-light"><span class="fa fa-arrow-circle-right"></span></button></a></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_edit').'"><button type="button" class="btn icon-btn btn-xs btn-outline-info waves-effect waves-light" data-toggle="modal" data-target=".edit-modal-data"  data-ticket_id="'. $r->ticket_id . '"><span class="fas fa-pencil-alt"></span></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'"><button type="button" class="btn icon-btn btn-xs btn-outline-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->ticket_id . '"><span class="far fa-trash-alt"></span></button></span>',
			$r->ticket_code,
			$company,
			$employee_name,
			$r->subject,
			$priority,
			$status,
			$_created_at
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $ticket->num_rows(),
			 "recordsFiltered" => $ticket->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
	 
	 public function comments_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		//$id = $this->input->get('ticket_id');
		$id = $this->uri->segment(4);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("admin/tickets/ticket_list", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$comments = $this->Tickets_model->get_comments($id);
		
		$data = array();

        foreach($comments->result() as $r) {
			 			  		
		// get user > employee_
		$employee = $this->Xin_model->read_user_info($r->user_id);
		// employee full name
		if(!is_null($employee)){
		$employee_name = $employee[0]->first_name.' '.$employee[0]->last_name;
		// get designation
		$_designation = $this->Designation_model->read_designation_information($employee[0]->designation_id);
		if(!is_null($_designation)){
			$designation_name = $_designation[0]->designation_name;
		} else {
			$designation_name = '--';	
		}
		
		// profile picture
		if($employee[0]->profile_picture!='' && $employee[0]->profile_picture!='no file') {
			$u_file = base_url().'uploads/profile/'.$employee[0]->profile_picture;
        } else {
			if($employee[0]->gender=='Male') { 
				$u_file = base_url().'uploads/profile/default_male.jpg';
			} else {
				$u_file = base_url().'uploads/profile/default_female.jpg';
			}
        } 
		} else {
			$employee_name = '--';
			$designation_name = '--';
			$u_file = '--';
		}
		// created at
		$created_at = date('h:i A', strtotime($r->created_at));
		$_date = explode(' ',$r->created_at);
		$date = $this->Xin_model->set_date_format($_date[0]);
		///
		$link = '<a class="c-user text-black" href="'.site_url().'admin/employees/detail/'.$r->user_id.'"><span class="underline">'.$employee_name.' ('.$designation_name.')</span></a>';

	
		$dlink = '<div class="media-right">
						<div class="c-rating">
						<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'">
							<a class="btn btn-danger btn-sm delete" href="#" data-toggle="modal" data-target=".delete-modal" data-record-id="'.$r->comment_id.'">
		  <i class="fa fa-trash m-r-0-5"></i>'.$this->lang->line('xin_delete').'</a></span>
						</div>
					</div>';
		
		$function = '<div class="c-item">
					<div class="media">
						<div class="media-left">
							<div class="avatar box-48">
							<img class="b-a-radius-circle" src="'.$u_file.'">
							</div>
						</div>
						<div class="media-body">
							<div class="mb-0-5">
								'.$link.'
								<span class="font-90 text-muted">'.$date.' '.$created_at.'</span>
							</div>
							<div class="c-text">'.$r->ticket_comments.'</div>
						</div>
						'.$dlink.'
					</div>
				</div>';
		
		$data[] = array(
			$function
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $comments->num_rows(),
			 "recordsFiltered" => $comments->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
	 
	 // attachment list
	  public function attachment_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		//$id = $this->input->get('ticket_id');
		$id = $this->uri->segment(4);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("admin/tickets/ticket_list", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$attachments = $this->Tickets_model->get_attachments($id);
		if($attachments->num_rows() > 0) {
		$data = array();

        foreach($attachments->result() as $r) {
			 			  				
		$data[] = array('<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_download').'"><a href="'.site_url().'admin/download?type=ticket&filename='.$r->attachment_file.'"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"><i class="fa fa-download"></i></button></a></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'"><button type="button" class="btn btn-danger btn-sm m-b-0-0 waves-effect waves-light delete-file" data-toggle="modal" data-target=".delete-modal-file" data-record-id="'. $r->ticket_attachment_id . '"><i class="fa fa-trash-o"></i></button></span>',
			$r->file_title,
			$r->file_description,
			$r->created_at
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $attachments->num_rows(),
			 "recordsFiltered" => $attachments->num_rows(),
			 "data" => $data
		);
		} else {
			$data[] = array('','','','');
      

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => 0,
			 "recordsFiltered" => 0,
			 "data" => $data
		);
		}
	  echo json_encode($output);
	  exit();
     }
	 
	 public function read()
	{
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->input->get('ticket_id');
		$result = $this->Tickets_model->read_ticket_information($id);
		$data = array(
				'ticket_id' => $result[0]->ticket_id,
				'company_id' => $result[0]->company_id,
				'ticket_code' => $result[0]->ticket_code,
				'subject' => $result[0]->subject,
				'employee_id' => $result[0]->employee_id,
				'ticket_priority' => $result[0]->ticket_priority,
				'all_companies' => $this->Xin_model->get_companies(),
				'description' => $result[0]->description,
				'all_employees' => $this->Xin_model->all_employees(),
				);
			$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view('admin/tickets/dialog_ticket', $data);
		} else {
			redirect('admin/');
		}
	}
	
	// Validate and add info in database
	public function add_ticket() {
	
		if($this->input->post('add_type')=='ticket') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
			
		/* Server side PHP input validation */		
		if($this->input->post('company')==='') {
       		$Return['error'] = $this->lang->line('xin_error_company');
		} else if($this->input->post('subject')==='') {
       		 $Return['error'] = $this->lang->line('xin_employee_error_subject');
		} else if($this->input->post('employee_id')==='') {
			$Return['error'] = $this->lang->line('xin_error_employee_id');
		} else if($this->input->post('ticket_priority')==='') {
			 $Return['error'] = $this->lang->line('xin_error_ticket_priority');
		}
		$description = $this->input->post('description');
		$qt_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
		
		$ticket_code = $this->Xin_model->generate_random_string();
	
		$data = array(
		'ticket_code' => $ticket_code,
		'subject' => $this->input->post('subject'),
		'company_id' => $this->input->post('company'),
		'employee_id' => $this->input->post('employee_id'),
		'description' => $qt_description,
		'ticket_status' => '1',
		'ticket_priority' => $this->input->post('ticket_priority'),
		'created_at' => date('d-m-Y h:i:s'),
		
		);
		$result = $this->Tickets_model->add($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_ticket_created');
			//get setting info 
			$setting = $this->Xin_model->read_setting_info(1);
			if($setting[0]->enable_email_notification == 'yes') {

				$this->email->set_mailtype("html");
				//get company info
				$cinfo = $this->Xin_model->read_company_setting_info(1);
				//get email template
				$template = $this->Xin_model->read_email_template(15);
				//get employee info
				$user_info = $this->Xin_model->read_user_info($this->input->post('employee_id'));
				
				$full_name = $user_info[0]->first_name.' '.$user_info[0]->last_name;
						
				$subject = str_replace('{var ticket_code}',$ticket_code,$template[0]->subject);
				$logo = base_url().'uploads/logo/signin/'.$cinfo[0]->sign_in_logo;
				
				$message = '
			<div style="background:#f6f6f6;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;padding: 20px;">
			<img src="'.$logo.'" title="'.$cinfo[0]->company_name.'"><br>'.str_replace(array("{var site_name}","{var site_url}","{var ticket_code}"),array($cinfo[0]->company_name,site_url(),$ticket_code),htmlspecialchars_decode(stripslashes($template[0]->message))).'</div>';
				
				$this->email->from($user_info[0]->email, $full_name);
				$this->email->to($cinfo[0]->email);
				
				$this->email->subject($subject);
				$this->email->message($message);
				
				$this->email->send();
			}		
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and add info in database
	public function set_comment() {
	
		if($this->input->post('add_type')=='set_comment') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
			
		/* Server side PHP input validation */		
		if($this->input->post('xin_comment')==='') {
       		 $Return['error'] = $this->lang->line('xin_error_comment_field');
		} 
		$xin_comment = $this->input->post('xin_comment');
		$qt_xin_comment = htmlspecialchars(addslashes($xin_comment), ENT_QUOTES);
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'ticket_comments' => $qt_xin_comment,
		'ticket_id' => $this->input->post('comment_ticket_id'),
		'user_id' => $this->input->post('user_id'),
		'created_at' => date('d-m-Y h:i:s')
		
		);
		$result = $this->Tickets_model->add_comment($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_ticket_comment_added');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and add info in database
	public function add_attachment() {
	
		if($this->input->post('add_type')=='dfile_attachment') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
			
		/* Server side PHP input validation */		
		if($this->input->post('file_name')==='') {
       		 $Return['error'] = $this->lang->line('xin_error_task_file_name');
		} else if($_FILES['attachment_file']['size'] == 0) {
			$Return['error'] = $this->lang->line('xin_error_task_file');
		} else if($this->input->post('file_description')==='') {
			 $Return['error'] = $this->lang->line('xin_error_task_file_description');
		}
		$description = $this->input->post('file_description');
		$file_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
		
		// is file upload
		if(is_uploaded_file($_FILES['attachment_file']['tmp_name'])) {
			//checking image type
			$allowed =  array('png','jpg','jpeg','pdf','doc','docx','xls','xlsx','txt');
			$filename = $_FILES['attachment_file']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			
			if(in_array($ext,$allowed)){
				$tmp_name = $_FILES["attachment_file"]["tmp_name"];
				$attachment_file = "uploads/ticket/";
				// basename() may prevent filesystem traversal attacks;
				// further validation/sanitation of the filename may be appropriate
				$name = basename($_FILES["attachment_file"]["name"]);
				$newfilename = 'ticket_'.round(microtime(true)).'.'.$ext;
				move_uploaded_file($tmp_name, $attachment_file.$newfilename);
				$fname = $newfilename;
			} else {
				$Return['error'] = $this->lang->line('xin_error_task_file_attachment');
			}
		}
		
		$data = array(
		'ticket_id' => $this->input->post('c_ticket_id'),
		'upload_by' => $this->input->post('user_file_id'),
		'file_title' => $this->input->post('file_name'),
		'file_description' => $file_description,
		'attachment_file' => $fname,
		'created_at' => date('d-m-Y h:i:s')
		);
		$result = $this->Tickets_model->add_new_attachment($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_ticket_attachment_added');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and update info in database
	public function update() {
	
		if($this->input->post('edit_type')=='ticket') {
			
		$id = $this->uri->segment(4);
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
			
		/* Server side PHP input validation */		
		if($this->input->post('company')==='') {
       		$Return['error'] = $this->lang->line('xin_error_company');
		} else if($this->input->post('subject')==='') {
       		 $Return['error'] = $this->lang->line('xin_employee_error_subject');
		} else if($this->input->post('employee_id')==='') {
			$Return['error'] = $this->lang->line('xin_error_employee_id');
		} else if($this->input->post('ticket_priority')==='') {
			 $Return['error'] = $this->lang->line('xin_error_ticket_priority');
		}
		$description = $this->input->post('description');
		$qt_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'subject' => $this->input->post('subject'),
		'company_id' => $this->input->post('company'),
		'employee_id' => $this->input->post('employee_id'),
		'description' => $qt_description,
		'ticket_priority' => $this->input->post('ticket_priority')
		);
		
		$result = $this->Tickets_model->update_record($data,$id);		
		
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_ticket_updated');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	public function details()
     {
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->uri->segment(4);
		$result = $this->Tickets_model->read_ticket_information($id);
		if(is_null($result)){
			redirect('admin/tickets');
		}
		$user = $this->Xin_model->read_user_info($result[0]->employee_id);
		if(!is_null($user)){
			$full_name = $user[0]->first_name.' '.$user[0]->last_name;
		} else {
			$full_name = '--';	
		}
		$data = array(
				'title' => $this->Xin_model->site_title(),
				'ticket_id' => $result[0]->ticket_id,
				'subject' => $result[0]->subject,
				'ticket_code' => $result[0]->ticket_code,
				'employee_id' => $result[0]->employee_id,
				'full_name' => $full_name,
				'ticket_priority' => $result[0]->ticket_priority,
				'created_at' => $result[0]->created_at,
				'description' => $result[0]->description,
				'assigned_to' => $result[0]->assigned_to,
				'ticket_status' => $result[0]->ticket_status,
				'ticket_note' => $result[0]->ticket_note,
				'ticket_remarks' => $result[0]->ticket_remarks,
				'message' => $result[0]->message,
				'all_employees' => $this->Xin_model->all_employees(),
				);
		$data['breadcrumbs'] = $this->lang->line('xin_ticket_details');
		$data['path_url'] = 'tickets_detail';
		$session = $this->session->userdata('username');
		$role_resources_ids = $this->Xin_model->user_role_resource();
			if(!empty($session)){ 
			$data['subview'] = $this->load->view("admin/tickets/ticket_details", $data, TRUE);
			$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}		  
     }
	 
	// Validate and update info in database // assign_ticket
	public function assign_ticket() {
	
		if($this->input->post('type')=='ticket_user') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();	
		
		if(null!=$this->input->post('assigned_to')) {
			$assigned_ids = implode(',',$this->input->post('assigned_to'));
			$employee_ids = $assigned_ids;
		} else {
			$employee_ids = '';
		}
	
		$data = array(
		'assigned_to' => $employee_ids
		);
		$id = $this->input->post('ticket_id');
		$result = $this->Tickets_model->assign_ticket_user($data,$id);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_ticket_assigned_employee');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	 // Validate and update info in database // update_status
	public function update_status() {
	
		if($this->input->post('type')=='update_status') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();	
			
		$data = array(
		'ticket_status' => $this->input->post('status'),
		'ticket_remarks' => $this->input->post('remarks'),
		);
		$id = $this->input->post('status_ticket_id');
		$result = $this->Tickets_model->update_status($data,$id);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_ticket_status_updated');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and update info in database // add_note
	public function add_note() {
	
		if($this->input->post('type')=='add_note') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();	
			
		$data = array(
		'ticket_note' => $this->input->post('ticket_note')
		);
		$id = $this->input->post('token_note_id');
		$result = $this->Tickets_model->update_note($data,$id);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_ticket_note_updated');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	 
	 public function ticket_users() {

		$data['title'] = $this->Xin_model->site_title();
		$id = $this->uri->segment(4);
		
		$data = array(
			'ticket_id' => $id,
			'all_designations' => $this->Designation_model->all_designations(),
			);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("admin/tickets/get_ticket_users", $data);
		} else {
			redirect('');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
	 }
	
	public function delete() {
		if($this->input->post('is_ajax') == 2) {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Tickets_model->delete_record($id);
			if(isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_ticket_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
	
	public function comment_delete() {
		if($this->input->post('data') == 'ticket_comment') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Tickets_model->delete_comment_record($id);
			if(isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_ticket_comment_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
	
	public function attachment_delete() {
		if($this->input->post('data') == 'ticket_attachment') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Tickets_model->delete_attachment_record($id);
			if(isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_ticket_attachment_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
}
