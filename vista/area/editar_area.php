<?php
include '../../controlador/controlconexion.php';
include '../../modelo/area.php';
include '../../controlador/controlarea.php';

 $id = $_GET['id'];
 $name = "";
 //$lider = $_GET['fk_emple'];
 $lider = "";
 /* Conexxión BD */
 $objarea = new area($id, $name, $lider);
 $obj_rs = new controlarea($objarea);
 $rs = $obj_rs->consultar();
 
 
 /* Consultar Empleado */
 $db = new controlconexion();
 $db->abrirBd("localhost","root","","mesa_ayuda");
 $Sql = "select * from empleado";
 $rs_em = $db->ejecutarSelect($Sql);
 $empleados = $rs_em->fetch_all(MYSQLI_ASSOC);
 $db->cerrarBd();
 //var_dump($empleados);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<?php include("../../header.php");?>
<body>
    <h1 class="title-home" >Editar Área</h1>
     <div class="home">
         <div class="table_re">
             <form class="hijo" action="vista_editar_areas.php" method="post">
              <?php foreach($rs as $r) {?>
              <input  class="input" type="text" name="txtnameArea" id="" value="<?php echo $r['NOMBRE']; ?>" title ="ingrese un área" required>
              <select  class="noinput" name="select_nameArea" id="">
                  <option value="">Lider Área</option>
                <?php foreach($empleados as $empleado) {?>                 
                <option name="select_nameArea" value ="<?php echo $empleado["IDEMPLEADO"];?>"><?php echo $empleado["NOMBRE"];?></option>     
                <?php  } ?>
              </select> 
              <?php }?>
              <input type="submit" value="Editar Área" class="botones">
             </form>
         </div>
     </div>
</body>
</html>