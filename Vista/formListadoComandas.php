<?php 
	class formListadoComandas{

		public function formListadoComandasShow($listadocomandas,$listaPrivilegios){
			?>
			<?php 
			include_once("../shared/nav.php");
			$nav=new nav();
			$nav->navShow($listaPrivilegios);
			if (is_array($listadocomandas)) {
				$mensaje="";
			}else{
				$mensaje=$listadocomandas;
			}
			?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Lista de Proformas</title>
		</head>
		<link rel="stylesheet" type="text/css" href="../public/css/main.css">
		<div class="container" >
			<?php // var_dump($listadocomandas); ?>
			<?php $list=count($listadocomandas);
			 ?>
			<?php   date_default_timezone_set("America/Lima");  ?>
			<br>
		<h3 align="center">LISTADO DE PROFORMAS</h3><br>
		<?php 
		if ($list>10) {?>
		<form action="controlVerificarAccesoComprobante.php" method="POST">
			<p align="center">BUSCAR PROFORMA POR Nro de MESA :<input type="number" min="0" name="idmesa" required>
			<input type="hidden" name="idbtn" value="1">
			<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
			<input type="submit" name="fom1" value="Buscar">
			</p>
		</form>			
	<?php	}
		 ?>
		<!-- <form action="controlVerificarAccesoComprobante.php" method="POST">
			<p align="center">
				<input type="hidden" name="idbtn" value="1">
				<input type="hidden" name="dni" value=" <?php // echo $listaPrivilegios[0]['dni']; ?> ">
				<input type="submit" name="fom1" value="Volver Atras">
			</p>
		</form> -->
			<center><?php echo $mensaje ?></p>
		<?php if (is_array($listadocomandas)): ?>
		<table class="table" >
			<thead>
				<tr>
					<th>Mesa</th>
					<th>DNI de Empleado</th>
					<th>Fecha de emision</th>
					<th>Estado</th>					
					<th colspan="3">Acción</th>
				</tr>
			</thead>
			<?php
				if (isset($listadocomandas[1]['idcomanda'])) {
					if ($listadocomandas[0]['idcomanda']==$listadocomandas[1]['idcomanda']) {
						$numfilas=1;}
					else{
					$numfilas=count($listadocomandas);}}	
				else{
					$numfilas=count($listadocomandas);}				
			for ($i=0; $i <$numfilas ; $i++) {

			 	?>
					<tr>
					<td><?php echo $listadocomandas[$i]['mesanum'] ?></td>
					<td><?php echo $listadocomandas[$i]['dni'] ?></td>
					<td><?php echo date("Y")."-".date("m")."-".date("d");?></td>					
					<!--?php echo $listadocomandas[$i]['estadocomprobante'] ?-->
					<td> 
					<?php   if ($listadocomandas[$i]['estadocomprobante']==1) echo "<div class='badge bg-success'>Activo</div> ";
				 	else echo "<div class='badge bg-danger' >Disponible</div>"; ?>
				</td>
					<form  action="controlVerificarAccesoComprobante.php" method="POST">
					<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
					<input type="hidden" name="idbtn" value="1">  


					<input type="hidden" name="idcomanda" value=" <?php echo $listadocomandas[$i]['idcomanda']; ?> ">
					<?php if ($listadocomandas[$i]['estadocomprobante']==1): ?>
					<td><input class="btn btn-warning" type="submit" name="btncb" value="Boleta"></td>
					<?php endif ?>
			
					</form>
					</tr>

			 	<?php
			 } ?>
		</table>					
		<?php endif ?>
			</center>	
		</div>
			<?php
		}
	}
 ?>