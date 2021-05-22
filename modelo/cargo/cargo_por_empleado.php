<?php
	
	class cargo_por_empleado
	{
		var $FKCARGO;
		var $FKEMPLE;
        var $FECHAINI;
        var $FECHAFIN;
		
		function __construct($FKCARGO, $FKEMPLE, $FECHAINI, $FECHAFIN)
		{
			$this->FKCARGO = $FKCARGO;
            $this->FKEMPLE = $FKEMPLE;
            $this->FECHAINI = $FECHAINI;
            $this->FECHAFIN = $FECHAFIN;
		}

		function setFKCARGO($FKCARGO){
			$this->FKCARGO=$FKCARGO;
		}
		function getFKCARGO(){
			return $this->FKCARGO;
		}
		function setFKEMPLE($FKEMPLE){
			$this->FKEMPLE=$FKEMPLE;
		}
		function getFKEMPLE(){
			return $this->FKEMPLE;
		}
        function setFECHAINI($FECHAINI){
			$this->FECHAINI=$FECHAINI;
		}
		function getFECHAINI(){
			return $this->FECHAINI;
		}
        function setFECHAFIN($FECHAFIN){
			$this->FECHAFIN=$FECHAFIN;
		}
		function getFECHAFIN(){
			return $this->FECHAFIN;
		}
    
    }

?>