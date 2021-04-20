<?php
include '../../controlador/controlconexion.php';
include '../../modelo/empleado/empleado.php';
include '../../controlador/controlempleado.php';
include '../../controlador/consultar_Jefe/control_consultar_jefe.php';

/* Consultar Empleados */
$db = new controlconexion();
$db->abrirBd("localhost","root","","mesa_ayuda");
$comandoSql = "select * from empleado";
$rs = $db->ejecutarSelect($comandoSql);
$registros = $rs->fetch_all(MYSQLI_ASSOC);
/*Consultar jefe */
$Sql_area = "select IDAREA, NOMBRE from area";
$rs_area = $db->ejecutarSelect($Sql_area);
$cnslta_areas = $rs_area->fetch_all(MYSQLI_ASSOC);
$db->cerrarBd();
//var_dump($registros);
//var_dump($cnslta_areas);



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
</head>
<body>
    <center>
     <h1>Empleados</h1>
     <table>
     <tr>
     <td>ID</td>
     <td>Nombre</td>
     <td>Foto</td>
     <td>HV</td>
     <td>telefono</td>
     <td>Correo</td>
     <td>Dirrección</td>
     <td>X</td>
     <td>Y</td>
     <td>Jefe</td>
     <td>Area</td>
     </tr>
     <?php foreach($registros as $registro) {?>
     
     <tr>
      <td><?php echo $registro["IDEMPLEADO"];  ?></td>
      <td><?php echo $registro["NOMBRE"];  ?></td>
      <td><a href="<?php echo $registro["FOTO"];?>">Ver Foto</a></td>
      <td><a href="<?php echo $registro["HOJAVIDA"];?>">Ver HV</a></td>
      <td><?php echo $registro["TELEFONO"];  ?></td>
      <td><?php echo $registro["EMAIL"];  ?></td>
      <td><?php echo $registro["DIRECCION"];  ?></td>
      <td><?php echo $registro["X"];  ?></td>
      <td><?php echo $registro["Y"];  ?></td>
      <td>
        <?php 
        $objConsulta_empleado = new control_consultar_jefe($registro["fkEMPLE_JEFE"]);
        $consultas = $objConsulta_empleado->consultar();
        //var_dump($consultas);
        foreach($consultas as $consulta) {
            echo $consulta["NOMBRE"];
        }
        ?>
      </td> 
      <td>
      <?php 
        foreach($cnslta_areas  as $cnslta_area) {
          if($cnslta_area["IDAREA"] === $registro["fkAREA"] ){
            echo $cnslta_area["NOMBRE"]; 
          }
        }
        ?>
      </td>
      <td><a href="editar_empleado.php?id=<?php echo $registro["IDEMPLEADO"];?>"><i class="fas fa-edit"></i></a></td>
      <td><a href="eliminar_empleado.php?id=<?php $registro["IDEMPLEADO"];?>"><i class="fas fa-trash-alt"></i></a></td>
     </tr>
     <?php }?>
     </table>

     <!-- Inicio insert -->
     <br> <br>
    <hr>
    <h3>Ingresar Nuevos Empleados</h3> 
      <form method="post"  action="insertar_emp.php" enctype="multipart/form-data">
          <table>
          <tr>
            <td>ID:</td>
            <td><input type="text" name="txtID"></td>
           </tr>
           <tr>
            <td>Nombre:</td>
            <td><input type="text" name="txtNombre"></td>
           </tr>
           <tr>
            <td>Foto:</td>
            <td><input type="file" name="foto_em" accept="image/*"></td>
           </tr>
           <tr>
            <td>HV:</td>
            <td><input type="file" name="HV_em" accept="application/pdf"></td>
           </tr>
           <tr>
            <td>Télefono:</td>
            <td><input type="text" name="txtTelefono"></td>
           </tr>
           <tr>
            <td>email:</td>
            <td><input type="email" name="mail" id=""></td>
           </tr>
           <tr>
            <td>Dirección:</td>
            <td><input type="text" name="direccion" id=""></td>
           </tr>
            <tr>
            <td>Jefe:</td>
            <td>
            <select  name="select_jefe" id="">
            <option value ="0">Seleccionar Jefe</option>
            <?php foreach($registros as $registro) {  ?>
            <option name="Areas_" value ="<?php echo $registro["IDEMPLEADO"];?> "><?php echo $registro["NOMBRE"];?></option>  
            <?php } ?>
            </select></td> 
            </tr>
            <tr>
            <td>Area:</td>
            <td>
            <select  name="select_area" id="">
            <option value ="0">Seleccionar Area</option>
            <?php foreach($cnslta_areas  as $cnslta_area) {  ?>
            <option name="Areas_" value ="<?php echo $cnslta_area["IDAREA"]; ?> "><?php echo $cnslta_area["NOMBRE"]; ?></option>  
            <?php } ?>
            </select></td> 
            </tr>
            <tr>
            <td>Contraseña:</td>
            <td><input type="password" name="password_emple" id=""></td>
           </tr>
           
           
           <!-- <input type="hidden" name="oculto" value="1"> -->
            <tr>
              <td><input type="reset"></td>
              <td><input type="submit" value="Ingresar Empleado"></td>
            </tr>
          </table>
      </form>

    <!-- fin insert -->

     </center> 
</body>
<script src="https://kit.fontawesome.com/176c817b83.js" crossorigin="anonymous"></script>
</html>