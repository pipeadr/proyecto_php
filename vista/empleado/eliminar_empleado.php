<?php
include '../../controlador/controlconexion.php';
include '../../modelo/empleado/empleado.php';
include '../../modelo/empleado/consultar_empleado.php';
include '../../controlador/controlempleado.php';
include '../../controlador/controladorcargo_por_empleado.php';
include '../../modelo/cargo/cargo_por_empleado.php';

$id = $_GET['id']; //id es el idintificador del empleado
/** eliminar Cargp */
$objcargo_por_empleados = new cargo_por_empleado($id, $id, $id, $id);
$objcargo_por_empleado = new controladorcargo_por_empleado($objcargo_por_empleados);
$cg = $objcargo_por_empleado->borrar();
if($cg) {
    $objEmpleado = new empleado($id, $id, $id, $id, $id, $id, $id, $id, $id , $id, $id, $id);
    $objControlempleados = new controlempleado($objEmpleado);
    $empleados = $objControlempleados->borrar();
     if($empleados) {
        $db = new controlconexion();
        $db->abrirBd("localhost","root","","mesa_ayuda");
        $comandoSql = "select * from empleado where IDEMPLEADO = '".$id."'";
        $rs = $db->ejecutarSelect($comandoSql);
        $registros = $rs->fetch_all(MYSQLI_ASSOC);
        $db->cerrarBd();
        foreach($registros as $registro) {
            $foto = $registro['FOTO'];
            $pdf = $registro['HOJAVIDA'];
           }
           if(file_exists($foto) && file_exists($pdf)) {
            if(unlink($foto) && unlink($pdf)) {
                $respuestaFinal = "Empleado eliminado correctamente";
            } else {
                $respuestaFinal = "Empleado eliminado correctamente, pero algo falló con la eliminacion de los archivos(foto y pdf)";
            }
           } else {
            $respuestaFinal = "Empleado eliminado correctamente";
           }
        
          
     } else {
        $respuestaFinal = "Algo Salió mal, recomandamos llamar al administrador";
     }
} else {
    $respuestaFinal = "Algo Salió mal, intente más tarde";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eliminar empleado</title>
</head>
<body>
<script type="text/javascript">
alert("<?php echo $respuestaFinal ; ?>");
window.location='empleado.php';
</script>
</body>