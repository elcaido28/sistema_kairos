<?php
 session_start();

$nombd="kairoskids_HRM";
$local="localhost";
$user="kairoskids_HRM";
$pass="Reu-mm.25*";
$con=mysqli_connect($local,$user,$pass,$nombd) or die("Error al conectar " . mysqli_error());
$id=$_REQUEST['id'];
$consulta=mysqli_query($con,"SELECT * from xin_employees where user_id='$id'");
$row=mysqli_fetch_assoc ($consulta);

  $employee_id=$row['employee_id'];
  $office_shift_id=$row['office_shift_id'];
  $first_name=$row['first_name'];
  $last_name=$row['last_name'];
  $username=$row['username'];

  $correo=$_POST['correo'];

  $password=$row['password'];
  $clave=$row['clave'];

  $fec_naci=$_POST['Fnaci'];

  $gender=$row['gender'];
  $e_status=$row['e_status'];
  $user_role_id=$row['user_role_id'];
  $department_id=$row['department_id'];
  $designation_id=$row['designation_id'];
  $company_id=$row['company_id'];
  $salary_template=$row['salary_template'];
  $hourly_grade_id=$row['hourly_grade_id'];
  $monthly_grade_id=$row['monthly_grade_id'];
  $date_of_joining=$row['date_of_joining'];
  $date_of_leaving=$row['date_of_leaving'];
  $marital_status=$row['marital_status'];
   $salary=$row['salary'];

  $ubicacion=$_POST['ubi'];
  
  if($_FILES["image"]["name"]==""){
      $foto=$row['profile_picture'];
  }else{
  $foto=$_FILES["image"]["name"];
  $ruta=$_FILES["image"]["tmp_name"];
  $destino="../talentoh/uploads/profile/".$foto;
  copy($ruta,$destino);
  }

  $profile_background=$row['profile_background'];
  $resume=$row['resume'];
  $skype_id=$row['skype_id'];

    $telefono=$_POST['tele'];

  $facebook_link=$row['facebook_link'];
  $twitter_link=$row['twitter_link'];
  $blogger_link=$row['blogger_link'];
  $linkdedin_link=$row['linkdedin_link'];
  $google_plus_link=$row['google_plus_link'];
  $instagram_link=$row['instagram_link'];
  $pinterest_link=$row['pinterest_link'];
  $youtube_link=$row['youtube_link'];
  $is_active=$row['is_active'];
  $last_login_date=$row['last_login_date'];
  $last_logout_date=$row['last_logout_date'];
  $last_login_ip=$row['last_login_ip'];
  $is_logged_in=$row['is_logged_in'];
  $online_status=$row['online_status'];
  $created_at=$row['created_at'];


  $ingreso=mysqli_query($con,"UPDATE xin_employees SET user_id='$id',employee_id='$employee_id',office_shift_id='$office_shift_id',first_name='$first_name',last_name='$last_name',username='$username',email='$correo',password='$password',clave='$clave',date_of_birth='$fec_naci',
    gender='$gender',e_status='$e_status',user_role_id='$user_role_id',department_id='$department_id',designation_id='$designation_id',company_id='$company_id',salary_template='$salary_template',hourly_grade_id='$hourly_grade_id',
    monthly_grade_id='$monthly_grade_id',date_of_joining='$date_of_joining',date_of_leaving='$date_of_leaving',marital_status='$marital_status',salary='$salary',address='$ubicacion',profile_picture='$foto',profile_background='$profile_background',
    resume='$resume',skype_id='$skype_id',contact_no='$telefono',facebook_link='$facebook_link',twitter_link='$twitter_link',blogger_link='$blogger_link',linkdedin_link='$linkdedin_link',google_plus_link='$google_plus_link',instagram_link='$instagram_link',pinterest_link='$pinterest_link',
    youtube_link='$youtube_link',is_active='$is_active',last_login_date='$last_login_date',last_logout_date='$last_logout_date',last_login_ip='$last_login_ip', is_logged_in='$is_logged_in',online_status='$online_status',created_at='$created_at' where user_id='$id' ") or die ("error".mysqli_error());
 
 $_SESSION['avisos']='1';
 

  mysqli_close($con);
  
  header("Location:ingreso_perfil.php?id=$id");
 ?>
