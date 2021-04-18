<?php
	
	class empleado
	{
                var $NOMBRE;
                var $FOTO;
                var $HOJAVIDA;
                var $TELEFONO;
                var $EMAIL;
                var $DIRECCION;
                var $X;
                var $Y;                 
                var $fkEMPLE_JEFE;
                var $fkAREA;
                var $PASSWORD;

		function __construct($NOMBRE,$FOTO,$HOJAVIDA,$TELEFONO,$EMAIL,$DIRECCION,$X,$Y,$fkEMPLE_JEFE,$fkAREA,$PASSWORD)
		{

           $this->NOMBRE=$NOMBRE;
           $this->FOTO=$FOTO;
           $this->HOJAVIDA=$HOJAVIDA;
           $this->TELEFONO=$TELEFONO;
		   $this->EMAIL=$EMAIL;
           $this->DIRECCION=$DIRECCION;
           $this->X=$X;
           $this->Y=$Y;
           $this->fkEMPLE_JEFE=$fkEMPLE_JEFE;
           $this->fkAREA=$fkAREA;
           $this->PASSWORD=$PASSWORD;
			
		}
		function setIDEMPLEADO($IDEMPLEADO){
			$this->IDEMPLEADO=$IDEMPLEADO;
		}
		function getIDEMPLEADO(){
			return $this->IDEMPLEADO;
		}
                function setNOMBRE($NOMBRE){
			$this->NOMBRE=$NOMBRE;
		}
		function getNOMBRE(){
			return $this->NOMBRE;
		}
                function setFOTO($FOTO){
			$this->FOTO=$FOTO;
		}
		function getFOTO(){
			return $this->FOTO;
		}
                function setHOJAVIDA($HOJAVIDA){
			$this->HOJAVIDA=$HOJAVIDA;
		}
		function getHOJAVIDA(){
			return $this->HOJAVIDA;
                }
                function setTELEFONO($TELEFONO){
			$this->TELEFONO=$TELEFONO;
		}
		function getTELEFONO(){
			return $this->TELEFONO;
                }
		function setEMAIL($EMAIL){
			$this->EMAIL=$EMAIL;
		}
		function getEMAIL(){
			return $this->EMAIL;
		}
                function setDIRECCION($DIRECCION){
			$this->DIRECCION=$DIRECCION;
		}
		function getDIRECCION(){
			return $this->DIRECCION;
                }
                function setX($X){
			$this->X=$X;
		}
		function getX(){
			return $this->X;
		}
                function setY($Y){
			$this->Y=$Y;
		}
		function getY(){
			return $this->Y;
		}
                function setfkEMPLE_JEFE($fkEMPLE_JEFE){
			$this->fkEMPLE_JEFE=$fkEMPLE_JEFE;
		}
		function getfkEMPLE_JEFE(){
			return $this->fkEMPLE_JEFE;
		}
                function setfkAREA($fkAREA){
			$this->fkAREA=$fkAREA;
		}
		function getfkAREA(){
			return $this->fkAREA;
		}
        function setPASSWORD($PASSWORD){
			$this->PASSWORD=$PASSWORD;
		}
		function getPASSWORD(){
			return $this->PASSWORD;
		}
        }
?>