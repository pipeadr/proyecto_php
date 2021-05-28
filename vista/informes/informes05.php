<?php
 session_start();
 $a = $_SESSION['Usuarios'];
 //var_dump($a);
  if(isset($a)) {
     $b = $a['Nombre_Cargo'];
      if($b != "Administrador") {
       echo '<script type="text/javascript">';
       echo 'alert("Usted no tiene permiso ver esta página");';
       echo 'window.location="../../vista/login/login.php";';
       echo '</script>';
     //   header('Location: login.php');       
      }
  } else {
     echo '<script type="text/javascript">';
     echo 'alert("Debe Iniciar Sesión primero");';
     echo 'window.location="../../vista/login/login.php";';
     echo '</script>';
  }
include '../../controlador/controlconexion.php';
include '../../modelo/empleado/empleado.php';
include '../../controlador/controlempleado.php'; 
$db = new controlconexion();
$db->abrirBd("localhost","root","","mesa_ayuda");
$comandoSql = "SELECT detalle.IDDETALLE, detalle.FECHA, detalle.OBSERVACION, detalle.FKREQ,
req.FKAREA,
ar.NOMBRE AS NOMBRE_AREA,
esta.NOMBRE AS NOMBRE_ESTADO,
per.NOMBRE AS NOMBRE_PERSONAL,
jef.NOMBRE AS NOMBRE_JEFE
FROM detallereq detalle
INNER JOIN requerimiento req
INNER JOIN area ar ON req.FKAREA = ar.IDAREA AND detalle.FKREQ = req.IDREQ 
INNER JOIN estado esta ON detalle.FKESTADO = esta.IDESTADO 
INNER JOIN empleado per ON detalle.FKEMPLE = per.IDEMPLEADO
INNER JOIN empleado jef ON detalle.FKEMPLEASIGNADO = jef.IDEMPLEADO
WHERE detalle.FKESTADO != 4
ORDER BY detalle.IDDETALLE";
$rs = $db->ejecutarSelect($comandoSql);
$registros = $rs->fetch_all(MYSQLI_ASSOC);
// var_dump($registros);
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
<?php include("../../header.php");?>
<body>
<center>
     <h1>Informe #5</h1>
     <div class="table_re">
     <table class ="tabla_empleados">
     <thead>
     <tr>
       <th>ID</th>
       <th>Nombre Encargado</th>
       <th>Fecha Radicado</th>
       <th>Estado</th>
     </tr>
     </thead>
    
     <?php foreach($registros as $registro) {?>
     <tr>
      <td><?php echo $registro["IDDETALLE"];  ?></td>
      <td><?php echo $registro["NOMBRE_JEFE"];  ?></td>
      <td><?php echo $registro["FECHA"];  ?></td>
      <td><?php echo $registro["NOMBRE_ESTADO"];  ?></td>
     </tr>
      <?php }?>
     </table>
     <br>
     <br>
     <a class="botones" href="informes.php">Volver</a>
     
</body>
<script src="https://kit.fontawesome.com/176c817b83.js" crossorigin="anonymous"></script>
</html>