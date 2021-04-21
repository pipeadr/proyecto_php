<?php
	
	class Area 
	{
		var $IDAREA;
		var $NOMBRE;
        var $FKEMPLE;
		
		function __construct($IDAREA,$NOMBRE,$FKEMPLE)
		{
			$this->IDAREA=$IDAREA;
			$this->NOMBRE=$NOMBRE;
            $this->FKEMPLE=$FKEMPLE;
			
		}

		function setIDAREA($IDAREA){
			$this->IDAREA=$IDAREA;
		}
		function getIDAREA(){
			return $this->IDAREA;
		}
		function setNOMBRE($NOMBRE){
			$this->NOMBRE=$NOMBRE;
		}
		function getNOMBRE(){
			return $this->NOMBRE;
		}
                function setFKEMPLE($FKEMPLE){
			$this->FKEMPLE=$FKEMPLE;
		}
		function getFKEMPLE(){
			return $this->FKEMPLE;
		
	}
        }

?>