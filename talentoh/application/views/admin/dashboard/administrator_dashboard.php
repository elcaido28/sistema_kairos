<?php
$session = $this->session->userdata('username');
$system = $this->Xin_model->read_setting_info(1);
$company_info = $this->Xin_model->read_company_setting_info(1);
$user = $this->Xin_model->read_employee_info($session['user_id']);
$theme = $this->Xin_model->read_theme_info(1);
?>
            
<h4 class="media align-items-center font-weight-bold py-3 mb-4"> 
<?php  if($user[0]->profile_picture!='' && $user[0]->profile_picture!='no file') {?>
    <img src="<?php  echo base_url().'uploads/profile/'.$user[0]->profile_picture;?>" alt="" class="ui-w-50 rounded-circle">
    <?php } else {?>
    <?php  if($user[0]->gender=='Male') { ?>
    <?php 	$de_file = base_url().'uploads/profile/default_male.jpg';?>
    <?php } else { ?>
    <?php 	$de_file = base_url().'uploads/profile/default_female.jpg';?>
    <?php } ?>
    <img src="<?php  echo $de_file;?>" alt="" id="user_avatar" class="ui-w-50 rounded-circle">
    <?php  } ?>
    <!--<img src="<?php echo base_url();?>skin/hrsale_assets/img/avatars/1.png" alt="" class="ui-w-50 rounded-circle">-->
  <div class="media-body ml-3"> Bienvenido, <?php echo $user[0]->first_name.' '.$user[0]->last_name;?>!
    <div class="text-muted text-tiny mt-1"> <small class="font-weight-normal">Hoy es <?php setlocale(LC_ALL,"es_ES"); $string = date("d/m/Y"); $date = DateTime::createFromFormat("d/m/Y", $string);  echo strftime("%A, %d de %B de %Y",$date->getTimestamp()); ?></small> </div>
  </div>
</h4>
<hr class="container-m--x mt-0 mb-4">
<?php if($theme[0]->statistics_cards=='4' || $theme[0]->statistics_cards=='8' || $theme[0]->statistics_cards=='12'){?>
<div class="row">
  <div class="col-sm-6 col-xl-3">
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="lnr lnr-users display-4 text-success"></div>
          <div class="ml-3">
            <div class="text-muted small"><?php echo $this->lang->line('xin_people');?></div>
            <div class="text-large"><a class="text-muted" href="<?php echo site_url('admin/employees');?>"><i class="ft-arrow-up"></i><?php echo $this->Employees_model->get_total_employees();?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="ion ion-ios-business display-4 text-info"></div>
          <div class="ml-3">
            <div class="text-muted small"><?php echo $this->lang->line('module_company_title');?></div>
            <div class="text-large"><a class="text-muted" href="<?php echo site_url('admin/company');?>"><i class="ft-arrow-up"></i><?php echo $this->Xin_model->get_all_companies();?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="lnr lnr-calendar-full display-4 text-danger"></div>
          <div class="ml-3">
            <div class="text-muted small"><?php echo $this->lang->line('left_leave');?></div>
            <div class="text-large"><a class="text-muted" href="<?php echo site_url('admin/timesheet/leave');?>"> <?php echo $this->lang->line('xin_performance_management');?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="ion ion-md-cog display-4 text-warning"></div>
          <div class="ml-3">
            <div class="text-muted small"><?php echo $this->lang->line('xin_configure_hr');?></div>
            <div class="text-large"><a class="text-muted" href="<?php echo site_url('admin/settings');?>"> <?php echo $this->lang->line('left_settings');?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php if($theme[0]->statistics_cards=='8' || $theme[0]->statistics_cards=='12'){?>
<div class="row">
  <?php if($system[0]->module_files=='true'){?>
  <div class="col-sm-6 col-xl-3">
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="lnr lnr-file-add display-4 text-warning"></div>
          <div class="ml-3">
            <div class="text-muted small"><?php echo $this->lang->line('xin_e_details_document');?></div>
            <div class="text-large"><a class="text-muted" href="<?php echo site_url('admin/files');?>"> <?php echo $this->lang->line('xin_performance_management');?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } else {?>
  <div class="col-sm-6 col-xl-3">
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="ion ion-ios-airplane display-4 text-warning"></div>
          <div class="ml-3">
            <div class="text-muted small"><?php echo $this->lang->line('xin_view');?></div>
            <div class="text-large"><a class="text-muted" href="<?php echo site_url('admin/timesheet/holidays');?>"> <?php echo $this->lang->line('left_holidays');?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="col-sm-6 col-xl-3">
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="ion ion-md-grid display-4 text-warning"></div>
          <div class="ml-3">
            <div class="text-muted small"><?php echo $this->lang->line('xin_theme_title');?></div>
            <div class="text-large"><a class="text-muted" href="<?php echo site_url('admin/theme');?>"> <?php echo $this->lang->line('left_settings');?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if($system[0]->module_projects_tasks=='true'){?>
  
  
  <?php } else {?>
  <div class="col-sm-6 col-xl-3">
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="ion ion-ios-list display-4 text-danger"></div>
          <div class="ml-3">
            <div class="text-muted small"><?php echo $this->lang->line('xin_view');?></div>
            <div class="text-large"><a class="text-muted" href="<?php echo site_url('admin/designation');?>"> <?php echo $this->lang->line('left_designation');?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="ion ion-md-calendar display-4 text-warning"></div>
          <div class="ml-3">
            <div class="text-muted small"><?php echo $this->lang->line('xin_view');?></div>
            <div class="text-large"><a class="text-muted" href="<?php echo site_url('admin/timesheet/office_shift');?>"> <?php echo $this->lang->line('left_office_shifts');?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<?php } ?>
<?php if($theme[0]->statistics_cards=='12'){?>
<div class="row">

  <div class="col-sm-6 col-xl-3">
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="ion ion-ios-lock display-4 text-info"></div>
          <div class="ml-3">
            <div class="text-muted small"><?php echo $this->lang->line('xin_permission');?></div>
            <div class="text-large"><a class="text-muted" href="<?php echo site_url('admin/roles');?>"> <?php echo $this->lang->line('xin_roles');?></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<hr class="container-m--x mt-0 mb-4">
<?php $this->load->view('admin/calendar/calendar_hr');?>
<hr class="container-m--x mt-0 mb-4">
<div class="row">
   
  <div class="col-sm-12 col-xl-12">
    <?php $all_sal = $this->Xin_model->get_total_salaries_paid();?>
    <div class="card mb-4">
      <div class="card-body">
        <div class="float-right text-success"> <?php echo $this->Xin_model->currency_sign($all_sal[0]->paid_amount);?> </div>
        <div class="d-flex align-items-center">
          <div class="lnr lnr-gift display-4 text-danger"></div>
          <div class="ml-3">
            <div class="text-large"><?php echo $this->lang->line('dashboard_total_salaries');?></div>
            <div class="text-muted small"><a class="text-muted" href="<?php echo site_url('admin/payroll/payment_history');?>"> <?php echo $this->lang->line('xin_view');?> <small class="ion ion-md-arrow-round-forward text-tiny"></small></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<hr class="container-m--x mt-0 mb-4">
<div class="row">
  <div class="col-sm-6 col-xl-8">
    <div class="card mb-4">
      <h6 class="card-header with-elements">
        <div class="card-header-title"><?php echo $this->lang->line('left_payment_history');?></div>
        <div class="card-header-elements ml-auto"> <a href="<?php echo site_url('admin/payroll/payment_history');?>" target="_blank">
          <button type="button" class="btn btn-default btn-xs md-btn-flat"><?php echo $this->lang->line('xin_all_payslips');?> <i class="ion ion-md-arrow-round-forward text-tiny"></i></button>
          </a> </div>
      </h6>
      <div class="table-responsive">
        <table class="table card-table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('xin_employee_name');?></th>
              <th><?php echo $this->lang->line('xin_paid_amount');?></th>
              <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
              <th><?php echo $this->lang->line('xin_payment_month');?></th>
              <th><?php echo $this->lang->line('xin_payslip');?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($get_last_payment_history as $last_payments):?>
            <?php $user = $this->Xin_model->read_user_info($last_payments->employee_id);?>
            <?php if(!is_null($user)){?>
            <?php $full_name = $user[0]->first_name.' '.$user[0]->last_name;?>
            <?php
                             $month_payment = date("F, Y", strtotime($last_payments->payment_date));
                             $p_amount = $this->Xin_model->currency_sign($last_payments->payment_amount);
                             ?>
            <tr>
              <td class="text-truncate"><a target="_blank" href="<?php echo site_url().'admin/employees/detail/'.$last_payments->employee_id;?>/"><?php echo $full_name;?></a></td>
              <td class="text-truncate"><?php echo $p_amount;?></td>
              <td class="text-truncate"><span class="tag tag-success"><?php echo $this->lang->line('xin_payment_paid');?></span></td>
              <td class="text-truncate"><?php echo $month_payment;?></td>
              <td class="text-truncate"><a target="_blank" href="<?php echo site_url().'admin/payroll/payslip/id/'.$last_payments->make_payment_id;?>/"><?php echo $this->lang->line('xin_payslip');?></a></td>
            </tr>
            <?php } ?>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <a href="<?php echo site_url('admin/payroll/payment_history/');?>" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a> </div>
  </div>
  <div class="col-sm-4 col-xl-4">
    <div class="card mb-4">
      <div class="card-header with-elements"> <span class="card-header-title"><?php echo $this->lang->line('dashboard_new');?> <?php echo $this->lang->line('dashboard_employees');?> &nbsp; </span>
        <div class="card-header-elements ml-md-auto"> <a href="javascript:void(0)" class="btn btn-default md-btn-flat btn-xs">Show Alls</a> </div>
      </div>
      <div class="row no-gutters row-bordered row-border-light">
        <?php foreach($last_four_employees as $employee) {?>
        <?php 
                    if($employee->profile_picture!='' && $employee->profile_picture!='no file') {
                        $de_file = base_url().'uploads/profile/'.$employee->profile_picture;
                    } else { 
                        if($employee->gender=='Male') {  
                        $de_file = base_url().'uploads/profile/default_male.jpg'; 
                        } else {  
                        $de_file = base_url().'uploads/profile/default_female.jpg';
                        }
                    }
                    $fname = $employee->first_name.' '.$employee->last_name;
                    ?>
        <a href="<?php echo site_url();?>admin/employees/detail/<?php echo $employee->user_id;?>/" class="d-flex col-4 col-sm-3 col-md-4 flex-column align-items-center text-dark py-3 px-2"> <img src="<?php  echo $de_file;?>" alt="" class="d-block ui-w-40 rounded-circle mb-2">
        <div class="text-center small"><?php echo $fname;?></div>
        </a>
        <?php } ?>
      </div>
      <a href="<?php echo site_url('admin/employees/');?>" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a> </div>
  </div>
</div>
