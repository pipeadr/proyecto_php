<?php

/**
 * -Para llamar a un metodo primero hay que instanciar la clase, es decir crear un objeto de la clase
   -En PHP $nombreObjeto = new nombreClase(Argumentos del constructor)
   -Para llamar un metodo se escribe $nobreObjeto->nombreMetodo(Argumentos)
 */
class controlarea
{
	var $objEmpleado;

	function __construct($objEmpleado)
	{
		$this->objEmpleado=$objEmpleado;
	}

	function guardar()
	{       
        $ID=$this->objEmpleado->getIDAREA();
        $NOMBRE=$this->objEmpleado->getNOMBRE();
        $LIDER=$this->objEmpleado->getFKEMPLE();
		//$objControlConexion = new controlconexion();
		$db= new ControlConexion(); //eror
		$db->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into area values('".$ID."','".$NOMBRE."','".$LIDER."')";
		//$objControlConexion->ejecutarComandoSql($comandoSql);
		//var_dump($comandoSql);
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
		$ID=$this->objEmpleado->getIDAREA();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from area where IDAREA = '".$ID."'";
		//var_dump($comandoSql);
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
        $registro = $rs->fetch_all(MYSQLI_ASSOC); //Asigna los datos a la variable $registro
		$objControlConexion->cerrarBd();
		return $registro;
	}
	
	function modificar()
	{ 
        $ID=$this->objEmpleado->getIDAREA();
        $NOMBRE=$this->objEmpleado->getNOMBRE();
        $LIDER=$this->objEmpleado->getFKEMPLE();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update area set IDAREA = '".$ID."', NOMBRE = '".$NOMBRE."', FKEMPLE = '".$LIDER."' where IDAREA = '".$ID."'";
		//var_dump($comandoSql);
		//$objControlConexion->ejecutarComandoSql($comandoSql);
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
		$ID=$this->objEmpleado->getIDAREA();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from area where IDAREA = '".$ID."'";
		//$objControlConexion->ejecutarComandoSql($comandoSql);
		//$objControlConexion->cerrarBd();
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
      
}
	
?>