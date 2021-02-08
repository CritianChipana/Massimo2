<?php
include_once("../Controlador/conexion.php");
class EntidadDetallesProforma extends conexion{

    public function listarProforma($idproforma){

        $sql = "SELECT * from proforma C, detalleproforma D, producto P 
        where C.idproforma =$idproforma and D.idproducto = P.idproducto and C.idproforma = D.idproforma";
        $resultado =mysqli_query($this->conectar(),$sql);
        $this->desConectar();

        $filas = mysqli_num_rows($resultado);
        for($i=0;$i<$filas;$i++){
            $listaProforma[$i] = mysqli_fetch_array($resultado);
        }
        return $listaProforma;
    }

    // _______________________________________________________________
    public function EliminarPedido($iddetalleProforma){
        $sql=" DELETE FROM detalleproforma WHERE iddetalleproforma= $iddetalleProforma ";
        $resultado = mysqli_query($this->conectar(),$sql);
        return $resultado;
    }


// _____________________________________________________________

public function RegistraDetalleProforma($numero,$cantidades,$precios,$idproductos,$idproforma){
    for($i=0;$i<$numero;$i++){
        $sql="INSERT INTO detalleproforma(idproforma, idproducto, cantidad, precio)
        VALUES ('$idproforma','$idproductos[$i]','$cantidades[$i]','$precios[$i]')
        ";
        $resultado = mysqli_query($this->conectar(),$sql) or  die ("Error Resgistrando Detalle Proforma $i") ;
        $this->desConectar();
    }
    if($resultado){
        return 1;
    }else{
        return 0;
    }
}

}
// SELECT * from proforma C, detalleproforma D, producto P where C.idproforma =10 and
//  D.idProducto = P.idProducto and C.idproforma = D.idproforma
// .
?>