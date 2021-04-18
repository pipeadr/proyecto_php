<?php
/** 
 * -Para llamar a un metodo primero hay que instanciar la clase, es decir crear un objeto de la clase
   -En PHP $nombreObjeto = new nombreClase(Argumentos del constructor)
   -Para llamar un metodo se escribe $nobreObjeto->nombreMetodo(Argumentos)
 */
class controlrequerimiento
{
	var $objRequerimiento;

	function __construct($objRequerimiento)
	{
		$this->objRequerimiento=$objRequerimiento;
	}

	function guardar()
	{
		
		$FKAREA=$this->objRequerimiento->getFKAREA();
		$db = new ControlConexion();
		$db->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into requerimiento values(NULL,'".$FKAREA."')";
		//$objControlConexion->ejecutarComandoSql($comandoSql);
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
		$IDREQ=$this->objRequerimiento->getIDREQ();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from requerimiento where IDREQ = '".$IDREQ."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$FKAREA = $registro["FKAREA"];
		$this->objRequerimiento->setFKAREA($FKAREA);
		$objControlConexion->cerrarBd();
		return $this->objRequerimiento;
	}
    function consultar_id()  
	{
		//este metodo es para poder obtener el id después de guardarlo  para poder usarlo en el detallereq
		$db = new ControlConexion();
		$db->abrirBd("localhost","root","","mesa_ayuda");
		$sql = "select IDREQ from requerimiento ORDER BY IDREQ DESC";
		$rs_id_reque = $db->ejecutarSelect($sql);
		$registro_id_reque = $rs_id_reque->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		//variable IDDETALLE
		$_id_reque = $registro_id_reque["IDREQ"];
		//var_dump($_id_reque);
		$db->cerrarBd();
		return $_id_reque; 
	
	}
  
	function modificar()
	{
		$IDREQ=$this->objRequerimiento->getIDREQ();
		$FKAREA=$this->objRequerimiento->getFKAREA();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update requerimiento set FKAREA = '".$FKAREA."' where IDREQ = '".$IDREQ."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
   
	}

	function borrar()
	{
		$IDREQ=$this->objRequerimiento->getIDREQ();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from requerimiento where IDREQ = '".$IDREQ."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
                 
	}
}
	
?>