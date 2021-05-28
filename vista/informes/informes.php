<?php
session_start();
$a = $_SESSION['Usuarios'];
//var_dump($a);
 if(isset($a)) {
    $b = $a['Nombre_Cargo'];
     if($b != "Administrador") {
      echo '<script type="text/javascript">';
      echo 'alert("Usted no tiene permiso ver esta página");';
      echo 'window.location="login.php";';
      echo '</script>';
    //   header('Location: login.php');       
     }
 } else {
    echo '<script type="text/javascript">';
    echo 'alert("Debe Iniciar Sesión primero");';
    echo 'window.location="login.php";';
    echo '</script>';
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido <?php echo $a['NOMBRE'];?></title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php include("../../header.php");?>
 <div class="home">
 <h1 class="title-home">Bienvenido <?php echo $a['NOMBRE']; ?></h1>
  <h3 class="sub-title">¿Que desea hacer?</h3>
   
    <div class="padre">
     <a class="botones" href="informes01.php">Infome #1</a>
     <a  class="botones" href="informes02.php">Informe #2</a>
     <a class="botones" href="">Informe #3</a>
     <a class="botones" href="informes04.php">Informe #4</a>
     <a class="botones" href="informes05.php">Informe #5</a>
     <a class="botones" href="">Informe #6</a>
     <a class="botones" href="cerrar_sesion.php">Cerrar Sección</a>
      <!-- <form method="post" action="" class="hijo"> 
    <input class="botones"  type="submit" name="btn" value="Cerrar Sección">
      </form> -->
    </div>

 </div>
</body>
</html>