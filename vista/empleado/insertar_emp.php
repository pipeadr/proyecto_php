<?php
include '../../controlador/controlempleado.php';
include '../../modelo/empleado/empleado.php';
include '../../controlador/controlconexion.php';
include '../../controlador/controladorcargo_por_empleado.php';
include '../../modelo/cargo/cargo_por_empleado.php';
include  '../../config/congif.php';

$ID = $_POST['txtID'];
$name = $_POST['txtNombre'];

$db = new controlconexion();
$db->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
$comandoSql = "SELECT COUNT(*) AS conteo FROM empleado WHERE IDEMPLEADO = '".$ID."'";
$rs_id = $db->ejecutarSelect($comandoSql);
// $registros = $rs_id->fetch_all(MYSQLI_ASSOC);
$registros = $rs_id->fetch_array(MYSQLI_BOTH);
// $registro = $recordSet->fetch_array(MYSQLI_BOTH);
$db->cerrarBd();
$conteo_id = $registros["conteo"];
if($conteo_id >= 1) {
  ?>
  <script type="text/javascript">
alert("El Usuario que usted va registrar ya existe en la plataforma, por favor revise la informacipon que esta digitando");
window.location='empleado.php'; 
</script>
<?php  
} else {

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
$X__ = $_POST['longi'];
$Y__ = $_POST['latitu'];
if($X__ && $Y__) {
 $X = $X__;
 $Y = $Y__;
}
  else {
    $X = 1;
    $y = 1;
  }
// $X = 2;
// $Y = 3;
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
//var_dump($r);
$cargo_empleado = $_POST['select_cargo'];
$fechaini = $_POST['Fecha_creac'];
//var_dump($cargo);

// if($r) 
// {  
//     if(($rs_carga_pdf) && ($rs_carga_ima) )
//     {
//       $rpesta_clta = true;
//       $rpesta_foto = true;
//     } else {
//       $rpesta_clta = true;
//       $rpesta_foto = false;
//     }
  
// } else
// {
//   $rpesta_clta = false;
//   $rpesta_foto = false;
// }

$objcargo_por_empleados = new cargo_por_empleado($cargo_empleado, $ID, $fechaini, NULL);
$objcargo_por_empleado = new controladorcargo_por_empleado($objcargo_por_empleados);
$cg = $objcargo_por_empleado->guardar();
//respuesta cargo
if($cg) 
{ 
  $rpta_cargo = true;
} else {
  $rpta_cargo = false;
}
//respuesta final
 /** */
if($r) {
   if($rpta_cargo) {
      if($rs_carga_ima && $rs_carga_pdf) {
        $rptafinal = "El Empleado se guardo correctamente";
      } else {
        $rptafinal = "El Empleado se guardo correctamente pero algo fallo con los archivos";
      }
   } else  { //else del cargo
         if($rs_carga_ima && $rs_carga_pdf) { //else del cargo
          $rptafinal = "El Empleado se guardo correctamente pero el cargo no";
         } else { //else del cargo archivos
          $rptafinal = "El Empleado se guardo correctamente pero algo fallo con los archivos y el cargo";
         }
   } 
} else { //else del cargo ppl
  $rptafinal = "algo salió mal"; 
}
}
?>
<script type="text/javascript">
alert("<?php echo $rptafinal; ?>");
window.location='empleado.php'; 
</script>