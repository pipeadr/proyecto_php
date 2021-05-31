<?php
include '../../controlador/controlconexion.php';
include '../../modelo/empleado/empleado.php';
include '../../modelo/empleado/consultar_empleado.php';
include '../../controlador/controlempleado.php';
include '../../controlador/consultar_Jefe/control_consultar_jefe.php';

$id = $_GET['id'];

//var_dump($id);
$objConsulta_empleado = new consultar_empleado($id);
$objControlempleados = new controlempleado($objConsulta_empleado);
$rs = $objControlempleados->consultar_edi();

 //var_dump($rs);
 /* Consultar Empleados */
$db = new controlconexion();
$db->abrirBd("localhost","root","","mesa_ayuda");
$comandoSql = "select * from empleado";
$rs_ = $db->ejecutarSelect($comandoSql);
$registros = $rs_->fetch_all(MYSQLI_ASSOC);
/*Consultar jefe */
$Sql_area = "select IDAREA, NOMBRE from area";
$rs_area = $db->ejecutarSelect($Sql_area);
$cnslta_areas = $rs_area->fetch_all(MYSQLI_ASSOC);
$db->cerrarBd();

 /* Cargos*/
 $db = new controlconexion();
 $db->abrirBd("localhost","root","","mesa_ayuda");
 $comandoSql = "select * from cargo";
 $rs_ = $db->ejecutarSelect($comandoSql);
 $cargos = $rs_->fetch_all(MYSQLI_ASSOC);
 $db->cerrarBd();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach($rs as $r) {?>
    <title>Editar empleado <?php echo $r["NOMBRE"]; } ?></title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<?php include("../../header.php");?>
<body>
     <h1 class="title-home">Empleado <?php echo $r["NOMBRE"]  ?></h1>
       <div class="home">
          <div class="home--form">
          <form class="hijo" method="post" action="vista_editar_empleados.php"  enctype="multipart/form-data">
              <input type="hidden" name="ID"  value="<?php echo "$id"; ?>">   
                <?php foreach($rs as $r) { ?>
                  <input type="hidden" name="ID_img"  value="<?php echo $r["FOTO"]; ?>"> 
                  <input type="hidden" name="ID_pdf"  value="<?php echo $r["HOJAVIDA"]; ?>"> 
                  <input class="input" type="text" name="txt2nombre" value="<?php echo $r["NOMBRE"]  ?>">
                  <div class="file-select">
                    <input type="file" name="foto_em_ed" accept="image/*">
                  </div>
                    <?php $path_img = $r["FOTO"];
                      if(file_exists($path_img))
                        { ?>
                     <a class="botones" target="_blank" rel="noopener noreferrer"  href="<?php echo $path_img ;?>"> Ver su imagen Actual</a>    
                    <?php } ?>
                     <div class="file-pdf">
                      <input type="file" name="hv_em_ed" accept="application/pdf">
                     </div>     
                     <?php $path_pdf = $r["HOJAVIDA"];
                      if(file_exists($path_img))
                    { ?>
                    <a target="_blank" rel="noopener noreferrer"  href="<?php echo $path_pdf;?>" class="botones"> Ver su HV Actual</a>    
                   <?php } ?>
                   <input class="input" type="text" name="txt2tel" value="<?php echo $r["TELEFONO"]  ?>">
                   <input class="input" type="text" name="txt2correo" value="<?php echo $r["EMAIL"]  ?>">
                   <input class="input" type="text" name="txt2dire" value="<?php echo $r["DIRECCION"]  ?>">
                   <input class="input" type="text" name="txt2X" value="<?php echo $r["X"] ?>" readonly>
                   <input class="input" type="text" name="txt2Y" value="<?php echo $r["Y"]  ?>" readonly>
                   <input type="hidden" name="latitu" id="latitude_" value="">
                   <input type="hidden" name="longi" id="longitude_" value="">
                   <select class="noinput" name="select_jefe" id="">
                   <option name="select_jefe" value="">Jefe</option> 
                    <?php foreach($registros as $registro) {  ?>  
                   <option name="select_jefe" value ="<?php echo $registro["IDEMPLEADO"];?>"><?php echo $registro["NOMBRE"];?></option>  
                    <?php } ?>
                   </select>
                   <select class="noinput" name="select_area" id="">
                     <option value="">Area</option>
                     <?php foreach($cnslta_areas  as $cnslta_area) { ?>
                    <option name="select_area" value ="<?php echo $cnslta_area["IDAREA"];?>"><?php echo $cnslta_area["NOMBRE"]; ?></option>  
                     <?php } ?>
                  </select>
                  <select class="noinput"  name="select_cargo" id="">
                    <option value="">Cargo</option>
                   <?php foreach($cargos  as $cargo) { ?>
                    <option name="select_cargo" value ="<?php echo $cargo["IDCARGO"];?>"><?php echo $cargo["NOMBRE"]; ?></option>  
                   <?php } ?>
                 </select>
                  <input class="input" type="password" name="txt2pass" value="<?php echo $r["PASSWORD"]  ?>">
                  <input style="margin-top: 2rem;" class="botones" type="submit" value="Editar Empleado">
                    
                <?php } ?>
          </form>
           </div>
          
       </div>

</body>
<script src="../../js/main.js">
</script>
</html>
