<?php
if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_document_type' && $_GET['type']=='ed_document_type'){
$row = $this->Xin_model->read_document_type($_GET['field_id']);
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_document_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_document_type_info', 'id' => 'ed_document_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->document_type_id, 'ext_name' => $row[0]->document_type);?>
<?php echo form_open('admin/settings/update_document_type/'.$row[0]->document_type_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_e_details_dtype');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_dtype');?>" value="<?php echo $row[0]->document_type;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){ 

	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_document_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=21&type=edit_record&data=ed_document_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_document_type = $('#xin_table_document_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/document_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_document_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_contract_type' && $_GET['type']=='ed_contract_type'){
$row = $this->Xin_model->read_contract_type($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_contract_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_contract_type_info', 'id' => 'ed_contract_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->contract_type_id, 'ext_name' => $row[0]->name);?>
<?php echo form_open('admin/settings/update_contract_type/'.$row[0]->contract_type_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_e_details_contract_type');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_contract_type');?>" value="<?php echo $row[0]->name?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){

	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_contract_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=22&type=edit_record&data=ed_contract_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_contract_type = $('#xin_table_contract_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/contract_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});	
					xin_table_contract_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_payment_method' && $_GET['type']=='ed_payment_method'){
$row = $this->Xin_model->read_payment_method($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_payment_method');?></h4>
</div>
<?php $attributes = array('name' => 'ed_payment_method_info', 'id' => 'ed_payment_method_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->payment_method_id, 'ext_name' => $row[0]->method_name);?>
<?php echo form_open('admin/settings/update_payment_method/'.$row[0]->payment_method_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_payment_method');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="Enter <?php echo $this->lang->line('xin_payment_method');?>" value="<?php echo $row[0]->method_name;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_payment_method_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=23&type=edit_record&data=ed_payment_method_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_payment_method = $('#xin_table_payment_method').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/payment_method_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_payment_method.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_education_level' && $_GET['type']=='ed_education_level'){
$row = $this->Xin_model->read_education_level($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_education_level');?></h4>
</div>
<?php $attributes = array('name' => 'ed_education_level_info', 'id' => 'ed_education_level_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->education_level_id, 'ext_name' => $row[0]->name);?>
<?php echo form_open('admin/settings/update_education_level/'.$row[0]->education_level_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_e_details_edu_level');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_edu_level');?>" value="<?php echo $row[0]->name;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_education_level_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=24&type=edit_record&data=ed_education_level_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_education_level = $('#xin_table_education_level').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/education_level_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_education_level.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_qualification_language' && $_GET['type']=='ed_qualification_language'){
$row = $this->Xin_model->read_qualification_language($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_language');?></h4>
</div>
<?php $attributes = array('name' => 'ed_qualification_language_info', 'id' => 'ed_qualification_language_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->language_id, 'ext_name' => $row[0]->name);?>
<?php echo form_open('admin/settings/update_qualification_language/'.$row[0]->language_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_e_details_language');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_language');?>" value="<?php echo $row[0]->name;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){

	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_qualification_language_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=25&type=edit_record&data=ed_qualification_language_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_qualification_language = $('#xin_table_qualification_language').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/qualification_language_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_qualification_language.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_qualification_skill' && $_GET['type']=='ed_qualification_skill'){
$row = $this->Xin_model->read_qualification_skill($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_skill');?></h4>
</div>
<?php $attributes = array('name' => 'ed_qualification_skill_info', 'id' => 'ed_qualification_skill_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->language_id, 'ext_name' => $row[0]->name);?>
<?php echo form_open('admin/settings/update_qualification_skill/'.$row[0]->skill_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_skill');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_skill');?>" value="<?php echo $row[0]->name;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_qualification_skill_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=26&type=edit_record&data=ed_qualification_skill_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_qualification_skill = $('#xin_table_qualification_skill').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/qualification_skill_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_qualification_skill.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_award_type' && $_GET['type']=='ed_award_type'){
$row = $this->Xin_model->read_award_type($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_award_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_award_type_info', 'id' => 'ed_award_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->award_type_id, 'ext_name' => $row[0]->award_type);?>
<?php echo form_open('admin/settings/update_award_type/'.$row[0]->award_type_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_award_type');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_award_type');?>" value="<?php echo $row[0]->award_type;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_award_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=38&type=edit_record&data=ed_award_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_award_type = $('#xin_table_award_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/award_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					}); 
					xin_table_award_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_leave_type' && $_GET['type']=='ed_leave_type'){
$row = $this->Xin_model->read_leave_type($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_leave_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_leave_type_info', 'id' => 'ed_leave_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->leave_type_id, 'ext_name' => $row[0]->type_name);?>
<?php echo form_open('admin/settings/update_leave_type/'.$row[0]->leave_type_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_leave_type');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_leave_type');?>" value="<?php echo $row[0]->type_name;?>">
  </div>
  <div class="form-group">
    <label for="days_per_year" class="form-control-label"><?php echo $this->lang->line('xin_days_per_year');?>:</label>
    <input type="text" class="form-control" name="days_per_year" placeholder="<?php echo $this->lang->line('xin_days_per_year');?>" value="<?php echo $row[0]->days_per_year?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_leave_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=39&type=edit_record&data=ed_leave_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_leave_type = $('#xin_table_leave_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/leave_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_leave_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_warning_type' && $_GET['type']=='ed_warning_type'){
$row = $this->Xin_model->read_warning_type($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_warning_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_warning_type_info', 'id' => 'ed_warning_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->warning_type_id, 'ext_name' => $row[0]->type);?>
<?php echo form_open('admin/settings/update_warning_type/'.$row[0]->warning_type_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_warning_type');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_warning_type');?>" value="<?php echo $row[0]->type;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_warning_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=40&type=edit_record&data=ed_warning_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_warning_type = $('#xin_table_warning_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/warning_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_warning_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_termination_type' && $_GET['type']=='ed_termination_type'){
$row = $this->Xin_model->read_termination_type($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_termination_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_termination_type_info', 'id' => 'ed_termination_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->termination_type_id, 'ext_name' => $row[0]->type);?>
<?php echo form_open('admin/settings/update_termination_type/'.$row[0]->termination_type_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_termination_type');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_termination_type');?>" value="<?php echo $row[0]->type;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_termination_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=41&type=edit_record&data=ed_termination_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_termination_type = $('#xin_table_termination_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/termination_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					}); 
					xin_table_termination_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_expense_type' && $_GET['type']=='ed_expense_type'){
$row = $this->Xin_model->read_expense_type($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_expense_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_expense_type_info', 'id' => 'ed_expense_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->expense_type_id, 'ext_name' => $row[0]->name);?>
<?php echo form_open('admin/settings/update_expense_type/'.$row[0]->expense_type_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_expense_type');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_expense_type');?>" value="<?php echo $row[0]->name;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_expense_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=42&type=edit_record&data=ed_expense_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_expense_type = $('#xin_table_expense_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/expense_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_expense_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_job_type' && $_GET['type']=='ed_job_type'){
$row = $this->Xin_model->read_job_type($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_job_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_job_type_info', 'id' => 'ed_job_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->job_type_id, 'ext_name' => $row[0]->type);?>
<?php echo form_open('admin/settings/update_job_type/'.$row[0]->job_type_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_job_type');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_job_type');?>" value="<?php echo $row[0]->type;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_job_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=43&type=edit_record&data=ed_job_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_job_type = $('#xin_table_job_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/job_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_job_type.api().ajax.reload(function(){ 
					toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_exit_type' && $_GET['type']=='ed_exit_type'){
$row = $this->Xin_model->read_exit_type($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_employee_exit_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_exit_type_info', 'id' => 'ed_exit_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->exit_type_id, 'ext_name' => $row[0]->type);?>
<?php echo form_open('admin/settings/update_exit_type/'.$row[0]->exit_type_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_employee_exit_type');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_employee_exit_type');?>" value="<?php echo $row[0]->type;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_exit_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=44&type=edit_record&data=ed_exit_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_exit_type = $('#xin_table_exit_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/exit_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_exit_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_travel_arr_type' && $_GET['type']=='ed_travel_arr_type'){
$row = $this->Xin_model->read_travel_arr_type($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_travel_arr_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_travel_arr_type_info', 'id' => 'ed_travel_arr_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->arrangement_type_id, 'ext_name' => $row[0]->type);?>
<?php echo form_open('admin/settings/update_travel_arr_type/'.$row[0]->arrangement_type_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_travel_arrangement_type');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_travel_arrangement_type');?>" value="<?php echo $row[0]->type;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_travel_arr_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=46&type=edit_record&data=ed_travel_arr_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_travel_arr_type = $('#xin_table_travel_arr_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/travel_arr_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_travel_arr_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_currency_type' && $_GET['type']=='ed_currency_type'){
$row = $this->Xin_model->read_currency_types($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_currency_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_currency_type_info', 'id' => 'ed_currency_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->currency_id, 'ext_name' => $row[0]->name);?>
<?php echo form_open('admin/settings/update_currency_type/'.$row[0]->currency_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
      <?php foreach($this->Xin_model->get_companies() as $company) {?>
      <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$row[0]->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name"><?php echo $this->lang->line('xin_currency_name');?></label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_currency_name');?>" value="<?php echo $row[0]->name;?>">
  </div>
  <div class="form-group">
    <label for="name"><?php echo $this->lang->line('xin_currency_code');?></label>
    <input type="text" class="form-control" name="code" placeholder="<?php echo $this->lang->line('xin_currency_code');?>" value="<?php echo $row[0]->code;?>">
  </div>
  <div class="form-group">
    <label for="name"><?php echo $this->lang->line('xin_currency_symbol');?></label>
    <input type="text" class="form-control" name="symbol" placeholder="<?php echo $this->lang->line('xin_currency_symbol');?>" value="<?php echo $row[0]->symbol;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_currency_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=46&type=edit_record&data=ed_currency_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_currency_type = $('#xin_table_currency_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/currency_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_currency_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_company_type' && $_GET['type']=='ed_company_type'){
$row = $this->Xin_model->read_company_type($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_company_type');?></h4>
</div>
<?php $attributes = array('name' => 'ed_company_type_info', 'id' => 'ed_company_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->type_id, 'ext_name' => $row[0]->name);?>
<?php echo form_open('admin/settings/update_company_type/'.$row[0]->type_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="name" class="form-control-label"><?php echo $this->lang->line('xin_company_type');?>:</label>
    <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_company_type');?>" value="<?php echo $row[0]->name;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_company_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=46&type=edit_record&data=ed_company_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_company_type = $('#xin_table_company_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/company_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_company_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php }


else if(isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data']=='ed_iess_type' && $_GET['type']=='ed_iess_type'){
$row = $this->Xin_model->read_iess_type($_GET['field_id']);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data">Editar Porciento IESS</h4>
</div>
<?php $attributes = array('name' => 'ed_iess_type_info', 'id' => 'ed_iess_type_info', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->id_tipo, 'ext_name' => $row[0]->tipo);?>
<?php echo form_open('admin/settings/update_iess_type/'.$row[0]->id_tipo, $attributes, $hidden);?>
<div class="modal-body">
  <div class="form-group">
    <label for="name" class="form-control-label">Tipo de Aporte:</label>
    <input type="text" class="form-control" name="tipo" placeholder="Tipo de Aporte" value="<?php echo $row[0]->tipo;?>">
  </div>
  <div class="form-group">
    <label for="name" class="form-control-label">Porciento:</label>
    <input type="text" class="form-control" name="porciento" placeholder="Porciento" value="<?php echo $row[0]->porciento;?>">
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	/* Edit data */
	$("#ed_iess_type_info").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=46&type=edit_record&data=ed_iess_type_info&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					$('.edit_setting_datail').modal('toggle');
					// On page load: datatable
					var xin_table_iess_type = $('#xin_table_iess_type').dataTable({
						"bDestroy": true,
						"bFilter": false,
						"iDisplayLength": 5,
						"aLengthMenu": [[5, 10, 30, 50, 100, -1], [5, 10, 30, 50, 100, "All"]],
						"ajax": {
							url : "<?php echo site_url("admin/settings/iess_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}			
					});
					xin_table_iess_type.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);				
				}
			}
		});
	});
});	
</script>
<?php }

else if(isset($_GET['jd']) && isset($_GET['user_id']) && $_GET['data']=='password' && $_GET['type']=='password'){?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('header_change_password');?></h4>
</div>
<?php $attributes = array('name' => 'e_change_password', 'id' => 'profile_password', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', 'user_id' => $_GET['user_id']);?>
<?php echo form_open('admin/employees/change_password/'.$row[0]->currency_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="new_password"><?php echo $this->lang->line('xin_e_details_enpassword');?></label>
        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_enpassword');?>" name="new_password" type="text">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="new_password_confirm" class="control-label"><?php echo $this->lang->line('xin_e_details_ecnpassword');?></label>
        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_ecnpassword');?>" name="new_password_confirm" type="text">
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
	/* change password */
	jQuery("#profile_password").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = jQuery(this), action = obj.attr('name');
		jQuery('.save').prop('disabled', true);
		jQuery.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=31&data=e_change_password&type=change_password&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery('.save').prop('disabled', false);
				} else {
					$('.pro_change_password').modal('toggle');
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery('#profile_password')[0].reset(); // To reset form fields
					jQuery('.save').prop('disabled', false);
				}
			}
		});
	});
});	
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['p']) && $_GET['data']=='policy' && $_GET['type']=='policy'){
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_company_policy');?></h4>
</div>
<div class="modal-body">
  <div class="form-group">
    <div id="accordion" role="tablist" aria-multiselectable="true">
      <?php foreach($this->Xin_model->all_policies() as $_policy):?>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $_policy->policy_id;?>" aria-expanded="true" aria-controls="collapseOne">
            <?php
			 if($_policy->company_id==0){
				 $cname = $this->lang->line('xin_all_companies');
			 } else {
				$company = $this->Xin_model->read_company_info($_policy->company_id);
				if(!is_null($company)){
					$cname = $company[0]->name;
				} else {
					$cname = '--';
				}
			 }
			 ?>
            <?php echo $_policy->title;?> (<?php echo $cname;?>) </a> </h4>
        </div>
        <div id="collapse<?php echo $_policy->policy_id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne"> <?php echo html_entity_decode($_policy->description);?> </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
</div>
<?php } else if(isset($_GET['jd']) ){
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data">Tipos de Aporte</h4>
</div>
<div class="modal-body">
  <div class="form-group">
    <div id="accordion" role="tablist" aria-multiselectable="true">
      <?php foreach($this->Xin_model->all_policies() as $_policy):?>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $_policy->policy_id;?>" aria-expanded="true" aria-controls="collapseOne">
            <?php
			 if($_policy->company_id==0){
				 $cname = $this->lang->line('xin_all_companies');
			 } else {
				$company = $this->Xin_model->read_company_info($_policy->company_id);
				if(!is_null($company)){
					$cname = $company[0]->name;
				} else {
					$cname = '--';
				}
			 }
			 ?>
            <?php echo $_policy->title;?> (<?php echo $cname;?>) </a> </h4>
        </div>
        <div id="collapse<?php echo $_policy->policy_id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne"> <?php echo html_entity_decode($_policy->description);?> </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
</div>
<?php }
?>
 
