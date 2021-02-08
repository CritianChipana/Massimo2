<?php

 if(isset($_GET['dni'])){
     include_once("../Vista/formAgregarPlatillo.php");
     include_once("../Modelo/EntidadProducto.php");
     include_once("../Modelo/EdetalleUsuario.php");
     include_once("../Modelo/EntidadProforma.php");
     include_once("../Modelo/EntidadDetallesProforma.php");
     include_once("../Vista/formGenerarProforma.php");
     include_once("../Vista/formListarPedidos.php");
     include_once("../Modelo/EntidadMesa.php");

    $dni = $_GET['dni']; 
    $idproforma = $_GET['idproforma'];
    $mesa = $_GET['mesa'];
     if($_GET['b']==1){

         $objetoEntidad = new EdetalleUsuario;
         $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
         $objetoEntidad2 = new EntidadProducto;
         $objetoProforma = new formAgregarPlatillo();
         $listaproductos = $objetoEntidad2->listar_producto();
         $objetoProforma -> formSeleccionarPlatillo($listaprivilegios,$listaproductos,$idproforma);
     }else if($_GET['b']==2){
        $opbjetocancelar  = new EntidadProforma;
        $mesaobjeto = new EntidadMesa;
        $mesaobjeto->liberarmesa($mesa);
        $opbjetocancelar ->Cancelar($idproforma);
        echo    "<script>
        alert('Se Cancelo el pedido');
        </script>";
        $objetoEntidad = new EdetalleUsuario;
        $objetoC = new formGenerarProforma;
        $objetoEntidad2 = new EntidadProducto;

// a
        $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
        $listaproductos = $objetoEntidad2->listar_producto();

        $Lmesas = new EntidadMesa;
        $mesas = $Lmesas->Listarmesas3();
        $productos = new EntidadProforma;
        $Lproductos = $productos -> ListarProformashow($dni);
        $objetoC -> formGenerarProformashow($listaprivilegios,$listaproductos,$Lproductos,$mesas);
     }else if($_GET['b']==3){
         $objetoEntidad = new EdetalleUsuario;
         $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
         $pedido = new EntidadProforma;
         $listapedidos = $pedido ->ListarPedido($idproforma);
         $verpedido = new formListarPedido;
         $verpedido -> formListarPedido2($listaprivilegios,$listapedidos,$idproforma);
     }

     if($_GET['b']=='E'){
        $iddetalle = $_GET['iddetalle'];
        $l = new EntidadDetallesProforma;
        $l ->EliminarPedido($iddetalle);
        $objetoEntidad = new EdetalleUsuario;
        $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
        $pedido = new EntidadProforma;
        $listapedidos = $pedido ->ListarPedido($idproforma);
        $verpedido = new formListarPedido;
        $verpedido -> formListarPedido2($listaprivilegios,$listapedidos,$idproforma);
     }

}else{
    include_once("../shared/formMensajeSistema.php");
    
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("ACCESO NO PERMITIDO","<a href='../index.php'>Iniciar Session</a>");


}

?>   