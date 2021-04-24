<?php
include '../../controlador/controlconexion.php';
include '../../controlador/ControlDetalleReq.php';
include '../../modelo/requerimineto/DetalleReq.php';

 $id = $_GET['id'];
 $db = new controlconexion();
 $db->abrirBd("localhost","root","","mesa_ayuda");
 $comandoSql = "select * from detallereq where IDDETALLE = '".$id."'";
 $rs = $db->ejecutarSelect($comandoSql);
 $resultados= $rs->fetch_all(MYSQLI_ASSOC);
 $db->cerrarBd();
 /** Estado*/
 $db = new controlconexion();
 $db->abrirBd("localhost","root","","mesa_ayuda");
 $comandoSql_estado = "select * from estado";
 $rs_estado = $db->ejecutarSelect($comandoSql_estado);
 $estados= $rs_estado->fetch_all(MYSQLI_ASSOC);
 $db->cerrarBd()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Requerimiento</title>
</head>
<body>
    <form action="vista_editar_reque.php" method="post">
    <table>
    <?php foreach($resultados as $resultado) {?>
    <tr>
    <td>
    <select  name="select_nameEstado" id="">    
    <?php foreach($estados as $estado) {?>                 
    <option name="select_nameEstado" value ="<?php echo $estado["IDESTADO"];?>"><?php echo $estado["NOMBRE"];?></option>
    <?php  } ?>
    </select>   
    </td>
    </tr>
    <input type="hidden" name="ID_RE" value="<?php echo $id;?>">
    <?php }?>
    <td><input type="submit" value="Editar Requerimiento"></td>
    </table>
    </form>
</body>
</html>
