<?php
include '../../controlador/controlempleado.php';
include '../../modelo/empleado/empleado.php';
include '../../controlador/controlconexion.php';

$ID = $_POST['txtID'];
$name = $_POST['txtNombre'];

/* Código para Archivos */
//print_r($_FILES);
$name_img = $_FILES['foto_em']['name'];
$ruta_img = $_FILES['foto_em']['tmp_name'];
//var_dump($ruta_img );
if($_FILES['foto_em']['error'] > 0) {
    $error_img = false;
} else {
if(!file_exists('archivos_img')) {
   mkdir('archivos_img');
   if(file_exists('archivos_img')) {
      if(move_uploaded_file($ruta_img, 'archivos_img/'.$name_img)) {
        $rs_carga_ima = true;
        //echo "Imagen se guardon con exito";
      } else {
        $rs_carga_ima = false;   
      }
   }
} else 
{
    if(move_uploaded_file($ruta_img, 'archivos_img/'.$name_img)) {
        $rs_carga_ima = true; 
      } else {
        $rs_carga_ima = false;   
      }
}
} //acá se cierra el else ppl
$path_img = "archivos_img/".$name_img ;
/* Código para imagenes  Fin*/
/***********/

$name_pdf = $_FILES['HV_em']['name'];
$ruta_pdf = $_FILES['HV_em']['tmp_name'];
//var_dump($ruta_img );
if($_FILES['HV_em']['error'] > 0) {
    $error_pdf = false;
} else {
if(!file_exists('archivos_pdf')) {
   mkdir('archivos_pdf');
   if(file_exists('archivos_pdf')) {
      if(move_uploaded_file($ruta_img, 'archivos_pdf/'.$name_pdf)) {
        $rs_carga_pdf = true;
        //echo "Imagen se guardon con exito";
      } else {
        $rs_carga_ima = false;   
      }
   }
} else 
{
    if(move_uploaded_file($ruta_pdf, 'archivos_pdf/'.$name_pdf)) {
        $rs_carga_pdf = true; 
      } else {
        $rs_carga_pdf = false;   
      }
}
} //acá se cierra el else ppl
$path_pdf = "archivos_pdf/".$name_pdf ;
/* Código para Archivos  Fin*/
$tel = $_POST['txtTelefono'];
$mail = $_POST['mail'];
$dire = $_POST['direccion'];
$jefe = $_POST['select_jefe'];
$area = $_POST['select_area'];
$contra = $_POST['password_emple'];
$X = 2;
$Y = 3;
// var_dump($ID);
// var_dump($name);
// var_dump($path_img);
// var_dump($path_pdf);
// var_dump($tel);
// var_dump($dire);
// var_dump($jefe);
// var_dump($area);
// var_dump($contra);
$objEmpleado = new empleado($ID, $name, $path_img, $path_pdf, $tel, $mail, $dire, $X, $Y, $jefe, $area, $contra);
$objControlempleados = new controlempleado($objEmpleado);
$r = $objControlempleados->guardar();

if($r) 
{  
    if(($rs_carga_pdf) && ($rs_carga_ima) )
    {
        $rpesta_clta = "El Empleado se guardo correctamente";
    } else {
        $rpesta_clta = "El Empleado se guardo correctamente pero la imagen no se pudo guardar, intente más tards";
    }
  
} else
{
  $rpesta_clta = "Algo salio mal, por favor intente más tarde";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="home">
  <center>
  <h1>Bienvenido</h1>

 <p>El estado al crear el empleado es: <?php echo $rpesta_clta; ?></p>
 <a href="empleado.php">Volver</a>

  </center>

  </div>

</body>
</html>