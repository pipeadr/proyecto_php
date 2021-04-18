<?php
	class DetalleReq
	{
		var $IDDETALLE;
        var $FECHA;
        var $OBSERVACION;
        var $FKREQ;
        var $FKESTADO;
        var $FKEMPLE;
		var $FKEMPLEASIGNADO;
		function __construct($IDDETALLE,$FECHA,$OBSERVACION,$FKREQ,$FKESTADO,$FKEMPLE,$FKEMPLEASIGNADO)
		{
			$this->IDDETALLE=$IDDETALLE;
            $this->FECHA=$FECHA;
            $this->OBSERVACION=$OBSERVACION;
            $this->FKREQ=$FKREQ;
            $this->FKESTADO=$FKESTADO;
			$this->FKEMPLE=$FKEMPLE;
            $this->FKEMPLEASIGNADO=$FKEMPLEASIGNADO;            
		}
		function setIDDETALLE($IDDETALLE){
			$this->IDDETALLE=$IDDETALLE;
		}
		function getIDDETALLE(){
			return $this->IDDETALLE;
		}
        function setFECHA($FECHA){
			$this->FECHA=$FECHA;
		}
		function getFECHA(){
			return $this->FECHA;
		}
        function setOBSERVACION($OBSERVACION){
			$this->OBSERVACION=$OBSERVACION;
		}
		function getOBSERVACION(){
			return $this->OBSERVACION;
		}
        function setFKREQ($FKREQ){
			$this->FKREQ=$FKREQ;
		}
		function getFKREQ(){
			return $this->FKREQ;
                }
        function setFKESTADO($FKESTADO){
			$this->FKESTADO=$FKESTADO;
		}
		function getFKESTADO(){
			return $this->FKESTADO;
                }
		function setFKEMPLE($FKEMPLE){
			$this->FKEMPLE=$FKEMPLE;
		}
		function getFKEMPLE(){
			return $this->FKEMPLE;
		}
         function setFKEMPLEASIGNADO($FKEMPLEASIGNADO){
			$this->FKEMPLEASIGNADO=$FKEMPLEASIGNADO;
		}
		function getFKEMPLEASIGNADO(){
			return $this->FKEMPLEASIGNADO;
                
        }
        }
?>