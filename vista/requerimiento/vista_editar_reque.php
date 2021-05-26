<?php
session_start();
$a = $_SESSION['Usuarios'];
//var_dump($a['IDEMPLEADO']);
 if(isset($a)) {
    $b = $a['Nombre_Cargo'];
     if($b == "Empleado") {
      echo '<script type="text/javascript">';
      echo 'alert("Usted no tiene permiso ver esta página");';
      echo 'window.location="../../vista/login/login.php";';
      echo '</script>';
    //   header('Location: login.php');       
     }
 } else {
    echo '<script type="text/javascript">';
    echo 'alert("Debe Iniciar Sesión primero");';
    echo 'window.location="../../vista/login/login.php";';
    echo '</script>';
 }
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
<?php 
 if($b == "Lider") {
?>
<script type="text/javascript">
alert("<?php echo $rpesta_clta ; ?>");
window.location='editarmisrequerimientos.php';
</script>
<?php } else { ?>
<script type="text/javascript">
alert("<?php echo $rpesta_clta ; ?>");
window.location='mostrarrequerimineto.php';
</script>
<?php  } ?>