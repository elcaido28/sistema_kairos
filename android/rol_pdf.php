<?php
include('TD_reporte_vertical.php');

 $nombd="kairoskids_HRM";
    $local="localhost";
    $user="kairoskids_HRM";
    $pass="Reu-mm.25*";
    $con=mysqli_connect($local,$user,$pass,$nombd) or die("Error al conectar " . mysqli_error());
     $id=$_REQUEST['id'];
     $fecha=$_REQUEST['fecha'];
     $consulta=mysqli_query($con,"SELECT *, E.employee_id cedula,MP.created_at f_genera,MP.payment_date fecha_genera_rol,MP.make_payment_id id_genera_rol from xin_make_payment MP inner join xin_employees E on E.user_id=MP.employee_id  inner join xin_departments D on D.department_id=MP.department_id inner join xin_designations DS on DS.designation_id=MP.designation_id WHERE MP.employee_id = '$id' and MP.created_at like '%".$fecha."%' order by MP.created_at DESC ");
    $row=mysqli_fetch_array($consulta);
$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
// TITULOS DEL ROL

$pdf->SetFont('arial','B',16);
$pdf->SetXY(17,33);
$pdf->Cell(180,6,utf8_decode('Rol de Pago'),0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)
$pdf->SetFont('arial','B',10);
$pdf->SetXY(17,39);
$pdf->Cell(180,6,utf8_decode('Rol de Pago Nº: #'.$row['id_genera_rol']),0,1,'C');
$pdf->SetXY(20,45);
$pdf->Cell(80,6,utf8_decode('Fecha: '),0,0,'R');
setlocale(LC_TIME, 'es_EC.UTF-8');
//$originalDate=$row['f_genera'];
$originalDate2=$row['fecha_genera_rol'];
//setlocale(LC_ALL, 'es_EC'); para la fecha en español pero sale en minuscula
//$newDate =strftime("%d %B, %Y",strtotime($originalDate));
$newDate2 =strftime("%B, %Y",strtotime($originalDate2));
//$newDate3 =date("d-m-Y H:i:s",strtotime($originalDate));
$pdf->Cell(100,6,$newDate2,0,1,'L');

//  DATOS DEL USUARIO

$y=$pdf->GetY();
$pdf->SetXY(17,$y+2);
$pdf->SetFont('arial','B',10);
$pdf->Cell(45,10,utf8_decode("Nombres"),1,0,'L');
$pdf->Cell(45,5,$row['first_name'],'LTR',0,'L');
$pdf->SetXY(62,$y+7);
$pdf->MultiCell(45,5,$row['last_name'],'LBR','L',0);
$pdf->SetXY(107,$y+2);
$pdf->Cell(45,10,utf8_decode("Cedula"),1,0,'L');
$pdf->Cell(45,10,utf8_decode($row['cedula']),1,1,'L');
$y=$pdf->GetY();
$pdf->SetXY(40,$y);
$y=$pdf->GetY();
$y3=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->SetFont('arial','B',8);
$pdf->Cell(45,10,utf8_decode("Departamento"),1,0,'L');

$pdf->SetXY(62,$y);
$pdf->MultiCell(45,5,$row['department_name'],'LR','L',0);
$pdf->SetXY(107,$y);
$pdf->Cell(45,10,utf8_decode("Cargo"),1,0,'L');
$pdf->SetXY(152,$y);
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(45,5,$row['designation_name'],'LR','L',0);
$pdf->SetXY(197,$y);
$pdf->Cell(2,10,'','L',1,'C');
$pdf->SetXY(17,$y3+10);
$pdf->Cell(180,2,'','T',1,'C');

//$y=$pdf->GetY();
//$pdf->SetXY(17,$y);
//$pdf->SetFont('arial','B',10);
//$pdf->Cell(45,10,utf8_decode("Mes de Salario"),1,0,'L');
//$pdf->Cell(45,10,$newDate2,1,0,'L');
//$pdf->Cell(45,10,utf8_decode("Rol de Pago Nº"),1,0,'L');
//$pdf->Cell(45,10,utf8_decode($row['make_payment_id']),1,1,'L');
$pdf->Cell(25,3,'',0,1,'C');

// DATOS DE INGRESOS Y EGRESOS DETALLADO

$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(0, 255, 59,0.9);
$pdf->Cell(45,10,utf8_decode("Total Ingresos"),1,0,'L',true);
$pdf->Cell(44,10,utf8_decode('Monto'),1,0,'R',true);
$pdf->Cell(2,10,'',0,0,'C');
$pdf->SetFillColor(252, 27, 27,0.9);
$pdf->Cell(44,10,utf8_decode("Total Descuentos"),1,0,'L',true);
$pdf->Cell(45,10,utf8_decode('Monto'),1,1,'R',true);
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->SetFont('arial','B',10);
$pdf->Cell(45,10,utf8_decode("Décimo Tercero"),1,0,'L');
$pdf->Cell(44,10,utf8_decode("$ ".$row['decimo_tercero']),1,0,'R'); 
$pdf->Cell(2,10,'',0,0,'C');
$pdf->Cell(44,10,utf8_decode("Aportación IESS"),1,0,'L');
$pdf->Cell(45,10,utf8_decode("$ ".$row['aporte_iess']),1,1,'R');
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->SetFont('arial','B',10);
$pdf->Cell(45,10,utf8_decode("Décimo Cuarto"),1,0,'L');
$pdf->Cell(44,10,utf8_decode("$ ".$row['decimo_cuarto']),1,0,'R');
$pdf->Cell(2,10,'',0,0,'C');
$pdf->Cell(44,10,utf8_decode("Prést. Hipotecarios"),1,0,'L');
$pdf->Cell(45,10,utf8_decode("$ ".$row['hipotecario']),1,1,'R');
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->SetFont('arial','B',10);
$pdf->Cell(45,10,utf8_decode("Fondo de Reserva"),1,0,'L');
$pdf->Cell(44,10,utf8_decode("$ ".$row['fondo_reserva']),1,0,'R');
$pdf->Cell(2,10,'',0,0,'C');
$pdf->Cell(44,10,utf8_decode("Prést. Quirografario"),1,0,'L');
$pdf->Cell(45,10,utf8_decode("$ ".$row['quirografario']),1,1,'R');
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->SetFont('arial','B',10);
$pdf->Cell(45,10,utf8_decode("Vacaciones"),1,0,'L');
$pdf->Cell(44,10,utf8_decode("$ ".$row['vacaciones']),1,0,'R');
$pdf->Cell(2,10,'',0,0,'C');
$pdf->Cell(44,10,utf8_decode("Otras Admin"),1,0,'L');
$pdf->Cell(45,10,utf8_decode("$ ".$row['otros_admin']),1,1,'R');
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->SetFont('arial','B',10);
$pdf->Cell(45,10,utf8_decode("Bonificación"),1,0,'L');
$pdf->Cell(44,10,utf8_decode("$ ".$row['bonificacion']),1,0,'R');
$pdf->Cell(2,10,'',0,0,'C');
$pdf->Cell(44,10,utf8_decode("Anticipo"),1,0,'L');
$pdf->Cell(45,10,utf8_decode("$ ".$row['anticipos']),1,1,'R');


//  ROL DEL PAGO 
$pdf->Cell(25,5,'',0,1,'C');
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->SetFillColor(171, 201, 231,0.9);
$pdf->Cell(180,10,'Detalles del Pago',1,1,'C',true);
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->Cell(90,10,'Salario Base',1,0,'L'); $pdf->Cell(90,10,utf8_decode('$ '.$row['basic_salary']),1,1,'R');
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->Cell(90,10,'',1,0,'L'); $pdf->Cell(45,10,utf8_decode('Salario Bruto'),1,0,'L'); $pdf->Cell(45,10,utf8_decode('$ '.$row['salario_bruto']),1,1,'R');
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->Cell(90,10,'',1,0,'L'); $pdf->Cell(45,10,utf8_decode('Total Ingresos'),1,0,'L'); $pdf->Cell(45,10,utf8_decode('$ '.$row['total_ingresos']),1,1,'R');
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->Cell(90,10,'',1,0,'L'); $pdf->Cell(45,10,utf8_decode('Total Descuentos'),1,0,'L'); $pdf->Cell(45,10,utf8_decode('$ '.$row['total_egresos']),1,1,'R');
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->Cell(90,10,'',1,0,'L'); $pdf->Cell(45,10,utf8_decode('Salario Neto'),1,0,'L'); $pdf->Cell(45,10,utf8_decode('$ '.$row['salario_neto']),1,1,'R');
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
$pdf->Cell(90,10,'',1,0,'L'); $pdf->Cell(45,10,utf8_decode('Cantidad Pagada'),1,0,'L'); $pdf->Cell(45,10,utf8_decode('$ '.$row['salario_neto']),1,1,'R');
$y=$pdf->GetY();
$pdf->SetXY(17,$y);
if($row['payment_method']=="1"){
$meto_pago="Online";
}else if($row['payment_method']=="2"){
$meto_pago="PayPal";
}else if($row['payment_method']=="3"){
$meto_pago="Payoneer";
}else if($row['payment_method']=="4"){
$meto_pago="Trasferencia Bancaria";
}else if($row['payment_method']=="5"){
$meto_pago="Cheque";
}else{
 $meto_pago="Efectivo";
}
$pdf->Cell(90,10,'',1,0,'L'); $pdf->Cell(45,10,utf8_decode('Metodo de Pago'),1,0,'L'); $pdf->Cell(45,10,utf8_decode($meto_pago),1,1,'R');  
$y=$pdf->GetY();
$pdf->SetXY(17,$y+10);
$pdf->Cell(80,3,'_______________________',0,0,'C'); $pdf->Cell(45,3,utf8_decode(''),0,0,'L'); $pdf->Cell(45,3,utf8_decode('_______________________'),0,1,'C');
$pdf->SetXY(17,$y+15);
$pdf->Cell(80,10,'Elaborado por: ',0,0,'C'); $pdf->Cell(45,10,utf8_decode(''),0,0,'L'); $pdf->Cell(45,10,utf8_decode('Autorizado por:'),0,1,'C');
$y=$pdf->GetY();
$pdf->SetXY(95,$y);
$pdf->Cell(30,3,'_______________________',0,1,'C'); 
$pdf->SetXY(95,$y+5);
$pdf->Cell(30,5,utf8_decode('Recibí Conforme: '),0,1,'C'); 
$y=$pdf->GetY();
$pdf->SetXY(80,$y);
$pdf->Cell(60,7,utf8_decode($row['first_name']." ".$row['last_name']),0,1,'C'); 


/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
