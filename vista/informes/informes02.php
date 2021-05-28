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

/* Consultar Empleados */
$db = new controlconexion();
$db->abrirBd("localhost","root","","mesa_ayuda");
$comandoSql = "SELECT emple.IDEMPLEADO, emple.NOMBRE, carxemple.FKEMPLE, car.NOMBRE AS Nombre_Cargo, ar.NOMBRE AS NOMBRE_AREA, jef.NOMBRE AS NOMBRE_JEFE FROM empleado emple INNER JOIN cargo_por_empleado carxemple ON carxemple.FKEMPLE = emple.IDEMPLEADO INNER JOIN cargo car ON carxemple.FKCARGO = car.IDCARGO INNER JOIN area ar ON ar.IDAREA = emple.fkAREA INNER JOIN empleado jef on jef.IDEMPLEADO = emple.fkEMPLE_JEFE ORDER BY emple.IDEMPLEADO
";
$rs = $db->ejecutarSelect($comandoSql);
$registros = $rs->fetch_all(MYSQLI_ASSOC);
/*Consultar jefe */

$db->cerrarBd();




?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<?php include("../../header.php");?>
<body>
    <center>
     <h1>Empleados</h1>
     <div class="table_re">
     <table class ="tabla_empleados">
     <thead>
     <tr>
     <th>ID</th>
     <th>Nombre Empleado</th>
     <th>Cargo</th>
     <th>Nombre Jefe</th>
     <th>Area</th>
     </tr>
     </thead>
     <?php foreach($registros as $registro) {?>
     
     <tr>
      <td><?php echo $registro["IDEMPLEADO"];  ?></td>
      <td><?php echo $registro["NOMBRE"];  ?></td>
      <td><?php echo $registro["Nombre_Cargo"];  ?></td>
      <td><?php echo $registro["NOMBRE_JEFE"];  ?></td>
      <td><?php echo $registro["NOMBRE_AREA"];  ?></td>
     </tr>
     <?php }?>
     </table>
     </div>
     <br>
     <a class="botones" href="informes.php">Volver</a>
</body>
</script>
</html>