<?php
include '../../controlador/controlconexion.php';

//var_dump($_POST['Id_empleado']);
$ID_EMPLEADO = $_POST['Id_empleado'];
$db = new controlconexion();
$db->abrirBd("localhost","root","","mesa_ayuda");   
/*Inicio Código para imprimir Código de las Areas */
$Sql_area = "select IDAREA, NOMBRE from area ORDER BY IDAREA DESC";
$rs_area = $db->ejecutarSelect($Sql_area);
$cnslta_areas = $rs_area->fetch_all(MYSQLI_ASSOC);
$db->cerrarBd();
/*Fin Código para imprimir Código de las Areas */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radicar Requerimiento</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
     <h1>Registrar Requerimiento</h1>
     <div class="formulario_login">
     <form method="post" action="vista_radicar_requerimiento.php">  
      <label for="">Seleccione el Área</label> <br>
      <select  name="cbx_area" id="">
      <option value ="0">Seleccionar Area</option>
      <?php foreach($cnslta_areas as $cnslta_area) {  ?>
      <option name="Areas_" value ="<?php echo $cnslta_area["IDAREA"] ?> "><?php echo $cnslta_area["NOMBRE"]?></option>  
      <?php } ?>
      </select> <br>
      <label for="">Fecha</label> <br>
      <?php   
        date_default_timezone_set('America/Bogota');
        $fecha_actial = date("Y-m-d H:i:s");
      ?>
      <input type="datetime" name="txtFECHA"   value="<?php echo $fecha_actial; ?>" readonly>
      <br>
      <label for="">Ingrese su observación	</label> <br>
      <textarea name="txtOBSERVACION"   id="" placeholder="Ingrese su observación"  ></textarea>
      <br>
      <input type="hidden" name="Id_empleado"  value="<?php echo "$ID_EMPLEADO"; ?>">
      <input type="hidden" name="Estado_requisito"  value="1">
      <input type="submit" value="Radicar"> <br>
      <input type="reset" value="Limpiar">
     </form>
     </div>
</body>
</html>