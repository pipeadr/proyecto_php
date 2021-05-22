<?php
	
	class cargo
	{
		var $IDCARGO;
		var $NOMBRE;
		
		function __construct($IDCARGO,$NOMBRE)
		{
			$this->IDCARGO=$IDCARGO;
			$this->NOMBRE=$NOMBRE;
			
		}

		function setIDCARGO($IDCARGO){
			$this->IDCARGO=$IDCARGO;
		}
		function getIDCARGO(){
			return $this->IDCARGO;
		}
		function setNOMBRE($NOMBRE){
			$this->NOMBRE=$NOMBRE;
		}
		function getNOMBRE(){
			return $this->NOMBRE;
		}
    
    }

?>