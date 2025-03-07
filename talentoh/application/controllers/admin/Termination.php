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

class Termination extends MY_Controller {
	
	 public function __construct() {
        parent::__construct();
		//load the model
		$this->load->model("Termination_model");
		$this->load->model("Department_model");
		$this->load->model("Xin_model");
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
		$data['title'] = $this->lang->line('left_terminations');
		$data['all_employees'] = $this->Xin_model->all_employees();
		$data['get_all_companies'] = $this->Xin_model->get_companies();
		$data['all_termination_types'] = $this->Termination_model->all_termination_types();
		$data['breadcrumbs'] = $this->lang->line('left_terminations');
		$data['path_url'] = 'termination';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('21',$role_resources_ids)) {
			if(!empty($session)){ 
				$data['subview'] = $this->load->view("admin/termination/termination_list", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}	
     }
 
    public function termination_list()
     {

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view("admin/termination/termination_list", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		
		$termination = $this->Termination_model->get_terminations();
		
		$data = array();

        foreach($termination->result() as $r) {
			 			  
		// get user > warning to
		$euser = $this->Xin_model->read_user_info($r->employee_id);
		// user full name
		if(!is_null($euser)){
			$ful_name = $euser[0]->first_name.' '.$euser[0]->last_name;
		} else {
			$ful_name = '--';	
		}
		// get notice date
		$notice_date = $this->Xin_model->set_date_format($r->notice_date);
		// get termination date
		$termination_date = $this->Xin_model->set_date_format($r->termination_date);
				
		// get status
		if($r->status==0): $status = $this->lang->line('xin_pending');
		elseif($r->status==1): $status = $this->lang->line('xin_accepted'); else: $status = $this->lang->line('xin_rejected'); endif;
		// get warning type
		$termination_type = $this->Termination_model->read_termination_type_information($r->termination_type_id);
		if(!is_null($termination_type)){
			$ttype = $termination_type[0]->type;
		} else {
			$ttype = '--';	
		}
		// get company
		$company = $this->Xin_model->read_company_info($r->company_id);
		if(!is_null($company)){
			$comp_name = $company[0]->name;
		} else {
			$comp_name = '--';	
		}
		
		$data[] = array(
			'<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_edit').'"><button type="button" class="btn icon-btn btn-xs btn-outline-info waves-effect waves-light"  data-toggle="modal" data-target=".edit-modal-data"  data-termination_id="'. $r->termination_id . '"><span class="fas fa-pencil-alt"></span></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view').'"><button type="button" class="btn icon-btn btn-xs btn-outline-info waves-effect waves-light" data-toggle="modal" data-target=".view-modal-data" data-termination_id="'. $r->termination_id . '"><span class="fa fa-eye"></span></button></span><span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_delete').'"><button type="button" class="btn icon-btn btn-xs btn-outline-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="'. $r->termination_id . '"><span class="far fa-trash-alt"></span></button></span>',
			$comp_name,
			$ful_name,
			$ttype,
			$notice_date,
			$termination_date,
			$status
		);
      }

	  $output = array(
		   "draw" => $draw,
			 "recordsTotal" => $termination->num_rows(),
			 "recordsFiltered" => $termination->num_rows(),
			 "data" => $data
		);
	  echo json_encode($output);
	  exit();
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
			$this->load->view("admin/termination/get_employees", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
	 } 
	 
	 public function read()
	{
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->input->get('termination_id');
		$result = $this->Termination_model->read_termination_information($id);
		$data = array(
				'termination_id' => $result[0]->termination_id,
				'employee_id' => $result[0]->employee_id,
				'company_id' => $result[0]->company_id,
				'terminated_by' => $result[0]->terminated_by,
				'termination_type_id' => $result[0]->termination_type_id,
				'termination_date' => $result[0]->termination_date,
				'notice_date' => $result[0]->notice_date,
				'description' => $result[0]->description,
				'status' => $result[0]->status,
				'all_employees' => $this->Xin_model->all_employees(),
				'get_all_companies' => $this->Xin_model->get_companies(),
				'all_termination_types' => $this->Termination_model->all_termination_types()
				);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			$this->load->view('admin/termination/dialog_termination', $data);
		} else {
			redirect('admin/');
		}
	}
	
	// Validate and add info in database
	public function add_termination() {
	
		if($this->input->post('add_type')=='termination') {		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
			
		/* Server side PHP input validation */
		$notice_date = $this->input->post('notice_date');
		$termination_date = $this->input->post('termination_date');
		$nt_date = strtotime($notice_date);
    	$tt_date = strtotime($termination_date);
		$description = $this->input->post('description');
		$qt_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
		
		if($this->input->post('company_id')==='') {
			$Return['error'] = $this->lang->line('error_company_field');
		} else if($this->input->post('employee_id')==='') {
       		 $Return['error'] = $this->lang->line('xin_error_employee_id');
		} else if($this->input->post('notice_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_resignation_notice_date');
		} else if($this->input->post('termination_date')==='') {
			 $Return['error'] = $this->lang->line('xin_error_termination_date');
		} else if($nt_date > $tt_date) {
        	$Return['error'] = $this->lang->line('xin_error_termination_notice_date_less');
		} else if($this->input->post('type')==='') {
			 $Return['error'] = $this->lang->line('xin_error_termination_type');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'employee_id' => $this->input->post('employee_id'),
		'company_id' => $this->input->post('company_id'),
		'notice_date' => $this->input->post('notice_date'),
		'description' => $qt_description,
		'termination_date' => $this->input->post('termination_date'),
		'termination_type_id' => $this->input->post('type'),
		'terminated_by' => $this->input->post('user_id'),
		'status' => '0',
		'created_at' => date('d-m-Y'),
		);
		$result = $this->Termination_model->add($data);
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_termination_added');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	// Validate and update info in database
	public function update() {
	
		if($this->input->post('edit_type')=='termination') {
			
		$id = $this->uri->segment(4);
		
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
			
		/* Server side PHP input validation */
		$notice_date = $this->input->post('notice_date');
		$termination_date = $this->input->post('termination_date');
		$nt_date = strtotime($notice_date);
    	$tt_date = strtotime($termination_date);
		$description = $this->input->post('description');
		$qt_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
		
		if($this->input->post('company_id')==='') {
			$Return['error'] = $this->lang->line('error_company_field');
		} else if($this->input->post('employee_id')==='') {
       		 $Return['error'] = $this->lang->line('xin_error_employee_id');
		} else if($this->input->post('notice_date')==='') {
			$Return['error'] = $this->lang->line('xin_error_resignation_notice_date');
		} else if($this->input->post('termination_date')==='') {
			 $Return['error'] = $this->lang->line('xin_error_termination_date');
		} else if($nt_date > $tt_date) {
        	$Return['error'] = $this->lang->line('xin_error_termination_notice_date_less');
		} else if($this->input->post('type')==='') {
			 $Return['error'] = $this->lang->line('xin_error_termination_type');
		}
				
		if($Return['error']!=''){
       		$this->output($Return);
    	}
	
		$data = array(
		'employee_id' => $this->input->post('employee_id'),
		'company_id' => $this->input->post('company_id'),
		'notice_date' => $this->input->post('notice_date'),
		'description' => $qt_description,
		'termination_date' => $this->input->post('termination_date'),
		'termination_type_id' => $this->input->post('type'),
		'terminated_by' => $this->input->post('user_id'),
		'status' => $this->input->post('status'),
		);
		
		$result = $this->Termination_model->update_record($data,$id);		
		
		if ($result == TRUE) {
			$Return['result'] = $this->lang->line('xin_success_termination_updated');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
		exit;
		}
	}
	
	public function delete() {
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result'=>'', 'error'=>'', 'csrf_hash'=>'');
		$id = $this->uri->segment(4);
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
		$result = $this->Termination_model->delete_record($id);
		if(isset($id)) {
			$Return['result'] = $this->lang->line('xin_success_termination_deleted');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
	}
}
