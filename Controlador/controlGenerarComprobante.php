<?php 
		include_once("../Modelo/EntidadProforma.php");
	class controlGenerarComprobante{

		public function listarProforma()
		{ 
            $objproforma = new Entidadproforma();
            $respuesta = $objproforma->listarproforma();
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $data;
		}
	/*	public function detalleProformaID($idproforma)
		{
			$objDproforma=new Entidadproforma();
			$fila=$objDproforma->detalleProformaID($idproforma);
			return $fila;
		}	 */	
		public function detalleProformaMesa($idmesa)
		{
			$objDproforma=new Entidadproforma();
			$fila=$objDproforma->detalleProformaMesa($idmesa);
			return $fila;
		}
	}
 ?>