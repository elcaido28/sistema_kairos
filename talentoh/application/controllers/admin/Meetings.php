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
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meetings extends MY_Controller
{

   /*Function to set JSON output*/
	public function output($Return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
	}
	
	public function __construct()
     {
          parent::__construct();
          //load the login model
          $this->load->model('Company_model');
		  $this->load->model('Xin_model');
		  $this->load->model('Meetings_model');
		  $this->load->model('Department_model');
     }
	 
	public function index() {
	
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$system = $this->Xin_model->read_setting_info(1);
		if($system[0]->module_events!='true'){
			redirect('admin/dashboard');
		}
		$data['title'] = $this->lang->line('xin_hr_meetings');
		$data['breadcrumbs'] = $this->lang->line('xin_hr_meetings');
		$data['path_url'] = 'meetings';
		$data['get_all_companies'] = $this->Xin_model->get_companies();
		$data['all_employees'] = $this->Xin_model->all_employees();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('99',$role_resources_ids)) {
			$data['subview'] = $this->load->view("admin/events/meetings_list", $data, TRUE);
			$this->load->view('admin/layout/layout_main', $data); //page load
		} else {
			redirect('admin/dashboard');
		}
	}
		
	// meetings list > Meetings
	 public function meetings_list() {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("admin/events/meetings_list", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
				
		$meetings = $this->Meetings_model->get_meetings();
		
		$data = array();

        foreach($meetings->result() as $r) {
			  
			 // get start date and end date
			 $meeting_date = $this->Xin_model->set_date_format($r->meeting_date);
			 // get time am/pm
			 $meeting_time = new DateTime($r->meeting_time);
			 // get company
			$company = $this->Xin_model->read_company_info($r->company_id);
			if(!is_null($company)){
				$comp_name = $company[0]->name;
			} else {
				$comp_name = '--';	
			}
			
			// get user > added by
			$user = $this->Xin_model->read_user_info($r->employee_id);
			// user full name
			if(!is_null($user)){
				$full_name = $user[0]->first_name.' '.$user[0]->last_name;
			} else {
				$full_name = '--';	
			}
			
		   $data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_edit').'"><button type="button" class="btn icon-btn btn-xs btn-outline-info waves-effect waves-light edit-data" data-toggle="modal" data-target=".edit-modal-data" data-meeting_id="'. $r->meeting_id.'"><span class="fas fa-pencil-alt"></span></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn icon-btn btn-xs btn-outline-info waves-effect waves-light" data-toggle="modal" data-target=".view-modal-data" data-meeting_id="'. $r->meeting_id . '"><span class="fa fa-eye"></span></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'"><button type="button" class="btn icon-btn btn-xs btn-outline-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->meeting_id . '"><span class="far fa-trash-alt"></span></button></span>',
				$comp_name,
				$full_name,
				$r->meeting_title,
				$meeting_date,
				$meeting_time->format('h:i a')
		   );
	  }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $meetings->num_rows(),
			 "recordsFiltered" => $meetings->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
     }
	 
	 // Validate and add info in database
	public function add_meeting() {
	
		if($this->input->post('add_type')=='meeting') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
		
		$meeting_date = $this->input->post('meeting_date');
		$current_date = date('Y-m-d');
		$meeting_note = $this->input->post('meeting_note');
		$mt_date = strtotime($meeting_date);
		$ct_date = strtotime($current_date);
		$qt_meeting_note = htmlspecialchars(addslashes($meeting_note), ENT_QUOTES);
			
		/* Server side PHP input validation */		
		if($this->input->post('company_id')==='') {
			$Return['error'] = $this->lang->line('error_company_field');
		} else if($this->input->post('employee_id')==='') {
			$Return['error'] = $this->lang->line('xin_error_employee_id');
		} else if($this->input->post('meeting_title')==='') {
        	$Return['error'] = $this->lang->line('xin_error_meeting_title_field');
		} else if($this->input->post('meeting_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_meeting_date_field');
		} else if($mt_date <= $ct_date) {
			$Return['error'] = $this->lang->line('xin_error_meeting_date_current_date');
		} else if($this->input->post('meeting_time')==='') {
			$Return['error'] = $this->lang->line('xin_error_meeting_time_field');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'company_id' => $this->input->post('company_id'),
		'employee_id' => $this->input->post('employee_id'),
		'meeting_title' => $this->input->post('meeting_title'),
		'meeting_date' => $this->input->post('meeting_date'),
		'meeting_time' => $this->input->post('meeting_time'),
		'meeting_note' => $qt_meeting_note,
		'created_at' => date('Y-m-d')
		);
		$result = $this->Meetings_model->add($data);
		
		if ($result == TRUE) {
			$row = $this->db->select("*")->limit(1)->order_by('meeting_id',"DESC")->get("xin_meetings")->row();
			$Return['result'] = $this->lang->line('xin_hr_success_meeting_added');
			$Return['re_meeting_id'] = $row->meeting_id;
			
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
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
			$this->load->view("admin/events/get_employees", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
	 }
	
	// Validate and add info in database
	public function edit_meeting() {
	
		if($this->input->post('edit_type')=='meeting') {
			
		$id = $this->uri->segment(4);		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
		
		$meeting_date = $this->input->post('meeting_date');
		$current_date = date('Y-m-d');
		$meeting_note = $this->input->post('meeting_note');
		$mt_date = strtotime($meeting_date);
		$ct_date = strtotime($current_date);
		$qt_meeting_note = htmlspecialchars(addslashes($meeting_note), ENT_QUOTES);
			
		/* Server side PHP input validation */		
		if($this->input->post('company_id')==='') {
			$Return['error'] = $this->lang->line('error_company_field');
		} else if($this->input->post('employee_id')==='') {
			$Return['error'] = $this->lang->line('xin_error_employee_id');
		} else if($this->input->post('meeting_title')==='') {
        	$Return['error'] = $this->lang->line('xin_error_meeting_title_field');
		} else if($this->input->post('meeting_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_meeting_date_field');
		} else if($mt_date <= $ct_date) {
			$Return['error'] = $this->lang->line('xin_error_meeting_date_current_date');
		} else if($this->input->post('meeting_time')==='') {
			$Return['error'] = $this->lang->line('xin_error_meeting_time_field');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'company_id' => $this->input->post('company_id'),
		'employee_id' => $this->input->post('employee_id'),
		'meeting_title' => $this->input->post('meeting_title'),
		'meeting_date' => $this->input->post('meeting_date'),
		'meeting_time' => $this->input->post('meeting_time'),
		'meeting_note' => $qt_meeting_note,
		);
		$result = $this->Meetings_model->update_record($data,$id);
				
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_hr_success_meeting_updated');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// get record of meeting
	public function read_meeting_record()
	{
		$data['title'] = $this->Xin_model->site_title();
		$meeting_id = $this->input->get('meeting_id');
		$result = $this->Meetings_model->read_meeting_information($meeting_id);
		
		$data = array(
				'meeting_id' => $result[0]->meeting_id,
				'employee_id' => $result[0]->employee_id,
				'company_id' => $result[0]->company_id,
				'meeting_title' => $result[0]->meeting_title,
				'meeting_date' => $result[0]->meeting_date,
				'meeting_time' => $result[0]->meeting_time,
				'meeting_note' => $result[0]->meeting_note,
				'all_employees' => $this->Xin_model->all_employees(),
				'get_all_companies' => $this->Xin_model->get_companies()
				);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view('admin/events/dialog_meetings', $data);
		} else {
			redirect('admin/');
		}
	}
	
	public function delete_meeting() {
		if($this->input->post('type')=='delete') {
			// Define return | here result is used to return user data and error for error message 
			$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Meetings_model->delete_meeting_record($id);
			if(isset($id)) {
				$Return['result'] = $this->lang->line('xin_hr_success_meeting_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
	 
	 
	 
} 
?>