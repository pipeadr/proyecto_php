<?php
include '../../controlador/controlconexion.php';
include '../../modelo/area.php';
include '../../controlador/controlarea.php';

$ID = $_POST['txtID'];
$name = $_POST['txtnameArea'];
$lider = $_POST['select_nameArea']; 

$objarea = new area($ID, $name, $lider);
$obj_rs = new controlarea($objarea);
$r = $obj_rs->modificar(); 
if($r) 
{  
    $rpesta_clta = "Área modificafa correctamente";
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
<script type="text/javascript">
alert("<?php echo $rpesta_clta ; ?>");
window.location='area.php';
</script>
</body>
</html>