<?php
/**
 * -Para llamar a un metodo primero hay que instanciar la clase, es decir crear un objeto de la clase
   -En PHP $nombreObjeto = new nombreClase(Argumentos del constructor)
   -Para llamar un metodo se escribe $nobreObjeto->nombreMetodo(Argumentos)
 */ 
class ControlDetalleReq
{
	var $objControlDetalleReq;

	function __construct($objControlDetalleReq) 
	{
		$this->objControlDetalleReq=$objControlDetalleReq;
	}

	function guardar()
	{
        //IDDETALLE	FECHA	OBSERVACION	FKREQ	FKESTADO	FKEMPLE	FKEMPLEASIGNADO
		//$IDDETALLE=$this->objControlDetalleReq->get_included_files()TALLE();
		$FECHA=$this->objControlDetalleReq->getFECHA();
        $OBSERVACION=$this->objControlDetalleReq->getOBSERVACION();
        $FKREQ=$this->objControlDetalleReq->getFKREQ();
        $FKESTADO=$this->objControlDetalleReq->getFKESTADO();
        $FKEMPLE=$this->objControlDetalleReq->getFKEMPLE();
        $FKEMPLEASIGNADO=$this->objControlDetalleReq->getFKEMPLEASIGNADO(); 
		$db= new ControlConexion();
		$db->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into detallereq values(NULL, '".$FECHA."','".$OBSERVACION."', '".$FKREQ."', '".$FKESTADO."','".$FKEMPLE."', '".$FKEMPLEASIGNADO."')";
		//var_dump($comandoSql);
		//$db->ejecutarComandoSql($comandoSql);
		if ( $db->ejecutarComandoSql($comandoSql) )
		{
			//$mData=array ('msg'=>'guardo Correctamente');	
			$mData = true;
		}
		else {
			//$mData=array ('error'=>'Ocurrió un error ...');
			$mData = false;	
		}
		$db->cerrarBd();
		return $mData;    
	}

	function consultar()
	{
             //IDDETALLE	FECHA	OBSERVACION	FKREQ	FKESTADO   FKEMPLE  FKEMPLEASIGNADO
		$IDDETALLE=$this->objControlDetalleReq->getIDDETALLE();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from detallereq where IDDETALLE = '".$IDDETALLE."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$FECHA = $registro["FECHA"];
        $OBSERVACION = $registro["OBSERVACION"];
        $FKREQ = $registro["FKREQ"];
        $FKESTADO = $registro["FKESTADO"];
        $FKEMPLE = $registro["FKEMPLE"];
        $FKEMPLEASIGNADO = $registro["FKEMPLEASIGNADO"];
		$this->objControlDetalleReq->setFECHA($FECHA);
        $this->objControlDetalleReq->setOBSERVACION($OBSERVACION);
        $this->objControlDetalleReq->setFKREQ($FKREQ);
        $this->objControlDetalleReq->setFKESTADO($FKESTADO);
        $this->objControlDetalleReq->setFKEMPLE($FKEMPLE);
        $this->objControlDetalleReq->setFKEMPLEASIGNADO($FKEMPLEASIGNADO);
		$objControlConexion->cerrarBd();
		return $this->objControlDetalleReq;
	}

	function modificar()
	{
             //IDDETALLE	FECHA	OBSERVACION	FKREQ	FKESTADO	FKEMPLE	FKEMPLEASIGNADO
		$IDDETALLE=$this->objControlDetalleReq->getIDDETALLE();
        $FECHA=$this->objControlDetalleReq->getFECHA();
        $OBSERVACION=$this->objControlDetalleReq->getOBSERVACION();
        $FKREQ=$this->objControlDetalleReq->getFKREQ();
        $FKESTADO=$this->objControlDetalleReq->getFKESTADO();
        $FKEMPLE=$this->objControlDetalleReq->getFKEMPLE();
        $FKEMPLEASIGNADO=$this->objControlDetalleReq->getFKEMPLEASIGNADO();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update detallereq set FECHA = '".$FECHA."', OBSERVACION = '".$OBSERVACION."', FKREQ = '".$FKREQ."', FKESTADO = '".$FKESTADO."', FKEMPLE = '".$FKEMPLE."', FKEMPLEASIGNADO = '".$FKEMPLEASIGNADO."' where IDDETALLE = '".$IDDETALLE."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function modificar_tem()
	{
             //IDDETALLE	FECHA	OBSERVACION	FKREQ	FKESTADO	FKEMPLE	FKEMPLEASIGNADO
		$IDDETALLE=$this->objControlDetalleReq->getIDDETALLE();
		$FKESTADO=$this->objControlDetalleReq->getFKESTADO();
		$FKEMPLEASIGNADO = $this->objControlDetalleReq->getIDEMPLEADO();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update detallereq set FKESTADO = '".$FKESTADO."', FKEMPLEASIGNADO = '".$FKEMPLEASIGNADO."' where IDDETALLE = '".$IDDETALLE."'";
		// $comandoSql = "START TRANSACTION;
		//                UPDATE detallereq set FKESTADO = '".$FKESTADO."' where IDDETALLE = '".$IDDETALLE."';
		// 			   update requerimiento set FKAREA = '".$IDAREA."' where IDREQ = '".$FKREQUERIMIENTO."';
		// 			   update detallereq set FKEMPLEASIGNADO = '".$IDEMPLEADO."' where IDDETALLE = '".$IDDETALLE."'
		// 			   ROLLBACK;
		// 			   COMMIT;";
		// 			   var_dump($objControlConexion->ejecutarComandoSql);
		//return $objControlConexion->ejecutarComandoSql($comandoSql);
		if ( $objControlConexion->ejecutarComandoSql($comandoSql) )
		{
			//$mData=array ('msg'=>'guardo Correctamente');	
			$mData = true;
		}
		else {  
			//$mData=array ('error'=>'Ocurrió un error ...');
			$mData = false;	
		}
		$objControlConexion->cerrarBd();
		return $mData;    
	}
	

	function borrar()
	{
            //IDDETALLE	FECHA	OBSERVACION	FKREQ	FKESTADO	FKEMPLE	FKEMPLEASIGNADO
		$IDDETALLE=$this->objControlDetalleReq->getIDDETALLE();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from detallereq where IDDETALLE = '".$IDDETALLE."'";
		if ( $objControlConexion->ejecutarComandoSql($comandoSql) )
		{
			$mData = true;
		}
		else {  
			$mData = false;	
		}
		$objControlConexion->cerrarBd();
		return $mData;   
	}
        
        function radicarReq()
	{
              //IDDETALLE	FECHA	OBSERVACION	FKREQ	FKESTADO	FKEMPLE	FKEMPLEASIGNADO
		$IDDETALLE=$this->objControlDetalleReq->getIDDETALLE();
		$FECHA=$this->objControlDetalleReq->getFECHA();
        $OBSERVACION=$this->objControlDetalleReq->getOBSERVACION();
        $FKREQ=$this->objControlDetalleReq->getFKREQ();
        $FKESTADO=$this->objControlDetalleReq->getFKESTADO();
        $FKEMPLE=$this->objControlDetalleReq->getFKEMPLE();
        $FKEMPLEASIGNADO=$this->objControlDetalleReq->getFKEMPLEASIGNADO();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into detallereq values('".$IDDETALLE."','".$FECHA."','".$OBSERVACION."','".$FKREQ."','".$FKESTADO."','".$FKEMPLE."','".$FKEMPLEASIGNADO."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
                
	}
       
}
	
?>