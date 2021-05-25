<?php
/** 
 * -Para llamar a un metodo primero hay que instanciar la clase, es decir crear un objeto de la clase
   -En PHP $nombreObjeto = new nombreClase(Argumentos del constructor)
   -Para llamar un metodo se escribe $nobreObjeto->nombreMetodo(Argumentos)
 */
class controladorcargo_por_empleado
{
	var $objcontroladorcargo_por_empleado;

	function __construct($objcontroladorcargo_por_empleado)
	{
		$this->objcontroladorcargo_por_empleado=$objcontroladorcargo_por_empleado;
	}

	function guardar()
	{
		
		$FKCARGO=$this->objcontroladorcargo_por_empleado->getFKCARGO();
        //var_dump($FKCARGO);
		$FKEMPLE=$this->objcontroladorcargo_por_empleado->getFKEMPLE();
        $FECHAINI=$this->objcontroladorcargo_por_empleado->getFECHAINI();
        $FECHAFIN=$this->objcontroladorcargo_por_empleado->getFECHAFIN();
		$db = new ControlConexion();
		$db->abrirBd("localhost","root","","mesa_ayuda");
		//$comandoSql = "insert into area values('".$ID."','".$NOMBRE."','".$LIDER."')";
		$comandoSql = "INSERT INTO cargo_por_empleado VALUES('".$FKCARGO."','".$FKEMPLE."','".$FECHAINI."','".$FECHAFIN."')";
	
		//$objControlConexion->ejecutarComandoSql($comandoSql);
        //var_dump($comandoSql);
        if ( $db->ejecutarComandoSql($comandoSql) )
		{
			//$mData=array ('msg'=>'Actualizado Correctamente');
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
		$IDREQ=$this->objcontroladorcargo_por_empleado->getIDREQ();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from requerimiento where IDREQ = '".$IDREQ."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$FKAREA = $registro["FKAREA"];
		$this->objcontroladorcargo_por_empleado->setFKAREA($FKAREA);
		$objControlConexion->cerrarBd();
		return $this->objcontroladorcargo_por_empleado;
	}
  
	function modificar()
	{
		$FKCARGO=$this->objcontroladorcargo_por_empleado->getFKCARGO();
        //var_dump($FKCARGO);
		$FKEMPLE=$this->objcontroladorcargo_por_empleado->getFKEMPLE();
        $FECHAINI=$this->objcontroladorcargo_por_empleado->getFECHAINI();
        $FECHAFIN=$this->objcontroladorcargo_por_empleado->getFECHAFIN();
		$db = new ControlConexion();
		$db->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "UPDATE cargo_por_empleado set FKCARGO = '".$FKCARGO."', FKEMPLE = '".$FKEMPLE."', 
        FECHAINI = '".$FECHAINI."', FECHAFIN = '".$FECHAFIN."'  where FKEMPLE = '".$FKEMPLE."'";
	
		//$objControlConexion->ejecutarComandoSql($comandoSql);
        //var_dump($comandoSql);
        if ( $db->ejecutarComandoSql($comandoSql) )
		{
			//$mData=array ('msg'=>'Actualizado Correctamente');
			$mData = true;	
		}
		else {
			//$mData=array ('error'=>'Ocurrió un error ...');
			$mData = false;
		}
		$db->cerrarBd();
		return $mData;
   
	}

	function borrar()
	{
		$FKCARGO=$this->objcontroladorcargo_por_empleado->getFKCARGO();
		$db = new ControlConexion();
		$db->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from cargo_por_empleado where FKEMPLE = '".$FKCARGO."'";
		//var_dump($comandoSql);
		if ( $db->ejecutarComandoSql($comandoSql) )
		{
			//$mData=array ('msg'=>'Actualizado Correctamente');
			$mData = true;	
		}
		else {
			//$mData=array ('error'=>'Ocurrió un error ...');
			$mData = false;
		}
		$db->cerrarBd();
		return $mData;
                 
	}
}
	
?>