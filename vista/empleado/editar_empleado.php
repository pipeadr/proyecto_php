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
<body>
 <center>
 <form method="post" action="vista_editar_empleados.php"  enctype="multipart/form-data">
     <table>
     <input type="hidden" name="ID"  value="<?php echo "$id"; ?>">    
     <?php foreach($rs as $r) {?>
    <input type="hidden" name="ID_img"  value="<?php echo $r["FOTO"]; ?>">  
     <input type="hidden" name="ID_pdf"  value="<?php echo $r["HOJAVIDA"]; ?>">  
       <tr>
       <td>Nombre</td>
       <td><input type="text" name="txt2nombre" value="<?php echo $r["NOMBRE"]  ?>"></td>
       </tr>
       <tr>
        <td>Foto:</td>
        <td><input type="file" name="foto_em_ed" accept="image/*"></td>
        </tr>
        <tr>
        <td></td>
        <td>
        <?php $path_img = $r["FOTO"];
        if(file_exists($path_img))
        { ?>
        <a target="_blank" rel="noopener noreferrer"  href="<?php echo $path_img ;?>" tar> Ver su imagen Actual</a>    
        <?php } ?></td>
        </tr> 
        <tr>
        <td>HV:</td>
        <td><input type="file" name="hv_em_ed" accept="application/pdf"></td>
        </tr>
        <tr>
        <td></td>
        <td>
        <?php $path_pdf = $r["HOJAVIDA"];
        if(file_exists($path_img))
        { ?>
        <a target="_blank" rel="noopener noreferrer"  href="<?php echo $path_pdf;?>" tar> Ver su HV Actual</a>    
        <?php } ?></td>
        </tr> 
        <tr>
       <td>Telefono</td>
       <td><input type="text" name="txt2tel" value="<?php echo $r["TELEFONO"]  ?>"></td>
       </tr>
       <tr>
       <td>Correo</td>
       <td><input type="text" name="txt2correo" value="<?php echo $r["EMAIL"]  ?>"></td>
       </tr>
       <tr>
       <td>Dirección</td>
       <td><input type="text" name="txt2dire" value="<?php echo $r["DIRECCION"]  ?>"></td>
       </tr>
       <tr>
       <td>X</td>
       <td><input type="text" name="txt2X" value="<?php echo $r["X"]  ?>"></td>
       </tr>
       <tr>
       <td>Y</td>
       <td><input type="text" name="txt2Y" value="<?php echo $r["Y"]  ?>"></td>
       </tr>
       <tr>
            <td>Jefe:</td>
            <td>
            <select  name="select_jefe" id="">
            <?php foreach($registros as $registro) {  ?>
            <option name="select_jefe" value ="<?php echo $registro["IDEMPLEADO"];?>"><?php echo $registro["NOMBRE"];?></option>  
            <?php } ?>
            </select></td> 
            </tr>
            <tr>
            <td>Area:</td>
            <td>
            <select  name="select_area" id="">
            <?php foreach($cnslta_areas  as $cnslta_area) { ?>
            <option name="select_area" value ="<?php echo $cnslta_area["IDAREA"];?>"><?php echo $cnslta_area["NOMBRE"]; ?></option>  
            <?php } ?>
            </select></td> 
            </tr>

            <tr>
            <td>Cargo:</td>
            <td>
            <select  name="select_cargo" id="">
            <?php foreach($cargos  as $cargo) { ?>
            <option name="select_cargo" value ="<?php echo $cargo["IDCARGO"];?>"><?php echo $cargo["NOMBRE"]; ?></option>  
            <?php } ?>
            </select></td> 
            </tr>
       <tr>
       <td>Contraseña</td>
       <td><input type="password" name="txt2pass" value="<?php echo $r["PASSWORD"]  ?>"></td>
       </tr>
       <tr>
              <td></td>
              <td><input type="submit" value="Editar Empleado"></td>
            </tr>
     </table>
     <?php  } ?>
  </form>
 </center>

    
</body>
</html>
