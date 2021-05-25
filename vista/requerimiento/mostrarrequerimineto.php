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
include '../../controlador/ControlDetalleReq.php';
include '../../modelo/requerimineto/DetalleReq.php';

// $db = new controlconexion();
// $db->abrirBd("localhost","root","","mesa_ayuda");
// $comandoSql = "select * from detallereq";
// $rs = $db->ejecutarSelect($comandoSql);
// $registros = $rs->fetch_all(MYSQLI_ASSOC);
// $db->cerrarBd();
/*Consultar Área y datallereq */
// $comandoSql = "select * from empleado where IDEMPLEADO = '".$IDEMPLEADO."'";
$dba = new controlconexion();
$dba->abrirBd("localhost","root","","mesa_ayuda");
$comandoSqla = "SELECT detalle.IDDETALLE, detalle.FECHA, detalle.OBSERVACION, detalle.FKREQ,
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
ORDER BY detalle.IDDETALLE";
$rsa = $dba->ejecutarSelect($comandoSqla);
$registrosa = $rsa->fetch_all(MYSQLI_ASSOC);
$dba->cerrarBd();
//var_dump($registrosa);
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
     <th>Persona Radicada</th>
     <th>Encargado</th>
     <th>editar</th>
     <th>eliminar</th>
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
      <td><?php echo $regi["NOMBRE_JEFE"];  ?></td>
      <td> 
    <?php if($regi["NOMBRE_ESTADO"] == "Cancelado" || $regi["NOMBRE_ESTADO"] == "Solucionado Totalmente") 
     {
     ?> 
      <i class="far fa-eye-slash"></i>
    <?php  
     } else {
    ?>
    <a href="editar_requerimiento.php?id=<?php echo $regi["IDDETALLE"];?>"><i class="fas fa-edit"></i></a>
    <?php  
     }
    ?>
    </td>
    <td>
    <a href="eliminar_requerimiento.php?id=<?php echo $regi["IDDETALLE"];?>"><i class="fas fa-trash-alt"></i></a>
    </td>
     </tr>
      <?php }?>
  
     </table>
     
</body>
<script src="https://kit.fontawesome.com/176c817b83.js" crossorigin="anonymous"></script>
</html>