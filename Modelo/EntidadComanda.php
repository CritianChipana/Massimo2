<?php 
include_once('../Controlador/conexion.php');
class EntidadComanda extends conexion{
    
  	public function listarComanda()
  	{ 
        $consulta="SELECT * FROM comanda WHERE estadocomprobante=1 ";
        $resultado = mysqli_query($this->conectar(),$consulta);
        $this->desconectar();
        return $resultado;
 	}
	public function detalleComandaID($idcomanda)
	{
		$consulta = "SELECT * FROM detallecomanda DC, producto PR, comanda C, usuario U  WHERE DC.idcomanda = '$idcomanda' AND DC.idproducto=PR.idproducto AND DC.idcomanda=C.idcomanda AND C.dni=U.dni";
		$resultado = mysqli_query($this->conectar(),$consulta);
		$num_registros=mysqli_num_rows($resultado);

		for ($i=0; $i <$num_registros ; $i++) { 
			$fila[$i]=mysqli_fetch_array($resultado);
		}
		if (isset($fila)) {
				return $fila;		
		}
		else
		{
			$fila="NO SE ENCONTRARON COINCIDENCIAS";
			return $fila;
		}

	}
	public function detalleComandaMesa($idmesa)
	{
		$consulta = "SELECT * FROM detallecomanda DC, producto PR, comanda C, usuario U  WHERE C.mesanum = '$idmesa' AND DC.idproducto=PR.idproducto AND DC.idcomanda=C.idcomanda AND C.dni=U.dni AND C.estadocomprobante=1";
		$resultado = mysqli_query($this->conectar(),$consulta);
		$num_registros=mysqli_num_rows($resultado);

		for ($i=0; $i <$num_registros ; $i++) { 
			$fila[$i]=mysqli_fetch_array($resultado);
		}
		if (isset($fila)) {
				return $fila;		
		}
		else
		{
			$fila="NO SE ENCONTRARON COINCIDENCIAS";
			return $fila;
		}

	}
 }
 ?>
