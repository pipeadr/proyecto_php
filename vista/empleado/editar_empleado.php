<?php
include '../../controlador/controlconexion.php';
include '../../modelo/empleado/empleado.php';
include '../../controlador/controlempleado.php';
include '../../controlador/consultar_Jefe/control_consultar_jefe.php';

$id = $_GET['id'];

var_dump($id);
$objConsulta_empleado = new consultar_empleado($id);
$objEmpleado = new empleado($ID, $name, $path_img, $path_pdf, $tel, $mail, $dire, $X, $Y, $jefe, $area, $contra);



?>
