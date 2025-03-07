<?php
	
class Xin_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
	// get single location
	 public function read_location_info($id) {
	
		$sql = 'SELECT * FROM xin_office_location WHERE location_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
		
	// is logged in to system
	public function is_logged_in($id)
	{
		$CI =& get_instance();
		$is_logged_in = $CI->session->userdata($id);
		return $is_logged_in;       
	}
	
	// generate random string
	public function generate_random_string($length = 7) {
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	public function get_countries()
	{
	  $query = $this->db->query("SELECT * from xin_countries");
  	  return $query->result();
	}
	
	public function clean_post($post_name) {
	   $name = trim($post_name);
	   $Evalue = array('-','alert','<script>','</script>','</php>','<php>','<p>','\r\n','\n','\r','=',"'",'/','cmd','!',"('","')", '|');
	   $post_name = str_replace($Evalue, '', $name); 
	   $post_name = preg_replace('/^(\d{1,2}[^0-9])/m', '', $post_name);
	  // $post_name = htmlspecialchars(trim($post_name), ENT_QUOTES, "UTF-8");
	   
	   return $post_name;
	}
	
	public function clean_date_post($post_name) {
	   $name = trim($post_name);
	   $Evalue = array('alert','<script>','</script>','</php>','<php>','<p>','\r\n','\n','\r','=',"'",'/','cmd','!',"('","')", '|');
	   $post_name = str_replace($Evalue, '', $name); 
	   $post_name = preg_replace('/^(\d{1,2}[^0-9])/m', '', $post_name);
	   $post_name = htmlspecialchars(trim($post_name), ENT_QUOTES, "UTF-8");
	   return $post_name;
	}
	// class button
	public function form_button_class() {
		return 'btn btn-primary';
	}
	public function validate_date($dateStr, $format)
	{
		date_default_timezone_set('UTC');
		$date = DateTime::createFromFormat($format, $dateStr);
		return $date && ($date->format($format) === $dateStr);
	}
	private function validate_numbers_only($value) {
		return preg_match('/^([0-9]*)$/', $value);
	}
	// get selected module
	public function select_module_class($mClass,$mMethod) {
		$arr = array();
		// dashboard
		if($mClass=='dashboard') {
			$arr['active'] = 'active';
			$arr['open'] = '';
			return $arr;
		}
		// admin menu
		else if($mClass=='department') {
			$arr['dep_active'] = 'active';
			$arr['adm_open'] = 'open';
			return $arr;
		} else if($mClass=='designation') {
			$arr['des_active'] = 'active';
			$arr['adm_open'] = 'open';
			return $arr;
		} else if($mClass=='company') {
			$arr['com_active'] = 'active';
			$arr['adm_open'] = 'open';
			return $arr;
		} else if($mClass=='location') {
			$arr['loc_active'] = 'active';
			$arr['adm_open'] = 'open';
			return $arr;
		} else if($mClass=='policy') {
			$arr['pol_active'] = 'active';
			$arr['adm_open'] = 'open';
			return $arr;
		} else if($mClass=='expense') {
			$arr['exp_active'] = 'active';
			$arr['adm_open'] = 'open';
			return $arr;
		} else if($mClass=='announcement') {
			$arr['ann_active'] = 'active';
			$arr['adm_open'] = 'open';
			return $arr;
		} else if($mClass=='employees' && $mMethod=='hr') {
			$arr['hremp_active'] = 'active';
			$arr['stff_open'] = 'open';
			return $arr;
		} else if($mClass=='employees' && $mMethod=='import') {
			$arr['importemp_active'] = 'active';
			$arr['stff_open'] = 'open';
			return $arr;
		} else if($mClass=='employees') {
			$arr['emp_active'] = 'active';
			$arr['stff_open'] = 'open';
			return $arr;
		} else if($mClass=='awards') {
			$arr['awar_active'] = 'active';
			$arr['emp_open'] = 'open';
			return $arr;
		} else if($mClass=='transfers') {
			$arr['tra_active'] = 'active';
			$arr['emp_open'] = 'open';
			return $arr;
		} else if($mClass=='resignation') {
			$arr['res_active'] = 'active';
			$arr['emp_open'] = 'open';
			return $arr;
		} else if($mClass=='travel') {
			$arr['trav_active'] = 'active';
			$arr['emp_open'] = 'open';
			return $arr;
		} else if($mClass=='promotion') {
			$arr['pro_active'] = 'active';
			$arr['emp_open'] = 'open';
			return $arr;
		} else if($mClass=='complaints') {
			$arr['compl_active'] = 'active';
			$arr['emp_open'] = 'open';
			return $arr;
		} else if($mClass=='warning') {
			$arr['warn_active'] = 'active';
			$arr['emp_open'] = 'open';
			return $arr;
		} else if($mClass=='termination') {
			$arr['term_active'] = 'active';
			$arr['emp_open'] = 'open';
			return $arr;
		} else if($mClass=='employees_last_login') {
			$arr['emp_ll_active'] = 'active';
			$arr['emp_open'] = 'open';
			return $arr;
		} else if($mClass=='employee_exit') {
			$arr['emp_ex_active'] = 'active';
			$arr['emp_open'] = 'open';
			return $arr;
		}
		// assets
		else if($mMethod=='category' && $mClass=='assets') {
			$arr['asst_cat_active'] = 'active';
			$arr['asst_open'] = 'open';
			return $arr;
		}
		else if($mClass=='assets') {
			$arr['asst_active'] = 'active';
			$arr['asst_open'] = 'open';
			return $arr;
		} else if($mClass=='chat') {
			$arr['chat_active'] = 'active';
			return $arr;
		} // timesheet
		else if($mClass=='timesheet' && $mMethod=='attendance') {
			$arr['attnd_active'] = 'active';
			$arr['attnd_open'] = 'open';
			return $arr;
		} else if($mMethod=='date_wise_attendance') {
			$arr['dtwise_attnd_active'] = 'active';
			$arr['attnd_open'] = 'open';
			return $arr;
		} else if($mMethod=='update_attendance') {
			$arr['upd_attnd_active'] = 'active';
			$arr['attnd_open'] = 'open';
			return $arr;
		} else if($mClass=='timesheet' && $mMethod=='import') {
			$arr['import_attnd_active'] = 'active';
			$arr['attnd_open'] = 'open';
			return $arr;
		} else if($mMethod=='office_shift' && $mClass=='timesheet') {
			$arr['offsh_active'] = 'active';
			$arr['attnd_open'] = 'open';
			return $arr;
		} else if($mMethod=='holidays' && $mClass=='timesheet') {
			$arr['hol_active'] = 'active';
			$arr['attnd_open'] = 'open';
			return $arr;
		} else if($mMethod=='leave' && $mClass=='timesheet') {
			$arr['leave_active'] = 'active';
			$arr['attnd_open'] = 'open';
			return $arr;
		} else if($mMethod=='leave_details' && $mClass=='timesheet') {
			$arr['leave_active'] = 'active';
			$arr['attnd_open'] = 'open';
			return $arr;
		} else if($mClass=='calendar' && $mMethod=='attendance') {
			$arr['attnd_cal_active'] = 'active';
			$arr['attnd_open'] = 'open';
			return $arr;
		}// payroll
		else if($mMethod=='hourly_wages') {
			$arr['pay_hourly_active'] = 'active';
			$arr['payrl_open'] = 'open';
			return $arr;
		} else if($mMethod=='templates') {
			$arr['pay_temp_active'] = 'active';
			$arr['payrl_open'] = 'open';
			return $arr;
		} else if($mMethod=='manage_salary') {
			$arr['pay_mang_active'] = 'active';
			$arr['payrl_open'] = 'open';
			return $arr;
		} else if($mMethod=='generate_payslip') {
			$arr['pay_generate_active'] = 'active';
			$arr['payrl_open'] = 'open';
			return $arr;
		} else if($mMethod=='payment_history') {
			$arr['pay_his_active'] = 'active';
			$arr['payrl_open'] = 'open';
			return $arr;
		} else if($mMethod=='advance_salary') {
			$arr['pay_advn_active'] = 'active';
			$arr['payrl_open'] = 'open';
			return $arr;
		} else if($mMethod=='advance_salary_report') {
			$arr['pay_advn_rpt_active'] = 'active';
			$arr['payrl_open'] = 'open';
			return $arr;
		} // performance
		else if($mClass=='performance_indicator') {
			$arr['per_indi_active'] = 'active';
			$arr['performance_open'] = 'open';
			return $arr;
		} else if($mClass=='performance_appraisal') {
			$arr['per_app_active'] = 'active';
			$arr['performance_open'] = 'open';
			return $arr;
		} else if($mClass=='organization' && $mMethod=='chart') {
			$arr['org_chart_active'] = 'active';
			$arr['adm_open'] = 'open';
			return $arr;
		} else if($mClass=='calendar' && $mMethod=='hr') {
			$arr['calendar_hr_active'] = 'active';
			return $arr;
		} else if($mClass=='tickets') {
			$arr['ticket_active'] = 'active';
			return $arr;
		} else if($mMethod=='calendar' && $mClass=='leave') {
			$arr['leave_cal_active'] = 'active';
			$arr['leave_open'] = 'open';
			return $arr;
		} else if($mMethod=='calendar' && $mClass=='project') {
			$arr['project_cal_active'] = 'active';
			$arr['project_open'] = 'open';
			return $arr;
		}  else if($mClass=='project') {
			$arr['project_active'] = 'active';
			$arr['project_open'] = 'open';
			return $arr;
		} else if($mMethod=='tasks' && $mClass=='timesheet') {
			$arr['task_active'] = 'active';
			$arr['project_open'] = 'open';
			return $arr;
		} else if($mMethod=='task_details') {
			$arr['task_active'] = 'active';
			$arr['project_open'] = 'open';
			return $arr;
		} else if($mClass=='clients') {
			$arr['hr_clients_active'] = 'active';
			$arr['project_open'] = 'open';
			return $arr;
		} else if($mMethod=='create' && $mClass=='invoices') {
			$arr['hr_create_inv_active'] = 'active';
			$arr['project_open'] = 'open';
			return $arr;
		} else if($mMethod=='taxes' && $mClass=='invoices') {
			$arr['hr_taxes_inv_active'] = 'active';
			$arr['project_open'] = 'open';
			return $arr;
		} else if($mClass=='invoices') {
			$arr['hr_all_inv_active'] = 'active';
			$arr['project_open'] = 'open';
			return $arr;
		} else if($mClass=='files') {
			$arr['file_active'] = 'active';
			return $arr;
		} //recruitment
		 else if($mClass=='job_post') {
			$arr['jb_post_active'] = 'active';
			$arr['recruit_open'] = 'open';
			return $arr;
		} else if($mClass=='job_candidates') {
			$arr['jb_cand_active'] = 'active';
			$arr['recruit_open'] = 'open';
			return $arr;
		} else if($mClass=='job_interviews') {
			$arr['jb_int_active'] = 'active';
			$arr['recruit_open'] = 'open';
			return $arr;
		} //training
		 else if($mClass=='training') {
			$arr['training_active'] = 'active';
			$arr['training_open'] = 'open';
			return $arr;
		} else if($mClass=='training_type') {
			$arr['tr_type_active'] = 'active';
			$arr['training_open'] = 'open';
			return $arr;
		} else if($mClass=='trainers') {
			$arr['trainers_active'] = 'active';
			$arr['training_open'] = 'open';
			return $arr;
		}//system
		 else if($mClass=='users') {
			$arr['users_active'] = 'active';
			$arr['system_open'] = 'open';
			return $arr;
		} else if($mClass=='roles') {
			$arr['roles_active'] = 'active';
			$arr['stff_open'] = 'open';
			return $arr;
		} else if($mMethod=='constants' && $mClass=='settings') {
			$arr['constants_active'] = 'active';
			$arr['system_open'] = 'open';
			return $arr;
		} else if($mMethod=='database_backup' && $mClass=='settings') {
			$arr['db_active'] = 'active';
			$arr['system_open'] = 'open';
			return $arr;
		} else if($mMethod=='email_template' && $mClass=='settings') {
			$arr['email_template_active'] = 'active';
			$arr['system_open'] = 'open';
			return $arr;
		} else if($mMethod=='modules' && $mClass=='settings') {
			$arr['modules_active'] = 'active';
			$arr['system_open'] = 'open';
			return $arr;
		} else if($mClass=='theme') {
			$arr['theme_active'] = 'active';
			$arr['system_open'] = 'open';
			return $arr;
		} else if($mClass=='settings') {
			$arr['settings_active'] = 'active';
			$arr['system_open'] = 'open';
			return $arr;
		} else if($mMethod=='changelog') {
			$arr['changelog_active'] = 'active';
			return $arr;
		} else if($mClass=='languages') {
			$arr['languages_active'] = 'active';
			$arr['system_open'] = 'open';
			return $arr;
		} else if($mClass=='events' && $mMethod=='calendar') {
			$arr['hr_ecalendar_active'] = 'active';
			$arr['hr_events_open'] = 'open';
			return $arr;
		} else if($mClass=='meetings') {
			$arr['hr_meetings_active'] = 'active';
			$arr['hr_events_open'] = 'open';
			return $arr;
		} else if($mClass=='events') {
			$arr['hr_events_active'] = 'active';
			$arr['hr_events_open'] = 'open';
			return $arr;
		} else if($mClass=='goal_tracking' && $mMethod=='calendar') {
			$arr['goal_tracking_cal_active'] = 'active';
			$arr['goal_tracking_open'] = 'open';
			return $arr;
		} else if($mClass=='goal_tracking' && $mMethod=='type') {
			$arr['goal_tracking_type_active'] = 'active';
			$arr['goal_tracking_open'] = 'open';
			return $arr;
		} else if($mClass=='goal_tracking') {
			$arr['goal_tracking_active'] = 'active';
			$arr['goal_tracking_open'] = 'open';
			return $arr;
		} else if($mClass=='reports'  && $mMethod=='payslip') {
			$arr['reports_payslip_active'] = 'active';
			$arr['reports_open'] = 'open';
			return $arr;
		} else if($mClass=='reports'  && $mMethod=='employee_attendance') {
			$arr['reports_employee_attendance_active'] = 'active';
			$arr['reports_open'] = 'open';
			return $arr;
		} else if($mClass=='reports'  && $mMethod=='employee_training') {
			$arr['reports_employee_training_active'] = 'active';
			$arr['reports_open'] = 'open';
			return $arr;
		} else if($mClass=='reports'  && $mMethod=='projects') {
			$arr['reports_projects_active'] = 'active';
			$arr['reports_open'] = 'open';
			return $arr;
		} else if($mClass=='reports'  && $mMethod=='tasks') {
			$arr['reports_tasks_active'] = 'active';
			$arr['reports_open'] = 'open';
			return $arr;
		} else if($mClass=='reports'  && $mMethod=='roles') {
			$arr['reports_roles_active'] = 'active';
			$arr['reports_open'] = 'open';
			return $arr;
		} else if($mClass=='reports'  && $mMethod=='employees') {
			$arr['reports_employees_active'] = 'active';
			$arr['reports_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='awards') {
			$arr['hr_awards_active'] = 'active';
			$arr['mylink_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='transfer') {
			$arr['hr_transfer_active'] = 'active';
			$arr['mylink_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='promotion') {
			$arr['hr_promotion_active'] = 'active';
			$arr['mylink_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='complaints') {
			$arr['hr_complaints_active'] = 'active';
			$arr['mylink_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='warning') {
			$arr['hr_warning_active'] = 'active';
			$arr['mylink_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='training') {
			$arr['hr_training_active'] = 'active';
			$arr['mylink_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='office_shift') {
			$arr['hr_office_shift_active'] = 'active';
			$arr['mylink_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='performance') {
			$arr['hr_performance_active'] = 'active';
			$arr['mylink_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='jobs_applied') {
			$arr['jobs_applied_active'] = 'active';
			$arr['rec_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='jobs_interviews') {
			$arr['jobs_interviews_active'] = 'active';
			$arr['rec_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='payslip') {
			$arr['hr_payslip_active'] = 'active';
			$arr['hr_payslip_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='advance_salary') {
			$arr['hr_advance_salary_active'] = 'active';
			$arr['hr_payslip_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='advance_salary_report') {
			$arr['hr_advance_salary_report_active'] = 'active';
			$arr['hr_payslip_open'] = 'open';
			return $arr;
		} else if($mClass=='user' && $mMethod=='attendance') {
			$arr['hr_attendance_active'] = 'active';
			return $arr;
		} else if($mClass=='user' && $mMethod=='attendance') {
			$arr['hr_attendance_active'] = 'active';
			return $arr;
		} else if($mClass=='user' && $mMethod=='assets') {
			$arr['hr_assets_active'] = 'active';
			return $arr;
		} else if($mClass=='user' && $mMethod=='tickets') {
			$arr['hr_tickets_active'] = 'active';
			return $arr;
		} else if($mClass=='user' && $mMethod=='tasks') {
			$arr['hr_task_active'] = 'active';
			return $arr;
		} else if($mClass=='user' && $mMethod=='projects') {
			$arr['hr_projects_active'] = 'active';
			return $arr;
		} else if($mClass=='user' && $mMethod=='expense_claims') {
			$arr['hr_expense_claims_active'] = 'active';
			return $arr;
		} else if($mClass=='user' && $mMethod=='announcement') {
			$arr['hr_announcement_active'] = 'active';
			return $arr;
		} else if($mClass=='user' && $mMethod=='travel') {
			$arr['hr_travel_active'] = 'active';
			return $arr;
		} // accounting
		else if($mClass=='accounting' && $mMethod=='bank_cash') {
			$arr['hr_bank_cash_active'] = 'active';
			$arr['hr_acc_account_list_open'] = 'open';
			return $arr;
		} else if($mClass=='accounting' && $mMethod=='account_balances') {
			$arr['hr_account_balances_active'] = 'active';
			$arr['hr_acc_account_list_open'] = 'open';
			return $arr;
		} else if($mClass=='accounting' && $mMethod=='transfer') {
			$arr['hr_account_transfer_active'] = 'active';
			$arr['hr_acc_transactions_open'] = 'open';
			return $arr;
		} else if($mClass=='accounting' && $mMethod=='deposit') {
			$arr['hr_deposit_active'] = 'active';
			$arr['hr_acc_transactions_open'] = 'open';
			return $arr;
		} else if($mClass=='accounting' && $mMethod=='expense') {
			$arr['hr_account_expense_active'] = 'active';
			$arr['hr_acc_transactions_open'] = 'open';
			return $arr;
		} else if($mClass=='accounting' && $mMethod=='transactions') {
			$arr['hr_account_transactions_active'] = 'active';
			$arr['hr_acc_transactions_open'] = 'open';
			return $arr;
		} else if($mClass=='accounting' && $mMethod=='bankwise_transactions') {
			$arr['hr_account_transactions_active'] = 'active';
			$arr['hr_acc_transactions_open'] = 'open';
			return $arr;
		} else if($mClass=='accounting' && $mMethod=='payees') {
			$arr['hr_payees_active'] = 'active';
			$arr['hr_acc_payees_payers_open'] = 'open';
			return $arr;
		} else if($mClass=='accounting' && $mMethod=='payers') {
			$arr['hr_payers_active'] = 'active';
			$arr['hr_acc_payees_payers_open'] = 'open';
			return $arr;//
		} else if($mClass=='accounting' && $mMethod=='account_statement') {
			$arr['hr_account_statement_active'] = 'active';
			$arr['hr_acc_reports_open'] = 'open';
			return $arr;
		} else if($mClass=='accounting' && $mMethod=='expense_report') {
			$arr['hr_expense_report_active'] = 'active';
			$arr['hr_acc_reports_open'] = 'open';
			return $arr;
		} else if($mClass=='accounting' && $mMethod=='income_report') {
			$arr['hr_income_report_active'] = 'active';
			$arr['hr_acc_reports_open'] = 'open';
			return $arr;
		} else if($mClass=='accounting' && $mMethod=='transfer_report') {
			$arr['hr_transfer_report_active'] = 'active';
			$arr['hr_acc_reports_open'] = 'open';
			return $arr;
		} else if($mClass=='projects') {
			$arr['hr_client_project_active'] = 'active';
			return $arr;
		} else if($mClass=='invoices') {
			$arr['hr_client_invoices_active'] = 'active';
			return $arr;
		}
	}

	 // get single country
	 public function read_country_info($id) {
	
		$sql = 'SELECT * FROM xin_countries WHERE country_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// Function to update record in table
	public function login_update_record($data, $id){
		$this->db->where('user_id', $id);
		if( $this->db->update('xin_employees',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// get single employee
	public function read_user_info($id) {
	
		$sql = 'SELECT * FROM xin_employees WHERE user_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
		
	}
	// get single user
	public function read_user_xuinfo($id) {
	
		$sql = 'SELECT * FROM xin_users WHERE user_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
		
	}
	
	// get single user
	public function read_user_attendance_info() {
		
		$sql = 'SELECT * FROM xin_employees WHERE user_id = ?';
		$binds = array('000');
		$query = $this->db->query($sql, $binds);
		
		return $query;	
	}
	
	// get single user
	public function read_user_by_employee_id($id) {
	
		$sql = 'SELECT * FROM xin_employees WHERE employee_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
		
	}
	
	// get single user > by email
	public function read_user_info_byemail($email) {
	
		$sql = 'SELECT * FROM xin_employees WHERE email = ?';
		$binds = array($email);
		$query = $this->db->query($sql, $binds);
		
		return $query;
	}
	
	// get single employee
	public function read_employee_info($id) {
	
		$sql = 'SELECT * FROM xin_employees WHERE user_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
		
	}
	
	// get single employee > by email
	public function read_employee_info_byemail($email) {
	
		$sql = 'SELECT * FROM xin_employees WHERE email = ?';
		$binds = array($email);
		$query = $this->db->query($sql, $binds);

		return $query;
	}
	
	// get last user attendance > check if loged in-
	public function attendance_time_checks($id) {

		$session = $this->session->userdata('username');
		$sql = 'SELECT * FROM xin_attendance_time WHERE employee_id = ?, clock_out = ? order by time_attendance_id desc limit 1';
		$binds = array($id, '');
		$query = $this->db->query($sql, $binds);
		return $query;
	}
	
	// get single user > by designation
	public function read_user_info_bydesignation($email) {
	
		$sql = 'SELECT * FROM xin_employees WHERE designation_id = ?';
		$binds = array($email);
		$query = $this->db->query($sql, $binds);
		
		return $query->result();
	}
	
	// get theme info
	public function read_theme_info($id) {
	
		$sql = 'SELECT * FROM xin_theme_settings WHERE theme_settings_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	// get single company
	public function read_company_info($id) {
	
		$sql = 'SELECT * FROM xin_companies WHERE company_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);		
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_employee_officeshift($id) {
	 	
		$sql = 'SELECT * FROM xin_employee_shift WHERE employee_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		return $query;
	}
	
	// get single user role info
	public function read_user_role_info($id) {
	
		$sql = 'SELECT * FROM xin_user_roles WHERE role_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get setting info
	public function read_setting_info($id) {
	
		$sql = 'SELECT * FROM xin_system_setting WHERE setting_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get file setting info
	public function read_file_setting_info($id) {
	
		$sql = 'SELECT * FROM xin_file_manager_settings WHERE setting_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get setting layout
	public function system_layout() {
	
		// get details of layout
		$system = $this->read_setting_info(1);
		
		if($system[0]->compact_sidebar!=''){
			// if compact sidebar
			$compact_sidebar = 'compact-sidebar';
		} else {
			$compact_sidebar = '';
		}
		if($system[0]->fixed_header!=''){
			// if fixed header
			$fixed_header = 'fixed-header';
		} else {
			$fixed_header = '';
		}
		if($system[0]->fixed_sidebar!=''){
			// if fixed sidebar
			$fixed_sidebar = 'fixed-sidebar';
		} else {
			$fixed_sidebar = '';
		}
		if($system[0]->boxed_wrapper!=''){
			// if boxed wrapper
			$boxed_wrapper = 'boxed-wrapper';
		} else {
			$boxed_wrapper = '';
		}
		if($system[0]->layout_static!=''){
			// if static layout
			$static = 'static';
		} else {
			$static = '';
		}
		return $layout = $compact_sidebar.' '.$fixed_header.' '.$fixed_sidebar.' '.$boxed_wrapper.' '.$static;
	}
	
	// get company setting info
	public function read_company_setting_info($id) {
	
		$sql = 'SELECT * FROM xin_company_info WHERE company_info_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get title
	public function site_title() {
		$system = $this->read_setting_info(1);
		return 'HR Software | '.$system[0]->application_name;
	}
	
	// get all companies
	public function get_companies()
	{
	  $query = $this->db->query("SELECT * from xin_companies");
  	  return $query->result();
	}
	
	// get all companies
	public function get_iess_types()
	{
	  $query = $this->db->query("SELECT * from xin_iess");
  	  return $query->result();
	}
	
	// get all companies
	public function get_iess_list()
	{
	  $query = $this->db->query("SELECT * from xin_iess");
  	  return $query;
	}
	
	// get all leave applications
	public function get_leave_applications()
	{
	  $query = $this->db->query("SELECT * from xin_leave_applications");
  	  return $query->result();
	}
	
	// get last 5 applications
	public function get_last_leave_applications()
	{
	  $query = $this->db->query("SELECT * from xin_leave_applications order by leave_id desc limit 5");
  	  return $query->result();
	}
	
	//set currency sign
	public function currency_sign($number) {
		
		// get details
		$system_setting = $this->read_setting_info(1);
		// currency code/symbol
		if($system_setting[0]->show_currency=='code'){
			$ar_sc = explode(' -',$system_setting[0]->default_currency_symbol);
			$sc_show = $ar_sc[0];
		} else {
			$ar_sc = explode('- ',$system_setting[0]->default_currency_symbol);
			$sc_show = $ar_sc[1];
		}
		if($system_setting[0]->currency_position=='Prefix'){
			$sign_value = $sc_show.''.$number;
		} else {
			$sign_value = $number.''.$sc_show;
		}
		return $sign_value;
	}
	
	// get all locations
	public function all_locations()
	{
	  $query = $this->db->query("SELECT * from xin_office_location");
  	  return $query->result();
	}
	
	//set currency sign
	public function set_date_format_js() {
		
		// get details
		$system_setting = $this->read_setting_info(1);
		// date format
		if($system_setting[0]->date_format_xi=='d-m-Y'){
			$d_format = 'dd-mm-yy';
		} else if($system_setting[0]->date_format_xi=='m-d-Y'){
			$d_format = 'mm-dd-yy';
		} else if($system_setting[0]->date_format_xi=='d-M-Y'){
			$d_format = 'dd-M-yy';
		} else if($system_setting[0]->date_format_xi=='M-d-Y'){
			$d_format = 'M-dd-yy';;
		}
		
		return $d_format;
	}
	
	public function read_designation_info($id) {
	
		$sql = 'SELECT * FROM xin_designations WHERE designation_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	// get department designations	
	public function read_low_designations($id) {
	
		$sql = 'SELECT * FROM xin_designations WHERE designation_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
  	 	return $query->result();
	}
	// get department designations	
	public function read_top_designations($id) {
	
		$sql = 'SELECT * FROM xin_designations WHERE top_designation_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
  	 	return $query->result();
	}
	
	// get department designations	
	public function read_dep_designations($id) {
	
		$sql = 'SELECT * FROM xin_designations WHERE department_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
  	 	return $query->result();
	}
	
	// get designation employees	
	public function read_designation_employees($id) {
	
		$sql = 'SELECT * FROM xin_employees WHERE designation_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
  	 	return $query->result();
	}
	
	// get all employees status
	public function all_employees_status()
	{
	  $query = $this->db->query("SELECT * from xin_employees");
  	  return $query;
	}
	
	// get all employees attendance calendar
	public function all_employees_attendance_calendar()
	{
	  $query = $this->db->query("SELECT * from xin_employees");
  	  return $query;
	}
	
	// get current day attendance 
	public function current_month_day_attendance($current_month) {
		
		$session = $this->session->userdata('username');
		$sql = 'SELECT employee_id,attendance_date FROM xin_attendance_time WHERE attendance_date = ? group by employee_id';
		$binds = array($current_month);
		$query = $this->db->query($sql, $binds);
		return $query->num_rows();
	}
	
	// get current day attendance > calendar
	public function current_employee_absent_calendar($current_month) {
		
		$session = $this->session->userdata('username');		
		$sql = "SELECT at.*,e.*,la.* from xin_attendance_time as at, xin_employees as e, xin_leave_applications as la where at.attendance_date = ? and e.user_id!=at.employee_id and e.user_id!=la.employee_id";
		$binds = array($current_month);
		$query = $this->db->query($sql, $binds);
		
		
		return $query->result();
	}
	public function current_employee_absent_calendar_count($current_month) {
		
		$session = $this->session->userdata('username');
		$sql = "SELECT at.*,e.*,la.* from xin_attendance_time as at, xin_employees as e, xin_leave_applications as la where at.attendance_date = ? and e.user_id!=at.employee_id and e.user_id!=la.employee_id";
		$binds = array($current_month);
		$query = $this->db->query($sql, $binds);
		return $query->num_rows();
	}
	
	// check if leave available
	public function employee_leave_date_calendar($current_date) {
	
		$sql = "SELECT la.*,e.user_id,e.first_name,e.last_name from xin_leave_applications as la, xin_employees as e where (la.from_date between la.from_date and la.to_date) or la.from_date = ? and la.to_date = ? and e.user_id=la.employee_id and la.status=2 group by la.employee_id";
		$binds = array($current_date,$current_date);
		$query = $this->db->query($sql, $binds);
		return $query->result();
	}
	public function employee_leave_date_calendar_count($current_date) {
	
		$sql = "SELECT la.*,e.user_id,e.first_name,e.last_name from xin_leave_applications as la, xin_employees as e where (la.from_date between la.from_date and la.to_date) or la.from_date = ? and la.to_date = ? and e.user_id=la.employee_id and la.status=2 group by la.employee_id";
		$binds = array($current_date,$current_date);
		$query = $this->db->query($sql, $binds);
		return $query->num_rows();
	}
	//
	// get current day attendance > calendar
	public function current_employee_leave_calendar() {
		
		$session = $this->session->userdata('username');
		$query = $this->db->query("SELECT la.*,e.* from xin_leave_applications as la, xin_employees as e where e.user_id=la.employee_id");
		return $query->result();
	}
	
	public function current_employee_working_calendar($current_date) {
		
		$sql = 'SELECT * FROM xin_attendance_time WHERE attendance_date = ? group by employee_id';
		$binds = array($current_date);
		$query = $this->db->query($sql, $binds);
		return $query->result();
	}
			
	// get all employees
	public function all_employees()
	{
	  $query = $this->db->query("SELECT * from xin_employees");
  	  return $query->result();
	}
	
	// get all employees
	public function all_active_employees()
	{
	 	$sql = 'SELECT * FROM xin_employees WHERE is_active = ?';
		$binds = array(1);
		$query = $this->db->query($sql, $binds);
  	  	return $query->result();
	}
	
	// get male
	public function male_employees()
	{
		$sql = 'SELECT * FROM xin_employees WHERE gender = ?';
		$binds = array('Male');
		$query = $this->db->query($sql, $binds);
		
		$male_emp = $query->num_rows();
		$stquery = $this->all_employees_status();
		$st_total = $stquery->num_rows();
		if($male_emp==0) {
			return $male_employees = 0;
		} else {
		// get actual data
			$male_employees = $male_emp / $st_total * 100;
			$rd_emp = round($male_employees);
			return $rd_emp;
		}
	}
	// get female
	public function female_employees()
	{
		$sql = 'SELECT * FROM xin_employees WHERE gender = ?';
		$binds = array('Female');
		$query = $this->db->query($sql, $binds);
		$female_emp = $query->num_rows();
		$stquery = $this->all_employees_status();
		$st_total = $stquery->num_rows();
		// get actual data
		if($female_emp==0) {
			return $female_employees = 0;
		} else {
			// get actual data
			$female_employees = $female_emp / $st_total * 100;
			$rd_emp = round($female_employees);
			return $rd_emp;
		}
	}
	
	// get all customers
	public function all_customers()
	{
	  $query = $this->db->query("SELECT * from xin_customers");
  	  return $query->result();
	}
	
	// get all suppliers
	public function all_suppliers()
	{
	  $query = $this->db->query("SELECT * from xin_suppliers");
  	  return $query->result();
	}
	
	// get all agents
	public function all_agents()
	{
	  $query = $this->db->query("SELECT * from xin_agents");
  	  return $query->result();
	}
		
	//set currency sign
	public function set_date_format($date) {
		
		// get details
		$system_setting = $this->read_setting_info(1);
		// date formate
		if($system_setting[0]->date_format_xi=='d-m-Y'){
			$d_format = date("d-m-Y", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='m-d-Y'){
			$d_format = date("m-d-Y", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='d-M-Y'){
			$d_format = date("d-M-Y", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='M-d-Y'){
			$d_format = date("M-d-Y", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='F-j-Y'){
			$d_format = date("F-j-Y", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='j-F-Y'){
			$d_format = date("j-F-Y", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='m.d.y'){
			$d_format = date("m.d.y", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='d.m.y'){
			$d_format = date("d.m.y", strtotime($date));
		} else {
			$d_format = $system_setting[0]->date_format_xi;
		}
		
		return $d_format;
	}
	
	//set currency sign
	public function set_date_time_format($date) {
		
		// get details
		$system_setting = $this->read_setting_info(1);
		// date formate
		if($system_setting[0]->date_format_xi=='d-m-Y'){
			$d_format = date("d-m-Y h:i a", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='m-d-Y'){
			$d_format = date("m-d-Y h:i a", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='d-M-Y'){
			$d_format = date("d-M-Y h:i a", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='M-d-Y'){
			$d_format = date("M-d-Y h:i a", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='F-j-Y'){
			$d_format = date("F-j-Y h:i a", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='j-F-Y'){
			$d_format = date("j-F-Y h:i a", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='m.d.y'){
			$d_format = date("m.d.y h:i a", strtotime($date));
		} else if($system_setting[0]->date_format_xi=='d.m.y'){
			$d_format = date("d.m.y h:i a", strtotime($date));
		} else {
			$d_format = $system_setting[0]->date_format_xi;
		}
		
		return $d_format;
	}
	
	// get all table rows 
	public function all_policies() {
	 	$query = $this->db->query("SELECT * from xin_company_policy");
		return $query->result();
	}
	
	// Function to update record in table > company information
	public function update_company_info_record($data, $id){
		$this->db->where('company_info_id', $id);
		if( $this->db->update('xin_company_info',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > company information
	public function update_setting_info_record($data, $id){
		$this->db->where('setting_id', $id);
		if( $this->db->update('xin_system_setting',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table > theme information
	public function update_theme_info_record($data, $id){
		$this->db->where('theme_settings_id', $id);
		if( $this->db->update('xin_theme_settings',$data)) {
			return true;
		} else {
			return false;
		}		
	}
		
	// Function to add record in table
	public function add_backup($data){
		$this->db->insert('xin_database_backup', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// get all db backup/s 
	public function all_db_backup() {
	 	return  $query = $this->db->query("SELECT * from xin_database_backup");
	}
	
	// Function to Delete selected record from table
	public function delete_single_backup_record($id){
		$this->db->where('backup_id', $id);
		$this->db->delete('xin_database_backup');
		
	}
	// Function to Delete selected record from table
	public function delete_all_backup_record(){
		$this->db->empty_table('xin_database_backup');
		
	}
	
	// get all email templates 
	public function get_email_templates() {
	 	return  $query = $this->db->query("SELECT * from xin_email_template");
	}
	
	// get email template info
	public function read_email_template_info($id) {
	
		$sql = 'SELECT * FROM xin_email_template WHERE template_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// Function to update record in table > email template
	public function update_email_template_record($data, $id){
		$this->db->where('template_id', $id);
		if( $this->db->update('xin_email_template',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	/*  ALL CONSTATNS */
	
	// get all table rows 
	public function get_contract_types() {
	 	return  $query = $this->db->query("SELECT * from xin_contract_type");
	}
	
	// get all table rows 
	public function get_qualification_education() {
	 	return  $query = $this->db->query("SELECT * from xin_qualification_education_level");
	}
	
	// get all table rows 
	public function get_qualification_language() {
	 	return  $query = $this->db->query("SELECT * from xin_qualification_language");
	}
	
	// get all table rows 
	public function get_qualification_skill() {
	 	return  $query = $this->db->query("SELECT * from xin_qualification_skill");
	}
	
	// get all table rows 
	public function get_document_type() {
	 	return  $query = $this->db->query("SELECT * from xin_document_type");
	}
	
	// get all table rows 
	public function get_award_type() {
	 	return  $query = $this->db->query("SELECT * from xin_award_type");
	}
	
	public function get_company_type() {
	 	return  $query = $this->db->query("SELECT * from xin_company_type");
	}
	
	// get all table rows 
	public function get_leave_type() {
	 	return  $query = $this->db->query("SELECT * from xin_leave_type");
	}
	
	// get all table rows 
	public function get_warning_type() {
	 	return  $query = $this->db->query("SELECT * from xin_warning_type");
	}
	
	// get all table rows 
	public function get_termination_type() {
	 	return  $query = $this->db->query("SELECT * from xin_termination_type");
	}
	
	// get all table rows 
	public function get_expense_type() {
	    return false;
	 //	return  $query = $this->db->query("SELECT * from xin_expense_type");
	}
	
	// get all table rows 
	public function get_job_type() {
	 	return  $query = $this->db->query("SELECT * from xin_job_type");
	}
	
	// get all table rows 
	public function get_exit_type() {
	 	return  $query = $this->db->query("SELECT * from xin_employee_exit_type");
	}
	
	// get all table rows 
	public function get_travel_type() {
	 	return  $query = $this->db->query("SELECT * from xin_travel_arrangement_type");
	}
	
	// get all table rows 
	public function get_payment_method() {
	 	return  $query = $this->db->query("SELECT * from xin_payment_method");
	}
	
	// get all table rows 
	public function get_currency_types() {
	 	return  $query = $this->db->query("SELECT * from xin_currencies");
	}
	
	/*  ADD CONSTANTS */
	
	// Function to add record in table
	public function add_contract_type($data){
		$this->db->insert('xin_contract_type', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_document_type($data){
		$this->db->insert('xin_document_type', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_edu_level($data){
		$this->db->insert('xin_qualification_education_level', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_edu_language($data){
		$this->db->insert('xin_qualification_language', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_edu_skill($data){
		$this->db->insert('xin_qualification_skill', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_payment_method($data){
		$this->db->insert('xin_payment_method', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_award_type($data){
	    return false;
	/*	$this->db->insert('xin_award_type', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}*/
	}
	
	// Function to add record in table
	public function add_leave_type($data){
		$this->db->insert('xin_leave_type', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_warning_type($data){
		$this->db->insert('xin_warning_type', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_termination_type($data){
		$this->db->insert('xin_termination_type', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_expense_type($data){
	    return false;
	/*	$this->db->insert('xin_expense_type', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}*/
	}
	
	// Function to add record in table
	public function add_job_type($data){
	    return false;
	/*	$this->db->insert('xin_job_type', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}*/
	}
	
	// Function to add record in table
	public function add_exit_type($data){
		$this->db->insert('xin_employee_exit_type', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_company_type($data){
		$this->db->insert('xin_company_type', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_iess_type($data){
		$this->db->insert('xin_iess', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to add record in table
	public function add_travel_arr_type($data){
	    
 	$this->db->insert('xin_travel_arrangement_type', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		} 
	}
	
	// Function to add record in table
	public function add_currency_type($data){
		$this->db->insert('xin_currencies', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	/*  DELETE CONSTANTS */
	// Function to Delete selected record from table
	public function delete_contract_type_record($id){
		$this->db->where('contract_type_id', $id);
		$this->db->delete('xin_contract_type');
		
	}
	// Function to Delete selected record from table
	public function delete_document_type_record($id){
		$this->db->where('document_type_id', $id);
		$this->db->delete('xin_document_type');
		
	}
	// Function to Delete selected record from table
	public function delete_payment_method_record($id){
		$this->db->where('payment_method_id', $id);
		$this->db->delete('xin_payment_method');
		
	}
	// Function to Delete selected record from table
	public function delete_education_level_record($id){
		$this->db->where('education_level_id', $id);
		$this->db->delete('xin_qualification_education_level');
		
	}
	// Function to Delete selected record from table
	public function delete_qualification_language_record($id){
		$this->db->where('language_id', $id);
		$this->db->delete('xin_qualification_language');
		
	}
	// Function to Delete selected record from table
	public function delete_qualification_skill_record($id){
		$this->db->where('skill_id', $id);
		$this->db->delete('xin_qualification_skill');
		
	}
	// Function to Delete selected record from table
	public function delete_award_type_record($id){
		$this->db->where('award_type_id', $id);
		$this->db->delete('xin_award_type');
		
	}
	// Function to Delete selected record from table
	public function delete_leave_type_record($id){
		$this->db->where('leave_type_id', $id);
		$this->db->delete('xin_leave_type');
		
	}
	// Function to Delete selected record from table
	public function delete_warning_type_record($id){
		$this->db->where('warning_type_id', $id);
		$this->db->delete('xin_warning_type');
		
	}
	// Function to Delete selected record from table
	public function delete_termination_type_record($id){
		$this->db->where('termination_type_id', $id);
		$this->db->delete('xin_termination_type');
		
	}
	// Function to Delete selected record from table
	public function delete_expense_type_record($id){
	    return false;
	//	$this->db->where('expense_type_id', $id);
	//	$this->db->delete('xin_expense_type');
		
	}
	// Function to Delete selected record from table
	public function delete_job_type_record($id){
		$this->db->where('job_type_id', $id);
		$this->db->delete('xin_job_type');
		
	}
	// Function to Delete selected record from table
	public function delete_exit_type_record($id){
		$this->db->where('exit_type_id', $id);
		$this->db->delete('xin_employee_exit_type');
		
	}
	// Function to Delete selected record from table
	public function delete_travel_arr_type_record($id){
		$this->db->where('arrangement_type_id', $id);
		$this->db->delete('xin_travel_arrangement_type');
		
	}
	
	// Function to Delete selected record from table
	public function delete_currency_type_record($id){
		$this->db->where('currency_id', $id);
		$this->db->delete('xin_currencies');
		
	}
	
	// Function to Delete selected record from table
	public function delete_company_type_record($id){
		$this->db->where('type_id', $id);
		$this->db->delete('xin_company_type');
		
	}
	
		// Function to Delete selected record from table
	public function delete_iess_type_record($id){
		$this->db->where('id_tipo', $id);
		$this->db->delete('xin_iess');
		
	}
	
	// get all last 5 employees
	public function last_four_employees()
	{
	  $query = $this->db->query("SELECT * from xin_employees order by user_id desc limit 6");
  	  return $query->result();
	}
	
	// get all last jobs
	public function last_jobs()
	{
	    return false;
	/*  $query = $this->db->query("SELECT * FROM xin_job_applications order by application_id desc limit 4");
  	  return $query->result();*/
	}
	
	// get total number of salaries paid
	public function get_total_salaries_paid() {
	  $query = $this->db->query("SELECT SUM(payment_amount) as paid_amount FROM xin_make_payment");
  	  return $query->result();
	}
	
	// get company wise salary > chart
	public function all_companies_chart()
	{
	  $query = $this->db->query("SELECT m.*, c.* FROM xin_make_payment as m, xin_companies as c where m.company_id = c.company_id group by m.company_id");
  	  return $query->result();
	}
	
	// get company wise salary > chart > make payment
	public function get_company_make_payment($id) {
	
		$sql = 'SELECT SUM(payment_amount) as paidAmount FROM xin_make_payment where company_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		return $query->result();
	}
	
	// get all currencies
	public function get_currencies() {
	
		$query = $this->db->query("SELECT * from xin_currencies");
		
		return $query->result();
	}
	
	// get location wise salary > chart
	public function all_location_chart()
	{
	  $query = $this->db->query("SELECT m.*, l.* FROM xin_make_payment as m, xin_office_location as l where m.location_id = l.location_id group by m.location_id");
  	  return $query->result();
	}
	
	// get location wise salary > chart > make payment
	public function get_location_make_payment($id) {
	
		$sql = 'SELECT SUM(payment_amount) as paidAmount FROM xin_make_payment where location_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		return $query->result();
	}
	
	// get location wise salary > chart
	public function all_departments_chart()
	{
	  $query = $this->db->query("SELECT m.*, d.* FROM xin_make_payment as m, xin_departments as d where m.department_id = d.department_id group by m.department_id");
  	  return $query->result();
	}
	
	// get department wise salary > chart > make payment
	public function get_department_make_payment($id) {
	
		$sql = 'SELECT SUM(payment_amount) as paidAmount FROM xin_make_payment where department_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		return $query->result();
	}
	
	// get designation wise salary > chart
	public function all_designations_chart()
	{
	  $query = $this->db->query("SELECT m.*, d.* FROM xin_make_payment as m, xin_designations as d where m.designation_id = d.designation_id group by m.designation_id");
  	  return $query->result();
	}
	
	// get designation wise salary > chart > make payment
	public function get_designation_make_payment($id) {
	
		$sql = 'SELECT SUM(payment_amount) as paidAmount FROM xin_make_payment where designation_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		return $query->result();
	}
	
	// get all jobs
	public function get_all_jobs() {
	  $query = $this->db->get("xin_jobs");
	  return $query->num_rows();
	}
	
	// get all departments
	public function get_all_departments() {
	  $query = $this->db->get("xin_departments");
	  return $query->num_rows();
	}
	
	// get all users
	public function get_all_users() {
	  $query = $this->db->get("xin_users");
	  return $query->num_rows();
	}
	
	// get all tasks
	public function get_all_tasks() {
	  $query = $this->db->get("xin_tasks");
	  return $query->num_rows();
	}
	
	// get all tickets
	public function get_all_tickets() {
	  $query = $this->db->get("xin_support_tickets");
	  return $query->num_rows();
	}
	
	// get all projects
	public function get_all_projects() {
	  $query = $this->db->get("xin_projects");
	  return $query->num_rows();
	}
	
	// get all locations
	public function get_all_locations() {
	  $query = $this->db->get("xin_office_location");
	  return $query->num_rows();
	}
	
	// get all companies
	public function get_all_companies() {
	  $query = $this->db->get("xin_companies");
	  return $query->num_rows();
	}
	
	// get payment history > recently payslips
	public function get_last_payment_history() {
	  $query = $this->db->query("SELECT * from xin_make_payment order by make_payment_id desc limit 5");
  	  return $query->result();
	}
	
	// get single record > db table > constant
	public function read_contract_type($id) {
	
		$sql = 'SELECT * FROM xin_contract_type where contract_type_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_document_type($id) {
	
		$sql = 'SELECT * FROM xin_document_type where document_type_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_payment_method($id) {
	
		$sql = 'SELECT * FROM xin_payment_method where payment_method_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_education_level($id) {
	
		$sql = 'SELECT * FROM xin_qualification_education_level where education_level_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
			
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_qualification_language($id) {
	
		$sql = 'SELECT * FROM xin_qualification_language where language_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
				
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_qualification_skill($id) {
	
		$sql = 'SELECT * FROM xin_qualification_skill where skill_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_award_type($id) {
	
		$sql = 'SELECT * FROM xin_award_type where award_type_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
				
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
		
	// get single record > db table > constant
	public function read_leave_type($id) {
	
		$sql = 'SELECT * FROM xin_leave_type where leave_type_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_warning_type($id) {
	
		$sql = 'SELECT * FROM xin_warning_type where warning_type_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_termination_type($id) {
	
		$sql = 'SELECT * FROM xin_termination_type where termination_type_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_expense_type($id) {
	return null;
	/*	$sql = 'SELECT * FROM xin_expense_type where expense_type_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}*/
	}
	
	// get single record > db table > constant
	public function read_job_type($id) {
	
		$sql = 'SELECT * FROM xin_job_type where job_type_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_exit_type($id) {
	
		$sql = 'SELECT * FROM xin_employee_exit_type where exit_type_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_travel_arr_type($id) {
	
		$sql = 'SELECT * FROM xin_travel_arrangement_type where arrangement_type_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_company_type($id) {
	
		$sql = 'SELECT * FROM xin_company_type where type_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_iess_type($id) {
	
		$sql = 'SELECT * FROM xin_iess where id_tipo = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get single record > db table > constant
	public function read_currency_types($id) {
	
		$sql = 'SELECT * FROM xin_currencies where currency_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	/* UPDATE CONSTANTS */
	// Function to update record in table
	public function update_document_type_record($data, $id){
		$this->db->where('document_type_id', $id);
		if( $this->db->update('xin_document_type',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_contract_type_record($data, $id){
		$this->db->where('contract_type_id', $id);
		if( $this->db->update('xin_contract_type',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_payment_method_record($data, $id){
		$this->db->where('payment_method_id', $id);
		if( $this->db->update('xin_payment_method',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_education_level_record($data, $id){
		$this->db->where('education_level_id', $id);
		if( $this->db->update('xin_qualification_education_level',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_qualification_language_record($data, $id){
		$this->db->where('language_id', $id);
		if( $this->db->update('xin_qualification_language',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_qualification_skill_record($data, $id){
		$this->db->where('skill_id', $id);
		if( $this->db->update('xin_qualification_skill',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_award_type_record($data, $id){
		$this->db->where('award_type_id', $id);
		if( $this->db->update('xin_award_type',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_leave_type_record($data, $id){
		$this->db->where('leave_type_id', $id);
		if( $this->db->update('xin_leave_type',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_warning_type_record($data, $id){
		$this->db->where('warning_type_id', $id);
		if( $this->db->update('xin_warning_type',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_termination_type_record($data, $id){
		$this->db->where('termination_type_id', $id);
		if( $this->db->update('xin_termination_type',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_expense_type_record($data, $id){
	    return false;
	/*	$this->db->where('expense_type_id', $id);
		if( $this->db->update('xin_expense_type',$data)) {
			return true;
		} else {
			return false;
		}	*/	
	}
	
	// Function to update record in table
	public function update_currency_type_record($data, $id){
		$this->db->where('currency_id', $id);
		if( $this->db->update('xin_currencies',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// get email template
	public function single_email_template($id){
		
		$sql = 'SELECT * FROM xin_email_template where template_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		return $query->result();
	}
	
	// Function to update record in table
	public function update_job_type_record($data, $id){
		$this->db->where('job_type_id', $id);
		if( $this->db->update('xin_job_type',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// get single record > db table > email template
	public function read_email_template($id) {
	
		$sql = 'SELECT * FROM xin_email_template where template_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// Function to update record in table
	public function update_exit_type_record($data, $id){
		$this->db->where('exit_type_id', $id);
		if( $this->db->update('xin_employee_exit_type',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_travel_arr_record($data, $id){
		$this->db->where('arrangement_type_id', $id);
		if( $this->db->update('xin_travel_arrangement_type',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_company_type_record($data, $id){
		$this->db->where('type_id', $id);
		if( $this->db->update('xin_company_type',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_iess_type_record($data, $id){
		$this->db->where('id_tipo', $id);
		if( $this->db->update('xin_iess',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// get current month attendance 
	public function current_month_attendance() {
		$current_month = date('Y-m');
		$session = $this->session->userdata('username');
		$sql = 'SELECT * from xin_attendance_time where attendance_date like ? and employee_id = ?  group by attendance_date';
		$binds = array('%'.$current_month.'%',$session['user_id']);
		$query = $this->db->query($sql, $binds);
		return $query->num_rows();
	}
	
	// get total employee awards 
	public function total_employee_awards() {
		$session = $this->session->userdata('username');
		$id = $session['user_id'];
		$query = $this->db->query("SELECT * FROM xin_awards where employee_id IN($id) order by award_id desc");
		return $query->num_rows();
	}
	
	// get current employee awards 
	public function get_employee_awards() {
		$session = $this->session->userdata('username');
		$id = $session['user_id'];
		$query = $this->db->query("SELECT * FROM xin_awards where employee_id IN($id) order by award_id desc");
		 return $query->result();
	}
	
	// get user role > links > all
	public function user_role_resource(){
		
		// get session
		$session = $this->session->userdata('username');
		// get userinfo and role
		$user = $this->read_user_info($session['user_id']);
		$role_user = $this->read_user_role_info($user[0]->user_role_id);
		
		$role_resources_ids = explode(',',$role_user[0]->role_resources);
		return $role_resources_ids;
	}
	
	// get all opened tickets
	public function all_open_tickets() {
		
		$sql = 'SELECT * FROM xin_support_tickets WHERE ticket_status = ?';
		$binds = array(1);
		$query = $this->db->query($sql, $binds);
		return $query->num_rows();
	}
	
	// get all closed tickets
	public function all_closed_tickets() {
		 
		 $sql = 'SELECT * FROM xin_support_tickets WHERE ticket_status = ?';
		 $binds = array(2);
		 $query = $this->db->query($sql, $binds); 
		 return $query->num_rows();
	}
	
	// get selected language
	public function get_selected_language_name($site_lang) {
		//english
		if($site_lang=='english'){
			$name = 'English';
		} else if($site_lang=='chineese'){
			$name = 'Chineese';
		} else if($site_lang=='danish'){
			$name = 'Danish';
		} else if($site_lang=='french'){
			$name = 'French';
		} else if($site_lang=='german'){
			$name = 'German';
		} else if($site_lang=='greek'){
			$name = 'Greek';
		} else if($site_lang=='indonesian'){
			$name = 'Indonesian';
		} else if($site_lang=='italian'){
			$name = 'Italian';
		} else if($site_lang=='japanese'){
			$name = 'Japanese';
		} else if($site_lang=='polish'){
			$name = 'Polish';
		} else if($site_lang=='portuguese'){
			$name = 'Portuguese';
		} else if($site_lang=='romanian'){
			$name = 'Romanian';
		} else if($site_lang=='russian'){
			$name = 'Russian';
		} else if($site_lang=='spanish'){
			$name = 'Spanish';
		} else if($site_lang=='turkish'){
			$name = 'Turkish';
		} else if($site_lang=='vietnamese'){
			$name = 'Vietnamese';
		} else {
			$name = 'English';
		}
		return $name;
	}
	
	// get selected language
	public function get_selected_language_flag($site_lang) {
		//english
		if($site_lang=='english'){
			$flag = 'flag-icon-gb';
		} else if($site_lang=='chineese'){
			$flag = 'flag-icon-cn';
		} else if($site_lang=='danish'){
			$flag = 'dk.gif';
		} else if($site_lang=='french'){
			$flag = 'flag-icon-fr';
		} else if($site_lang=='german'){
			$flag = 'flag-icon-de';
		} else if($site_lang=='greek'){
			$flag = 'gr.gif';
		} else if($site_lang=='indonesian'){
			$flag = 'id.gif';
		} else if($site_lang=='italian'){
			$flag = 'ie.gif';
		} else if($site_lang=='japanese'){
			$flag = 'jp.gif';
		} else if($site_lang=='polish'){
			$flag = 'pl.gif';
		} else if($site_lang=='portuguese'){
			$flag = 'pt.gif';
		} else if($site_lang=='romanian'){
			$flag = 'ro.gif';
		} else if($site_lang=='russian'){
			$flag = 'ru.gif';
		} else if($site_lang=='spanish'){
			$flag = 'es.gif';
		} else if($site_lang=='turkish'){
			$flag = 'tr.gif';
		} else if($site_lang=='vietnamese'){
			$flag = 'vn.gif';
		} else {
			$flag = 'flag-icon-gb';
		}
		return $flag;
	}
	
	// get all languages
	public function all_languages()
	{
	     $sql = 'SELECT * FROM xin_languages WHERE is_active = ? order by language_name asc';
		 $binds = array(1);
		 $query = $this->db->query($sql, $binds); 
		 
  	  	  return $query->result();
	}
	
	// last 4 projects
	public function last_four_projects()
	{
	     $sql = 'SELECT * FROM xin_projects order by project_id desc limit ?';
		 $binds = array(4);
		 $query = $this->db->query($sql, $binds); 
		 
  	  	  return $query->result();
	}
	
	// last 4 projects
	public function last_five_client_projects($id)
	{
	     $sql = 'SELECT * FROM xin_projects where client_id = ? order by project_id desc limit ?';
		 $binds = array($id,5);
		 $query = $this->db->query($sql, $binds); 
		 
  	  	  return $query->result();
	}
	
	// get employees head count > chart
	public function all_head_count_chart()
	{
	  $query = $this->db->query("SELECT * from xin_employees group by created_at");
  	  return $query->result();
	}
	
	// get language info
	public function get_language_info($code) {
	
		$sql = 'SELECT * FROM xin_languages WHERE language_code = ?';
		$binds = array($code);
		$query = $this->db->query($sql, $binds); 
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	// get employees upcoming birthday
	public function employees_upcoming_birthday() {
	
		$query = $this->db->query("SELECT * FROM xin_employees WHERE date_of_birth BETWEEN DATE_ADD(NOW(), INTERVAL 1 DAY) AND DATE_ADD( NOW() , INTERVAL 1 MONTH)");
  	  	return $query->result();
	}
	
	// get timezone
	public function all_timezones()
	{
	$timezones = array(
		'Pacific/Midway'       => "(GMT-11:00) Midway Island",
		'US/Samoa'             => "(GMT-11:00) Samoa",
		'US/Hawaii'            => "(GMT-10:00) Hawaii",
		'US/Alaska'            => "(GMT-09:00) Alaska",
		'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
		'America/Tijuana'      => "(GMT-08:00) Tijuana",
		'US/Arizona'           => "(GMT-07:00) Arizona",
		'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
		'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
		'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
		'America/Mexico_City'  => "(GMT-06:00) Mexico City",
		'America/Monterrey'    => "(GMT-06:00) Monterrey",
		'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
		'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
		'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
		'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
		'America/Bogota'       => "(GMT-05:00) Bogota",
		'America/Lima'         => "(GMT-05:00) Lima",
		'America/Caracas'      => "(GMT-04:30) Caracas",
		'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
		'America/La_Paz'       => "(GMT-04:00) La Paz",
		'America/Santiago'     => "(GMT-04:00) Santiago",
		'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
		'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
		'Greenland'            => "(GMT-03:00) Greenland",
		'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
		'Atlantic/Azores'      => "(GMT-01:00) Azores",
		'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
		'Africa/Casablanca'    => "(GMT) Casablanca",
		'Europe/Dublin'        => "(GMT) Dublin",
		'Europe/Lisbon'        => "(GMT) Lisbon",
		'Europe/London'        => "(GMT) London",
		'Africa/Monrovia'      => "(GMT) Monrovia",
		'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
		'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
		'Europe/Berlin'        => "(GMT+01:00) Berlin",
		'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
		'Europe/Brussels'      => "(GMT+01:00) Brussels",
		'Europe/Budapest'      => "(GMT+01:00) Budapest",
		'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
		'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
		'Europe/Madrid'        => "(GMT+01:00) Madrid",
		'Europe/Paris'         => "(GMT+01:00) Paris",
		'Europe/Prague'        => "(GMT+01:00) Prague",
		'Europe/Rome'          => "(GMT+01:00) Rome",
		'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
		'Europe/Skopje'        => "(GMT+01:00) Skopje",
		'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
		'Europe/Vienna'        => "(GMT+01:00) Vienna",
		'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
		'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
		'Europe/Athens'        => "(GMT+02:00) Athens",
		'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
		'Africa/Cairo'         => "(GMT+02:00) Cairo",
		'Africa/Harare'        => "(GMT+02:00) Harare",
		'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
		'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
		'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
		'Europe/Kiev'          => "(GMT+02:00) Kyiv",
		'Europe/Minsk'         => "(GMT+02:00) Minsk",
		'Europe/Riga'          => "(GMT+02:00) Riga",
		'Europe/Sofia'         => "(GMT+02:00) Sofia",
		'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
		'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
		'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
		'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
		'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
		'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
		'Europe/Moscow'        => "(GMT+03:00) Moscow",
		'Asia/Tehran'          => "(GMT+03:30) Tehran",
		'Asia/Baku'            => "(GMT+04:00) Baku",
		'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
		'Asia/Muscat'          => "(GMT+04:00) Muscat",
		'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
		'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
		'Asia/Kabul'           => "(GMT+04:30) Kabul",
		'Asia/Karachi'         => "(GMT+05:00) Karachi",
		'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
		'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
		'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
		'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
		'Asia/Almaty'          => "(GMT+06:00) Almaty",
		'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
		'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
		'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
		'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
		'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
		'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
		'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
		'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
		'Australia/Perth'      => "(GMT+08:00) Perth",
		'Asia/Singapore'       => "(GMT+08:00) Singapore",
		'Asia/Taipei'          => "(GMT+08:00) Taipei",
		'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
		'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
		'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
		'Asia/Seoul'           => "(GMT+09:00) Seoul",
		'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
		'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
		'Australia/Darwin'     => "(GMT+09:30) Darwin",
		'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
		'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
		'Australia/Canberra'   => "(GMT+10:00) Canberra",
		'Pacific/Guam'         => "(GMT+10:00) Guam",
		'Australia/Hobart'     => "(GMT+10:00) Hobart",
		'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
		'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
		'Australia/Sydney'     => "(GMT+10:00) Sydney",
		'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
		'Asia/Magadan'         => "(GMT+12:00) Magadan",
		'Pacific/Auckland'     => "(GMT+12:00) Auckland",
		'Pacific/Fiji'         => "(GMT+12:00) Fiji",
		);
		return $timezones;
	}
	
	// get all messages
	public function get_single_unread_message($to_id) {
		
	//	$sql = 'SELECT * FROM xin_chat_messages WHERE to_id = ? and is_read = ?';
	//	$binds = array($to_id,0);
	//	$query = $this->db->query($sql, $binds); 
		return false;
	}
	
	public function hrsale_version() {
		$current_version = 'v1.0.6';
		return $current_version;
	}
}
?>