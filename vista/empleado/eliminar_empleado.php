<?php
include '../../controlador/controlconexion.php';
include '../../modelo/empleado/empleado.php';
include '../../modelo/empleado/consultar_empleado.php';
include '../../controlador/controlempleado.php';

$id = $_GET['id'];
$objConsulta_empleado = new consultar_empleado($id);
$objControlempleados = new controlempleado($objConsulta_empleado);
$rs = $objControlempleados->borrar();
if($rs) {
    $rpesta_clta = "El Empleado se Elimino correctamente";
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
    <title>eliminar empleado</title>
</head>
<body>
    <p>El estado al eliminar el empleado es: <?php echo $rpesta_clta; ?></p>
    <a href="empleado.php">Volver a Empleados</a>
</body>