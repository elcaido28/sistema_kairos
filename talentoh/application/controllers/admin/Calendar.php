<?php
  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends MY_Controller
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
		  $this->load->model('Timesheet_model');
		  $this->load->model('Travel_model');
	//	  $this->load->model('Training_model');
	//	  $this->load->model('Project_model');
	//	  $this->load->model('Goal_tracking_model');
		  $this->load->model('Events_model');
		  $this->load->model('Meetings_model');
	//	  $this->load->model('Trainers_model');
		  $this->load->model('Department_model');
     }
	 
	// Logout from admin page
	public function hr() {
	
		$session = $this->session->userdata('username');
		if(empty($session)){ 
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('xin_hr_calendar_title');
		$data['breadcrumbs'] = $this->lang->line('xin_hr_calendar_title');
		$data['path_url'] = 'log';
		$data['all_holidays'] = $this->Timesheet_model->get_holidays_calendar();
		$data['all_leaves_request_calendar'] = $this->Timesheet_model->get_leaves_request_calendar();
		$data['all_upcoming_birthday'] = $this->Xin_model->employees_upcoming_birthday();
		$data['all_travel_request'] = $this->Travel_model->get_travel();
		$data['all_training'] = '';
		$data['all_projects'] = '';
		$data['all_tasks'] = '';
		$data['all_goals'] = '';
		$data['all_events'] = $this->Events_model->get_events();
		$data['all_employees'] = $this->Xin_model->all_employees();
		$data['all_meetings'] = $this->Meetings_model->get_meetings();
		$data['get_all_companies'] = $this->Xin_model->get_companies();
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if(in_array('95',$role_resources_ids)) {
			$data['subview'] = $this->load->view("admin/calendar/calendar_hr", $data, TRUE);
			$this->load->view('admin/layout/layout_main', $data); //page load
		} else {
			redirect('admin/dashboard');
		}
	}
	
	// add record of event/meeting/tasks/projects....
	public function add_cal_record()
	{
		$data['title'] = $this->Xin_model->site_title();
		$record = $this->input->get('record');
		$data = array(
		'all_companies' => $this->Xin_model->get_companies(),
		'get_all_companies' => $this->Xin_model->get_companies(),
		'all_employees' => $this->Xin_model->all_employees(),
		'all_tracking_types' => '',
		'all_leave_types' => $this->Timesheet_model->all_leave_types(),
		'travel_arrangement_types' => $this->Travel_model->travel_arrangement_types(),
		'all_trainers' => $this->Trainers_model->all_trainers(),
		'all_training_types' => $this->Training_model->all_training_types(),
		);
		$session = $this->session->userdata('username');
		if(!empty($session)){ 
			if($record == 0){
				$this->load->view('admin/calendar/options/dialog_add_holiday', $data);
			} else if($record == 1){
				$this->load->view('admin/calendar/options/dialog_add_leave', $data);
			} else if($record == 2){
				$this->load->view('admin/calendar/options/dialog_add_travel', $data);
			} else if($record == 3){
				$this->load->view('admin/calendar/options/dialog_add_training', $data);
			} else if($record == 4){
				$this->load->view('admin/calendar/options/dialog_add_project', $data);
			} else if($record == 5){
				$this->load->view('admin/calendar/options/dialog_add_task', $data);
			} else if($record == 6){
				$this->load->view('admin/calendar/options/dialog_add_events', $data);
			} else if($record == 7){
				$this->load->view('admin/calendar/options/dialog_add_meetings', $data);
			} else if($record == 8){
			//	$this->load->view('admin/calendar/options/dialog_add_goal', $data);
			} else if($record == 9){
				$this->load->view('admin/calendar/options/dialog_add_events', $data);
			} else if($record == 10){
				$this->load->view('admin/calendar/options/dialog_add_events', $data);
			} else if($record == 11){
				$this->load->view('admin/calendar/options/dialog_add_meetings', $data);
			}
		} else {
			redirect('admin/');
		}
	}
} 
?>