<?php
include '../../controlador/controlconexion.php';
include '../../controlador/ControlDetalleReq.php';
include '../../modelo/requerimineto/DetalleReq.php';

$db = new controlconexion();
$db->abrirBd("localhost","root","","mesa_ayuda");
$comandoSql = "select * from detallereq";
$rs = $db->ejecutarSelect($comandoSql);
$registros = $rs->fetch_all(MYSQLI_ASSOC);
$db->cerrarBd();
/*Consultar Área y datallereq */
// $comandoSql = "select * from empleado where IDEMPLEADO = '".$IDEMPLEADO."'";

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
     <th>Persona</th>
     <th>Encargado</th>
     <th>editar</th>
     <th>eliminar</th>
     </tr>
     </thead>
     <?php foreach($registros as $registro) {?>
      <tr>
      <td><?php echo $registro["IDDETALLE"];  ?></td>
      <td><?php echo $registro["FECHA"];  ?></td>
      <td><?php echo $registro["OBSERVACION"];  ?></td>
      <td>
      <?php 
        $id_re = $registro["FKREQ"]; 
        $db = new controlconexion();
        $db->abrirBd("localhost","root","","mesa_ayuda");
        $comandoSql_ = "select * from requerimiento where IDREQ = '".$id_re."'";
        $rs_re = $db->ejecutarSelect($comandoSql_);
        $r_reques = $rs_re->fetch_all(MYSQLI_ASSOC);
        $db->cerrarBd();
        foreach($r_reques as $r_reque) {
          $id_area_con =  $r_reque ["FKAREA"];
        }
        $db = new controlconexion();
        $db->abrirBd("localhost","root","","mesa_ayuda");
        $comandoSql_area = "select * from area where IDAREA = '".$id_area_con."'";
        $rs_areas = $db->ejecutarSelect($comandoSql_area);
        $r_areas = $rs_areas->fetch_all(MYSQLI_ASSOC);
        $db->cerrarBd();
        foreach($r_areas as $r_area) {
          echo $r_area["NOMBRE"];
        }
        ?>
      </td>
      <td>
      <?php 
        $id_estado = $registro["FKESTADO"]; 
        $db = new controlconexion();
        $db->abrirBd("localhost","root","","mesa_ayuda");
        $comandoSql_estado = "select * from estado where IDESTADO = '".$id_estado."'";
        $rs_estado = $db->ejecutarSelect($comandoSql_estado);
        $r_estados = $rs_estado->fetch_all(MYSQLI_ASSOC);
        $db->cerrarBd();
        foreach($r_estados as $r_estado) {
          echo $r_estado["NOMBRE"];
        }
        ?>
      </td>
      <td>
      <?php 
        $id_empleado = $registro["FKEMPLE"]; 
        $db = new controlconexion();
        $db->abrirBd("localhost","root","","mesa_ayuda");
        $comandoSql_empleado = "select * from empleado where IDEMPLEADO = '".$id_empleado."'";
        $rs_empleado = $db->ejecutarSelect($comandoSql_empleado);
        $r_empleados = $rs_empleado->fetch_all(MYSQLI_ASSOC);
        $db->cerrarBd();
        foreach($r_empleados as $r_empleado) {
          echo $r_empleado["NOMBRE"];
        }
        ?>
      </td>
    <td>
    <?php 
        $id_empleado = $registro["FKEMPLEASIGNADO"]; 
        $db = new controlconexion();
        $db->abrirBd("localhost","root","","mesa_ayuda");
        $comandoSql_empleado = "select * from empleado where IDEMPLEADO = '".$id_empleado."'";
        $rs_empleado = $db->ejecutarSelect($comandoSql_empleado);
        $r_empleados = $rs_empleado->fetch_all(MYSQLI_ASSOC);
        $db->cerrarBd();
        foreach($r_empleados as $r_empleado) {
          echo $r_empleado["NOMBRE"];
        }
        ?>
    </td>
    <td>
    <a href="editar_requerimiento.php?id=<?php echo $registro["IDDETALLE"];?>"><i class="fas fa-edit"></i></a>
    </td>
    <td>
    <a href="editar_empleado.php?id=<?php echo $registro["IDDETALLE"];?>"><i class="fas fa-trash-alt"></i></a>
    </td>
      </tr>
      
     <?php }?>
     </table>
     
</body>
<script src="https://kit.fontawesome.com/176c817b83.js" crossorigin="anonymous"></script>
</html>