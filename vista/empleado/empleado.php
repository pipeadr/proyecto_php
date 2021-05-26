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
include '../../modelo/empleado/empleado.php';
include '../../controlador/controlempleado.php'; 
include '../../controlador/consultar_Jefe/control_consultar_jefe.php';

/* Consultar Empleados */
$db = new controlconexion();
$db->abrirBd("localhost","root","","mesa_ayuda");
$comandoSql = "SELECT emple.IDEMPLEADO, emple.NOMBRE, emple.FOTO, emple.HOJAVIDA, emple.TELEFONO, emple.EMAIL, emple.DIRECCION,
emple.X, emple.Y,
carxemple.FKEMPLE,
car.NOMBRE AS Nombre_Cargo,
ar.NOMBRE AS NOMBRE_AREA,
jef.NOMBRE AS NOMBRE_JEFE
FROM empleado emple
INNER JOIN cargo_por_empleado carxemple ON carxemple.FKEMPLE = emple.IDEMPLEADO
INNER JOIN cargo car ON carxemple.FKCARGO = car.IDCARGO
INNER JOIN area ar ON ar.IDAREA = emple.fkAREA
INNER JOIN empleado jef on jef.IDEMPLEADO = emple.fkEMPLE_JEFE
ORDER BY emple.IDEMPLEADO";
$rs = $db->ejecutarSelect($comandoSql);
$registros = $rs->fetch_all(MYSQLI_ASSOC);
/*Consultar jefe */
$Sql_area = "select IDAREA, NOMBRE from area";
$rs_area = $db->ejecutarSelect($Sql_area);
$cnslta_areas = $rs_area->fetch_all(MYSQLI_ASSOC);
$db->cerrarBd();
//var_dump($registros);
//var_dump($cnslta_areas);
 /* Cargos*/
 $db = new controlconexion();
 $db->abrirBd("localhost","root","","mesa_ayuda");
 $comandoSql = "select * from cargo";
 $rs_ = $db->ejecutarSelect($comandoSql);
 $cargos = $rs_->fetch_all(MYSQLI_ASSOC);
 $db->cerrarBd();



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
    <center>
     <h1>Empleados</h1>
     <div class="table_re">
     <table class ="tabla_empleados">
     <thead>
     <tr>
     <th>ID</th>
     <th>Nombre</th>
     <th>Foto</th>
     <th>HV</th>
     <th>telefono</th>
     <th>Correo</th>
     <th>Dirrección</th>
     <th>X</th>
     <th>Y</th>
     <th>Cargo</th>
     <th>Jefe</th>
     <th>Area</th>
     <th>editar</th>
     <th>eliminar</th>
     </tr>
     </thead>
     <?php foreach($registros as $registro) {?>
     
     <tr>
      <td><?php echo $registro["IDEMPLEADO"];  ?></td>
      <td><?php echo $registro["NOMBRE"];  ?></td>
      <td><a target="_blank" rel="noopener noreferrer" href="<?php echo $registro["FOTO"];?>">Ver Foto</a></td>
      <td><a target="_blank" rel="noopener noreferrer" href="<?php echo $registro["HOJAVIDA"];?>">Ver HV</a></td>
      <td><?php echo $registro["TELEFONO"];  ?></td>
      <td><?php echo $registro["EMAIL"];  ?></td>
      <td><?php echo $registro["DIRECCION"];  ?></td>
      <td><?php echo $registro["X"];  ?></td>
      <td><?php echo $registro["Y"];  ?></td>
      <td><?php echo $registro["Nombre_Cargo"];  ?></td>
      <td><?php echo $registro["NOMBRE_JEFE"];  ?></td>
      <td><?php echo $registro["NOMBRE_AREA"];  ?></td>
      <td><a href="editar_empleado.php?id=<?php echo $registro["IDEMPLEADO"];?>"><i class="fas fa-edit"></i></a></td>
      <td><a href="eliminar_empleado.php?id=<?php echo $registro["IDEMPLEADO"];?>"><i class="fas fa-trash-alt"></i></a></td>
     </tr>
     <?php }?>
     </table>
     </div>   
     <!-- Inicio insert -->
     
    <hr>
    <h3 class="title-em">Ingresar Nuevos Empleados</h3> 
      <form method="post"  action="insertar_emp.php" enctype="multipart/form-data">

      <div class="home">  
          <div class="elmto-emple">
          <p class="p-emple">ID:</p>
          <input class="btn_empl" type="text" name="txtID" required="">
          <p class="p-emple">Nombre:</p>
          <input class="btn_empl" type="text" name="txtNombre" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="Ingrese su nombre completo, con apellidos">
          </div>   <!--div elmto-emple-->

          <div class="elmto-emple">
          <p class="p-emple">Foto:</p>
          <input type="file" name="foto_em" accept="image/*" required="" x-moz-errormessage="Por favor, ingrese un archivo válido.">
          <p class="p-emple">HV:</p>
          <input type="file" name="HV_em" accept="application/pdf" required="" x-moz-errormessage="Por favor, ingrese un archivo válido.">
          </div>   <!--div elmto-emple-->

          <div class="elmto-emple">
          <p class="p-emple">Télefono:</p>
          <input class="btn_empl" type="tel" name="txtTelefono">
          <p class="p-emple">Email:</p>
          <input class="btn_empl" type="email" name="mail" id="" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" size="30" x-moz-errormessage="Por favor, especifique una dirección de correo válida." required="">
          </div>   <!--div elmto-emple-->

          <div class="elmto-emple">
          <p class="p-emple">Dirección:</p>
          <input class="btn_empl"  type="text" name="direccion" id="" title="Ingrese la dirección de su ubicación inluyendo múnicipio">
          <p class="p-emple">Jefe:</p>
          <select  name="select_jefe" id="">
            <option value ="0">Seleccionar Jefe</option>
            <?php foreach($registros as $registro) {  ?>
            <option name="select_jefe" value ="<?php echo $registro["IDEMPLEADO"];?>"><?php echo $registro["NOMBRE"];?></option>  
            <?php } ?>
            </select>
          </div>   <!--div elmto-emple-->

          <div class="elmto-emple">
          <p class="p-emple">Cargo:</p>
          <select  name="select_cargo" id="">
            <?php foreach($cargos  as $cargo) { ?>
            <option name="select_cargo" value ="<?php echo $cargo["IDCARGO"];?>"><?php echo $cargo["NOMBRE"]; ?></option>  
            <?php } ?>
            </select>
            <p class="p-emple">Fecha ingreso:</p>
            <input type="date" name="Fecha_creac" id="" required>
          
          </div>
                   <input type="hidden" name="latitu" id="latitude_" value="">
                   <input type="hidden" name="longi" id="longitude_" value="">
          <div class="elmto-emple">
          <p class="p-emple">Área:</p>
          <select  name="select_area" id="">
            <option value ="0">Seleccionar Area</option>
            <?php foreach($cnslta_areas  as $cnslta_area) {  ?>
            <option name="select_area" value ="<?php echo $cnslta_area["IDAREA"];?>" required><?php echo $cnslta_area["NOMBRE"]; ?></option>  
            <?php } ?>
            </select>
          <p class="p-emple">Contraseña:</p>
          <input class="btn_empl" type="password" name="password_emple" id="" pattern="[A-Za-z0-9!?-]{8,12}" title="Debe tener mínimo 8 caracteres " required>
          </div>   <!--div elmto-emple-->

          <table>           
           <!-- <input type="hidden" name="oculto" value="1"> -->
            <tr>
              <td><input class="botones"  type="reset"></td>
              <td><input class="botones" type="submit" value="Ingresar Empleado"></td>
            </tr>
          </table>
       </div>
      </form>

    <!-- fin insert -->

     </center> 
</body>
<script src="https://kit.fontawesome.com/176c817b83.js" crossorigin="anonymous"></script>

<script src="../../js/main.js">
</script>
</html>