<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['salary_template_id']) && $_GET['data']=='payroll'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_payroll_template');?></h4>
</div>
<?php $attributes = array('name' => 'update_template', 'id' => 'update_template', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $salary_template_id, 'ext_name' => $template_name);?>
<?php echo form_open('admin/payroll/update_template/'.$salary_template_id, $attributes, $hidden);?>
<div class="modal-body">
    <div class="bg-white">
      <div class="box-block">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
                    <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
                      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                      <?php foreach($all_companies as $company) {?>
                      <option value="<?php echo $company->company_id;?>" <?php if($company_id==$company->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  </div>
                  <div class="col-md-4">
                <div class="form-group">
                  <label for="template_name"><?php echo $this->lang->line('xin_name_of_template');?></label>
                  <input class="form-control" placeholder="<?php echo $this->lang->line('xin_name_of_template');?>" name="template_name" type="text" value="<?php echo $template_name;?>">
                </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                      <label for="aporte_type">Aporte Patronal(%) </label>
                      <select onchange="remove_calc_m();" class="form-control" name="aporte_type" id="m_aporte_type" data-plugin="select_hrm" data-placeholder="Empleado">
                        <option value="">Seleccione</option>
                        <?php foreach($iess_types as $iess_type) 
                        {
                            if($iess_type->tipo!='Empleado')
                               {
                        ?>
                            <option value="<?php echo $iess_type->porciento;?>"> <?php echo $iess_type->tipo;?></option>
                        <?php 
                              }else{
                                $porciento_empleado = $iess_type->porciento;
                              }
                        } 
                        ?>
                        
                      </select>
                      <input type="hidden" id = "m_descuento_empleado" value="<?php echo $porciento_empleado; ?>">
                    </div>
               </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="overtime_rate" class="control-label">Precio Horas Extras</label>
                  <input class="form-control" placeholder="Precio Horas Extras" name="overtime_rate" type="text" value="<?php echo $overtime_rate;?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="basic_salary" class="control-label"><?php echo $this->lang->line('xin_payroll_basic_salary');?></label>
                  <input class="form-control m_salary" onchange="update_iess_m(this);" placeholder="<?php echo $this->lang->line('xin_payroll_basic_salary');?>" name="basic_salary" id="m_basic_salary" type="text" value="<?php echo $basic_salary;?>">
                </div>
              </div>
              <div class="col-md-4">
                 <div class="form-group">
                    <label for="salario_basico_unificado">Salario Básico Unificado</label>
                    <input class="form-control" onchange="update_decimo_cuarto_m(this);" placeholder="Salario Básico" name="salario_basico_unificado" id="m_salario_basico_unificado" type="text" value="<?php echo $salario_basico_unificado;?>">
                 </div>
             </div>
            </div>
          </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                      <label class="switch">
                              <input id="m_tercero_acu" onchange="update_decimo3_m(this);"  value="<?php echo $tercero_acu;?>" type="checkbox" name="tercero_acu" class="switch-input" >
                              <span class="switch-label" data-on="SI" data-off="NO"></span>
                              <span class="switch-handle"></span>
                          </label> <label style="display: inline; cursor: pointer;" for="m_tercero_acu">&nbsp; Décimo 3ro Acum.</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="switch">
                              <input id="m_cuarto_acu" value="<?php echo $cuarto_acu;?>" onchange="update_decimo4_m(this);" type="checkbox" name="cuarto_acu" class="switch-input" >
                              <span class="switch-label" data-on="SI" data-off="NO"></span>
                              <span class="switch-handle"></span>
                          </label> <label style="display: inline; cursor: pointer;" for="m_cuarto_acu">&nbsp; Décimo 4to Acum.</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="switch switch-green">
                              <input id="m_fondo_acu" onchange="update_fondo_m(this);" value="<?php echo $fondo_acu;?>" type="checkbox" name="fondo_acu" class="switch-input" >
                              <span class="switch-label" data-on="SI" data-off="NO"></span>
                              <span class="switch-handle"></span>
                          </label> <label style="display: inline; cursor: pointer;" for="m_fondo_acu">&nbsp; Fondo Reserva Acum.</label>
                    </div>
                  </div>
             </div>   
             <hr>
          <div class="row">  
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="house_rent_allowance" class="text-success">Fondo de Reserva</label>
                  <input class="form-control m_salary m_allowance" placeholder="Cantidad" name="fondo_reserva" id="m_fondo_reserva" type="text" value="<?php echo $fondo_reserva;?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="medical_allowance" class="text-success">Décimo Tercero</label>
                  <input class="form-control m_salary m_allowance" placeholder="Cantidad" name="decimo_tercero" id="m_decimo_tercero" type="text" value="<?php echo $decimo_tercero;?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="travelling_allowance" class="text-success">Décimo Cuarto</label>
                  <input class="form-control m_salary m_allowance" placeholder="Cantidad" name="decimo_cuarto" id="m_decimo_cuarto" type="text" value="<?php echo $decimo_cuarto;?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="dearness_allowance" class="text-success">Vacaciones</label>
                  <input class="form-control m_salary m_allowance" onchange="update_total_m();" placeholder="Cantidad" name="vacaciones" id="m_vacaciones" type="text" value="<?php echo $vacaciones;?>">
                </div>
              </div>
              <div class="col-md-12">
                    <div class="form-group">
                      <label for="bonificacion"  class="text-success">Bonificación Complementaria</label>
                      <input class="form-control salary allowance" onchange="update_total_m();" id="m_bonificacion" placeholder="Bonificación Complementaria"  name="bonificacion" type="text" value="<?php echo $bonificacion;?>">
                    </div>
             </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="provident_fund" class="text-danger">Aporte IESS</label>
                  <input class="form-control m_deduction" placeholder="Cantidad" name="aporte_iess" id="m_aporte_iess" type="text" value="<?php echo $aporte_iess;?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tax_deduction" class="text-danger">Otros Admin</label>
                  <input class="form-control m_deduction" placeholder="Cantidad" onchange="update_total_m();" name="otros_admin" id="m_otros_admin" type="text" value="<?php echo $otros_admin;?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="security_deposit" class="text-danger"><?php echo $this->lang->line('xin_payroll_security_deposit');?></label>
                  <input class="form-control m_deduction" placeholder="Cantidad" onchange="update_total_m();" name="hipotecario" id="m_hipotecario" type="text" value="<?php echo $hipotecario;?>">
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                  <label for="security_deposit" class="text-danger">Préstamo Quirografario</label>
                  <input class="form-control m_deduction" placeholder="Cantidad" onchange="update_total_m();" name="quirografario" id="m_quirografario" type="text" value="<?php echo $quirografario;?>">
                </div>
                </div>
            </div>
            <div class="col-md-12">
                    <div class="form-group">
                      <label for="anticipos"  class="text-danger">Anticipos</label>
                      <input class="form-control salary allowance" onchange="update_total_m();" id="m_anticipos" placeholder="Anticipos"  name="anticipos" type="text" value="<?php echo $anticipos;?>">
                    </div>
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">&nbsp;
                </div>
                <div class="col-md-6 col-right">
            <h4 class="form-section"><?php echo $this->lang->line('xin_payroll_total_salary_details');?></h4>
            <table class="table table-bordered custom-table">
              <tbody>
                <tr>
                  <th class="vertical-td" style="text-align:right;">Salario Bruto :</th>
                  <td class="hidden-print"><input type="text" name="salario_bruto" readonly id="m_total" class="form-control" value="<?php echo $salario_bruto;?>"></td>
                </tr>
                <tr>
                  <th class="vertical-td" style="text-align:right;">Total Ingresos :</th>
                  <td class="hidden-print"><input type="text" name="total_ingresos" readonly id="m_total_allowance" class="form-control" value="<?php echo $total_ingresos;?>"></td>
                </tr>
                <tr>
                  <th class="vertical-td" style="text-align:right;">Total Descuentos :</th>
                  <td class="hidden-print"><input type="text" name="total_egresos" readonly id="m_total_deduction" class="form-control" value="<?php echo $total_egresos;?>"></td>
                </tr>
                <tr>
                  <th class="vertical-td" style="text-align:right;">Salario Neto :</th>
                  <td class="hidden-print"><input type="text" name="salario_neto" readonly id="m_net_salary" class="form-control" value="<?php echo $salario_neto;?>"></td>
                </tr>
              </tbody>
            </table>
          </div>
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
//validar modal de editar plantilla
function update_total_m(){
        var salario_base_total_m = document.getElementById('m_basic_salary').value=='' ? 0: document.getElementById('m_basic_salary').value;
        var fondo_reserva_total_m = document.getElementById('m_fondo_reserva').value=='' ? 0: document.getElementById('m_fondo_reserva').value;
        var decimo3_total_m = document.getElementById('m_decimo_tercero').value=='' ? 0: document.getElementById('m_decimo_tercero').value;
        var decimo4_total_m = document.getElementById('m_decimo_cuarto').value=='' ? 0: document.getElementById('m_decimo_cuarto').value;
        var vacaciones_total_m = document.getElementById('m_vacaciones').value=='' ? 0: document.getElementById('m_vacaciones').value;
        var bonificaciones_total_m = document.getElementById('m_bonificacion').value=='' ? 0: document.getElementById('m_bonificacion').value;
        var total_ingresos_m = parseFloat(fondo_reserva_total_m) + parseFloat(decimo3_total_m) + parseFloat(decimo4_total_m) + parseFloat(vacaciones_total_m) + parseFloat(bonificaciones_total_m);
        document.getElementById('m_total').value=salario_base_total_m;
        //ingresos
        total_ingresos_m = total_ingresos_m.toFixed(2);
        document.getElementById('m_total_allowance').value=total_ingresos_m;
        //egresos
        var aporte_iess_total_m = document.getElementById('m_aporte_iess').value=='' ? 0: document.getElementById('m_aporte_iess').value;
        var quirografario_total_m = document.getElementById('m_quirografario').value=='' ? 0: document.getElementById('m_quirografario').value;
        var hipotecario_total_m = document.getElementById('m_hipotecario').value=='' ? 0: document.getElementById('m_hipotecario').value;
        var otros_admin_total_m = document.getElementById('m_otros_admin').value=='' ? 0: document.getElementById('m_otros_admin').value;
        var anticipos_total_m = document.getElementById('m_anticipos').value=='' ? 0: document.getElementById('m_anticipos').value;
        total_egresos_m = parseFloat(aporte_iess_total_m) + parseFloat(quirografario_total_m) + parseFloat(hipotecario_total_m) + parseFloat(otros_admin_total_m) + parseFloat(anticipos_total_m);
       total_egresos_m = total_egresos_m.toFixed(2);
        document.getElementById('m_total_deduction').value=total_egresos_m;
        var neto_total_m = parseFloat(salario_base_total_m) + parseFloat(total_ingresos_m) - parseFloat(total_egresos_m);
       neto_total_m = neto_total_m.toFixed(2);
        document.getElementById('m_net_salary').value=neto_total_m;
    } 
    
    function update_iess_m(listaiess){
        
        var descuento_empleado_m = document.getElementById('m_descuento_empleado').value;
        if(descuento_empleado_m){
            descuento_empleado_m = parseFloat(descuento_empleado_m);
        }
        
        var salary_m = listaiess.value;
        salary_m = parseFloat(salary_m);
        if(descuento_empleado_m==''){
            alert('Por favor seleccione el tipo de empleado (Privado/Público).');
            listaiess.value='';
            return false;
        }
        var iess_m = salary_m * (descuento_empleado_m/100);
        iess_m = iess_m.toFixed(2);
        document.getElementById('m_aporte_iess').value=iess_m;
       
        //aporte patronal
        var aporte_type_m = document.getElementById('m_aporte_type').value;
        if(aporte_type_m){
            aporte_type_m = parseFloat(aporte_type_m);
        }
        //fondo reserva
        if($('#m_fondo_acu').is(':checked')){
             document.getElementById('m_fondo_reserva').disabled=true;
             document.getElementById('m_fondo_reserva').value='';
        }else{
            document.getElementById('m_fondo_reserva').disabled=false;
            var fondo_reserva_m = salary_m * (8.33/100);
            fondo_reserva_m =fondo_reserva_m.toFixed(2);
            document.getElementById('m_fondo_reserva').value=fondo_reserva_m;
        } 
            
        //decimo tercero
        if($('#m_tercero_acu').is(':checked')){
            document.getElementById('m_decimo_tercero').disabled=true;
            document.getElementById('m_decimo_tercero').value='';
        }else{
            document.getElementById('m_decimo_tercero').disabled=false;
            var decimo_tercero_m = salary_m / (12);
            decimo_tercero_m =decimo_tercero_m.toFixed(2);
            document.getElementById('m_decimo_tercero').value=decimo_tercero_m;
        }
        
       setTimeout(function(){
           document.getElementById('m_aporte_iess').dispatchEvent(new Event('change'));
       },700);
       
       update_total_m();
    }

function update_fondo_m(){
        //fondo reserva
        var salary_m = document.getElementById('m_basic_salary').value;
        if($('#m_fondo_acu').is(':checked')){
            $('#m_fondo_acu').val(1);
             document.getElementById('m_fondo_reserva').disabled=true;
             document.getElementById('m_fondo_reserva').value='';
        }else{
             $('#m_fondo_acu').val(0);
            document.getElementById('m_fondo_reserva').disabled=false;
            var fondo_reserva_m = salary_m * (8.33/100);
            fondo_reserva_m =fondo_reserva_m.toFixed(2);
            document.getElementById('m_fondo_reserva').value=fondo_reserva_m;
        } 
        update_total_m();
    }
    
    function update_decimo3_m(){
        txtbase_m = document.getElementById('m_basic_salary');
        if($('#m_tercero_acu').is(':checked')){
            $('#m_tercero_acu').val(1);
            document.getElementById('m_decimo_tercero').disabled =true;
            document.getElementById('m_decimo_tercero').value='';
        }else{
            $('#m_tercero_acu').val(0);
            document.getElementById('m_decimo_tercero').disabled =false;
           var salario_base_m = txtbase_m.value;
            if(salario_base_m==''){
                alert('Por favor ingrese el Salario Base.');
                return false;
            }
            var decimo_tercero_m = parseFloat(salario_base_m)/12;
            decimo_tercero_m = decimo_tercero_m.toFixed(2);
            document.getElementById('m_decimo_tercero').value=decimo_tercero_m;
        }
        update_total_m();
    }
    function update_decimo4_m(){
        txtunificado_m = document.getElementById('m_salario_basico_unificado');
        if($('#m_cuarto_acu').is(':checked')){
            $('#m_cuarto_acu').val(1);
            document.getElementById('m_decimo_cuarto').disabled =true;
            document.getElementById('m_decimo_cuarto').value='';
        }else{
            $('#m_cuarto_acu').val(0);
            document.getElementById('m_decimo_cuarto').disabled =false;
           var salario_unificado_m = txtunificado_m.value;
            if(salario_unificado_m==''){
                alert('Por favor ingrese el salario unificado.');
                return false;
            }
            var decimo_cuarto_m = parseFloat(salario_unificado_m)/12;
            decimo_cuarto_m = decimo_cuarto_m.toFixed(2);
            document.getElementById('m_decimo_cuarto').value=decimo_cuarto_m;
        }
        update_total_m();
    }
    function update_decimo_cuarto_m(txtunificado){
        if($('#m_cuarto_acu').is(':checked')){
            document.getElementById('m_decimo_cuarto').disabled =true;
            document.getElementById('m_decimo_cuarto').value='';
        }else{
            document.getElementById('m_decimo_cuarto').disabled =false;
           var salario_unificado_m = txtunificado.value;
            if(salario_unificado_m==''){
                alert('Por favor ingrese el salario unificado.');
                return false;
            }
            var decimo_cuarto_m = parseFloat(salario_unificado_m)/12;
            decimo_cuarto_m = decimo_cuarto_m.toFixed(2);
            document.getElementById('m_decimo_cuarto').value=decimo_cuarto_m;
        }
        update_total_m();
    }
    function remove_calc_m(){
         document.getElementById('m_aporte_iess').value='';
         document.getElementById('m_basic_salary').value='';
         //
         elselect = document.getElementById('m_aporte_type');
         textoselect = elselect.options[elselect.selectedIndex].innerHTML;
         if(textoselect=='Privado'){
             document.getElementById('m_descuento_empleado').value=9.45;
         }else{
             document.getElementById('m_descuento_empleado').value=11.45;
         }
         update_total_m();
    }








/////////////////
$(document).ready(function(){
    
    //actualizar acumulados
    var decimo_tercero_acu = $('#m_tercero_acu').val();
    if(decimo_tercero_acu==1){
         $('#m_tercero_acu').prop('checked', true);
    }else{
        $('#m_tercero_acu').prop('checked', false);
    }
    var decimo_cuarto_acu = $('#m_cuarto_acu').val();
    if(decimo_cuarto_acu==1){
         $('#m_cuarto_acu').prop('checked', true);
    }else{
        $('#m_cuarto_acu').prop('checked', false);
    }
    var fondo_acu = $('#m_fondo_acu').val();
    if(fondo_acu==1){
         $('#m_fondo_acu').prop('checked', true);
    }else{
        $('#m_fondo_acu').prop('checked', false);
    }
    //aporte type
   $('#m_aporte_type').val(<?php echo $aporte_type; ?>);
					
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });	 

	/* Edit data */
	$("#update_template").submit(function(e){
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$('.save').prop('disabled', true);
		
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=1&edit_type=payroll&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					// On page load: datatable
					var xin_table = $('#xin_table').dataTable({
						"bDestroy": true,
						"ajax": {
							url : "<?php echo site_url("admin/payroll/template_list") ?>",
							type : 'GET'
						},
						dom: 'lBfrtip',
						"buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}
					});
					xin_table.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.edit-modal-data').modal('toggle');
					$('.save').prop('disabled', false);
				}
			}
		});
	});
});	
$(document).on("keyup", function () {
	var sum_total = 0;
	var deduction = 0;
	var net_salary = 0;
	var allowance = 0;
	$(".m_salary").each(function () {
		sum_total += +$(this).val();
	});
	
	$(".m_deduction").each(function () {
		deduction += +$(this).val();
	});
	
	$(".m_allowance").each(function () {
		allowance += +$(this).val();
	});
	
	$("#m_total").val(sum_total);
	$("#m_total_deduction").val(deduction);
	$("#m_total_allowance").val(allowance);
	
	var net_salary = sum_total - deduction;
	$("#m_net_salary").val(net_salary);
});
</script>
<?php } else if(isset($_GET['jd']) && isset($_GET['employee_id']) && $_GET['data']=='payroll_template' && $_GET['type']=='payroll_template'){ ?>
<?php
$grade_template = $this->Payroll_model->read_template_information($monthly_grade_id);
$hourly_template = $this->Payroll_model->read_hourly_wage_information($hourly_grade_id);
?>
<?php
if($profile_picture!='' && $profile_picture!='no file') {
	$u_file = 'uploads/profile/'.$profile_picture;
} else {
	if($gender=='Male') { 
		$u_file = 'uploads/profile/default_male.jpg';
	} else {
		$u_file = 'uploads/profile/default_female.jpg';
	}
} ?>
<div class="modal-header animated fadeInRight">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_payroll_employee_salary_details');?></h4>
</div>
<div class="modal-body animated fadeInRight">
  <div class="row row-md">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-uppercase"><b><?php echo $first_name.' '.$last_name;?></b></div>
        <div class="bg-white product-view">
          <div class="box-block">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="pv-images mb-sm-0"> <img class="img-fluid" src="<?php echo base_url().$u_file;?>" alt=""> </div>
              </div>
              <div class="col-md-8 col-sm-7">
                <div class="pv-content">
                  <div class="table-responsive" data-pattern="priority-columns">
                    <table class="table-hover">
                      <tbody>
                        <tr>
                          <td><strong><?php echo $this->lang->line('xin_emp_id');?></strong>:</td>
                          <td>&nbsp;&nbsp;&nbsp;</td>
                          <td><?php echo $employee_id;?></td>
                        </tr>
                        <tr>
                          <td><strong><?php echo $this->lang->line('left_department');?></strong>:</td>
                          <td>&nbsp;&nbsp;&nbsp;</td>
                          <td><?php echo $department_name;?></td>
                        </tr>
                        <tr>
                          <td><strong><?php echo $this->lang->line('left_designation');?></strong>:</td>
                          <td>&nbsp;&nbsp;&nbsp;</td>
                          <td><?php echo $designation_name;?></td>
                        </tr>
                        <tr>
                          <td><strong><?php echo $this->lang->line('xin_joining_date');?></strong>:</td>
                          <td>&nbsp;&nbsp;&nbsp;</td>
                          <td><?php echo $date_of_joining;?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-1">
    <div class="col-sm-12 col-xs-12">
      <div class="card">
        <div class="card-header text-uppercase"><b><?php echo $this->lang->line('xin_payroll_salary_details');?></b></div>
        <div class="card-block">
          <div class="row m-b-1">
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('xin_payroll_template');?>: </strong></label>
                <?php echo $grade_template[0]->template_name;?> </div>
            </div>
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('xin_payroll_basic_salary');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($grade_template[0]->basic_salary);?></div>
            </div>
            <?php if($grade_template[0]->overtime_rate!=0 || $grade_template[0]->overtime_rate!=''):?>
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('xin_overtime_per_hour');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($grade_template[0]->overtime_rate);?> </div>
            </div>
            <?php endif;?>
            <?php if(isset($_GET['mode']) && $_GET['mode'] == 'not_paid'):?>
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('dashboard_xin_status');?>: </strong></label>
                <span class="tag tag-danger"><?php echo $this->lang->line('xin_not_paid');?></span></div>
            </div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
    <?php   if($grade_template[0]->decimo_tercero!='' || $grade_template[0]->decimo_cuarto!='' || $grade_template[0]->fondo_reserva!='' || $grade_template[0]->vacaciones!=''): ?>
    <div class="col-sm-12 col-xs-12">
      <div class="card">
        <div class="card-header text-uppercase"><div class="row"><div class="col-md-6"><b> Ingresos</b></div> <div class="col-md-6"><b> Descuentos</b></div></div></div>
        <div class="card-block">
          <blockquote class="card-blockquote">
            <div class="row m-b-1">
              <div class="col-md-6">
              <div class="col-md-12">
                <div class="f">
                  <label for="name"><strong>Décimo Tercero: </strong></label>
                  <?php  if($grade_template[0]->decimo_tercero!=''){ 
                      echo $this->Xin_model->currency_sign($grade_template[0]->decimo_tercero); 
                   }else{
                       echo $this->Xin_model->currency_sign( 0.00); 
                   }
                  ?>
                  </div>
              </div>
              
              <div class="col-md-12">
                <div class="f">
                  <label for="name"><strong>Décimo cuarto: </strong></label>
                  <?php  if($grade_template[0]->decimo_cuarto!=''){ 
                      echo $this->Xin_model->currency_sign($grade_template[0]->decimo_cuarto); 
                   }else{
                       echo $this->Xin_model->currency_sign( 0.00); 
                   }
                  ?>
                 </div>
              </div>
            
              <div class="col-md-12">
                <div class="f">
                  <label for="name"><strong>Fondo de reserva: </strong></label>
                  <?php  if($grade_template[0]->fondo_reserva!=''){ 
                      echo $this->Xin_model->currency_sign($grade_template[0]->fondo_reserva); 
                   }else{
                       echo $this->Xin_model->currency_sign( 0.00); 
                   }
                  ?>
                  </div>
              </div>
              
             <div class="col-md-12">
                <div class="f">
                  <label for="name"><strong>Vacaciones: </strong></label>
                  <?php  if($grade_template[0]->vacaciones!=''){ 
                      echo $this->Xin_model->currency_sign($grade_template[0]->vacaciones); 
                   }else{
                       echo $this->Xin_model->currency_sign( 0.00); 
                   }
                  ?>
                  </div>
              </div>
              <div class="col-md-12">
                <div class="f">
                  <label for="name"><strong>Bonificación: </strong></label>
                  <?php  if($grade_template[0]->bonificacion!=''){ 
                      echo $this->Xin_model->currency_sign($grade_template[0]->bonificacion); 
                   }else{
                       echo $this->Xin_model->currency_sign( 0.00); 
                   }
                  ?>
                  </div>
              </div>
              </div>
               <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="f">
                      <label for="name"><strong>Aporte IESS: </strong></label>
                      <?php  if($grade_template[0]->aporte_iess!=''){ 
                          echo $this->Xin_model->currency_sign($grade_template[0]->aporte_iess); 
                       }else{
                           echo $this->Xin_model->currency_sign( 0.00); 
                       }
                      ?>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="f">
                      <label for="name"><strong>Préstamo Quirogarfario: </strong></label>
                      <?php  if($grade_template[0]->quirografario!=''){ 
                          echo $this->Xin_model->currency_sign($grade_template[0]->quirografario); 
                       }else{
                           echo $this->Xin_model->currency_sign( 0.00); 
                       }
                      ?>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="f">
                      <label for="name"><strong>Préstamo Hipotecario: </strong></label>
                      <?php  if($grade_template[0]->hipotecario!=''){ 
                          echo $this->Xin_model->currency_sign($grade_template[0]->hipotecario); 
                       }else{
                           echo $this->Xin_model->currency_sign( 0.00); 
                       }
                      ?>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="f">
                      <label for="name"><strong>Anticipos: </strong></label>
                      <?php  if($grade_template[0]->anticipos!=''){ 
                          echo $this->Xin_model->currency_sign($grade_template[0]->anticipos); 
                       }else{
                           echo $this->Xin_model->currency_sign( 0.00); 
                       }
                      ?>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="f">
                      <label for="name"><strong>Otros Admin: </strong></label>
                      <?php  if($grade_template[0]->otros_admin!=''){ 
                          echo $this->Xin_model->currency_sign($grade_template[0]->otros_admin); 
                       }else{
                           echo $this->Xin_model->currency_sign( 0.00); 
                       }
                      ?>
                      </div>
                  </div>
              </div>
            </div>
          </blockquote>
        </div>
      </div>
    </div>
    <?php   endif;?>
     
     
    <div class="  col-xs-12  ">
      <div class="card">
        <div class="card-header text-uppercase"><b> <?php echo $this->lang->line('xin_payroll_total_salary_details');?></b></div>
        <div class="card-block">
          <div class="row m-b-1">
            <?php if($grade_template[0]->salario_bruto!=''): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payroll_gross_salary');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($grade_template[0]->salario_bruto);?> </div>
            </div>
            <?php endif;?>
            <?php if($grade_template[0]->total_ingresos && $grade_template[0]->total_ingresos!='0'): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payroll_total_allowance');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($grade_template[0]->total_ingresos);?> </div>
            </div>
            <?php endif;?>
            <?php if($grade_template[0]->total_egresos!='' && $grade_template[0]->total_egresos!='0'): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payroll_total_deduction');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($grade_template[0]->total_egresos);?> </div>
            </div>
            <?php endif;?>
            <?php if($grade_template[0]->salario_neto!=''): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payroll_net_salary');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($grade_template[0]->salario_neto);?> </div>
            </div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } else if(isset($_GET['jd']) && isset($_GET['employee_id']) && $_GET['data']=='hourlywages' && $_GET['type']=='hourlywages'){ ?>
<?php
$grade_template = $this->Payroll_model->read_template_information($monthly_grade_id);
$hourly_template = $this->Payroll_model->read_hourly_wage_information($hourly_grade_id);
?>
<?php
if($profile_picture!='' && $profile_picture!='no file') {
	$u_file = 'uploads/profile/'.$profile_picture;
} else {
	if($gender=='Male') { 
		$u_file = 'uploads/profile/default_male.jpg';
	} else {
		$u_file = 'uploads/profile/default_female.jpg';
	}
} ?>
<div class="modal-header animated fadeInRight">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_payroll_employee_hourly_wages');?></h4>
</div>
<div class="modal-body animated fadeInRight">
  <div class="row row-md">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-uppercase"><b><?php echo $first_name.' '.$last_name;?></b></div>
        <div class="bg-white product-view">
          <div class="box-block">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="pv-images mb-sm-0"> <img class="img-fluid" src="<?php echo base_url().$u_file;?>" alt=""> </div>
              </div>
              <div class="col-md-8 col-sm-7">
                <div class="pv-content">
                  <div class="table-responsive" data-pattern="priority-columns">
                    <table class="table-hover">
                      <tbody>
                        <tr>
                          <td><strong><?php echo $this->lang->line('xin_emp_id');?></strong>:</td>
                          <td>&nbsp;&nbsp;&nbsp;</td>
                          <td><?php echo $employee_id;?></td>
                        </tr>
                        <tr>
                          <td><strong><?php echo $this->lang->line('left_department');?></strong>:</td>
                          <td>&nbsp;&nbsp;&nbsp;</td>
                          <td><?php echo $department_name;?></td>
                        </tr>
                        <tr>
                          <td><strong><?php echo $this->lang->line('left_designation');?></strong>:</td>
                          <td>&nbsp;&nbsp;&nbsp;</td>
                          <td><?php echo $designation_name;?></td>
                        </tr>
                        <tr>
                          <td><strong><?php echo $this->lang->line('xin_joining_date');?></strong>:</td>
                          <td>&nbsp;&nbsp;&nbsp;</td>
                          <td><?php echo $date_of_joining;?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row"> 
    <!-- ********************************* Salary Details Panel ***********************-->
    <div class="col-sm-12 col-xs-12">
      <div class="card">
        <div class="card-header text-uppercase"><b><?php echo $this->lang->line('xin_payroll_total_salary_details');?></b></div>
        <div class="card-block">
          <div class="row m-b-1">
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('xin_payroll_hourly_wage');?>: </strong></label>
                <?php echo $hourly_template[0]->hourly_grade;?> </div>
            </div>
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('xin_payroll_hourly_rate');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($hourly_template[0]->hourly_rate);?> </div>
            </div>
            <?php if(isset($_GET['mode']) && $_GET['mode'] == 'not_paid'):?>
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('dashboard_xin_status');?>: </strong></label>
                <span class="tag tag-danger"><?php echo $this->lang->line('xin_not_paid');?></span></div>
            </div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php }
?>
