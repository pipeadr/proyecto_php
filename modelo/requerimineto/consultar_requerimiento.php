<?php
	
	class consultar_requerimiento
	{ 
        var $IDREQUERIMIENTO;
		var $FKESTADO;
	

		function __construct($IDREQUERIMIENTO, $FKESTADO)
		{
           $this->IDREQUERIMIENTO=$IDREQUERIMIENTO;
		   $this->FKESTADO=$FKESTADO;  
			
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
         
               
        }
?>