<?php 
    include_once("../Modelo/EntidadBoleta.php");
    class controlBoleta{

        public function listarBoleta(){

        }
        public function agregarBoletaP($idproforma){
            $objBoletas = new EntidadBoleta();
            $respuesta =$objBoletas ->agregarBoletaP($idproforma);
        }
    /*    public function agregarBoletaP($idproforma){
            $objBoletas = new EntidadBoleta();
            $respuesta =$objBoletas ->agregarBoletaP($idproforma);
        }*/
    }
 ?>