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
<?php include("../../header.php");?>
   <div class="home">
     <h1 class="title-home">Registrar Requerimiento</h1>
     <div class="">
     <form method="post" action="vista_radicar_requerimiento.php">  
         <div class="hijo">
           <select class="noinput" name="cbx_area" id="" required >
            <option value ="0">Seleccionar Area</option>
             <?php foreach($cnslta_areas as $cnslta_area) {  ?>
              <option name="Areas_" value ="<?php echo $cnslta_area["IDAREA"] ?> "><?php echo $cnslta_area["NOMBRE"]?></option>  
               <?php } ?>
           </select>
             <?php   
            date_default_timezone_set('America/Bogota');
            $fecha_actial = date("Y-m-d H:i:s");
           ?>
            <!-- <p>Fecha Actual:</p> -->
           <input class="fecha" type="datetime" title="Fecha Actual" name="txtFECHA"   value="<?php echo $fecha_actial; ?>" readonly>
         </div>
         <div class="hijo-p">
           <textarea class="textarea" name="txtOBSERVACION"   id="" placeholder="Ingrese su observación" required></textarea>
         </div>
      <input type="hidden" name="Id_empleado"  value="<?php echo "$ID_EMPLEADO"; ?>" required>
      <input type="hidden" name="Estado_requisito"  value="1">
      <div class="hijo">
      <input class="botones" type="submit" value="Radicar">
      <input class="botones" type="reset" value="Limpiar">
      <a class="botones" href="http://localhost/proyecto_php/vista/login/admin.php">Volver</a>
      </div>
     </form>
     </div>
      </div>
      
</body>
</html>