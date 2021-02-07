<?php 
	class formAgregarMesa{

		public function formAgregarMesaShow($detallemesa,$listaprivilegios){?>
<?php 
		include_once("../shared/nav.php");
		$nav=new nav();
		$nav->navShow($listaprivilegios);
 ?>
 		<!DOCTYPE html>
 		<html>
 		<head>
 			<title>Agregar Mesa</title>
 		</head>
 		<body>  
		<center> <br>
		 	<div class="modal-body"  id="tablita" >  
                        <div class="card" > 
                            <div class="card-body" >
								<form  action="controlVerificarAccesoMesa.php" method="POST">	
								 	
									<h3>AGREGAR MESA</h3> <br>
									CAPACIDAD: <input type="number" name="capacidad" ><br>	
									<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
									<input type="hidden" name="idbtn" value="1"><br>
									<input class="btn btn-secondary" type="submit" name="fom1" value="VOLVER">
									<input class="btn btn-success" type="submit" name="btnagregarmesa" value="CONFIRMAR">
									
									</p>		 	
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