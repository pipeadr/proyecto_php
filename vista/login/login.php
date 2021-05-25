<?php
session_start();
if(isset( $_SESSION['Usuarios'])) {
	$a = $_SESSION['Usuarios'];
	if(isset($a)) {
		$b = $a['Nombre_Cargo'];
		  switch($b) {
			case "Administrador":
			header('Location: admin.php');
			break;
			case "Director":
			 header('Location: director.php');
			 break;
			 case "Lider":
			   header('Location: lider.php');
			   break;
			   case "Empleado":
				 header('Location: employee.php');
				 break;
		  }
		}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sección</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="padre-login">
   <h1>Iniciar Sección</h1>
     <div class="formulario_login">
	 <!-- <form action="vista_login.php" method="POST"> -->
     <form action="validar.php" method="POST">
	 <div class="ppl">
       <div class="hijo">
	     <label for="em" class="login">Código Empleado</label>
	      <input type="text"  id="em" class="login" name="txtEmpleado">
	  </div>

	  <div class="hijo">
	    <label for="ps" class="login" >Contraseña</label>
	  <input type="password" id="ps" class="login" name="txtContrasena">
	  </div>
	 </div>
  <center>
  <input class="btn-enivar" type="submit" name="btnEnviar">
  </center>
	
		</form>

	 </div>
	 <script src="https://kit.fontawesome.com/176c817b83.js" crossorigin="anonymous"></script>
</div>
</body>
</html>