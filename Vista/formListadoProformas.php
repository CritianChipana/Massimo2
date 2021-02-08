<?php 
	class formListadoProformas{

		public function formListadoProformasShow($listadoProformas,$listaPrivilegios){
			?>
			<?php 
			include_once("../shared/nav.php");
			$nav=new nav();
			$nav->navShow($listaPrivilegios);
			if (is_array($listadoProformas)) {
				$mensaje="";
			}else{
				$mensaje=$listadoProformas;
			}
			?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Lista de Proformas</title>
		</head>
		<link rel="stylesheet" type="text/css" href="../public/css/main.css">
		<div class="container" >
			<?php  var_dump($listadoProformas); ?>
			<?php $list=count($listadoProformas);
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
		<?php if (is_array($listadoProformas)): ?>
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
				if (isset($listadoProformas[1]['idProforma'])) {
					if ($listadoProformas[0]['idProforma']==$listadoProformas[1]['idProforma']) {
						$numfilas=1;}
					else{
					$numfilas=count($listadoProformas);}}	
				else{
					$numfilas=count($listadoProformas);}				
			for ($i=0; $i <$numfilas ; $i++) {

			 	?>
					<tr>
					<td><?php echo $listadoProformas[$i]['mesanum'] ?></td>
					<td><?php echo $listadoProformas[$i]['dni'] ?></td>
					<td><?php echo date("Y")."-".date("m")."-".date("d");?></td>					
					<!--?php echo $listadoProformas[$i]['estadocomprobante'] ?-->
					<td> 
					<?php   if ($listadoProformas[$i]['estadocomprobante']==1) echo "<div class='badge bg-success'>Activo</div> ";
				 	else echo "<div class='badge bg-danger' >Disponible</div>"; ?>
				</td>
					<form  action="controlVerificarAccesoComprobante.php" method="POST">
					<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
					<input type="hidden" name="idbtn" value="1">  
					<input type="hidden" name="mesanum" value=" <?php echo $listadoProformas[$i]['mesanum']; ?> ">
					<?php if ($listadoProformas[$i]['estadocomprobante']==1): ?>
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