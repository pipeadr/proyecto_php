<?php
session_start();
$a = $_SESSION['Usuarios'];
//var_dump($a);
 if(isset($a)) {
    $b = $a['Nombre_Cargo'];
     if(($b == "Empleado") || ($b == "Lider")) {
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
 /**Fechas */
 if((isset($_POST['fechaInicial']) && isset($_POST['fechaFinal'])) && ($_POST['fechaInicial'] != null && $_POST['fechaFinal'])) {
    $fechaInicial = $_POST['fechaInicial'];
    $fechaFinal = $_POST['fechaFinal'];
    include '../../controlador/controlconexion.php';
    include '../../controlador/ControlDetalleReq.php';
    include '../../modelo/requerimineto/DetalleReq.php';
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
    WHERE detalle.FKESTADO != 4 AND detalle.FECHA BETWEEN '".$fechaInicial."' and '".$fechaFinal."'
    ORDER BY detalle.IDDETALLE";
    //$comandoSqla = "SELECT * FROM detallereq WHERE FKESTADO != 4 AND FECHA BETWEEN '".$fechaInicial."' and '".$fechaFinal."' ORDER BY FECHA";
    $rsa = $dba->ejecutarSelect($comandoSqla);
    $informes = $rsa->fetch_all(MYSQLI_ASSOC);
    $dba->cerrarBd();
    // var_dump($informes);
    } else { ?>
     <script type="text/javascript">
     alert("Debe ingresar las fechas");
     </script>
<?php
 } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe #3</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<?php include("../../header.php");?>
<body>
  <h1>Informe  #3</h1>
    <form action="informes04.php" method="post">
      <!-- <input type="date" name="d" id=""> -->
      <input type="datetime-local" name="fechaInicial" id="">
      <input type="datetime-local" name="fechaFinal" id="">
      <input type="submit" value="Enviar">
    </form>
  <br>
  <br>
  <?php
    if(isset($informes)) {  
        ?>
    <h2>Resultado Busqueda</h2>
    <?php 
      if($informes == null) {
      echo "<h2>No hay resultado para esas fechas</h2>";
    } else {?>
      <div class="table_re">
     <table class ="tabla_empleados">
     <thead>
     <tr>
     <th>Id</th>
     <th>Fecha de Radicación</th>
     <th>Observación</th>
     <th>Área</th>
     <th>Estado</th>
     <th>Persona que Radico</th>
     <th>Persona Responsable</th>
     </tr>
     </thead>
    
     <?php foreach($informes as $informe) {?>
     <tr>
      <td><?php echo $informe["IDDETALLE"];  ?></td>
      <td><?php echo $informe["FECHA"];  ?></td>
      <td><?php echo $informe["OBSERVACION"];  ?></td>
      <td><?php echo $informe["NOMBRE_AREA"];  ?></td>
      <td><?php echo $informe["NOMBRE_ESTADO"];  ?></td>
      <td><?php echo $informe["NOMBRE_PERSONAL"];  ?></td>
      <td><?php echo $informe["NOMBRE_JEFE"];  ?></td>
     </tr>
  <?php 
    }
    ?>
      <?php }?>
     </table>
     </div>
 <?php     
    }
  ?>
       <br>
     <a class="botones" href="informes.php">Volver</a>
</body>
</html>