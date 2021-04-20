<?php
	
	class consultar_empleado
	{ 
        var $IDEMPLEADO;
	

		function __construct($IDEMPLEADO)
		{
           $this->IDEMPLEADO=$IDEMPLEADO;
			
		}
		function setIDEMPLEADO($IDEMPLEADO)
		{
			$this->IDEMPLEADO=$IDEMPLEADO;
		}
		function getIDEMPLEADO() {
			return $this->IDEMPLEADO;
			
		}
               
        }
?>