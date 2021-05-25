<?php

class controlconexion
{
	
	var $conn;
	function __construct(){
		$this->conn=null;
	}
    function abrirBd($servidor, $usuario, $password, $db){
    	try	{
			$this->conn = new mysqli($servidor, $usuario, $password, $db);
            // $bd = new PDO('mysql:host=localhost;dbname=mvc;', $usuario , $contrasena);
			if ($this->conn->connect_errno) {
			printf("Connect failed: %s\n", $this->conn->connect_error);
			exit();
			}
      	}
      	catch (Exception $e){
          	echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
      	}

    }

    function cerrarBd() {
		try{
       $this->conn->close();
		}
      	catch (Exception $e){
          	echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
      	}		
    }

    function ejecutarComandoSql($sql) {
    	try	{
			
			return $this->conn->query($sql);
			}
		catch (Exception $e) {
				echo " NO SE AFECTARON LOS REGISTROS: ". $e->getMessage()."\n";
		  }	
		}

	function ejecutarSelect($sql) {
			try	{
				$recordSet=$this->conn->query($sql);
				}
	
			catch (Exception $e) {
					echo " ERROR: ". $e->getMessage()."\n";
			  }	
		return $recordSet; // Recordset apunta al encabezado de la tabla, resultado de la consulta
			}   
			function objconexion() {
				return $this->conn;   	
			  }

			
}
?>