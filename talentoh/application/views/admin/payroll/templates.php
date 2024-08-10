<?php
/* Payroll Template view
*/
?>
<?php $session = $this->session->userdata('username');?>
<script>
    function update_total(){
        var salario_base_total = document.getElementById('basic_salary').value=='' ? 0: document.getElementById('basic_salary').value;
        var fondo_reserva_total = document.getElementById('fondo_reserva').value=='' ? 0: document.getElementById('fondo_reserva').value;
        var decimo3_total = document.getElementById('decimo_tercero').value=='' ? 0: document.getElementById('decimo_tercero').value;
        var decimo4_total = document.getElementById('decimo_cuarto').value=='' ? 0: document.getElementById('decimo_cuarto').value;
        var vacaciones_total = document.getElementById('vacaciones').value=='' ? 0: document.getElementById('vacaciones').value;
        var bonificaciones_total = document.getElementById('bonificacion').value=='' ? 0: document.getElementById('bonificacion').value;
        var total_ingresos = parseFloat(fondo_reserva_total) + parseFloat(decimo3_total) + parseFloat(decimo4_total) + parseFloat(vacaciones_total) + parseFloat(bonificaciones_total);
        document.getElementById('salario_bruto').value=salario_base_total;
        //ingresos
        total_ingresos = total_ingresos.toFixed(2);
        document.getElementById('total_ingresos').value=total_ingresos;
        //egresos
        var aporte_iess_total = document.getElementById('aporte_iess').value=='' ? 0: document.getElementById('aporte_iess').value;
        var quirografario_total = document.getElementById('quirografario').value=='' ? 0: document.getElementById('quirografario').value;
        var hipotecario_total = document.getElementById('hipotecario').value=='' ? 0: document.getElementById('hipotecario').value;
        var otros_admin_total = document.getElementById('otros_admin').value=='' ? 0: document.getElementById('otros_admin').value;
        var anticipos_total = document.getElementById('anticipos').value=='' ? 0: document.getElementById('anticipos').value;
        total_egresos = parseFloat(aporte_iess_total) + parseFloat(quirografario_total) + parseFloat(hipotecario_total) + parseFloat(otros_admin_total) + parseFloat(anticipos_total);
       total_egresos = total_egresos.toFixed(2);
        document.getElementById('total_egresos').value=total_egresos;
        var neto_total = parseFloat(salario_base_total) + parseFloat(total_ingresos) - parseFloat(total_egresos);
       neto_total = neto_total.toFixed(2);
        document.getElementById('salario_neto').value=neto_total;
    } 
    function update_iess(listaiess){
        
        var descuento_empleado = document.getElementById('descuento_empleado').value;
        if(descuento_empleado){
            descuento_empleado = parseFloat(descuento_empleado);
        }
        
        var salary = listaiess.value;
        salary = parseFloat(salary);
        if(descuento_empleado==''){
            alert('Por favor seleccione el tipo de empleado (Privado/Público).');
            listaiess.value='';
            return false;
        }
        var iess = salary * (descuento_empleado/100);
        iess = iess.toFixed(2);
        document.getElementById('aporte_iess').value=iess;
       
        //aporte patronal
        var aporte_type = document.getElementById('aporte_type').value;
        if(aporte_type){
            aporte_type = parseFloat(aporte_type);
        }
        if(aporte_type==''){
            alert('Por favor seleccione el tipo de empleado en Aporte patronal.');
            document.getElementById('aporte_patronal').value='';
            return false;
        }
        var aporte_patronal = salary * (aporte_type/100);
        aporte_patronal = aporte_patronal.toFixed(2);
        document.getElementById('aporte_patronal_ing').value=aporte_patronal;
        document.getElementById('aporte_patronal_egre').value=aporte_patronal;
        
     //   document.getElementById('aporte_patronal').value=aporte_patronal;
        //fondo reserva
        if($('#fondo_acu').is(':checked')){
             document.getElementById('fondo_reserva').disabled=true;
             document.getElementById('fondo_reserva').value='';
        }else{
            document.getElementById('fondo_reserva').disabled=false;
            var fondo_reserva = salary * (8.33/100);
            fondo_reserva =fondo_reserva.toFixed(2);
            document.getElementById('fondo_reserva').value=fondo_reserva;
        } 
            
        //decimo tercero
        if($('#tercero_acu').is(':checked')){
            document.getElementById('decimo_tercero').disabled=true;
            document.getElementById('decimo_tercero').value='';
        }else{
            document.getElementById('decimo_tercero').disabled=false;
            var decimo_tercero = salary / (12);
            decimo_tercero =decimo_tercero.toFixed(2);
            document.getElementById('decimo_tercero').value=decimo_tercero;
        }
        
       setTimeout(function(){
           document.getElementById('aporte_iess').dispatchEvent(new Event('change'));
       },700);
       
       update_total();
    }
    
    function update_fondo(){
        //fondo reserva
        var salary = document.getElementById('basic_salary').value;
        if($('#fondo_acu').is(':checked')){
             document.getElementById('fondo_reserva').disabled=true;
             document.getElementById('fondo_reserva').value='';
        }else{
            document.getElementById('fondo_reserva').disabled=false;
            var fondo_reserva = salary * (8.33/100);
            fondo_reserva =fondo_reserva.toFixed(2);
            document.getElementById('fondo_reserva').value=fondo_reserva;
        } 
        update_total();
    }
    
    function update_decimo3(){
        txtbase = document.getElementById('basic_salary');
        if($('#tercero_acu').is(':checked')){
            document.getElementById('decimo_tercero').disabled =true;
            document.getElementById('decimo_tercero').value='';
        }else{
            document.getElementById('decimo_tercero').disabled =false;
           var salario_base = txtbase.value;
            if(salario_base==''){
                alert('Por favor ingrese el Salario Base.');
                return false;
            }
            var decimo_tercero = parseFloat(salario_base)/12;
            decimo_tercero = decimo_tercero.toFixed(2);
            document.getElementById('decimo_tercero').value=decimo_tercero;
        }
        update_total();
    }
    function update_decimo4(){
        txtunificado = document.getElementById('salario_basico_unificado');
        if($('#cuarto_acu').is(':checked')){
            document.getElementById('decimo_cuarto').disabled =true;
            document.getElementById('decimo_cuarto').value='';
        }else{
            document.getElementById('decimo_cuarto').disabled =false;
           var salario_unificado = txtunificado.value;
            if(salario_unificado==''){
                alert('Por favor ingrese el salario unificado.');
                return false;
            }
            var decimo_cuarto = parseFloat(salario_unificado)/12;
            decimo_cuarto = decimo_cuarto.toFixed(2);
            document.getElementById('decimo_cuarto').value=decimo_cuarto;
        }
        update_total();
    }
    function update_decimo_cuarto(txtunificado){
        if($('#cuarto_acu').is(':checked')){
            document.getElementById('decimo_cuarto').disabled =true;
            document.getElementById('decimo_cuarto').value='';
        }else{
            document.getElementById('decimo_cuarto').disabled =false;
           var salario_unificado = txtunificado.value;
            if(salario_unificado==''){
                alert('Por favor ingrese el salario unificado.');
                return false;
            }
            var decimo_cuarto = parseFloat(salario_unificado)/12;
            decimo_cuarto = decimo_cuarto.toFixed(2);
            document.getElementById('decimo_cuarto').value=decimo_cuarto;
        }
        update_total();
    }
    function remove_calc(){
         document.getElementById('aporte_iess').value='';
         document.getElementById('basic_salary').value='';
         //
         elselect = document.getElementById('aporte_type');
         textoselect = elselect.options[elselect.selectedIndex].innerHTML;
         
         if(textoselect=='Privado'){
             <?php 
             foreach($iess_types as $iess_type) {
                if($iess_type->tipo=='Privado'){
                    echo 'document.getElementById("aporte_iess").value='.$iess_type->porciento;
                }
              }
             ?>
         }else{
             <?php 
             foreach($iess_types as $iess_type) {
                if($iess_type->tipo=='Público'){
                    echo 'document.getElementById("aporte_iess").value='.$iess_type->porciento;
                }
              }
             ?>
         }
         update_total();
    }
</script>
<div class="card mb-4">
  <div id="accordion">
    <div class="card-header with-elements"> <span class="card-header-title mr-2"><?php echo $this->lang->line('xin_setup');?> <?php echo $this->lang->line('xin_payroll_template');?></span>
      <div class="card-header-elements ml-md-auto"> <a class="text-dark collapsed" data-toggle="collapse" href="#add_form" aria-expanded="false">
        <button type="button" class="btn btn-xs btn-outline-primary"> <span class="ion ion-md-add"></span> <?php echo $this->lang->line('xin_add_new');?></button>
        </a> </div>
    </div>
    <div id="add_form" class="collapse add-form" data-parent="#accordion" style="">
      <div class="card-body">
        <?php $attributes = array('name' => 'add_template', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('user_id' => $session['user_id']);?>
        <?php echo form_open('admin/payroll/add_template', $attributes, $hidden);?>
        <div class="bg-white">
          <div class="box-block">
            <div class="row">
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-4">
                    <div class="form-group">
                        
                      <label for="aporte_type">Aporte Patronal(%)  </label>
                      <select onchange="remove_calc();" class="form-control" name="aporte_type" id="aporte_type" data-plugin="select_hrm" data-placeholder="Empleado">
                        <option value="">Seleccione</option>
                        <?php foreach($iess_types as $iess_type) 
                        {
                            if($iess_type->tipo!='Empleado')
                        {
                        ?>
                            <option value="<?php echo $iess_type->porciento;?>"> <?php echo $iess_type->tipo;?></option>
                        <?php 
                         } 
                        } 
                        ?>
                        
                      </select>
                       <?php 
                            foreach($iess_types as $iess_type) {
                                if($iess_type->tipo=='Empleado'){
                                    echo '<input type="hidden" id = "descuento_empleado" value="'.$iess_type->porciento.'">';
                                }
                            }
                        ?>
                      
                    </div>
                  </div>
                      <div class="col-md-4">
                          <div class="form-group">
                      <label for="salario_basico_unificado">Salario Básico Unificado</label>
                      <input class="form-control" onchange="update_decimo_cuarto(this);" placeholder="Salario Básico" name="salario_basico_unificado" id="salario_basico_unificado" type="text">
                    </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                      <label for="template_name"><?php echo $this->lang->line('xin_name_of_template');?></label>
                      <input class="form-control" placeholder="<?php echo $this->lang->line('xin_name_of_template');?>" name="template_name" type="text">
                    </div>
                      </div>
                  </div>
                <div class="row">
                   
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
                      <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <?php foreach($all_companies as $company) {?>
                        <option value="<?php echo $company->company_id;?>"> <?php echo $company->name;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basic_salary" class="control-label"><?php echo $this->lang->line('xin_payroll_basic_salary');?></label>
                      <input onchange="update_iess(this);" class="form-control salary" placeholder="<?php echo $this->lang->line('xin_payroll_basic_salary');?>" id="basic_salary" name="basic_salary" type="text">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="overtime_rate" class="control-label"><?php echo $this->lang->line('xin_payroll_overtime_rate');?></label>
                      <input class="form-control" placeholder="<?php echo $this->lang->line('xin_payroll_overtime_rate');?>" name="overtime_rate" type="text">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="switch">
                              <input id="tercero_acu" onchange="update_decimo3();"  value="1" type="checkbox" name="tercero_acu" class="switch-input" >
                              <span class="switch-label" data-on="SI" data-off="NO"></span>
                              <span class="switch-handle"></span>
                          </label> <label style="display: inline; cursor: pointer;" for="tercero_acu">&nbsp; Décimo 3ro Acumulado</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="switch">
                              <input id="cuarto_acu" value="1" onchange="update_decimo4();" type="checkbox" name="cuarto_acu" class="switch-input" >
                              <span class="switch-label" data-on="SI" data-off="NO"></span>
                              <span class="switch-handle"></span>
                          </label> <label style="display: inline; cursor: pointer;" for="cuarto_acu">&nbsp; Décimo 4to Acumulado</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="fondo_reserva" class="text-success">Fondo de Rserva</label>
                      <input class="form-control salary allowance" id="fondo_reserva" placeholder="Cantidad" name="fondo_reserva" type="text">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="decimo_tercero"  class="text-success">Décimo Tercero</label>
                      <input class="form-control salary allowance" id="decimo_tercero" placeholder="Cantidad" name="decimo_tercero" type="text">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="decimo_cuarto"  class="text-success">Décimo Cuarto</label>
                      <input class="form-control salary allowance" id="decimo_cuarto" placeholder="Decimo cuarto"  name="decimo_cuarto" type="text">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="vacaciones"  class="text-success">Vacaciones</label>
                      <input class="form-control salary allowance"  onchange="update_total();"  placeholder="Vacaciones" id=vacaciones name="vacaciones" type="text">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="bonificacion"  class="text-success">Bonificación Complementaria</label>
                      <input class="form-control salary allowance" onchange="update_total();" id="bonificacion" placeholder="Bonificación Complementaria"  name="bonificacion" type="text">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="aporte_patronal_ing"  class="text-success">Aporte Patronal Ingreso</label>
                      <input class="form-control salary allowance"    placeholder="Aporte Patronal Ingreso" id=aporte_patronal_ing name="aporte_patronal_ing" type="text">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                   <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="switch switch-green">
                              <input id="fondo_acu" onchange="update_fondo();" value="1" type="checkbox" name="fondo_acu" class="switch-input" >
                              <span class="switch-label" data-on="SI" data-off="NO"></span>
                              <span class="switch-handle"></span>
                          </label> <label style="display: inline; cursor: pointer;" for="fondo_acu">&nbsp; Fondo Reserva Acumulado</label>
                    </div>
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="aporte_iess"  class="text-danger">Aporte IESS</label>
                      <input class="form-control deduction"  placeholder="Cantidad" id="aporte_iess" name="aporte_iess" type="text" value="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="quirografario"  class="text-danger">Préstamo Quirografario</label>
                      <input class="form-control deduction" onchange="update_total();" id="quirografario" placeholder="Préstamo Quirografario" name="quirografario" type="text" value="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="hipotecario"  class="text-danger">Préstamos Hipotecarios</label>
                      <input class="form-control deduction"  onchange="update_total();" placeholder="Cantidad" name="hipotecario" id="hipotecario" type="text" value="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="otros_admin"  class="text-danger">Otros Administrativos</label>
                      <input class="form-control deduction" onchange="update_total();"  placeholder="Otros Administrativos" name="otros_admin" id="otros_admin" type="text" value="">
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="anticipos"  class="text-danger">Anticipos</label>
                      <input class="form-control salary allowance" onchange="update_total();" id="anticipos" placeholder="Anticipos"  name="anticipos" type="text">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="aporte_patronal_egre"  class="text-danger">Aporte Patronal Egreso</label>
                      <input class="form-control salary allowance"    placeholder="Aporte Patronal Egreso" id=aporte_patronal_egre name="aporte_patronal_egre" type="text">
                    </div>
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
                      <th class="vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_gross_salary');?> :</th>
                      <td class="hidden-print"><input type="text" name="salario_bruto" readonly id="salario_bruto" class="form-control"></td>
                    </tr>
                    <tr>
                      <th class="vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_total_allowance');?> :</th>
                      <td class="hidden-print"><input type="text" name="total_ingresos" readonly id="total_ingresos" class="form-control"></td>
                    </tr>
                    <tr>
                      <th class="vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_total_deduction');?> :</th>
                      <td class="hidden-print"><input type="text" name="total_egresos" readonly id="total_egresos" class="form-control"></td>
                    </tr>
                    <tr>
                      <th class="vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_net_salary');?> :</th>
                      <td class="hidden-print"><input type="text" name="salario_neto" readonly id="salario_neto" class="form-control"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
</div>
<div class="card">
  <h6 class="card-header"> <?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('left_payroll_templates');?> </h6>
  <div class="card-datatable table-responsive">
    <table class="datatables-demo table table-striped table-bordered" id="xin_table">
      <thead>
        <tr>
          <th><?php echo $this->lang->line('xin_action');?></th>
          <th><?php echo $this->lang->line('left_company');?></th>
          <th><?php echo $this->lang->line('xin_payroll_template');?></th>
          <th><?php echo $this->lang->line('xin_payroll_basic_salary');?></th>
          <th><?php echo $this->lang->line('xin_payroll_net_salary');?></th>
          <th><?php echo $this->lang->line('xin_payroll_total_allowance');?></th>
          <th><?php echo $this->lang->line('xin_created_by');?></th>
          <th><?php echo $this->lang->line('xin_created_date');?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
