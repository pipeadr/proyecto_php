<?php
session_start();
$a = $_SESSION['Usuarios'];
//var_dump($a);
 if(isset($a)) {
    $b = $a['Nombre_Cargo'];
     if($b != "Administrador") {
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
$id = $_GET['id'];
$db = new controlconexion();
$db->abrirBd("localhost","root","","mesa_ayuda");
$comandoSql = "select * from detallereq where IDDETALLE = '".$id."'";
$rs = $db->ejecutarSelect($comandoSql);
$resultados= $rs->fetch_all(MYSQLI_ASSOC);
$db->cerrarBd();
foreach($resultados as $resultado) {
    $FKREQ = $resultado['FKREQ'];
}

$objDetalleReqss =  new DetalleReq($id, $id, $id, $id, $id, $id, $id);
$objDetalleReq = new  ControlDetalleReq($objDetalleReqss);
$f = $objDetalleReq->borrar();

 if($f) {
    $objRequerimiento = new Requerimiento($FKREQ, $FKREQ);
    $objControlRequerimiento = new controlrequerimiento($objRequerimiento);
    $r = $objControlRequerimiento->borrar();
   if($r) {
    echo '<script type="text/javascript">';
    echo 'alert("Se eliminado correctamente");';
    echo 'window.location="mostrarrequerimineto.php";';
    echo '</script>';
   } else {
    echo '<script type="text/javascript">';
    echo 'alert("Algo Salio Mal, contacte al Administrador");';
    echo 'window.location="mostrarrequerimineto.php";';
    echo '</script>';
   }
 } else {
    echo '<script type="text/javascript">';
    echo 'alert("Algo Salio Mal");';
    echo 'window.location="mostrarrequerimineto.php";';
    echo '</script>';
 }
?>