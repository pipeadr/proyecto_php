<?php
include '../../controlador/controlconexion.php';
include '../../modelo/requerimineto/consultar_requerimiento.php';
include '../../modelo/requerimineto/Requerimiento.php';
include '../../controlador/controlrequerimiento.php';
include '../../modelo/requerimineto/DetalleReq.php';
include '../../controlador/ControlDetalleReq.php';

$id_reque = $_POST['ID_RE'];
//$id_fkreque = $_POST['ID_fkrequ'];
//$id_area = $_POST['select_Area'];
$id_estado =  $_POST['select_nameEstado'];
$id_empleado = $_POST['select_Encargado'];
//var_dump($id_fkreque);

$objEstado = new consultar_requerimiento($id_reque, $id_estado, $id_empleado );
$obj_rs = new ControlDetalleReq($objEstado);
$r = $obj_rs->modificar_tem();

if($r) 
{  
    $rpesta_clta = "Requerimiento modificafa correctamente";
} else
{
  $rpesta_clta = "Algo salio mal, por favor intente más tarde";
}
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
<h1>Bienvenido</h1>

<p>El estado al editar el Requerimiento es: <?php echo $rpesta_clta; ?></p>
<a href="http://localhost/proyecto_php/vista/requerimiento/mostrarrequerimineto.php">Volver a los Requerimientos</a>
</body>
</html>