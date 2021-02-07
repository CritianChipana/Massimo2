<?php 
	class formEditarMenu{

		public function formEditarMenuShow($detallemenu,$listaprivilegios){?>
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
 			 	<form  action="controlVerificarAccesoMenu.php" method="POST">	
			<center>
			<div class="modal-body"  id="tablita" >  
                        <div class="card" > 
                            <div class="card-body" > 
							<h3>AGREGAR UN PRODUCTO </h3>
			 <table class="table" >
			 <tr> <td>Nr°</td><td><input type="text" name="idproducto" value="<?php echo $detallemenu[0]['idproducto'] ?>" disabled></td> </tr>
			 <tr> <td>NOMBRE</td><td><input type="text" name="nombrepr"   value="<?php echo $detallemenu[0]['nombrepr'] ?>" required></td> </tr>
			 <tr> <td>DESCRIPCION </td><td><textarea name="descripcion" rows="2" cols="53" required ><?php echo $detallemenu[0]['descripcion']?></textarea></td> </tr>
			 <tr> <td>PRECIO</td><td><input type="number" name="precio" value="<?php echo $detallemenu[0]['precio'] ?>" required></td> </tr>
			 
			 <tr> <td>ESTADO</td>  
			 <td><select class='form-control' name='estado' id='estado' <?PHP echo $detallemenu[0]['estado'] ; ?>>
                                        <option value="1">Activo</option>
                                        <option value="0">Inctivo</option>  </tr>
                                    </select> </td> 
			 </table>	
							<input type="hidden" name="idproducto" value=" <?php echo $detallemenu[0]['idproducto'] ?> ">
							<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 				<input type="hidden" name="idbtn" value="1">
						 	<input class="btn btn-success" type="submit" name="btnconfirmaredit" value="CONFIRMAR">		
									
 			
 				</form> 						
 			</div>  </div> </div> </div> 
		</center>
 		</body>
 		</html>
		<?php
		}
	}
 ?>