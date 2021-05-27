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
include '../../controlador/controlconexion.php';
include '../../controlador/ControlDetalleReq.php';
include '../../modelo/requerimineto/DetalleReq.php';
$dba = new controlconexion();
$dba->abrirBd("localhost","root","","mesa_ayuda");
$comandoSqla = "SELECT ar.NOMBRE AS Nombre_Area,
       emple.NOMBRE AS Nombre_Lider_Area
       FROM area ar
       INNER JOIN empleado emple ON emple.IDEMPLEADO = ar.FKEMPLE
       ";
$rsa = $dba->ejecutarSelect($comandoSqla);
$informes = $rsa->fetch_all(MYSQLI_ASSOC);
$dba->cerrarBd();
/**Informatica */
$dba = new controlconexion();
$dba->abrirBd("localhost","root","","mesa_ayuda");
$comandoSqla = "SELECT COUNT(fkAREA) FROM empleado WHERE fkAREA = 10";
$rsa = $dba->ejecutarSelect($comandoSqla);
$informaticas = $rsa->fetch_all(MYSQLI_ASSOC);
$dba->cerrarBd();
foreach($informaticas as $informatica) {
   $infor = $informatica['COUNT(fkAREA)'];
}
/**Gestión Humana */
$dba = new controlconexion();
$dba->abrirBd("localhost","root","","mesa_ayuda");
$comandoSqla = "SELECT COUNT(fkAREA) FROM empleado WHERE fkAREA = 20";
$rsa = $dba->ejecutarSelect($comandoSqla);
$gestiones = $rsa->fetch_all(MYSQLI_ASSOC);
$dba->cerrarBd();
foreach($gestiones as $gestion) {
   $ges = $gestion['COUNT(fkAREA)'];
}
/**Mantenimiento*/
$dba = new controlconexion();
$dba->abrirBd("localhost","root","","mesa_ayuda");
$comandoSqla = "SELECT COUNT(fkAREA) FROM empleado WHERE fkAREA = 30";
$rsa = $dba->ejecutarSelect($comandoSqla);
$mantenimientos = $rsa->fetch_all(MYSQLI_ASSOC);
$dba->cerrarBd();
foreach($mantenimientos as $mantenimiento) {
   $man = $mantenimiento['COUNT(fkAREA)'];
}
/**Contanibilidas */
$dba = new controlconexion();
$dba->abrirBd("localhost","root","","mesa_ayuda");
$comandoSqla = "SELECT COUNT(fkAREA) FROM empleado WHERE fkAREA = 40";
$rsa = $dba->ejecutarSelect($comandoSqla);
$Contabilidades = $rsa->fetch_all(MYSQLI_ASSOC);
$dba->cerrarBd();
foreach($Contabilidades as $Contabilida) {
   $con = $Contabilida['COUNT(fkAREA)'];
}
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
     <h1>Informe #1</h1>
     <div class="table_re">
     <table class ="tabla_empleados">
     <thead>
     <tr>
     <th>Nombre Área</th>
     <th>Lider Área</th>
     <th>Total Personas</th>
     </tr>
     </thead>
    
     <?php foreach($informes as $informe) {?>
     <tr>
      <td><?php echo $informe["Nombre_Area"];  ?></td>
      <td><?php echo $informe["Nombre_Lider_Area"];  ?></td>
       <?php if($informe["Nombre_Area"] === "INFORMÁTICA") { ?>
       <td><?php echo $infor; ?></td>
       <?php } else if($informe["Nombre_Area"] === "GESTIÓN HUMANA") {?>
        <td><?php echo $ges; ?></td>
        <?php } else if($informe["Nombre_Area"] === "MANTENIMIENTO") {?>
            <td><?php echo $man; ?></td>
            <?php } else {?>
                <td><?php echo $con; ?></td>
                <?php }?>
     </tr>
      <?php }?>
     </table>
     <br>
     <br>
     <a class="botones" href="informes.php">Volver</a>
     
</body>
<script src="https://kit.fontawesome.com/176c817b83.js" crossorigin="anonymous"></script>
</html>