<?php
include '../../modelo/empleado/empleado.php';
include '../../controlador/controlempleado.php';
include '../../controlador/controlconexion.php'; 

$ID_EMPLEADO = $_POST["txtEmpleado"];
$PASSWORD = $_POST["txtContrasena"];

$db = new controlconexion();
$db->abrirBd("localhost","root","","mesa_ayuda");
$consultaUsuario = "SELECT emple.IDEMPLEADO, emple.NOMBRE, emple.PASSWORD,
       carxemple.FKEMPLE,
       car.NOMBRE AS Nombre_Cargo
       FROM empleado emple
       INNER JOIN cargo_por_empleado carxemple ON carxemple.FKEMPLE = emple.IDEMPLEADO
       INNER JOIN cargo car ON carxemple.FKCARGO = car.IDCARGO
       WHERE IDEMPLEADO = '".$ID_EMPLEADO."' AND PASSWORD ='".$PASSWORD."'";
$resultados = $db->ejecutarSelect($consultaUsuario);
$resultado = $resultados->fetch_array(MYSQLI_BOTH);
$db->cerrarBd();
$id = $resultado['IDEMPLEADO'];
$pass = $resultado['PASSWORD'];

if(($ID_EMPLEADO === $id) && ($PASSWORD === $pass)) {
    session_start();
    $_SESSION['Usuarios'] = $resultado;
    header('Location: vista_login.php');
} else { ?>
<script type="text/javascript">
alert("La contraseña o el Código del empleado no son correctos, intente nuevamente");
window.location='login.php';
</script>
<?php
}
?>