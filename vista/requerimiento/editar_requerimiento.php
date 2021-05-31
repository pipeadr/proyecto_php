<?php
include '../../controlador/controlconexion.php';
include '../../controlador/ControlDetalleReq.php';
include '../../modelo/requerimineto/DetalleReq.php';

 $id = $_GET['id'];
 //$fkre = $_GET['fkre']; 
 //$r = $_SESSION
 //var_dump($fkre);
 $db = new controlconexion();
 $db->abrirBd("localhost","root","","mesa_ayuda");
 $comandoSql = "select * from detallereq where IDDETALLE = '".$id."'";
 $rs = $db->ejecutarSelect($comandoSql);
 $resultados= $rs->fetch_all(MYSQLI_ASSOC);
 $db->cerrarBd();
 //var_dump($resultados);


 /** Area*/
//  $db = new controlconexion();
//  $db->abrirBd("localhost","root","","mesa_ayuda");
//  $comandoSql_area = "select * from area";
//  $rs_area = $db->ejecutarSelect($comandoSql_area);
//  $areas= $rs_area->fetch_all(MYSQLI_ASSOC);
//  $db->cerrarBd();
//var_dump($areas);

 /** Estado*/
 $db = new controlconexion();
 $db->abrirBd("localhost","root","","mesa_ayuda");
 $comandoSql_estado = "select * from estado";
 $rs_estado = $db->ejecutarSelect($comandoSql_estado);
 $estados= $rs_estado->fetch_all(MYSQLI_ASSOC);
 $db->cerrarBd();

  /** Encargado*/
  $db = new controlconexion();
  $db->abrirBd("localhost","root","","mesa_ayuda");
  $comandoSql_empleado = "select * from empleado";
  $rs_empleado = $db->ejecutarSelect($comandoSql_empleado);
  $empleados= $rs_empleado->fetch_all(MYSQLI_ASSOC);
  $db->cerrarBd();
  //var_dump($empleados);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Requerimiento</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<?php include("../../header.php");?>
<body>
    <h1 class="title-home">Editar Requerimiento</h1>
     <div class="home">
       <div class="table_re">
         <form class="hijo" action="vista_editar_reque.php" method="post">
           <?php foreach($resultados as $resultado) {?>
            <select class="noinput"  name="select_nameEstado" id="">
             <option value="">Estado</option>    
             <?php foreach($estados as $estado) {?>             
               <option name="select_nameEstado" value ="<?php echo $estado["IDESTADO"];?>"><?php echo $estado["NOMBRE"];?></option>
              <?php  } ?>
             </select>  
            <?php }?>
            <select class="noinput" name="select_Encargado"" id="">
              <option value="">Encargado</option>
              <?php foreach($empleados as $empleado) {?>
             <option name="select_Encargado" value="<?php  echo $empleado["IDEMPLEADO"]; ?>"><?php  echo $empleado["NOMBRE"]; ?></option>
            <?php }?>
           </select>
           <input  type="hidden" name="ID_RE" value="<?php echo $id;?>">
           <input type="hidden" name="ID_fkrequ" value="<?php echo $fkre;?>">
           
           <input class="botones" type="submit" value="Editar Requerimiento">
           <a class="botones" href="mostrarrequerimineto.php">Volver</a>
         </form>
       </div>
     </div>
</body>
</html>
