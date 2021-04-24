<?php

include '../../modelo/empleado/empleado.php';
include '../../controlador/controlempleado.php';
include '../../controlador/controlconexion.php'; 

$ID_EMPLEADO = $_POST["txtEmpleado"];
$PASSWORD = $_POST["txtContrasena"];

$db = new controlconexion();
$db->abrirBd("localhost","root","","mesa_ayuda");
// cnslta_ln = consulta login 
$cnslta_ln = "select * from empleado where IDEMPLEADO = '".$ID_EMPLEADO."' and PASSWORD ='".$PASSWORD."'";
$rs4 = $db->ejecutarSelect($cnslta_ln);
$cnsltas_lgn = $rs4->fetch_array(MYSQLI_BOTH); 

   $ID_em = $cnsltas_lgn["IDEMPLEADO"];
   $name = $cnsltas_lgn["NOMBRE"]; 
   //$pass_em = $cnsltas_lgn["PASSWORD"];
   $db->cerrarBd();
   if(($ID_EMPLEADO === $cnsltas_lgn["IDEMPLEADO"] ) && ($PASSWORD === $cnsltas_lgn["PASSWORD"]))
   {
    echo '';
   } else {
    echo '<script type="text/javascript">'
    , 'alert("La contraseña o el Código del empleado no son correctos, intente nuevamente");'
    , '</script>'; 
   
    header('Location: login.php');     
      
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido <?php echo "$name"; ?></title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php include("../../header.php");?>
 <div class="home">
 <h1 class="title-home">Bienvenido <?php echo "$name"; ?></h1>
  <h3 class="sub-title">¿Que desea hacer?</h3>
   
    <div class="padre">
    <form class="hijo" method="post" action="../requerimiento/radicarRequerimiento.php"> 
    <input class="botones"  type="submit" name="btn" value="Registrar Requerimiento">
    <input class="botones" type="hidden" name="Id_empleado"  value="<?php echo "$ID_EMPLEADO"; ?>">
      </form>

     <a class="botones" href="../empleado/empleado.php">Editar Empleados</a> <br>
     <a  class="botones" href="../area/area.php">Editar Áreas</a>
     <a class="botones" href="../requerimiento/mostrarrequerimineto.php">Editar Requerimientos</a>
      <form method="post" action="" class="hijo"> 
    <input class="botones"  type="submit" name="btn" value="Cerrar Sección">
      </form>
    </div>

 </div>
</body>
</html>