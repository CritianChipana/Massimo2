<?php 
	class formDetalleProforma{

		public function formDetalleProformaShow($detalleProforma,$listaPrivilegios,$btnTC){
			?>
			<?php 
			include_once("../shared/nav.php");
			$nav=new nav();
			$nav->navShow($listaPrivilegios);
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Detalle Proforma</title>
			</head>
			<link rel="stylesheet" type="text/css" href="../public/css/main.css">
			<body>
			<?php
				$num_Proforma=count($detalleProforma);
				//echo $listaPrivilegios[0]['nombre']." ".$listaPrivilegios[0]['apellidos'];
		//		var_dump($detalleProforma);
		//		if ($btnTC=='Boleta') { ?>
					<div style="text-align:center;">
					<form action="controlVerificarAccesoComprobante.php" method="POST">
					<center>
					<div class="modal-body" id="tablita">  
                        <div class="card"> 
                            <div class="card-body">	 
								<table  align="center" class="table" >
									<thead>
										<tr><th colspan="4"><center>RESTAURANT SAZON Y SABOR</center></th></tr>
										<tr></th></tr>
										<tr><th colspan="4">ATENDIO: <?php echo $listaPrivilegios[0]['nombre']." ".$listaPrivilegios[0]['apellidos']; ?></th></tr>
										<tr><th colspan="4">BOLETA A PAGAR</th></tr>
										<tr><th colspan="4">MESA: <?php echo $detalleProforma[0]['mesanum']; ?> </th></tr>
										<tr><th colspan="2">FECHA: <?php echo date("d") . "/" . date("m") . "/" . date("Y") ?> </th>
											<th colspan="2">HORA: <?php echo date("G").":".date("i"); ?></th>
										</tr>
										<tr><th>Cantidad</th><th>Descripcion</th><th>Precio</th></tr>
									</thead>
									<?php 
									$suma=0;
									for ($i=0; $i <$num_Proforma ; $i++) { ?>
									<tbody>
										<tr>
											<td><?php echo $detalleProforma[$i]['cantidad']; ?></td>
											<td><?php echo $detalleProforma[$i]['nombrepr']; ?></td>
											<td><?php echo $detalleProforma[$i]['precio']*$detalleProforma[$i]['cantidad']; ?></td>
										</tr>								
									</tbody>
									<?php 
									}
									?><thead><tr><th colspan="3">IMPORTE: <?php echo $detalleProforma[0]['total']." Nuevos soles" ?>	 </th></tr></thead>
								</table>
					<input type="hidden" name="dni" value="<?php echo $listaPrivilegios[0]['dni'];  ?>">
					<input type="hidden" name="idbtn" value="1">
					<input type="hidden" name="btnPR" value="1">
					<input type="hidden" name="btnPRB" value="1">
					<input type="hidden" name="idproforma" value="<?php echo $detalleProforma[0]['idproforma'] ?>">
					<p align="right"> <input class="btn btn-success"  type="submit" name="" value="GENERAR BOLETA"></p>  
					</form>
					<form action="controlVerificarAccesoComprobante.php" method="POST">
						<p align="left">
							<input type="hidden" name="idbtn" value="1">
							<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
							<input class="btn btn-secondary" type="submit" name="fom1" value="Volver Atras"> 
						</p>
					</form> 
					</div>	
				</div></div></div>								

			</center>			
			</body>
			</html>	

			<?php
		}	
	}
 ?>