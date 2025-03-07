<?php
$session = $this->session->userdata('client_username');
$system = $this->Xin_model->read_setting_info(1);
$company_info = $this->Xin_model->read_company_setting_info(1);
$clientinfo = $this->Clients_model->read_client_info($session['client_id']);
$theme = $this->Xin_model->read_theme_info(1);
?>
<?php $site_lang = $this->load->helper('language');?>
<?php $wz_lang = $site_lang->session->userdata('site_lang');?>
<?php
if(empty($wz_lang)):
	$flg_icn = '<img src="'.base_url().'uploads/languages_flag/gb.gif">';
elseif($wz_lang == 'english'):
	$lang_code = $this->Xin_model->get_language_info($wz_lang);
	$flg_icn = $lang_code[0]->language_flag;
	$flg_icn = '<img src="'.base_url().'uploads/languages_flag/'.$flg_icn.'">';
else:
	$lang_code = $this->Xin_model->get_language_info($wz_lang);
	$flg_icn = $lang_code[0]->language_flag;
	$flg_icn = '<img src="'.base_url().'uploads/languages_flag/'.$flg_icn.'">';
endif;
?>

<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar"> 
  
  <!-- Brand demo (see assets/css/demo/demo.css) --> 
  <a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4"> <span class="app-brand-logo demo bg-primary"> <img alt="HR Sale" src="<?php echo base_url();?>uploads/logo/<?php echo $company_info[0]->logo;?>" class="brand-logo" style="width:32px;"> </span> <span class="app-brand-text demo font-weight-normal ml-2"><?php echo $system[0]->application_name;?></span> </a> 
  
  <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
  <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto"> <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:void(0)"> <i class="ion ion-md-menu text-large align-middle"></i> </a> </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse"> <span class="navbar-toggler-icon"></span> </button>
  <div class="navbar-collapse collapse" id="layout-navbar-collapse"> 
    <!-- Divider -->
    <hr class="d-lg-none w-100 my-2">
    
    <div class="navbar-nav align-items-lg-center ml-auto">
      
      
      <!-- Divider -->
      <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
      <div class="demo-navbar-user nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle"> 
      		<?php  if($clientinfo[0]->client_profile!='' && $clientinfo[0]->client_profile!='no file') {?>
            <img src="<?php  echo base_url().'uploads/clients/'.$clientinfo[0]->client_profile;?>" alt="" id="user_avatar" 
            class="d-block ui-w-30 rounded-circle user_profile_avatar">
            <?php } else {?>
            <?php  if($clientinfo[0]->gender=='Male') { ?>
            <?php 	$de_file = base_url().'uploads/clients/default_male.jpg';?>
            <?php } else { ?>
            <?php 	$de_file = base_url().'uploads/clients/default_female.jpg';?>
            <?php } ?>
            <img src="<?php  echo $de_file;?>" alt="" id="user_avatar" class="d-block ui-w-30 rounded-circle user_profile_avatar">
            <?php  } ?>
        <span class="px-1 mr-lg-2 ml-2 ml-lg-0"><?php echo $clientinfo[0]->name;?></span> </span> </a>
        <div class="dropdown-menu dropdown-menu-right">
        <a href="<?php echo site_url('client/profile');?>" class="dropdown-item"> <i class="ion ion-ios-person text-lightest"></i> &nbsp; <?php echo $this->lang->line('header_my_profile');?></a>
        <a href="<?php echo site_url('client/profile?change_password=true')?>" class="dropdown-item"><i class="fas fa-key text-lightest"></i> &nbsp; <?php echo $this->lang->line('header_change_password');?></a>
        <div class="dropdown-divider"></div>
        <a href="<?php echo site_url('client/logout');?>" class="dropdown-item"> <i class="ion ion-md-log-out text-danger"></i> &nbsp; <?php echo $this->lang->line('header_sign_out');?></a> </div>
      </div>
    </div>
  </div>
</nav>
