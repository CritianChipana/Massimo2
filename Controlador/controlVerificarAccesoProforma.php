
<?php
    if(isset($_POST['dni'])){
    $dni = $_POST['dni'];
 
    include_once("../Modelo/EntidadProforma.php");
    include_once("../Modelo/EntidadMesa.php");
    include_once("../Vista/formGenerarProforma.php");
    include_once("../Modelo/EntidadProducto.php");
    include_once("../Modelo/EdetalleUsuario.php");
    $objetoEntidad = new EdetalleUsuario;
    $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
    $objetoEntidad = new EntidadProducto;
    $objetoProforma = new formGenerarProforma();
    $listaproductos = $objetoEntidad->listar_producto();

    $Lmesas = new EntidadMesa;
    $mesas = $Lmesas->Listarmesas3();
    $productos = new EntidadProforma;
    $Lproductos = $productos -> ListarProformashow($dni);

    $objetoProforma ->formGenerarProformashow($listaprivilegios,$listaproductos,$Lproductos,$mesas);
    // public function formGenerarProformashow($listaprivilegios,$listaproductos,$Lproductos,$mesas){

// .
    }else{
     
        include_once("../shared/formMensajeSistema.php");
        $objetoMensaje = new formMensajeSistema;
        $objetoMensaje -> formMensajeSistemaShow2("Acceso Incorrecto","<a href='../index.php'>Ingresar Usuario</a>");
        
    }
// 
?>