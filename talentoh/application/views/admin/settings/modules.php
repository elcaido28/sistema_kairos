<style type="text/css"></style>
<?php $company = $this->Xin_model->read_company_setting_info(1);?>

<div class="card">
  <h6 class="card-header"> <?php echo $this->lang->line('xin_modules');?> </h6>
  <div class="card-body">
    <p class="card-text"><?php echo sprintf($this->lang->line('xin_setting_module_details'),$company[0]->company_name);?> </p>
    <div class="card-datatable table-responsive">
      <table class="datatables-demo table table-striped table-bordered" id="xin_table">
        <?php $attributes = array('name' => 'modules_info', 'id' => 'modules_info', 'autocomplete' => 'off');?>
        <?php $hidden = array('user_id' => 0);?>
        <?php echo form_open('admin/settings/modules_info', $attributes, $hidden);?>
        <tbody>
          
          
         
          <tr>
            <td><?php echo $this->lang->line('xin_files_manager');?></td>
            <td><?php echo $this->lang->line('xin_setting_module_fmanager_details');?></td>
            <td><label class="switcher">
                  <input type="checkbox" class="switcher-input js-switch switch" id="m-files" <?php if($module_files=='true'):?> checked="checked" <?php endif;?> value="true">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no"></span>
                  </span>
                </label>
              </td>
          </tr>
          
          <tr>
            <td><?php echo $this->lang->line('xin_org_chart_title');?></td>
            <td><?php echo $this->lang->line('xin_setting_module_orgchart_details');?></td>
            <td><label class="switcher">
                  <input type="checkbox" class="switcher-input js-switch switch" id="m-orgchart" <?php if($module_orgchart=='true'):?> checked="checked" <?php endif;?> value="true">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no"></span>
                  </span>
                </label>
               </td>
          </tr>
          
          <tr>
            <td><?php echo $this->lang->line('xin_hr_events_meetings');?></td>
            <td><?php echo $this->lang->line('xin_hr_events_meetings_details');?></td>
            <td><label class="switcher">
                  <input type="checkbox" class="switcher-input js-switch switch" id="m-events" <?php if($module_events=='true'):?> checked="checked" <?php endif;?> value="true">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no"></span>
                  </span>
                </label>
              </td>
          </tr>
          
         
          
          
        </tbody>
      </table>
      <?php echo form_close(); ?> </div>
  </div>
</div>
