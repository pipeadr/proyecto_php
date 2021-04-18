<?php
	
	class Requerimiento
	{
		var $IDREQ;
		var $FKAREA;
		
		function __construct($IDREQ,$FKAREA)
		{
			$this->IDREQ=$IDREQ;
			$this->FKAREA=$FKAREA;
			
		}

		function setIDREQ($IDREQ){
			$this->IDREQ=$IDREQ;
		}
		function getIDREQ(){
			return $this->IDREQ;
		}
		function setFKAREA($FKAREA){
			$this->FKAREA=$FKAREA;
		}
		function getFKAREA(){
			return $this->FKAREA;
		}
		
		
	}

?>