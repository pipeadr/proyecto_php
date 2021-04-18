<?php
/* incluir archivos */
include '../../controlador/controlconexion.php';
include '../../modelo/requerimineto/Requerimiento.php';
include '../../controlador/controlrequerimiento.php';
include '../../modelo/requerimineto/DetalleReq.php';
include '../../controlador/ControlDetalleReq.php';

/* Declaración variables */
$ID_EMPLEADO = $_POST['Id_empleado'];
$FK_area = $_POST['cbx_area'];
$fecha = $_POST['txtFECHA'];
$OBSERVACION = $_POST['txtOBSERVACION'];
$Estado_requisito_inicial = $_POST['Estado_requisito'];

/* Requerimiento */
$objRequerimiento = new Requerimiento(NULL, $FK_area);
$objControlRequerimiento = new controlrequerimiento($objRequerimiento);
$r = $objControlRequerimiento->guardar(); //esto retorna si guardo correctamente

/* Consultar ID del requerimiento */
$_id_reque = $objControlRequerimiento->consultar_id();


/* Detalle Requerimiento */
$objDetalleReq = new DetalleReq(NULL, $fecha, $OBSERVACION, $_id_reque, $Estado_requisito_inicial, $ID_EMPLEADO, $ID_EMPLEADO);
$objControlDetalleReq = new ControlDetalleReq($objDetalleReq);
$r_dr = $objControlDetalleReq->guardar(); //$r_dr hace referencia a detalle requerimiento ___esto retorna si guardo correctamente

/* Comprobar si guardo correctamente */
if(($r_dr)  && ($r))
{
  $rpesta_clta = "El Requerimiento se guardo correctamente";
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
    <title>Requerimiento</title>
</head>
<body>

<p>El Estado del requerimiento es el siguiente: <?php echo $rpesta_clta; ?></p> 

<form method="post" action="radicarRequerimiento.php"> 
    <input type="submit" name="btn" value="Registrar Nuevo Requerimiento">
    <input type="hidden" name="Id_empleado"  value="<?php echo "$ID_EMPLEADO"; ?>">
      </form>

      <br>
      <br>
 
      <form method="post" action=""> 
    <input type="submit" name="btn" value="Cerrar Sección">
      </form>
</body>
</html>