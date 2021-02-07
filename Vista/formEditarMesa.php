<?php 
	class formEditarMesa{

		public function formEditarMesaShow($detallemesa,$listaprivilegios){?>
<?php 
		include_once("../shared/nav.php");
		$nav=new nav();
		$nav->navShow($listaprivilegios);
 ?>
 		<!DOCTYPE html>
 		<html>
 		<head>
 			<title>Editar Menu</title>
 		</head>
 		<body> 
		 <center> <br>
		 	<div class="modal-body"  id="tablita" >  
                        <div class="card" > 
                            <div class="card-body" >
 				
 			 	<form  action="controlVerificarAccesoMesa.php" method="POST">	
 			 
					<?php 
						if (isset($detallemesa)) 
							{
					?>
				<h3>EDITAR MESA  </h3>
				<table class="table">
					<tr>
						<th>Nr°:</th> <th><input type="text" name="idmesa" value="<?php echo $detallemesa[0]['idmesa'] ?>" disabled></th><br>
					 
					 	<th>CAPACIDAD:</th> <th><input type="number" name="capacidad" value="<?php echo $detallemesa[0]['capacidad'] ?>"></th><br>
					</tr>
				</table>	
				<input type="hidden" name="idmesa" value=" <?php echo $detallemesa[0]['idmesa'] ?> ">
				<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 	<input type="hidden" name="idbtn" value="1">
				 
				<input class="btn btn-secondary" type="submit" name="fom1" value="VOLVER">
				<input class="btn btn-success"  type="submit" name="btnconfirmaredit" value="CONFIRMAR">
						<?php
					}
						else
					{
						?>
				AGREGAR MESA <br>
 				CAPACIDAD<input type="number" name="capacidad" ><br>	
				<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 	<input type="hidden" name="idbtn" value="1">
				<input class="btn btn-secondary" type="submit" name="fom1" value="VOLVER">
				<input  class="btn btn-success"  type="submit" name="btnagregarmesa" value="CONFIRMAR">
						<?php
					}
					 ?>	
			 		 	
 			</form> 
 				
 			</div>
			</div>
 			</div>
		 </center>
 		</body>
 		</html>



		<?php
		}
	}
 ?>