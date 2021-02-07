<?php 
	class formGestionarMesa{

		public function formGestionarMesaShow($listamesa,$listaprivilegios){?>
<?php 
		include_once("../shared/nav.php");
		$nav=new nav();
		$nav->navShow($listaprivilegios);
 ?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Gestionar Mesa</title>
		</head>
		<body> 
		<div id="tablita" class="container" ><br>
		<h3 align="center">LISTADO DE MESAS</h3> <br>
		<form action="controlVerificarAccesoMesa.php" method="POST">
		<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
		<input type="hidden" name="idbtn" value="1">
		<p align="center"> <input type="submit" name="btnaddmesa" value="AGREGAR MESA" class="btn btn-success"> </p>
		</form>
		
		<table border="1px" style="margin-top: 2rem"  class="table">
			<thead>
				<tr>
					<th>Nr de mesa°</th>
					<th>Capacidad</th>
					<th>Estado</th>					
					<th colspan="2"><p align="center">Acción<p></th>
				</tr>
			</thead>
			<?php
					$numfilas=count($listamesa);			
			foreach ($listamesa as $key => $value) {?>
			 <tr>
			 	<td><?php echo $value['idmesa']; ?> </td>
			 	<td><?php echo $value['capacidad']; ?> </td>  
				<td><?php  
				 if ($value['estado']==1) echo "<div class='badge bg-success'  >✔</div> ";
				 else echo "<div class='badge bg-danger' >X</div>"; ?> </td> 
			 	 
			 	<form  action="controlVerificarAccesoMesa.php" method="POST">			 	
			 	<td><input type="submit" name="btneditar" class='material-icons' value='edit'></td>
			 	<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 	<input type="hidden" name="idbtn" value="1">
			 	<input type="hidden" name="idmesa" value=" <?php echo $value['idmesa']; ?> ">
				<?php if ($value['estado']==0): ?>
				<td><input class="btn btn-warning" type="submit" name="btnhabilitar" value="Cambiar Estado"></td>
				<?php else: ?>
				<td><input class="btn btn-warning" type="submit" name="btndeshabilitar" value="Cambiar Estado"></td>
				<?php endif ?>
				</form>
			 </tr>

			<?php
			 } ?>
		</table></div> 
			<?php //var_dump($listamenu); ?>
			<?php //var_dump($listaprivilegios); ?>
		</body>
		</html>
<?php
		}
	}
 ?>