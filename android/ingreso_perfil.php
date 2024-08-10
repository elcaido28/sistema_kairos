
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
      
    <link rel="stylesheet" href="estilo.css">
        <link rel="stylesheet" href="sweetalert2.min.css">
      <script src="jquery.js" charset="utf-8"></script>
      <script src="sweetalert2.min.js" charset="utf-8"></script>
    <title></title>
  </head>
  <body>
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

      $nom=$row['first_name'];
      $apelli=$row['last_name'];
      $nomusus=$row['username'];
      $imagen=$row['profile_picture'];
      $ubicacion=$row['address'];
      $mail=$row['email'];
      $telefono=$row['contact_no'];
      $cumple=$row['date_of_birth'];
          ?>
    <div class="">
      <form class="fromulario" action="guardar_perfil.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <div class="divs">
        <label for="" class="etiq">Nombres</label>
        <input type="text" class="cajas" name="nombre" disabled value="<?php echo $nom; ?>">
        <label for="" class="etiq">Apellidos</label>
        <input type="text" class="cajas"  name="cargo" disabled value="<?php echo $apelli; ?>">
        <label for="" class="etiq">Nombre Usuario</label>
        <input type="text" class="cajas"  name="area" disabled value="<?php echo $nomusus; ?>">
        </div>
        <div class="divs2">
          <img src="<?php if(isset($imagen)){ echo "../talentoh/uploads/profile/".$imagen; }else{ echo "logo_foto.jpg";} ?>" id="img1" alt="" width="170" height="180">
          <input type="file" class="cajasimg" name="image" id="input1" accept="image/png, .jpeg, .jpg">
         
        </div>
        
        <div class="divs3">
          <label for="" class="etiq2">Dirección</label>
          <input type="text" class="cajas2"  name="ubi" value="<?php echo $ubicacion; ?>" >
          <label for="" class="etiq2">Email</label>
          <input type="email" class="cajas2"  name="correo" value="<?php echo $mail; ?>">
          <label for="" class="etiq2">Telefono</label>
          <input type="number" class="cajas2" maxlength="10" name="tele" id="tele" value="<?php echo $telefono; ?>" >
          <label for="" class="etiq2">Fecha de nacimiento</label>
          <input type="date" class="cajas2" id="fechan" name="Fnaci" onchange="validaf(this.value);" value="<?php echo $cumple; ?>">
        </div>
        
        <div class="divs4">
          <input type="submit" class="bto" name="" value="ACTUALIZAR">
        </div>
      </form>
<?php if($_SESSION['avisos']=='1'){ ?>
<script type="text/javascript">
 Swal.fire("La información fué ACTUALIZADA");
</script>
<?php $_SESSION['avisos']=0; } $_SESSION['avisos']=0; ?>



    <script type="text/javascript">
      (function(){
        function vista1(input){
          if(input.files && input.files[0]){
            var dato = new FileReader();

            dato.onload = function(e){
            //  $("#imgdiv").html("<img src='"+e.target.result+"' />");
              $("#img1").attr("src",""+e.target.result+"");
            }

            dato.readAsDataURL(input.files[0]);
          }
        }
        $("#input1").change(function(){
          vista1(this);
        });
      })();
</script>
<script type="text/javascript">
function validaf(){
var fecha_na=document.getElementById('fechan').value;
var f = new Date();
var dd = f.getDate();
var mm = f.getMonth()+1;
var yyyy = f.getFullYear();
if(dd<10) {
    dd='0'+dd;
} 
if(mm<10) {
    mm='0'+mm;
} 
var fecha_act = yyyy+'-'+mm+'-'+dd;

if(fecha_act <= fecha_na){

    document.getElementById('fechan').value="";
    Swal.fire(fecha_na+"  fecha no valida porfavor vuelva a intentarlo");
}
}
    
</script>


<script type="text/javascript">
$(document).on('keyup','#tele', function(){
  var tele = document.getElementById('tele').value;
  array = tele.split( "" );
if(array.length>10) {
    var cadena=tele.substr(0,10)
    document.getElementById('tele').value=cadena;
}
});
</script>

    </div>

  </body>
</html>
