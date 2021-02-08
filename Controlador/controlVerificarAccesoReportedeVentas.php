<?php

// VerificarbotonGeneratReportedeVentas


if($_POST['dni']){
    $dni = $_POST['dni'];
    include_once("../Vista/formGenerarReportedeVentas.php");
    include_once("../Modelo/EdetalleUsuario.php");
    $privilegios = new EdetalleUsuario;
    $listaprivilegios = $privilegios->obtenerPrivilegios($dni);
    $objGRV = new formGenerarReportedeVentas;
    $objGRV->MostrarformReportedeVentasShow($listaprivilegios);
   
}
else if($_POST['imp'])
{
    include_once("../shared/formMensajeSistema.php");
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("Se imprimió exitosamente","<a href='../index.php'>Ingresar Usuario</a>");
}
else{
    
    include_once("../shared/formMensajeSistema.php");
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("Acceso Incorrecto","<a href='../index.php'>Ingresar Usuario</a>");
    
}

?>

