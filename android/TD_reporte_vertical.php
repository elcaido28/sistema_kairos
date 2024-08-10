<?php
require 'FPDF/fpdf.php';
class PDF extends FPDF
{

  function Header()
  {
       $nombd="kairoskids_HRM";
    $local="localhost";
    $user="kairoskids_HRM";
    $pass="Reu-mm.25*";
    $id=$_REQUEST['id'];
    $fecha=$_REQUEST['fecha'];
    $con1=mysqli_connect($local,$user,$pass,$nombd) or die("Error al conectar " . mysqli_error());
     $consulta1=mysqli_query($con1,"SELECT *,COMP.name nombre_compa from xin_make_payment MP inner join xin_companies COMP on COMP.company_id=MP.company_id WHERE MP.employee_id = '$id' and MP.created_at like '%".$fecha."%' order by MP.created_at DESC ");
    $row1=mysqli_fetch_array($consulta1);
   $this->image('kairos_logo.png',18,10,47,20);
   $this->SetFont('arial','B',12);
   $this->SetXY(65,10);
 $this->Cell(60,6,$row1['nombre_compa'],0,1,'L');
 $this->SetFont('arial','',10);
  $this->SetXY(65,16);
  date_default_timezone_set('America/Guayaquil');
  $fecha_ac=date('Y-m-d');
 $this->Cell(95,6,utf8_decode('Email : '.$row1['email'].' | Telefono : '.$row1['contact_number'].' | Fecha Imp.: '.$fecha_ac),0,1,'L');
  $this->SetXY(65,22);
 $this->Cell(105,6,utf8_decode('Dirección : '.$row1['address_1'].', Guayaquil - 090510, Ecuador'),0,1,'L');
 $this->SetXY(17,30);
  $this->Cell(183,2,utf8_decode(''),'T',1,'L');
 
  }
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('arial','I',8);
    $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
