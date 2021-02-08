<?php

		if(isset($_POST['fom1'])){
			$fom1="fom1";
			$dni=$_POST['dni'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formListadoProformas.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();	
			$objListarProformas=new formListadoProformas();			
			if (isset($_POST['idmesa'])) {
			$idmesa=$_POST['idmesa'];
			$buscarProformaMesa=$objComprobante->detalleProformaMesa($idmesa);
				if (is_array($buscarProformaMesa)) {
				$objListarProformas->formListadoProformasShow($buscarProformaMesa,$listaPrivilegios);		
				}
				else{
					include_once("../shared/formMensajeSistema.php");
					$objMensaje = new formMensajeSistema;
					$objMensaje -> formMensajeSistemaShow("NO SE ENCONTRARON COINCIDENCIAS","../Controlador/controlVerificarAccesoComprobante.php",$listaPrivilegios,$fom1,"","");
				}
			
			}
			else{
			$listaProformas=$objComprobante->listarProforma();
			$objListarProformas->formListadoProformasShow($listaProformas,$listaPrivilegios);
			}
		}
		else if(isset($_POST['btnp'])){
			$btnp="btnp";
			$dni=$_POST['dni'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formListadoProformas.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();
			$objListarProformas=new formListadoProformas();	
				if (isset($_POST['idproforma'])) {
				$idproforma=$_POST['idproforma'];
				$buscarProformaID=$objComprobante->detalleProformaID($idproforma);
					if(is_array($buscarProformaID)){
					$objListarProformas->formListadoProformasShow($buscarProformaID,$listaPrivilegios);	
					}
					else{
						include_once("../shared/formMensajeSistema.php");
						$objMensaje = new formMensajeSistema;
						$objMensaje -> formMensajeComrprobanteShow("NO SE ENCONTRARON COINCIDENCIAS","../Controlador/controlVerificarAccesoComprobante.php",$listaPrivilegios,$btnp,"");
					}
				}
				else
				{
				$listaProformas=$objComprobante->listarProforma();
				$objListarProformas->formListadoProformasShow($listaProformas,$listaPrivilegios);
				}
		}
		else if(isset($_POST['btncb'])){
			$btnTC=$_POST['btncb'];
			$dni=$_POST['dni'];
			$mesanum=$_POST['mesanum'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formDetalleProforma.php");
  			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();
			$detalleProformaMesa=$objComprobante->detalleProformaMesa($mesanum);
			$objDetalleProforma=new formDetalleProforma();
			$objDetalleProforma->formDetalleProformaShow($detalleProformaMesa,$listaPrivilegios,$btnTC);
		}
/*		else if(isset($_POST['btncf'])){
			$btnTC=$_POST['btncf'];
			$dni=$_POST['dni'];
			$idProforma=$_POST['idProforma'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formDetalleProforma.php");		
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();
			$detalleProformaID=$objComprobante->detalleProformaID($idProforma);
			$objDetalleProforma=new formDetalleProforma();
			$objDetalleProforma->formDetalleProformaShow($detalleProformaID,$listaPrivilegios,$btnTC);
		} */
	/*	else if(isset($_POST['btnpb'])){
			$btnTP=$_POST['btnpb'];
			$dni=$_POST['dni'];
			$idproforma=$_POST['idproforma'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formDetalleProforma.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();
			$detalleProformaID=$objComprobante->detalleProformaID($idproforma);
			$objDetalleProforma=new formDetalleProforma();
			$objDetalleProforma->formDetalleProformaShow($detalleProformaID,$listaPrivilegios,$btnTP);
		} */
	/*	else if(isset($_POST['btnpf'])){
			$btnTP=$_POST['btnpf'];
			$dni=$_POST['dni'];
			$idproforma=$_POST['idproforma'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formDetalleProforma.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();
			$detalleProformaID=$objComprobante->detalleProformaID($idproforma);
			$objDetalleProforma=new formDetalleProforma();
			$objDetalleProforma->formDetalleProformaShow($detalleProformaID,$listaPrivilegios,$btnTP);
		} */
			
		else if(isset($_POST['btnPR'])){
			$btnPR="btnCO";
			$dni=$_POST['dni'];
				if (isset($_POST['idproforma'])) {
				$idproforma=$_POST['idproforma'];
				include_once("../Modelo/EdetalleUsuario.php");
				include_once("../Vista/formBienvenida.php");
				$objDetalle = new EdetalleUsuario;
				$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
					if (isset($_POST['btnPRB'])) {
						include_once("controlBoleta.php");
						$objBoleta=new controlBoleta();
						$objAgregar=$objBoleta->agregarBoletaP($idproforma);
						            echo     "<script>
                    alert('Se genero el comprobante');
                    </script>";
						$objConfirmacion=new formBienvenida();
						$objConfirmacion->formBienvenidaShow($listaPrivilegios);				
					}
					else if(isset($_POST['btnCOF'])){
						$ruc=$_POST['ruc'];
							if (strlen($ruc)==11) {
							include_once("controlFactura.php");
							$objFactura=new controlFactura();
							$objAgregar=$objFactura->agregarFacturaC($idproforma,$ruc);	
							$objConfirmacion=new formNotificarComprobante();
							$objConfirmacion->formNotificarComprobanteShow($listaPrivilegios);	
							}
							else{
								include_once("../shared/formMensajeSistema.php");
								$btnCO="btnc";
								$objMensaje = new formMensajeSistema;
								$objMensaje -> formMensajeSistemaShow("EL RUC DEBE CONTENER 11 DIGITOS","../Controlador/controlVerificarAccesoComprobante.php",$listaPrivilegios,$btnPR,"");
							}
					}
				}
		/*		else if(isset($_POST['idproforma'])){
				$idproforma=$_POST['idproforma'];
				include_once("../Modelo/EdetalleUsuario.php");
				include_once("../Vista/formNotificarComprobante.php");
				$objDetalle = new EdetalleUsuario;
				$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
				if (isset($_POST['btnPRB'])) {
					include_once("controlBoleta.php");
					$objBoleta=new controlBoleta();
					$objBoleta->agregarBoletaP($idproforma);
				}
				else if(isset($_POST['btnPRF']))
				{
					include_once("controlFactura.php");
					$objFactura=new controlFactura();
					$objFactura->agregarFacturaP($idproforma);
				}
				$objConfirmacion=new formNotificarComprobante();
				$objConfirmacion->formNotificarComprobanteShow($listaPrivilegios);
				}*/
		}
		else if(isset($_POST['btndb'])){
			$btnGR=$_POST['btndb'];
			$dni=$_POST['dni'];
			$idboleta=$_POST['idboleta'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante($idproforma);
			$objComprobante->detalleProformaID();
		}
	/*	else if(isset($_POST['btndf'])){
			$btnGR=$_POST['btndf'];
			$dni=$_POST['dni'];
			$idproforma=$_POST['idproforma'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante($idProforma);
			$objComprobante->detalleProformaID();
		} */
		else if(isset($_POST['btnlp'])){
			$dni=$_POST['dni'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("../Vista/formGestionarProducto.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);

		}

		// else if(isset($_POST['btndb'])){
		// 	$btnGR=$_POST['btndb'];
		// 	$dni=$_POST['dni'];
		// 	$idboleta=$_POST['idboleta'];
		// 	include_once("../Modelo/EdetalleUsuario.php");
		// 	include_once("controlGenerarComprobante.php");
		// 	$objDetalle = new EdetalleUsuario;
		// 	$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
		// 	$objComprobante= new controlGenerarComprobante($idproforma);
		// 	// $objComprobante->detalleProformaID();
		// }
		// else if(isset($_POST['btndf'])){
		// 	$btnGR=$_POST['btndf'];
		// 	$dni=$_POST['dni'];
		// 	$idproforma=$_POST['idproforma'];
		// 	include_once("../Modelo/EdetalleUsuario.php");
		// 	include_once("controlGenerarComprobante.php");
		// 	$objDetalle = new EdetalleUsuario;
		// 	$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
		// 	$objComprobante= new controlGenerarComprobante($idProforma);
		// 	// $objComprobante->detalleProformaID();
		// }		


else
{
	include_once("../shared/formMensajeSistema.php");
	$objMensaje = new formMensajeSistema;
	$objMensaje -> formMensajeSistemaShow("ACCESO DENEGADO NO SE HA INICIADO SESION","../index.php","","","","");
}

 ?>