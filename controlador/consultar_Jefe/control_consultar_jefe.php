<?php
 
 class control_consultar_jefe{

    var $objEmpleados;

        function __construct($id)
        {
            $this->id=$id;
        }
          
        function setId($id){
			$this->id=$id;
		}
		function getId(){
			return $this->id; 
		}
   
        function consultar()  
        {
            

            // $cod=$this->objClientes->getCodigo();
            $cod = $this->getId();		
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
            $comandoSql = "SELECT * FROM empleado where IDEMPLEADO = '".$cod."'";
            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            //$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
            $registro = $rs->fetch_all(MYSQLI_ASSOC);//Asigna los datos a la variable $registro
            $objControlConexion->cerrarBd();
            return $registro;
        }


 }
?>