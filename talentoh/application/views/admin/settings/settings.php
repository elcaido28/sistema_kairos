<?php
/* Settings view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $file_setting = $this->Xin_model->read_file_setting_info(1);?>
<?php $system = $this->Xin_model->read_setting_info(1); ?>

  <div class="row match-heights">
    <div class="col-lg-3 col-md-3">
      <div class="card">
          <div class="card-blocks">
            <div class="list-group"> <a class="list-group-item list-group-item-action nav-tabs-link" href="#general" data-setting="1" data-profile-block="general" data-toggle="tab" aria-expanded="true" id="setting_1"> <i class="fa fa-user"></i> <?php echo $this->lang->line('xin_general');?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#system" data-setting="3" data-profile-block="system" data-toggle="tab" aria-expanded="true" id="setting_3"> <i class="fas fa-tv"></i> <?php echo $this->lang->line('xin_system');?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#role" data-profile="4" data-profile-block="role" data-toggle="tab" aria-expanded="true" id="setting_4"> <i class="fas fa-user-lock"></i> <?php echo $this->lang->line('xin_employee_role');?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#payroll" data-profile="6" data-profile-block="payroll" data-toggle="tab" aria-expanded="true" id="setting_6"> <i class="fas fa-money-bill-alt"></i> <?php echo $this->lang->line('left_payroll');?> </a>
              <?php if($system[0]->module_orgchart=='true'){?>
             
              <?php }?>
             
               <?php if($system[0]->module_files=='true'){?>
               <a class="list-group-item list-group-item-action nav-tabs-link" href="#file_manager" data-setting="9" data-profile-block="file_manager" data-toggle="tab" aria-expanded="true"> <i class="fa fa-file"></i> <?php echo $this->lang->line('xin_files_manager');?> </a>
               <?php }?> </div>
          </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 current-tab animated fadeInRight" id="general"  aria-expanded="false">
		<?php $attributes = array('name' => 'company_info', 'id' => 'company_info', 'autocomplete' => 'off');?>
        <?php $hidden = array('u_company_info' => 'UPDATE');?>
        <?php echo form_open('admin/settings/company_info/'.$company_info_id, $attributes, $hidden);?>
        <div class="card">
          <h6 class="card-header"> <?php echo $this->lang->line('xin_general');?> <?php echo $this->lang->line('header_configuration');?></h6>          
          <div class="card-body">
            <div class="card-block">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="company_name"><?php echo $this->lang->line('xin_company_name');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_company_name');?>" name="company_name" type="text" value="<?php echo $company_name;?>">
                  </div>
                  <div class="form-group">
                    <label for="contact_person"><?php echo $this->lang->line('xin_contact_person');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_contact_person');?>" name="contact_person" type="text" value="<?php echo $contact_person;?>">
                  </div>
                  <div class="form-group">
                    <label for="email"><?php echo $this->lang->line('xin_email');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_email');?>" name="email" type="email" value="<?php echo $email;?>">
                  </div>
                  <div class="form-group">
                    <label for="phone"><?php echo $this->lang->line('xin_phone');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_phone');?>" name="phone" type="text" value="<?php echo $phone;?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="address"><?php echo $this->lang->line('xin_employee_address');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_address_1');?>" name="address_1" type="text" value="<?php echo $address_1;?>">
                    <br>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_address_2');?>" name="address_2" type="text" value="<?php echo $address_2;?>">
                    <br>
                    <div class="row">
                      <div class="col-md-5">
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_city');?>" name="city" type="text" value="<?php echo $city;?>">
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_state');?>" name="state" type="text" value="<?php echo $state;?>">
                      </div>
                      <div class="col-md-3">
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_zipcode');?>" name="zipcode" type="text" value="<?php echo $zipcode;?>">
                      </div>
                    </div>
                    <br>
                    <select class="form-control" name="country" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_country');?>">
                      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                      <?php foreach($all_countries as $scountry) {?>
                      <option value="<?php echo $scountry->country_id;?>" <?php if($country==$scountry->country_id):?> selected <?php endif;?>> <?php echo $scountry->country_name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <input name="config_type" type="hidden" value="general">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php echo form_close(); ?>
    </div>
    <div class="col-md-9 current-tab animated fadeInRight" id="system" style="display:none;">
      <div class="card">
        <h6 class="card-header"> <?php echo $this->lang->line('xin_system');?> <?php echo $this->lang->line('header_configuration');?></h6>
        <div class="card-body">
          <div class="card-block">
            <?php $attributes = array('name' => 'system_info', 'id' => 'system_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('u_basic_info' => 'UPDATE');?>
            <?php echo form_open('admin/settings/system_info/'.$company_info_id, $attributes, $hidden);?>
              <div class="box box-block bg-white">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="company_name"><?php echo $this->lang->line('xin_application_name');?></label>
                      <input class="form-control" placeholder="<?php echo $this->lang->line('xin_system_settings');?>" name="application_name" type="text" value="<?php echo $application_name;?>" id="application_name">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="email"><?php echo $this->lang->line('xin_default_currency');?></label>
                      <select class="form-control select2-hidden-accessible" name="default_currency_symbol" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_default_currency_symbol');?>" tabindex="-1" aria-hidden="true">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <?php foreach($this->Xin_model->get_currencies() as $currency){?>
                        <?php $_currency = $currency->code.' - '.$currency->symbol;?>
                        <option value="<?php echo $_currency;?>" <?php if($default_currency_symbol==$_currency):?> selected <?php endif;?>> <?php echo $_currency;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="phone"><?php echo $this->lang->line('xin_default_currency_symbol_code');?></label>
                      <select class="form-control" name="show_currency" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_show_currency');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="code" <?php if($show_currency=='code'){?> selected <?php }?>><?php echo $this->lang->line('xin_currency_code');?></option>
                        <option value="symbol" <?php if($show_currency=='symbol'){?> selected <?php }?>><?php echo $this->lang->line('xin_currency_symbol');?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="phone"><?php echo $this->lang->line('xin_currency_position');?></label>
                      <input type="hidden" name="notification_position" value="Bottom Left">
                      <input type="hidden" name="enable_registration" value="no">
                      <input type="hidden" name="login_with" value="username">
                      <select class="form-control" name="currency_position" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_currency_position');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="Prefix" <?php if($currency_position=='Prefix'){?> selected <?php }?>><?php echo $this->lang->line('xin_prefix');?></option>
                        <option value="Suffix" <?php if($currency_position=='Suffix'){?> selected <?php }?>><?php echo $this->lang->line('xin_suffix');?></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="phone"><?php echo $this->lang->line('xin_login_employee');?></label>
                      <select class="form-control" name="employee_login_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_login_employee');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="username" <?php if($employee_login_id=='username'){?> selected <?php }?>><?php echo $this->lang->line('xin_login_employee_with_username');?></option>
                        <option value="email" <?php if($employee_login_id=='email'){?> selected <?php }?>><?php echo $this->lang->line('xin_login_employee_with_email');?></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="phone"><?php echo $this->lang->line('xin_date_format');?></label>
                      <select class="form-control" name="date_format" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_date_format');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="d-m-Y" <?php if($date_format_xi=='d-m-Y'){?> selected <?php }?>>dd-mm-YYYY (<?php echo date('d-m-Y');?>)</option>
                        <option value="m-d-Y" <?php if($date_format_xi=='m-d-Y'){?> selected <?php }?>>mm-dd-YYYY (<?php echo date('m-d-Y');?>)</option>
                        <option value="d-M-Y" <?php if($date_format_xi=='d-M-Y'){?> selected <?php }?>>dd-MM-YYYY (<?php echo date('d-M-Y');?>)</option>
                        <option value="M-d-Y" <?php if($date_format_xi=='M-d-Y'){?> selected <?php }?>>MM-dd-YYYY (<?php echo date('M-d-Y');?>)</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="footer_text"><?php echo $this->lang->line('xin_footer_text');?></label>
                      <input class="form-control" placeholder="<?php echo $this->lang->line('xin_footer_text');?>" name="footer_text" type="text" value="<?php echo $footer_text;?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="phone"><?php echo $this->lang->line('xin_setting_timezone');?></label>
                      <select class="form-control" name="system_timezone" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_setting_timezone');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <?php foreach($this->Xin_model->all_timezones() as $tval=>$labels):?>
                        <option value="<?php echo $tval;?>" <?php if($system_timezone==$tval):?> selected <?php endif;?>><?php echo $labels;?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <?php if($system_ip_address==''): $ipAddress = $this->input->ip_address(); else: $ipAddress = $system_ip_address; endif;?>
                      <label for="footer_text"><?php echo $this->lang->line('xin_setting_sys_ip_address');?>
                        <button type="button" class="btn icon-btn btn-xs btn-outline-info itheme-btn borderless" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_setting_sys_ip_address_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_setting_sys_ip_address');?>">
                        <span class="far fa-question-circle"></span></button>
                      </label>
                      <input class="form-control" placeholder="<?php echo $this->lang->line('xin_setting_sys_ip_address');?>" name="system_ip_address" type="text" value="<?php echo $ipAddress;?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="footer_text"><?php echo $this->lang->line('xin_setting_ip_restriction');?>
                        <button type="button" class="btn icon-btn btn-xs btn-outline-info itheme-btn borderless" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_setting_ip_restriction_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_setting_ip_restriction');?>"><span class="far fa-question-circle"></span></button>
                      </label>
                      <br>
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="system_ip_restriction" <?php if($system_ip_restriction=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="contact_role"><?php echo $this->lang->line('xin_enable_year_on_footer');?></label>
                      <br>
                      <div class="pull-xs-left m-r-1">
                        <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="enable_current_year" <?php if($enable_current_year=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="contact_role"><?php echo $this->lang->line('xin_enable_codeigniter_on_footer');?></label>
                      <br>
                      <div class="pull-xs-left m-r-1">
                        <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="enable_page_rendered" <?php if($enable_page_rendered=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="footer_text"><?php echo $this->lang->line('xin_setting_google_maps_api_key');?>
                        <button type="button" class="btn icon-btn btn-xs btn-outline-info itheme-btn borderless" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_setting_google_maps_api_key_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_setting_google_maps_api_key');?>"><span class="far fa-question-circle"></span></button>
                      </label>
                      <br />
                      <textarea class="form-control" name="google_maps_api_key" id="google_maps_api_key" rows="1"><?php echo $google_maps_api_key;?></textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="footer_text"><?php echo $this->lang->line('xin_enable_auth_bg_imgs');?>
                        <button type="button" class="btn icon-btn btn-xs btn-outline-info itheme-btn borderless" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_enable_auth_bg_imgs_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_enable_auth_bg_imgs');?>"><span class="far fa-question-circle"></span></button>
                      </label>
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="enable_auth_background" <?php if($enable_auth_background=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 current-tab animated fadeInRight" id="role" style="display:none;">
      <div class="card">
        <h6 class="card-header"> <?php echo $this->lang->line('xin_employee_role');?> <?php echo $this->lang->line('header_configuration');?></h6>
        <div class="card-body">
          <div class="card-block">
            <?php $attributes = array('name' => 'role_info', 'id' => 'role_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('u_basic_info' => 'UPDATE');?>
            <?php echo form_open('admin/settings/role_info/'.$company_info_id, $attributes, $hidden);?>
              <div class="box box-block bg-white">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contact_role"><?php echo $this->lang->line('xin_employe_can_manage_contact_info');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="contact_role" <?php if($employee_manage_own_contact=='yes'):?> checked="checked" <?php endif;?> value="yes" >
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="bank_account_role"><?php echo $this->lang->line('xin_employe_can_manage_bank_account');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="bank_account_role" <?php if($employee_manage_own_bank_account=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="edu_role"><?php echo $this->lang->line('xin_employe_can_manage_qualification');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="edu_role" <?php if($employee_manage_own_qualification=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="work_role"><?php echo $this->lang->line('xin_employe_can_manage_work_experience');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="work_role" <?php if($employee_manage_own_work_experience=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="doc_role"><?php echo $this->lang->line('xin_employe_can_manage_documents');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="doc_role" <?php if($employee_manage_own_document=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pic_role"><?php echo $this->lang->line('xin_employe_can_manage_profile_picture');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="pic_role" <?php if($employee_manage_own_picture=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="profile_role"><?php echo $this->lang->line('xin_employe_can_manage_profile_info');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="profile_role" <?php if($employee_manage_own_profile=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="social_role"><?php echo $this->lang->line('xin_employe_can_manage_social_info');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="social_role" <?php if($employee_manage_own_social=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                </div>
               </div> 
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 current-tab animated fadeInRight" id="payroll" style="display:none;">
      <div class="card">
        <h6 class="card-header"> <?php echo $this->lang->line('left_payroll');?> <?php echo $this->lang->line('header_configuration');?></h6>
        <div class="card-body">
          <div class="card-block">
            <?php $attributes = array('name' => 'payroll_config', 'id' => 'payroll_config', 'autocomplete' => 'off');?>
			<?php $hidden = array('u_basic_info' => 'UPDATE');?>
            <?php echo form_open('admin/settings/role_info/'.$company_info_id, $attributes, $hidden);?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contact_role"><?php echo $this->lang->line('xin_payslip_password_format');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <select class="form-control" name="payslip_password_format" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_one');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="dateofbirth" <?php if($payslip_password_format=='dateofbirth'){?> selected <?php }?>>Employee date of birth (<?php echo date('dmY');?>)</option>
                        <option value="contact_no" <?php if($payslip_password_format=='contact_no'){?> selected <?php }?>>Employee Contact Number. (<?php echo '123456789';?>)</option>
                        <option value="full_name" <?php if($payslip_password_format=='full_name'){?> selected <?php }?>>Employee First name Last name (<?php echo 'JhonDoe';?>)</option>
                        <option value="email" <?php if($payslip_password_format=='email'){?> selected <?php }?>>Employee Email Address (<?php echo 'employee@example.com';?>)</option>
                        <option value="password" <?php if($payslip_password_format=='password'){?> selected <?php }?>>Employee Password (<?php echo 'testpassword';?>)</option>
                        <option value="user_password" <?php if($payslip_password_format=='user_password'){?> selected <?php }?>>Employee Username & Password (<?php echo 'usernametestpassword';?>)</option>
                        <option value="employee_id" <?php if($payslip_password_format=='employee_id'){?> selected <?php }?>>Employee ID (<?php echo 'EMP001WA5';?>)</option>
                        <option value="employee_id_password" <?php if($payslip_password_format=='employee_id_password'){?> selected <?php }?>>Employee ID & Password (<?php echo 'EMP001WA5testpassword';?>)</option>
                        <option value="dateofbirth_name" <?php if($payslip_password_format=='dateofbirth_name'){?> selected <?php }?>>Employee date of birth & 2 first character from Name (<?php echo date('dmY').'JD';?>)</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contact_role"><?php echo $this->lang->line('xin_enable_password_generate_payslip');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="payslip_password_generate" <?php if($is_payslip_password_generate==1):?> checked="checked" <?php endif;?> value="1">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php if($system[0]->module_recruitment=='true'){?>
    <div class="col-md-9 current-tab animated fadeInRight" id="job" style="display:none;">
      <div class="card">
        <h6 class="card-header"> <?php echo $this->lang->line('dashboard_recruitment');?> <?php echo $this->lang->line('header_configuration');?></h6>
        <div class="card-body">
          <div class="card-block">
            <?php $attributes = array('name' => 'job_info', 'id' => 'job_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('u_basic_info' => 'UPDATE');?>
            <?php echo form_open('admin/settings/job_info/'.$company_info_id, $attributes, $hidden);?>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="enable_job"><?php echo $this->lang->line('xin_enable_jobs_for_employees');?></label>
                  <br>
                  <div class="pull-xs-left m-r-1">
                    <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="enable_job2" <?php if($enable_job_application_candidates=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="job_application_format"><?php echo $this->lang->line('xin_job_application_file_format');?></label>
                  <br>
                  <input type="text" value="<?php echo $job_application_format;?>" data-role="tagsinput" name="job_application_format">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                    </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="col-md-9 current-tab animated fadeInRight" id="email" style="display:none;">
      <div class="card">
        <h6 class="card-header"> <?php echo $this->lang->line('xin_email_notification_config');?></h6>
        <div class="card-body">
          <div class="card-block">
            <?php $attributes = array('name' => 'email_info', 'id' => 'email_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('u_basic_info' => 'UPDATE');?>
            <?php echo form_open('admin/settings/email_info/'.$company_info_id, $attributes, $hidden);?>
              <div class="box box-block bg-white">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="company_name"><?php echo $this->lang->line('xin_email_notification_enable');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="srole_email_notification" <?php if($enable_email_notification=='yes'):?> checked="checked" <?php endif;?> value="yes">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php if($system[0]->module_files=='true'){?>
    <div role="tabpanel" class="col-md-9 current-tab animated fadeInRight" id="file_manager" style="display:none;">
      <div class="card">
        <h6 class="card-header"> <?php echo $this->lang->line('xin_files_manager');?> <?php echo $this->lang->line('header_configuration');?></h6>
        <div class="card-body">
          <div class="card-block">
            <?php $attributes = array('name' => 'setting_info', 'id' => 'file_setting_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('u_basic_info' => 'UPDATE');?>
            <?php echo form_open('admin/files/setting_info/'.$company_info_id, $attributes, $hidden);?>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="enable_job"><?php echo $this->lang->line('xin_file_maxsize');?></label>
                      <br>
                      <div class="input-group">
                        <input type="number" class="form-control" value="<?php echo $file_setting[0]->maximum_file_size;?>" name="maximum_file_size" placeholder="<?php echo $this->lang->line('xin_file_size_mb');?>" maxlength="2000" min="1">
                        <div class="input-group-append">
                          <span class="input-group-text">MB</span>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-7">
                  <div class="form-group">
                    <label for="job_application_format"><?php echo $this->lang->line('xin_allowed_extensions');?></label>
                    <br>
                    <input type="text" value="<?php echo $file_setting[0]->allowed_extensions;?>" data-role="tagsinput" name="allowed_extensions">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="company_name"><?php echo $this->lang->line('xin_employee_can_view_download_other_files');?></label>
                    <br>
                    <div class="pull-xs-left m-r-1">
                      <label class="switcher">
                          <input type="checkbox" class="switcher-input js-switch switch" id="view_all_files" <?php if($file_setting[0]->is_enable_all_files=='yes'):?> checked="checked" <?php endif;?> value="yes" >
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                        </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                      </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>