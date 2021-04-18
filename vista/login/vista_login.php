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
    <title>Document</title>
</head>
<body>
 <h1>Bienvenido <?php echo "$name"; ?></h1>
  <h3>¿Que desea hacer?</h3>
   
    <form method="post" action="../requerimiento/radicarRequerimiento.php"> 
    <input type="submit" name="btn" value="Registrar Requerimiento">
    <input type="hidden" name="Id_empleado"  value="<?php echo "$ID_EMPLEADO"; ?>">
      </form>

      <br>
      <br>
 
      <form method="post" action=""> 
    <input type="submit" name="btn" value="Cerrar Sección">
      </form>
</body>
</html>