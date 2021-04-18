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
<div class="padre">
   <h1>Iniciar Sección</h1>
     <div class="formulario_login">
	 <form action="vista_login.php" method="POST">

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
  <input type="submit" name="btnEnviar">
  </center>
	
		</form>

	 </div>

</div>
</body>
</html>