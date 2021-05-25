<?php
session_start();
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
?>