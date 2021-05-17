<?php
	
	class consultar_requerimiento
	{ 
        var $IDREQUERIMIENTO;
		var $FKESTADO;
		var $IDEMPLEADO;
	

		function __construct($IDREQUERIMIENTO, $FKESTADO, $IDEMPLEADO)
		{
           $this->IDREQUERIMIENTO=$IDREQUERIMIENTO;
		   $this->FKESTADO=$FKESTADO;  
		   $this->IDEMPLEADO = $IDEMPLEADO;

		}
		function setIDDETALLE($IDREQUERIMIENTO)
		{
			$this->IDREQUERIMIENTO=$IDREQUERIMIENTO;
		}
		function getIDDETALLE() {
			return $this->IDREQUERIMIENTO;
			 
		}
		function setFKESTADO($FKESTADO)
		{
			$this->FKESTADO=$FKESTADO;
		}
		function getFKESTADO() {
			return $this->FKESTADO;
			
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