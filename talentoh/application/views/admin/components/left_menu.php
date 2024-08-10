<?php
$session = $this->session->userdata('username');
$theme = $this->Xin_model->read_theme_info(1);
// set layout / fixed or static
if($theme[0]->right_side_icons=='true') {
	$icons_right = 'expanded menu-icon-right';
} else {
	$icons_right = '';
}
if($theme[0]->bordered_menu=='true') {
	$menu_bordered = 'menu-bordered';
} else {
	$menu_bordered = '';
}
$user_info = $this->Xin_model->read_user_info($session['user_id']);
if($user_info[0]->is_active!=1) {
	redirect('admin/');
}
$role_user = $this->Xin_model->read_user_role_info($user_info[0]->user_role_id);
if(!is_null($role_user)){
	$role_resources_ids = explode(',',$role_user[0]->role_resources);
} else {
	$role_resources_ids = explode(',',0);	
}
?>
<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php $arr_mod = $this->Xin_model->select_module_class($this->router->fetch_class(),$this->router->fetch_method()); ?>
<ul class="sidenav-inner py-1">
  <!-- Dashboards -->
  <li class="sidenav-item <?php if(!empty($arr_mod['active']))echo $arr_mod['active'];?>">
    <a href="<?php echo site_url('admin/dashboard');?>" class="sidenav-link">
      <i class="sidenav-icon ion ion-md-speedometer"></i>
      <div><?php echo $this->lang->line('dashboard_title');?></div>
    </a>
  </li>
<?php if(in_array('13',$role_resources_ids) || in_array('88',$role_resources_ids) || in_array('92',$role_resources_ids) || $user_info[0]->user_role_id==1){?>
  <!-- Layouts -->
  <li class="sidenav-item <?php if(!empty($arr_mod['stff_open']))echo $arr_mod['stff_open'].' active';?>">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
      <i class="sidenav-icon lnr lnr-users"></i>
      <div><?php echo $this->lang->line('let_staff');?></div>
    </a>

    <ul class="sidenav-menu">
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/employees');?>" class="sidenav-link <?php if(!empty($arr_mod['emp_active']))echo $arr_mod['emp_active'];?>">
          <div><?php echo $this->lang->line('dashboard_employees');?></div>
        </a>
      </li>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/roles');?>" class="sidenav-link <?php if(!empty($arr_mod['roles_active']))echo $arr_mod['roles_active'];?>">
          <div><?php echo $this->lang->line('xin_role_urole');?></div>
        </a>
      </li>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/employees/hr');?>" class="sidenav-link <?php if(!empty($arr_mod['hremp_active']))echo $arr_mod['hremp_active'];?>">
          <div><?php echo $this->lang->line('left_employees_directory');?></div>
        </a>
      </li>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/employees/import');?>" class="sidenav-link <?php if(!empty($arr_mod['importemp_active']))echo $arr_mod['importemp_active'];?>">
          <div><?php echo $this->lang->line('xin_import_employees');?></div>
        </a>
      </li>
      
    </ul>
  </li>
<?php } ?>
<?php  if(in_array('12',$role_resources_ids) || in_array('14',$role_resources_ids) || in_array('15',$role_resources_ids) || in_array('16',$role_resources_ids) || in_array('17',$role_resources_ids) || in_array('18',$role_resources_ids) || in_array('19',$role_resources_ids) || in_array('20',$role_resources_ids) || in_array('21',$role_resources_ids) || in_array('22',$role_resources_ids) || in_array('23',$role_resources_ids)){?>
  <li class="sidenav-item <?php if(!empty($arr_mod['emp_open']))echo $arr_mod['emp_open'].' active';?>">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
      <i class="sidenav-icon ion ion-ios-globe"></i>
      <div><?php echo $this->lang->line('xin_hr');?></div>
    </a>

    <ul class="sidenav-menu">
      <?php if($system[0]->module_awards=='true'){?>
          <?php if(in_array('14',$role_resources_ids)) { ?>
          <li class="sidenav-item">
        <a href="<?php echo site_url('admin/awards');?>" class="sidenav-link <?php if(!empty($arr_mod['awar_active']))echo $arr_mod['awar_active'];?>">
          <div><?php echo $this->lang->line('left_awards');?></div>
        </a>
      </li>
      <?php } ?>
	  <?php } ?>
      <?php if(in_array('15',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/transfers');?>" class="sidenav-link <?php if(!empty($arr_mod['tra_active']))echo $arr_mod['tra_active'];?>">
          <div><?php echo $this->lang->line('left_transfers');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('16',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/resignation');?>" class="sidenav-link <?php if(!empty($arr_mod['res_active']))echo $arr_mod['res_active'];?>">
          <div><?php echo $this->lang->line('left_resignations');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if($system[0]->module_travel=='true'){?>
          <?php if(in_array('17',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/travel');?>" class="sidenav-link <?php if(!empty($arr_mod['trav_active']))echo $arr_mod['trav_active'];?>">
          <div><?php echo $this->lang->line('left_travels');?></div>
        </a>
      </li>
      <?php } ?>
      <?php } ?>
      <?php if(in_array('18',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/promotion');?>" class="sidenav-link <?php if(!empty($arr_mod['pro_active']))echo $arr_mod['pro_active'];?>">
          <div><?php echo $this->lang->line('left_promotions');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('19',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/complaints');?>" class="sidenav-link <?php if(!empty($arr_mod['compl_active']))echo $arr_mod['compl_active'];?>">
          <div><?php echo $this->lang->line('left_complaints');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('20',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/warning');?>" class="sidenav-link <?php if(!empty($arr_mod['warn_active']))echo $arr_mod['warn_active'];?>">
          <div><?php echo $this->lang->line('left_warnings');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('21',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/termination');?>" class="sidenav-link <?php if(!empty($arr_mod['term_active']))echo $arr_mod['term_active'];?>">
          <div><?php echo $this->lang->line('left_terminations');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('22',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/employees_last_login');?>" class="sidenav-link <?php if(!empty($arr_mod['emp_ll_active']))echo $arr_mod['emp_ll_active'];?>">
          <div><?php echo $this->lang->line('left_employees_last_login');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('23',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/employee_exit');?>" class="sidenav-link <?php if(!empty($arr_mod['emp_ex_active']))echo $arr_mod['emp_ex_active'];?>">
          <div><?php echo $this->lang->line('left_employees_exit');?></div>
        </a>
      </li>
      <?php } ?>
    </ul>
  </li>
<?php } ?>
<?php  if(in_array('12',$role_resources_ids) || in_array('14',$role_resources_ids) || in_array('15',$role_resources_ids) || in_array('16',$role_resources_ids) || in_array('17',$role_resources_ids) || in_array('18',$role_resources_ids) || in_array('19',$role_resources_ids) || in_array('20',$role_resources_ids) || in_array('21',$role_resources_ids) || in_array('22',$role_resources_ids) || in_array('23',$role_resources_ids)){?>
  <!-- UI elements -->
  <li class="sidenav-item <?php if(!empty($arr_mod['adm_open']))echo $arr_mod['adm_open'];?>">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
      <i class="sidenav-icon ion ion-ios-business"></i>
      <div><?php echo $this->lang->line('left_organization');?></div>
    </a>

    <ul class="sidenav-menu">
      
      <?php if(in_array('11',$role_resources_ids)) { ?>
          <li class="sidenav-item"><a href="<?php echo site_url('admin/announcement');?>" class="sidenav-link <?php if(!empty($arr_mod['ann_active']))echo $arr_mod['ann_active'];?>"><?php echo $this->lang->line('left_announcements');?></a></li>
          <?php } ?>
          <?php if(in_array('9',$role_resources_ids)) { ?>
          <li class="sidenav-item"><a href="<?php echo site_url('admin/policy');?>" class="sidenav-link <?php if(!empty($arr_mod['pol_active']))echo $arr_mod['pol_active'];?>"><?php echo $this->lang->line('left_policies');?></a></li>
          <?php } ?>
          <?php if($system[0]->module_orgchart=='true'){?>
          <?php if(in_array('96',$role_resources_ids)) { ?>
          <li class="sidenav-item"><a href="<?php echo site_url('admin/organization/chart');?>" class="sidenav-link <?php if(!empty($arr_mod['org_chart_active']))echo $arr_mod['org_chart_active'];?>"><?php echo $this->lang->line('xin_org_chart_lnk');?></a></li>
          <?php } ?>
          <?php } ?>
          <?php if(in_array('3',$role_resources_ids)) { ?>
          <li class="sidenav-item"><a href="<?php echo site_url('admin/department');?>" class="sidenav-link <?php if(!empty($arr_mod['dep_active']))echo $arr_mod['dep_active'];?>"><?php echo $this->lang->line('left_department');?></a></li>
          <?php } ?>
          <?php if(in_array('4',$role_resources_ids)) { ?>
          <li class="sidenav-item"><a href="<?php echo site_url('admin/designation');?>" class="sidenav-link <?php if(!empty($arr_mod['des_active']))echo $arr_mod['des_active'];?>"><?php echo $this->lang->line('left_designation');?></a></li>
          <?php } ?>
          <?php if(in_array('5',$role_resources_ids)) { ?>
          <li class="sidenav-item"><a href="<?php echo site_url('admin/company')?>" class="sidenav-link <?php if(!empty($arr_mod['com_active']))echo $arr_mod['com_active'];?>"><?php echo $this->lang->line('left_company');?></a></li>
          <?php } ?>
          <?php if(in_array('6',$role_resources_ids)) { ?>
          <li class="sidenav-item"><a href="<?php echo site_url('admin/location');?>" class="sidenav-link <?php if(!empty($arr_mod['loc_active']))echo $arr_mod['loc_active'];?>"><?php echo $this->lang->line('left_location');?></a></li>
          <?php } ?>
            
    </ul>
  </li>
<?php } ?>
<?php  if(in_array('27',$role_resources_ids) || in_array('28',$role_resources_ids) || in_array('29',$role_resources_ids) || in_array('30',$role_resources_ids) || in_array('31',$role_resources_ids) || in_array('7',$role_resources_ids) || in_array('8',$role_resources_ids) || in_array('46',$role_resources_ids)) {?>
  <li class="sidenav-item <?php if(!empty($arr_mod['attnd_open']))echo $arr_mod['attnd_open'];?>">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
      <i class="sidenav-icon ion ion-md-clock"></i>
      <div><?php echo $this->lang->line('left_timesheet');?></div>
    </a>

    <ul class="sidenav-menu">
      <?php if(in_array('28',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/timesheet/attendance');?>" class="sidenav-link <?php if(!empty($arr_mod['attnd_active']))echo $arr_mod['attnd_active'];?>">
          <div><?php echo $this->lang->line('left_attendance');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('29',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/timesheet/date_wise_attendance');?>" class="sidenav-link <?php if(!empty($arr_mod['dtwise_attnd_active']))echo $arr_mod['dtwise_attnd_active'];?>">
          <div><?php echo $this->lang->line('left_date_wise_attendance');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('30',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/timesheet/update_attendance');?>" class="sidenav-link <?php if(!empty($arr_mod['upd_attnd_active']))echo $arr_mod['upd_attnd_active'];?>">
          <div><?php echo $this->lang->line('left_update_attendance');?></div>
        </a>
      </li>
     <?php } ?> 
      <?php if(in_array('31',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/timesheet/import');?>" class="sidenav-link <?php if(!empty($arr_mod['import_attnd_active']))echo $arr_mod['import_attnd_active'];?>">
          <div><?php echo $this->lang->line('left_import_attendance');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('7',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/timesheet/office_shift');?>" class="sidenav-link <?php if(!empty($arr_mod['offsh_active']))echo $arr_mod['offsh_active'];?>">
          <div><?php echo $this->lang->line('left_office_shifts');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('8',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/timesheet/holidays');?>" class="sidenav-link <?php if(!empty($arr_mod['hol_active']))echo $arr_mod['hol_active'];?>">
          <div><?php echo $this->lang->line('xin_manage_holidays');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('46',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/timesheet/leave');?>" class="sidenav-link <?php if(!empty($arr_mod['leave_active']))echo $arr_mod['leave_active'];?>">
          <div><?php echo $this->lang->line('xin_manage_leaves');?></div>
        </a>
      </li>
     <?php } ?> 
    </ul>
  </li>
<?php } ?>
  <?php  if(in_array('32',$role_resources_ids) || in_array('33',$role_resources_ids) || in_array('34',$role_resources_ids) || in_array('35',$role_resources_ids) || in_array('36',$role_resources_ids) || in_array('37',$role_resources_ids) || in_array('38',$role_resources_ids) || in_array('39',$role_resources_ids)) {?>
  <li class="sidenav-item <?php if(!empty($arr_mod['payrl_open']))echo $arr_mod['payrl_open'];?>">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
      <i class="sidenav-icon fas fa-money-bill-alt"></i>
      <div><?php echo $this->lang->line('left_payroll');?></div>
    </a>

    <ul class="sidenav-menu">
      <?php if(in_array('33',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/payroll/hourly_wages');?>" class="sidenav-link <?php if(!empty($arr_mod['pay_hourly_active']))echo $arr_mod['pay_hourly_active'];?>">
          <div><?php echo $this->lang->line('left_hourly_wages');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('34',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/payroll/templates');?>" class="sidenav-link <?php if(!empty($arr_mod['pay_temp_active']))echo $arr_mod['pay_temp_active'];?>">
          <div><?php echo $this->lang->line('left_payroll_templates');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('35',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/payroll/manage_salary');?>" class="sidenav-link <?php if(!empty($arr_mod['pay_mang_active']))echo $arr_mod['pay_mang_active'];?>">
          <div><?php echo $this->lang->line('left_manage_salary');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('36',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/payroll/generate_payslip');?>" class="sidenav-link <?php if(!empty($arr_mod['pay_generate_active']))echo $arr_mod['pay_generate_active'];?>">
          <div><?php echo $this->lang->line('left_generate_payslip');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('37',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/payroll/payment_history');?>" class="sidenav-link <?php if(!empty($arr_mod['pay_his_active']))echo $arr_mod['pay_his_active'];?>">
          <div><?php echo $this->lang->line('left_payment_history');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('38',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/payroll/advance_salary');?>" class="sidenav-link <?php if(!empty($arr_mod['pay_advn_active']))echo $arr_mod['pay_advn_active'];?>">
          <div><?php echo $this->lang->line('xin_advance_salary');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('39',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/payroll/advance_salary_report');?>" class="sidenav-link <?php if(!empty($arr_mod['pay_advn_rpt_active']))echo $arr_mod['pay_advn_rpt_active'];?>">
          <div><?php echo $this->lang->line('xin_advance_salary_report');?></div>
        </a>
      </li>
      <?php } ?>
    </ul>
  </li>
  <?php } ?>
  
 <?php if(in_array('95',$role_resources_ids)) { ?>
  <li class="sidenav-item">
    <a href="<?php echo site_url('admin/calendar/hr');?>" class="sidenav-link <?php if(!empty($arr_mod['calendar_hr_active']))echo $arr_mod['calendar_hr_active'];?>">
      <i class="sidenav-icon fas fa-calendar-plus"></i>
      <div><?php echo $this->lang->line('xin_hr_calendar_title');?></div>
    </a>
  </li>
 <?php } ?>
  <?php if($system[0]->module_assets=='true'){?>
      <?php  if(in_array('24',$role_resources_ids) || in_array('25',$role_resources_ids) || in_array('26',$role_resources_ids)) {?>
  <li class="sidenav-item <?php if(!empty($arr_mod['asst_open']))echo $arr_mod['asst_open'];?>">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
      <i class="sidenav-icon ion ion-ios-flask"></i>
      <div><?php echo $this->lang->line('xin_assets');?></div>
    </a>
    <ul class="sidenav-menu">
      <?php if(in_array('25',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/assets');?>" class="sidenav-link <?php if(!empty($arr_mod['asst_active']))echo $arr_mod['asst_active'];?>">
          <div><?php echo $this->lang->line('xin_assets');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('26',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/assets/category');?>" class="sidenav-link <?php if(!empty($arr_mod['asst_cat_active']))echo $arr_mod['asst_cat_active'];?>">
          <div><?php echo $this->lang->line('xin_acc_category');?></div>
        </a>
      </li>
      <?php } ?>
    </ul>
  </li>
<?php } ?>
<?php } ?>
<?php if($system[0]->module_events=='true'){?>
      <?php  if(in_array('97',$role_resources_ids) || in_array('98',$role_resources_ids) || in_array('99',$role_resources_ids)) {?>
  <li class="sidenav-item <?php if(!empty($arr_mod['hr_events_open']))echo $arr_mod['hr_events_open'];?>">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
      <i class="sidenav-icon ion ion-md-calendar"></i>
      <div><?php echo $this->lang->line('xin_hr_events_meetings');?></div>
    </a>
    <ul class="sidenav-menu">
      <?php if(in_array('98',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/events');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_events_active']))echo $arr_mod['hr_events_active'];?>">
          <div><?php echo $this->lang->line('xin_hr_events');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('99',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/meetings');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_meetings_active']))echo $arr_mod['hr_meetings_active'];?>">
          <div><?php echo $this->lang->line('xin_hr_meetings');?></div>
        </a>
      </li>
      <?php } ?>
    </ul>
  </li>
<?php } ?>
<?php } ?>
<?php  if(in_array('110',$role_resources_ids) || in_array('111',$role_resources_ids) || in_array('112',$role_resources_ids) || in_array('113',$role_resources_ids) || in_array('114',$role_resources_ids) || in_array('115',$role_resources_ids)) {?>
  <li class="sidenav-item <?php if(!empty($arr_mod['reports_open']))echo $arr_mod['reports_open'];?>">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
      <i class="sidenav-icon fas fa-chart-bar"></i>
      <div><?php echo $this->lang->line('xin_hr_report_title');?></div>
    </a>

    <ul class="sidenav-menu">
      <?php if(in_array('111',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/reports/payslip');?>" class="sidenav-link <?php if(!empty($arr_mod['reports_payslip_active']))echo $arr_mod['reports_payslip_active'];?>">
          <div><?php echo $this->lang->line('xin_hr_reports_payslip');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('112',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/reports/employee_attendance');?>" class="sidenav-link <?php if(!empty($arr_mod['reports_employee_attendance_active']))echo $arr_mod['reports_employee_attendance_active'];?>">
          <div><?php echo $this->lang->line('xin_hr_reports_attendance_employee');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if($system[0]->module_training=='true'){?>
      <?php if(in_array('113',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/reports/employee_training');?>" class="sidenav-link <?php if(!empty($arr_mod['reports_employee_training_active']))echo $arr_mod['reports_employee_training_active'];?>">
          <div><?php echo $this->lang->line('xin_hr_reports_training');?></div>
        </a>
      </li>
      <?php } ?>
      <?php } ?>
      
      <?php if(in_array('116',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/reports/roles');?>" class="sidenav-link <?php if(!empty($arr_mod['reports_roles_active']))echo $arr_mod['reports_roles_active'];?>">
          <div><?php echo $this->lang->line('xin_hr_report_user_roles_report');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('117',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/reports/employees');?>" class="sidenav-link <?php if(!empty($arr_mod['reports_employees_active']))echo $arr_mod['reports_employees_active'];?>">
          <div><?php echo $this->lang->line('xin_hr_report_employees');?></div>
        </a>
      </li>
      <?php } ?>
    </ul>
  </li>
<?php } ?>
<?php  if(in_array('57',$role_resources_ids) || in_array('60',$role_resources_ids) || in_array('61',$role_resources_ids) || in_array('61',$role_resources_ids) || in_array('62',$role_resources_ids) || in_array('63',$role_resources_ids) || in_array('89',$role_resources_ids) || in_array('93',$role_resources_ids)) {?>
  <li class="sidenav-item <?php if(!empty($arr_mod['system_open']))echo $arr_mod['system_open'];?>">
    <?php if($user_info[0]->user_role_id==1) {?>
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
          <i class="sidenav-icon ion ion-md-settings"></i>
          <div><?php echo $this->lang->line('xin_system');?></div>
        </a>
    <?php } ?>
    <ul class="sidenav-menu">
      <?php if($system[0]->module_language=='true'){?>
          <?php if(in_array('89',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/languages');?>" class="sidenav-link <?php if(!empty($arr_mod['languages_active']))echo $arr_mod['languages_active'];?>">
          <div><?php echo $this->lang->line('xin_multi_language');?></div>
        </a>
      </li>
      <?php } ?>
      <?php } ?>
      <?php if(in_array('60',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/settings');?>" class="sidenav-link <?php if(!empty($arr_mod['settings_active']))echo $arr_mod['settings_active'];?>">
          <div><?php echo $this->lang->line('left_settings');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('93',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/settings/modules');?>" class="sidenav-link <?php if(!empty($arr_mod['modules_active']))echo $arr_mod['modules_active'];?>">
          <div><?php echo $this->lang->line('xin_setup_modules');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('94',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/theme');?>" class="sidenav-link <?php if(!empty($arr_mod['theme_active']))echo $arr_mod['theme_active'];?>">
          <div><?php echo $this->lang->line('xin_theme_settings');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('61',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/settings/constants');?>" class="sidenav-link <?php if(!empty($arr_mod['constants_active']))echo $arr_mod['constants_active'];?>">
          <div><?php echo $this->lang->line('left_constants');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('62',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/settings/database_backup');?>" class="sidenav-link <?php if(!empty($arr_mod['db_active']))echo $arr_mod['db_active'];?>">
          <div><?php echo $this->lang->line('left_db_backup');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('63',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/settings/email_template');?>" class="sidenav-link <?php if(!empty($arr_mod['email_template_active']))echo $arr_mod['email_template_active'];?>">
          <div><?php echo $this->lang->line('left_email_templates');?></div>
        </a>
      </li>
      <?php } ?>
    </ul>
  </li>
<?php } ?>

 <?php if($system[0]->module_files=='true'){?>
      <?php if(in_array('47',$role_resources_ids)) { ?>
  <li class="sidenav-item">
    <a href="<?php echo site_url('admin/files');?>" class="sidenav-link <?php if(!empty($arr_mod['file_active']))echo $arr_mod['file_active'];?>">
      <i class="sidenav-icon ion ion-ios-paper"></i>
      <div><?php echo $this->lang->line('xin_files_manager');?></div>
    </a>
  </li>
 <?php } ?>
 <?php } ?>
 
<?php if($system[0]->module_performance=='true'){?>
      <?php  if(in_array('40',$role_resources_ids) || in_array('41',$role_resources_ids) || in_array('42',$role_resources_ids)) {?>
  <li class="sidenav-item <?php if(!empty($arr_mod['performance_open']))echo $arr_mod['performance_open'];?>">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
      <i class="sidenav-icon ion ion-md-cube"></i>
      <div><?php echo $this->lang->line('left_performance');?></div>
    </a>
    <ul class="sidenav-menu">
      <?php if(in_array('41',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/performance_indicator');?>" class="sidenav-link <?php if(!empty($arr_mod['per_indi_active']))echo $arr_mod['per_indi_active'];?>">
          <div><?php echo $this->lang->line('left_performance_xindicator');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(in_array('42',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/performance_appraisal');?>" class="sidenav-link <?php if(!empty($arr_mod['per_app_active']))echo $arr_mod['per_app_active'];?>">
          <div><?php echo $this->lang->line('left_performance_xappraisal');?></div>
        </a>
      </li>
      <?php } ?>
    </ul>
  </li>
<?php } ?>
<?php } ?>

 <!--Employee-->
<?php if($user_info[0]->user_role_id!=1) {?>
      <?php if(!in_array('14',$role_resources_ids) || !in_array('15',$role_resources_ids) || !in_array('18',$role_resources_ids) || !in_array('19',$role_resources_ids) || !in_array('20',$role_resources_ids) || !in_array('54',$role_resources_ids) || !in_array('7',$role_resources_ids) || !in_array('42',$role_resources_ids)) { ?>
<li class="sidenav-item <?php if(!empty($arr_mod['mylink_open'])) echo $arr_mod['mylink_open'];?>">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
      <i class="sidenav-icon ion ion-md-cube"></i>
      <div><?php echo $this->lang->line('xin_my_links');?></div>
    </a>
    <ul class="sidenav-menu">
     
      <?php if(!in_array('15',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/user/transfer');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_transfer_active']))echo $arr_mod['hr_transfer_active'];?>">
          <div><?php echo $this->lang->line('left_transfers');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(!in_array('18',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/user/promotion');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_promotion_active']))echo $arr_mod['hr_promotion_active'];?>">
          <div><?php echo $this->lang->line('left_promotions');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(!in_array('19',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/user/complaints');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_complaints_active']))echo $arr_mod['hr_complaints_active'];?>">
          <div><?php echo $this->lang->line('left_complaints');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(!in_array('20',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/user/warning');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_warning_active']))echo $arr_mod['hr_warning_active'];?>">
          <div><?php echo $this->lang->line('left_warnings');?></div>
        </a>
      </li>
      <?php } ?>
      
      <?php if(!in_array('7',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/user/office_shift');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_office_shift_active']))echo $arr_mod['hr_office_shift_active'];?>">
          <div><?php echo $this->lang->line('left_office_shift');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if($system[0]->module_performance=='true'){?>
          <?php if(!in_array('42',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/user/performance');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_performance_active']))echo $arr_mod['hr_performance_active'];?>">
          <div><?php echo $this->lang->line('left_performance');?></div>
        </a>
      </li>
      <?php } ?>
      <?php } ?>
    </ul>
  </li>
  <?php } ?>
  <?php } ?>
  
  <?php if(!in_array('37',$role_resources_ids) || !in_array('38',$role_resources_ids) || !in_array('39',$role_resources_ids)) { ?>
<li class="sidenav-item <?php if(!empty($arr_mod['hr_payslip_open'])) echo $arr_mod['hr_payslip_open'];?>">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
      <i class="sidenav-icon fas fa-money-bill-alt"></i>
      <div><?php echo $this->lang->line('left_payroll');?></div>
    </a>
    <ul class="sidenav-menu">
     <?php if(!in_array('37',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/user/payslip');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_payslip_active']))echo $arr_mod['hr_payslip_active'];?>">
          <div><?php echo $this->lang->line('left_payslips');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(!in_array('38',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/user/advance_salary');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_advance_salary_active']))echo $arr_mod['hr_advance_salary_active'];?>">
          <div><?php echo $this->lang->line('xin_advance_salary');?></div>
        </a>
      </li>
      <?php } ?>
      <?php if(!in_array('39',$role_resources_ids)) { ?>
      <li class="sidenav-item">
        <a href="<?php echo site_url('admin/user/advance_salary_report');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_advance_salary_report_active']))echo $arr_mod['hr_advance_salary_report_active'];?>">
          <div><?php echo $this->lang->line('xin_advance_salary_report');?></div>
        </a>
      </li>
      <?php } ?>
    </ul>
  </li>
  <?php } ?>
  <?php if(!in_array('29',$role_resources_ids)) { ?>
  <li class="sidenav-item">
    <a href="<?php echo site_url('admin/user/attendance');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_attendance_active']))echo $arr_mod['hr_attendance_active'];?>">
      <i class="sidenav-icon ion ion-md-clock"></i>
      <div><?php echo $this->lang->line('dashboard_attendance');?></div>
    </a>
  </li>
  <?php } ?>
  <?php if($system[0]->module_assets=='true'){?>
      <?php if(!in_array('25',$role_resources_ids)) { ?>
  <li class="sidenav-item">
    <a href="<?php echo site_url('admin/user/assets');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_assets_active']))echo $arr_mod['hr_assets_active'];?>">
      <i class="sidenav-icon ion ion-ios-flask"></i>
      <div><?php echo $this->lang->line('xin_assets');?></div>
    </a>
  </li>
  <?php } ?>
  <?php } ?>
  <?php if(!in_array('46',$role_resources_ids)) { ?>
  <li class="sidenav-item">
    <a href="<?php echo site_url('admin/user/leave');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_leave_active']))echo $arr_mod['hr_leave_active'];?>">
      <i class="sidenav-icon ion ion-ios-calendar"></i>
      <div><?php echo $this->lang->line('left_leave');?></div>
    </a>
  </li>
  <?php } ?> 
  <?php if(!in_array('11',$role_resources_ids)) { ?>
  <li class="sidenav-item">
    <a href="<?php echo site_url('admin/user/announcement');?>" class="sidenav-link <?php if(!empty($arr_mod['hr_announcement_active']))echo $arr_mod['hr_announcement_active'];?>">
      <i class="sidenav-icon fas fa-bullhorn"></i>
      <div><?php echo $this->lang->line('left_announcements');?></div>
    </a>
  </li>
  <?php } ?>
  

<li class="sidenav-item">
    <a href="<?php echo site_url('admin/logout');?>" class="sidenav-link">
      <i class="sidenav-icon ion ion-md-log-out"></i>
      <div><?php echo $this->lang->line('left_logout');?></div>
    </a>
  </li>
</ul>