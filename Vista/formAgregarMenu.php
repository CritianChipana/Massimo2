<?php 
	class formAgregarMenu{

		public function formAgregarMenuShow($detallemenu,$listaprivilegios){?>
		<?php 
		include_once("../shared/nav.php");
		$nav=new nav();
		$nav->navShow($listaprivilegios);
 		?>
 		<!DOCTYPE html>
 		<html>
 		<head>
 			<title>Agregar Menu</title>
 		</head>
 		<body>
 			<div>
 			
			 
				<form  action="controlVerificarAccesoMenu.php" method="POST">	
				<div id="tablita" class ="container"><br>	 
				<table align="center"   class =table>
				<thead class="thead-dark"> 
					<th scope="col" colspan="2" ><p align="center">INGRESAR PRODUCTO</p></th> 
				</thead>
				<tr><td>NOMBRE DEL MENU</td><td><input type="text" name="nombrepr" required></td> </tr>
				<tr><td>DESCRIPCION </td><td><textarea name="descripcion" rows="2" cols="23" required ></textarea></td></tr>
				<tr><td>PRECIO</td><td><input type="number" step="0.01" name="precio"  required></td></tr>
				<tr><td>ESTADO</td>
				<td><select class='form-control' name='estado' id='estado'>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>  </tr>
                                    </select> </td> 
				</table>
				</div>	
								<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
								<input type="hidden" name="idbtn" value="1">
								<p align="center"><input class="btn btn-success" type="submit" name="btnagregarmenu" value="AGREGAR"></p>	 
				</form> 
									
 			
 			</div>
 		</body>
 		</html>
		<?php
		}
	}
 ?>