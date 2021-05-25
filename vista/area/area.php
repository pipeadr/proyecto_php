 <?php
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
 <body>
 <center>
     <h1>Áreas</h1>
     <div class="table_re">
     <table class ="tabla_empleados">
     <tr>
     <td>ID</td>
     <td>Nombre Área</td>
     <td>Nombre Lider Área</td>
     <td>Editar</td>
     <td>Área</td>
     </tr>
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
     <hr>
    <h3>Ingresar una nueva área</h3>
    <form method="post"  action="insertar_area.php">
        <table>
           <tr>
            <td>ID:</td>
            <td><input type="text" name="txtID" ></td>
           </tr>
           <tr>
            <td>Nombre:</td>
            <td><input type="text" name="txtname" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}"></td>
           </tr> 
           <tr sty>
            <td></td>
               <td>
                   <select style="margin-top: 20px;" name="select_lider" id="">
                   <option value ="0">Seleccionar Jefe</option>
                   <?php
            foreach($empleados as $empleado) {  ?>
            <option value ="<?php echo $empleado["IDEMPLEADO"];?>"><?php echo $empleado["NOMBRE"];?></option>
                   <?php } ?>
                   </select>
               </td>
           </tr>
           <tr>
              <td><input class="botones" type="reset"></td>
              <td><input class="botones" type="submit" value="Ingresar Empleado"></td>
            </tr>
           
        </table>
    </form>    
</center>
 </body>
 <script src="https://kit.fontawesome.com/176c817b83.js" crossorigin="anonymous"></script>
 </html>