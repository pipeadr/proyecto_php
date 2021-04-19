<?php

/**
 * -Para llamar a un metodo primero hay que instanciar la clase, es decir crear un objeto de la clase
   -En PHP $nombreObjeto = new nombreClase(Argumentos del constructor)
   -Para llamar un metodo se escribe $nobreObjeto->nombreMetodo(Argumentos)
 */
class controlempleado
{
	var $objEmpleado;

	function __construct($objEmpleado)
	{
		$this->objEmpleado=$objEmpleado;
	}

	function guardar()
	{       
        $IDEMPLEADO=$this->objEmpleado->getIDEMPLEADO();
        $NOMBRE=$this->objEmpleado->getNOMBRE();
        $FOTO=$this->objEmpleado->getFOTO();
        $HOJAVIDA=$this->objEmpleado->getHOJAVIDA();
        $TELEFONO=$this->objEmpleado->getTELEFONO();
        $EMAIL=$this->objEmpleado->getEMAIL();
        $DIRECCION=$this->objEmpleado->getDIRECCION();
        $X=$this->objEmpleado->getX();
        $Y=$this->objEmpleado->getY();
        $fkEMPLE_JEFE=$this->objEmpleado->getfkEMPLE_JEFE();
        $fkAREA=$this->objEmpleado->getfkAREA();
        $PASSWORD=$this->objEmpleado->getPASSWORD(); 
		//$objControlConexion = new controlconexion();
		$db= new ControlConexion(); //eror
		$db->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into empleado values('".$IDEMPLEADO."','".$NOMBRE."','".$FOTO."','".$HOJAVIDA."','".$TELEFONO."','".$EMAIL."','".$DIRECCION."',".$X.",".$Y.",'".$fkEMPLE_JEFE."','".$fkAREA."','".$PASSWORD."')";
		//$comandoSql = "INSERT INTO empleado(IDEMPLEADO,NOMBRE,FOTO,HOJAVIDA,TELEFONO,EMAIL,DIRECCION,X,Y,fkEMPLE_JEFE,fkAREA,PASSWORD) VALUES('".$IDEMPLEADO."','".$NOMBRE."','".$FOTO."','".$HOJAVIDA."','".$TELEFONO."','".$EMAIL."','".$DIRECCION."','".$X."','".$Y."','".$fkEMPLE_JEFE."','".$fkAREA."','".$PASSWORD."')";
		
		//$objControlConexion->ejecutarComandoSql($comandoSql);
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
		$IDEMPLEADO=$this->objEmpleado->getIDEMPLEADO();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from empleado where IDEMPLEADO = '".$IDEMPLEADO."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$NOMBRE = $registro["NOMBRE"];
        $FOTO = $registro["FOTO"];
        $HOJAVIDA = $registro["HOJAVIDA"];
        $TELEFONO = $registro["TELEFONO"];
        $EMAIL = $registro["EMAIL"];
        $DIRECCION = $registro["DIRECCION"];
        $X = $registro["X"];
        $Y = $registro["Y"];
        $fkEMPLE_JEFE = $registro["fkEMPLE_JEFE"];
        $fkAREA = $registro["fkAREA"];
        $PASSWORD = $registro["PASSWORD"];
		$this->objEmpleado->setNOMBRE($NOMBRE);
                $this->objEmpleado->setFOTO($FOTO);
                $this->objEmpleado->setHOJAVIDA($HOJAVIDA);
                $this->objEmpleado->setTELEFONO($TELEFONO);
                $this->objEmpleado->setEMAIL($EMAIL);
                $this->objEmpleado->setDIRECCION($DIRECCION);
                $this->objEmpleado->setX($X);
                $this->objEmpleado->setY($Y);
                $this->objEmpleado->setfkEMPLE_JEFE($fkEMPLE_JEFE);
                $this->objEmpleado->setfkAREA($fkAREA);
                $this->objEmpleado->setPASSWORD($PASSWORD);
		$objControlConexion->cerrarBd();
		return $this->objEmpleado;
	}

	function modificar()
	{
		$IDEMPLEADO=$this->objEmpleado->getIDEMPLEADO();
		$NOMBRE=$this->objEmpleado->getNOMBRE();
                $FOTO=$this->objEmpleado->getFOTO();
                $HOJAVIDA=$this->objEmpleado->getHOJAVIDA();
                $TELEFONO=$this->objEmpleado->getTELEFONO();
                $EMAIL=$this->objEmpleado->getEMAIL();
                $DIRECCION=$this->objEmpleado->getDIRECCION();
                $X=$this->objEmpleado->getX();
                $Y=$this->objEmpleado->getY();
                $fkEMPLE_JEFE=$this->objEmpleado->getfkEMPLE_JEFE();
                $fkAREA=$this->objEmpleado->getfkAREA();
                $PASSWORD=$this->objEmpleado->getPASSWORD();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update empleado set NOMBRE = '".$NOMBRE."', FOTO = '".$FOTO."', HOJAVIDA = '".$HOJAVIDA."', TELEFONO = '".$TELEFONO."', EMAIL = '".$EMAIL."', DIRECCION = '".$DIRECCION."', X = '".$X."', Y = '".$Y."', fkEMPLE_JEFE = '".$fkEMPLE_JEFE."', fkAREA = '".$fkAREA."', PASSWORD = '".$PASSWORD."' where IDEMPLEADO = '".$IDEMPLEADO."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function borrar()
	{
		$IDEMPLEADO=$this->objEmpleado->getIDEMPLEADO();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from empleado where IDEMPLEADO = '".$IDEMPLEADO."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}
      
}
	
?>