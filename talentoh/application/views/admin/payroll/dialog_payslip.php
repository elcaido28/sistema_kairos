<?php

defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['emp_id']) && $_GET['data']=='pay_payment' && $_GET['type']=='pay_payment'){ ?>
<?php
$grade_template = $this->Payroll_model->read_template_information($monthly_grade_id);
$hourly_template = $this->Payroll_model->read_hourly_wage_information($hourly_grade_id);
$payment_month = strtotime($payment_date);
$p_month = date('F Y',$payment_month);
if($payment_method==1){
  $p_method = 'Tarjeta de Crédito';
} else if($payment_method==4){
  $p_method = 'Transferencia Bancaria';
} else if($payment_method==5) {
  $p_method = 'Cheque';
} else {
  $p_method = 'Efectivo';
}
?>
<?php
if($profile_picture!='' && $profile_picture!='no file') {
	$u_file = base_url().'uploads/profile/'.$profile_picture;
} else {
	if($gender=='Male') { 
		$u_file = base_url().'uploads/profile/default_male.jpg';
	} else {
		$u_file = base_url().'uploads/profile/default_female.jpg';
	}
} ?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">x</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_salary_details_of');?> <?php echo $p_month;?></h4>
</div>
<div class="modal-body">
  <div class="row row-md">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-uppercase"><b><?php echo $first_name.' '.$last_name;?></b></div>
        <div class="bg-white product-view">
          <div class="box-block">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="pv-images mb-sm-0"> <img class="img-fluid" src="<?php echo $u_file;?>" alt=""> </div>
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
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('xin_salary_month');?>: </strong></label>
                <?php echo $p_month;?> </div>
            </div>
            <?php if($salario_bruto):?>
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('xin_payroll_gross_salary');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($salario_bruto);?> </div>
            </div>
            <?php endif;?>
            <?php if($overtime_rate!=0 || $overtime_rate!=''):?>
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('xin_overtime_per_hour');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($overtime_rate);?> </div>
            </div>
            <?php endif;?>
            <?php if($hourly_rate):?>
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('xin_payroll_hourly_rate');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($hourly_rate);?> </div>
            </div>
            <?php endif;?>
            <?php if($total_hours_work):?>
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('xin_total_hours_worked');?>: </strong></label>
                <?php echo $total_hours_work;?></div>
            </div>
            <?php endif;?>
            <?php if($is_payment==1):?>
            <div class="col-md-12">
              <div class="f">
                <label for="name" class="control-label" style="text-align:right;"><strong><?php echo $this->lang->line('dashboard_xin_status');?>: </strong></label>
                <span class="tag tag-success"><?php echo $this->lang->line('xin_payment_paid');?></span></div>
            </div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
    <?php if($decimo_tercero!='' || $decimo_cuarto!='' || $fondo_reserva!='' || $vacaciones!=''): ?>
    <div class="col-sm-6 col-xs-6">
      <div class="card">
        <div class="card-header text-uppercase"><b> Total Ingresos</b> </div>
        <div class="card-block">
          <blockquote class="card-blockquote">
            <div class="row m-b-1">
              <?php if($decimo_tercero!='' || $decimo_tercero!=0): ?>
              <div class="col-md-12">
                <div class="f">
                  <label for="name"><strong>Décimo Tercero: </strong></label>
                  <?php echo $this->Xin_model->currency_sign($decimo_tercero);?> </div>
              </div>
              <?php endif;?>
              <?php if($decimo_cuarto!='' || $decimo_cuarto!=0): ?>
              <div class="col-md-12">
                <div class="f">
                  <label for="name"><strong>Décimo Cuarto: </strong></label>
                  <?php echo $this->Xin_model->currency_sign($decimo_cuarto);?> </div>
              </div>
              <?php endif;?>
              <?php if($fondo_reserva!='' || $fondo_reserva!=0): ?>
              <div class="col-md-12">
                <div class="f">
                  <label for="name"><strong>Fondo de Reserva: </strong></label>
                  <?php echo $this->Xin_model->currency_sign($fondo_reserva);?> </div>
              </div>
              <?php endif;?>
              <?php if($vacaciones!='' || $vacaciones!=0): ?>
              <div class="col-md-12">
                <div class="f">
                  <label for="name"><strong>Vacaciones: </strong></label>
                  <?php echo $this->Xin_model->currency_sign($vacaciones);?> </div>
              </div>
              <?php endif;?>
              <?php if($bonificacion!='' || $bonificacion!=0): ?>
              <div class="col-md-12">
                <div class="f">
                  <label for="name"><strong>Bonificación: </strong></label>
                  <?php echo $this->Xin_model->currency_sign($bonificacion);?> </div>
              </div>
              <?php endif;?>
            </div>
          </blockquote>
        </div>
      </div>
    </div>
    <?php endif;?>
    <?php if($aporte_iess!='' || $hipotecario!='' || $quirografario!=''): ?>
    <div class="col-sm-6 col-xs-6">
      <div class="card">
        <div class="card-header text-uppercase"><b> Total Descuentos</b></div>
        <div class="card-block">
          <div class="row m-b-1">
            <?php if($aporte_iess!='' || $aporte_iess!=0): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payroll_provident_fund_de');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($aporte_iess);?> </div>
            </div>
            <?php endif;?>
            <?php if($hipotecario!='' || $hipotecario!=0): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong>Préstamo Hipotecario: </strong></label>
                <?php echo $this->Xin_model->currency_sign($hipotecario);?> </div>
            </div>
            <?php endif;?>
            <?php if($quirografario!='' || $quirografario!=0): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong>Préstamos Quirografarios: </strong></label>
                <?php echo $this->Xin_model->currency_sign($quirografario);?> </div>
            </div>
            <?php endif;?>
            <?php if($otros_admin!='' || $otros_admin!=0): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong>Otros Administrativos: </strong></label>
                <?php echo $this->Xin_model->currency_sign($otros_admin);?> </div>
            </div>
            <?php endif;?>
            <?php if($advance_salary_amount!='' || $advance_salary_amount!=0): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong>Anticipos: </strong></label>
                <?php echo $this->Xin_model->currency_sign($advance_salary_amount);?> </div>
            </div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
    <?php endif;?>
    <?php if(($decimo_tercero!='' || $decimo_cuarto!='' || $fondo_reserva!='' || $vacaciones!='') && ($aporte_iess!='' || $hipotecario!='' || $quirografario!='')){
		$col_sm = 'col-sm-12';
		$offset = 'offset-2md-3';
	} else {
		$col_sm = 'col-sm-12';
		$offset = '';
	}?>
    <div class="<?php echo $col_sm;?> col-xs-12 <?php echo $offset;?>">
      <div class="card">
        <div class="card-header text-uppercase"><b> <?php echo $this->lang->line('xin_payroll_total_salary_details');?></b></div>
        <div class="card-block">
          <div class="row m-b-1">
            <?php if($salario_bruto): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payroll_gross_salary');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($salario_bruto);?> </div>
            </div>
            <?php endif;?>
            <?php if($total_ingresos): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payroll_total_allowance');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($total_ingresos);?> </div>
            </div>
            <?php endif;?>
            <?php if($total_egresos!=''): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payroll_total_deduction');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($total_egresos);?> </div>
            </div>
            <?php endif;?>
            <?php if($salario_neto!=''): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payroll_net_salary');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($salario_neto);?> </div>
            </div>
            <?php endif;?>
            <?php if($is_advance_salary_deduct==1): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_advance_deducted_salary');?>: </strong></label>
                <?php echo $this->Xin_model->currency_sign($advance_salary_amount);?> </div>
            </div>
            <?php endif;?>
            <?php if($salario_neto!=''): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_paid_amount');?>: </strong></label>
                <?php if($is_advance_salary_deduct==1): ?>
                <?php $re_paid_amount = $salario_neto - $advance_salary_amount;?>
                <?php else:?>
                <?php $re_paid_amount = $salario_neto;?>
                <?php endif;?>
                <?php echo $this->Xin_model->currency_sign($payment_amount);?> </div>
            </div>
            <?php endif;?>
            <?php if($total_hours_work): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payroll_gross_salary');?>: </strong></label>
                <?php 
				$gsalary = $total_hours_work * $hourly_rate;
				echo $this->Xin_model->currency_sign($gsalary);?>
              </div>
            </div>
            <?php endif;?>
            <?php if($total_hours_work): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payroll_net_salary');?>: </strong></label>
                <?php 
				$hrs_salary = $total_hours_work * $hourly_rate;
				echo $this->Xin_model->currency_sign($hrs_salary);?>
              </div>
            </div>
            <?php endif;?>
            <?php if($total_hours_work): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_paid_amount');?>: </strong></label>
                <?php 
				$hrs_sal = $total_hours_work * $hourly_rate;
				echo $this->Xin_model->currency_sign($hrs_sal);?>
              </div>
            </div>
            <?php endif;?>
            <?php if($salario_neto): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payment_method');?>: </strong></label>
                <?php echo $p_method;?></div>
            </div>
            <?php endif;?>
            <?php if($salario_neto!=''): ?>
            <div class="col-md-12">
              <div class="f">
                <label for="name"><strong><?php echo $this->lang->line('xin_payment_comment');?>: </strong></label>
                <?php echo $comments;?></div>
            </div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }


