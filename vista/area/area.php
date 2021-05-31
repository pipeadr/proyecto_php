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
/* Conexxión BD */
$db = new controlconexion();
$db->abrirBd("localhost","root","","mesa_ayuda");
/* Consultar Area */
$comandoSql = "select * from area";
$rs = $db->ejecutarSelect($comandoSql);
$registros = $rs->fetch_all(MYSQLI_ASSOC);
/* Consultar Empleado */
$Sql = "select * from empleado";
$rs_em = $db->ejecutarSelect($Sql);
$empleados = $rs_em->fetch_all(MYSQLI_ASSOC);
$db->cerrarBd();
//var_dump($empleados);


 ?>
 <!DOCTYPE html> 
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Areas</title>
     <link rel="stylesheet" href="../../css/style.css">
 </head>
 <?php include("../../header.php");?>
 <body>
     <h1 class="title-home" >Áreas</h1>
     <div class="table_re">
     <table class ="tabla_empleados">
     <thead>
      <tr>
       <th>ID</th>
       <th>Nombre Área</th>
       <th>Nombre Lider Área</th>
       <th>Editar</th>
       <th>Área</th>
      </tr>
     </thead>
     <?php foreach($registros as $registro) {?>
     <tr>
      <td><?php echo $registro["IDAREA"];  ?></td>
      <td><?php echo $registro["NOMBRE"];  ?></td>
      <td>
      <?php 
      foreach($empleados as $empleado) {  
        if($registro["FKEMPLE"] ===  $empleado['IDEMPLEADO'])
        {
            echo $empleado["NOMBRE"]; 
            
        } 
       }
      ?>
      </td>
      <td><a href="editar_area.php?id=<?php echo $registro["IDAREA"];?>&fk_emple=<?php echo $registro["FKEMPLE"];?>"><i class="fas fa-edit"></i></a></td>
      <td><a href="eliminar_area.php?id=<?php echo $registro["IDAREA"];?>"><i class="fas fa-trash-alt"></i></a></td>
      </tr>
     <?php }?>    
     </table>
     </div>
     <div class="home">
       <div class="table_re">
       <h2 class="sub-title-home">Ingresar una nueva área</h2>
        <form class="hijo" method="post"  action="insertar_area.php">
             <input type="text" name="txtID" class="input"  placeholder="ID">
             <input class="input"  placeholder="Nombre" type="text" name="txtname" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}">
             <select class="noinput" name="select_lider" id="">
                <option value ="0">Seleccionar Jefe</option>
                   <?php
                   foreach($empleados as $empleado) {  ?>
                <option value ="<?php echo $empleado["IDEMPLEADO"];?>"><?php echo $empleado["NOMBRE"];?></option>
                   <?php } ?>
            </select>
              <div>
              <input class="botones" type="reset">
              <input class="botones" type="submit" value="Ingresar Área">
              <a class="botones" href="http://localhost/proyecto_php/vista/login/admin.php">Volver</a>
              </div>
        </form>
       </div>
     </div>
   
 </body>
 <script src="https://kit.fontawesome.com/176c817b83.js" crossorigin="anonymous"></script>
 </html>