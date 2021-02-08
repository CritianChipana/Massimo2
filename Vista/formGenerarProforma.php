<?php

class formGenerarProforma{
    
    
    function __construct(){
        
    }
    
    public function formGenerarProformashow($listaprivilegios,$listaproductos,$Lproductos,$mesas){
    

        ?>
        <!DOCTYPE html>
		<html>
		<head>
			<title>Generar Porforma</title>
		</head>
		<link rel="stylesheet" type="text/css" href="../public/css/main.css">
		<?php
			include_once("../shared/nav.php");
			$objNav= new nav();
            $objNav->navShow($listaprivilegios);
            $nombre ="";
            $apellido ="";
            $dni =0;
            $empleado = "";
		  ?>
		<body>

			<!-- <a class="botoasn" href="controlVerificarAcceso.php?opc=1" >Proformas</a>
			<a class="botoasn" href="controlVerificarAcceso.php?opp=2" >Proformas</a> -->
        <?php for($i = 0; $i <1; $i++){
                
            ?>
              <P>Mesero: <?php echo $listaprivilegios[$i]['nombre']." ". $listaprivilegios[$i]['apellidos']?></P>
               <P>Usuario: <?php echo $listaprivilegios[$i]['dni'] ?></P>
            <?php
                $dni = $listaprivilegios[$i]['dni'];
                // $empleado = $listaprivilegios[$i]['nombre']." ".$listaprivilegios[$i]['apellidos'];
        } ?>
        <hr>  
            
        <div  class ="container">
        <div class="row">
        <div class="col-lg-6">
            <div  class="modal-body">   
                <div class="card"> 
                    <div class="card-body">
        <form action="../Controlador/controlGenerarProforma.php" method="post">

            <table align="center" clase="table" >
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>cantidad</th>
                    <th>Grabar</th>
                </tr>
        <?php
        $cont=0;
            foreach($listaproductos as $row){
                ?>
                <tr>
                    <td><?php echo $row['nombrepr'] ?></td>
                    <td><?php echo $row['precio'] ?></td>
                    <td><input type="number" name="<?php echo $row['idproducto'];?>" id=""></td>
                    <td><input type="text" value="<?php echo $row['idproducto'] ?>" name="<?php echo $row['idproducto'];?>i" id="" hidden></td>
                    <td><input type="checkbox" value="<?php echo $row['precio'];?>" name="<?php echo $row['idproducto'];?>c" id=""></td>
                    
                </tr>
                <?php
                $cont++;
            }
            ?>
            </table>
        
            
<!-- __________________________________________________________________________________________ -->
        
            <p align="center"><br>
            <label for="">Numero de Mesa:</label>
            <select name="mesa" id="">
                <option value="mesa">Mesa</option>
                <?php foreach($mesas as $row){  ?>
                    <option value="<?php echo $row['numero'] ?>"><?php echo $row['numero'] ?></option>
                <?php }  ?>
            </select>
            </p> 
            
<!-- _________________________________________________________________________________________________________ -->

            <input type="text" name="tamano" value="<?php echo $cont ?>" id="" hidden>
            <input type="text"  value="<?php echo $dni?>" name="dni"  hidden >
            <!-- <input type="text"  value="<?php ?>" name="empleado"  hidden > -->
            <input type="text"  value="<?php echo ""; ?>" name="apellido"  hidden >

            <!-- <label for="">Empleado:<br></label> -->
                <input type="text" name="empleado" id="" hidden>
            <!-- <label for="">Cliente<br></label> -->
                <input type="number" name="dnicliente" id="" hidden>
            <!-- <label for="">Fecha:<br></label> -->
                <input type="date" name="fecha" id="" hidden><br>
                <p align="center"><input name="a" type="submit" value="GENERAR" class="btn btn-success" ></p> 
        </form> 
        </div></div></div></div> 
<!-- ____________________________________________________________________________________ -->
            <?php
               
               
            ?> 
            <div class="col-lg-6">
             <div   class="modal-body">   
                <div class="card"> 
                    <div class="card-body">
                <table class="table">
                    <thead>
                        <!-- <th>COMANDA</th> -->
                        <!-- <th>EMPLEADO</th> -->
                        <!-- <th>ID EMPLEADO</th> -->
                        <!-- <th>CLIENTE</th> -->
                        <th>MESA</th>
                        <th>IMPORTE</th>
                        <th>AGREGAR</th>
                        <th>ELIMINAR</th>
                        <th>PEDIDOS</th>
                    </thead>
                    <tbody>
                        <?php foreach ($Lproductos as $row){  ?>
                            <tr class="">
                                <!-- <th ><?php //echo $row['idcomanda'];?></th> -->
                                <!-- <input type="hidden" name="idcomanda" value="<?php //echo $row['idcomanda']?>"> -->
                                <!-- <th class=""><?php //echo $row['empleado'];?></th> -->
                                <!-- <th class="fila"><?php //echo $row['dni'];?></th> -->
                                <!-- <th class="fila"><?php //echo $row['idcliente'];?></th> -->
                                <th class="fila"><?php echo $row['mesanum'];?></th>
                                <th class="fila"><?php echo $row['total'];?></th>
                                <!-- <th class="fila"><?php //echo $row['desea'];?></th> -->
                  
                                <th><div ><a href="controlAgregarPlatillo.php?dni=<?php echo $dni?>&b=1&idproforma=<?php echo $row['idproforma']?>&mesa=<?php  echo $row['mesanum']; ?>"><input type="submit" class="material-icons" value="add_box"></a></div></th>
                                <th><div><a href="controlAgregarPlatillo.php?dni=<?php echo $dni?>&b=2&idproforma=<?php echo $row['idproforma']?>&mesa=<?php  echo $row['mesanum']; ?>"><input type="submit" class="material-icons" value="delete"></a></div></th>
                                <th><div><a href="controlAgregarPlatillo.php?dni=<?php echo $dni?>&b=3&idproforma=<?php echo $row['idproforma']?>&mesa=<?php  echo $row['mesanum']; ?>"><input type="submit" class="material-icons" value="class"></a></div></th>
                                 
                            </tr>
                            <?php } ?>
                    </tbody>
                </table> 
                    </div></div></div></div></div></div>


        <hr>
        <script src="../../js/capturarid.js"></script>


        </body>
        </html>
        <?php
    }

}

?>
<!--  -->

