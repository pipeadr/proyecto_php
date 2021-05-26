<?php
session_start();
$a = $_SESSION['Usuarios'];
//var_dump($a['IDEMPLEADO']);
 if(isset($a)) {
    // $b = $a['Nombre_Cargo'];
    //  if($b == "Empleado") {
    //   echo '<script type="text/javascript">';
    //   echo 'alert("Usted no tiene permiso ver esta página");';
    //   echo 'window.location="../../vista/login/login.php";';
    //   echo '</script>';
    // //   header('Location: login.php');       
    //  }
 } else {
    echo '<script type="text/javascript">';
    echo 'alert("Debe Iniciar Sesión primero");';
    echo 'window.location="../../vista/login/login.php";';
    echo '</script>';
 }
 include '../../controlador/controlconexion.php';
include '../../controlador/ControlDetalleReq.php';
include '../../modelo/requerimineto/DetalleReq.php';
$fkEmpleadoAgignado = $a['IDEMPLEADO'];
$dba = new controlconexion();
$dba->abrirBd("localhost","root","","mesa_ayuda");
$comandoSqla = "SELECT detalle.IDDETALLE, detalle.FECHA, detalle.OBSERVACION, detalle.FKREQ, detalle.FKEMPLE AS minombre,
req.FKAREA,
ar.NOMBRE AS NOMBRE_AREA,
esta.NOMBRE AS NOMBRE_ESTADO,
per.NOMBRE AS NOMBRE_PERSONAL
FROM detallereq detalle
INNER JOIN requerimiento req
INNER JOIN area ar ON req.FKAREA = ar.IDAREA AND detalle.FKREQ = req.IDREQ 
INNER JOIN estado esta ON detalle.FKESTADO = esta.IDESTADO 
INNER JOIN empleado per ON detalle.FKEMPLE = per.IDEMPLEADO
WHERE detalle.FKEMPLE = '".$fkEmpleadoAgignado."'";
$rsa = $dba->ejecutarSelect($comandoSqla);
$registrosa = $rsa->fetch_all(MYSQLI_ASSOC);
$dba->cerrarBd();
// var_dump($registrosa);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Requerimientos</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<center>
     <h1>Requerimientos</h1>
     <div class="table_re">
     <table class ="tabla_empleados">
     <thead>
     <tr>
     <th>ID</th>
     <th>Fecha</th>
     <th>Observación</th>
     <th>Área</th>
     <th>Estado</th>
     <th>Mi nombre</th>
     <!-- <th>Encargado</th> -->
     </tr>
     </thead>
    
     <?php foreach($registrosa as $regi) {?>
     <tr>
      <td><?php echo $regi["IDDETALLE"];  ?></td>
      <td><?php echo $regi["FECHA"];  ?></td>
      <td><?php echo $regi["OBSERVACION"];  ?></td>
      <td><?php echo $regi["NOMBRE_AREA"];  ?></td>
      <td><?php echo $regi["NOMBRE_ESTADO"];  ?></td>
      <td><?php echo $regi["NOMBRE_PERSONAL"];  ?></td>
      <!-- <td><?php echo $regi["NOMBRE_JEFE"];  ?></td> -->
     </tr>
      <?php }?>
  
     </table>
     
</body>
<script src="https://kit.fontawesome.com/176c817b83.js" crossorigin="anonymous"></script>
</html>