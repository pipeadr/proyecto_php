<?php
include '../../controlador/controlconexion.php';
include '../../modelo/empleado/empleado.php';
include '../../controlador/controlempleado.php';
include '../../controlador/consultar_Jefe/control_consultar_jefe.php';

$ID = $_POST['ID'];
$name = $_POST['txt2nombre'];
$name_img = $_FILES['foto_em_ed']['name'];
$ruta_img = $_FILES['foto_em_ed']['tmp_name'];
if($name_img)
{
    if($_FILES['foto_em_ed']['error'] > 0) {
        $error_img = false;
    } else {
    if(!file_exists('archivos_img')) {
       mkdir('archivos_img');
       if(file_exists('archivos_img')) {
          if(move_uploaded_file($ruta_img, 'archivos_img/'.$name_img)) {
            $rs_carga_ima = true;
            //echo "Imagen se guardon con exito";
            $path_img = "archivos_img/".$name_img ;
          } else {
            $rs_carga_ima = false;   
          }
       }
    } else 
    {
        if(move_uploaded_file($ruta_img, 'archivos_img/'.$name_img)) {
            $rs_carga_ima = true;
            $path_img = "archivos_img/".$name_img ;
          } else {
            $rs_carga_ima = false;   
          }
    }
    } //acá se cierra el else ppl   
} else
{
    $path_img = $_POST['ID_img'];
    $rs_carga_ima = true;
}
$name_pdf = $_FILES['hv_em_ed']['name'];
$ruta_pdf = $_FILES['hv_em_ed']['tmp_name'];
/*****************/
if($name_pdf)
{
    if($_FILES['hv_em_ed']['error'] > 0) {
        $error_img = false;
    } else {
    if(!file_exists('archivos_pdf')) {
       mkdir('archivos_pdf');
       if(file_exists('archivos_pdf')) {
          if(move_uploaded_file($ruta_pdf, 'archivos_pdf/'.$name_pdf)) {
            $rs_carga_pdf = true;
            //echo "Imagen se guardon con exito";
            $path_pdf = "archivos_pdf/".$name_pdf ;
          } else {
            $rs_carga_pdf = false;   
          }
       }
    } else 
    {
        if(move_uploaded_file($ruta_pdf, 'archivos_pdf/'.$name_pdf)) {
            $rs_carga_pdf = true;
            $path_pdf = "archivos_pdf/".$name_pdf ;
          } else {
            $rs_carga_pdf = false;   
          }
    }
    } //acá se cierra el else ppl   
} else
{
    $path_pdf = $_POST['ID_pdf'];
    $rs_carga_pdf = true;
}
/***/
$tel = $_POST['txt2tel'];
$mail = $_POST['txt2correo'];
$dire = $_POST['txt2dire'];
$X = $_POST['txt2X'];
$Y = $_POST['txt2Y'];
$jefe = $_POST['select_jefe'];
$area = $_POST['select_area'];
$contra = $_POST['txt2pass'];
$objEmpleado = new empleado($ID, $name, $path_img, $path_pdf, $tel, $mail, $dire, $X, $Y, $jefe, $area, $contra);
$objControlempleados = new controlempleado($objEmpleado);
$r = $objControlempleados->modificar();
if($r) 
{  
    if(($rs_carga_pdf) && ($rs_carga_ima) )
    {
        $rpesta_clta = "El Empleado se guardo correctamente";
    } else {
        $rpesta_clta = "El Empleado se guardo correctamente pero la imagen no se pudo guardar, intente más tarde";
    }
  
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
    <title>Document</title>
</head>
<body>
    <p>El estado al actualizar el empleado es: <?php echo $rpesta_clta; ?></p>
    <a href="empleado.php">Volver a Empleados</a>
</body>
</html>