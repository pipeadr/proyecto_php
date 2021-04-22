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
<body>
    <center>
        <form action="vista_editar_areas.php" method="post">
           <table>
        <?php foreach($rs as $r) {?>
           <input type="hidden" name="txtID" value="<?php echo $r['IDAREA']; ?>"> 
            <tr>
                <td>Nombre Área:</td>
                
                <td><input type="text" name="txtnameArea" id="" value="<?php echo $r['NOMBRE']; ?>"></td>
            </tr>
            <?php $id_li = $r['FKEMPLE'];  } ?>
            <tr>
            <td>Nombre Lider Área</td>
             <td>
             <select  name="select_nameArea" id="">    
             <?php foreach($empleados as $empleado) {?>                 
            <option name="select_nameArea" value ="<?php echo $empleado["IDEMPLEADO"];?>"><?php echo $empleado["NOMBRE"];?></option>     
              <!-- <input type="hidden" name="txtID" value="<?php echo $empleado['IDEMPLEADO']?>">  -->
              <?php  } ?>
              </select>   
             </td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" value="Editar Área"></td>
            </tr
           </table>
        </form>
       
    </center>
</body>
</html>