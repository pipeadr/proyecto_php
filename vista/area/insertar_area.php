<?php
include '../../controlador/controlconexion.php';
include '../../modelo/area.php';
include '../../controlador/controlarea.php';

$id = $_POST['txtID'];
$name= $_POST['txtname'];
$lider = $_POST['select_lider'];
$objarea = new area($id, $name, $lider);
$obj_rs = new controlarea($objarea);
$r = $obj_rs->guardar();
if($r) 
{  
    $rpesta_clta = "Área guardada correctamente";
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
    <title>Área guardada</title>
</head>
<body>
<h1>Bienvenido</h1>

<p>El estado al crear el Área es: <?php echo $rpesta_clta; ?></p>
<a href="area.php">Volver a Área</a>
</body>
</html>