<?php 
include_once('../Controlador/conexion.php');

class EntidadProforma extends conexion{
    
      public function listarProforma()
      { 
            $consulta="SELECT * FROM proforma WHERE estadocomprobante=1";
            $resultado = mysqli_query($this->conectar(),$consulta);
            $this->desconectar();
            return $resultado;
      }
      public function detalleProformaID($idproforma)
      {
			$consulta = "SELECT * FROM detalleProforma DC, producto PR, proforma P,usuario U WHERE DC.idproforma = '$idproforma' AND DC.idproducto=PR.idproducto AND DC.idproforma=P.idproforma AND P.dni=U.dni";
			$resultado = mysqli_query($this->conectar(),$consulta);
                  $num_registros=mysqli_num_rows($resultado);

                  for ($i=0; $i <$num_registros ; $i++) { 
                        $fila[$i]=mysqli_fetch_array($resultado);
                  }
                  if (isset($fila)) {
                              return $fila;           
                  }
                  else
                  {
                        $fila="NO SE ENCONTRARON COINCIDENCIAS";
                        return $fila;
                  }
      }
// _______________________________________________________________________________________________________
      public function ObtenerTotal($idproforma){
            $sql = "SELECT total from proforma where idproforma=$idproforma";
            $Resultado = mysqli_query($this->conectar(),$sql );
            $this->desConectar();
            $total = mysqli_fetch_assoc($Resultado);
            if($Resultado){
                return $total["total"];
            }else{
                return "No se encontro TOtal";
            }
    
        }
    
        public function ActualizarTotal($idproforma,$newimporte){
            $sql = "UPDATE proforma SET total= $newimporte where idproforma = $idproforma";
            $resultado = mysqli_query($this->conectar(),$sql);
            $this->desConectar();
            if($resultado){
                return 1;
            }else{
                return 0;
            }
        }

// ____________________________________________________________________________________________


public function ListarProformashow($dni){
       
      $sql = "SELECT * FROM proforma where estadocomprobante = 1 and dni = $dni ";
      $resultado = mysqli_query($this->conectar(),$sql) or die ("Error Buscando Proforma");
      return $resultado;

  
}

public function Cancelar($idproforma){
//   $sql = "UPDATE proforma SET estadocomprobante=0 where idproforma=$idproforma";
  $sql = "DELETE from proforma WHERE idproforma = $idproforma";
  $resultado = mysqli_query($this->conectar(),$sql);
  $sql2="DELETE FROM detalleproforma where idproforma = $idproforma";
  $resultado2 = mysqli_query($this->conectar(),$sql2);

  if($resultado){
      return 1;
  }else{
      return 0;
  }
}

public function ListarPedido($idproforma){
  $sql="SELECT * FROM proforma C, detalleproforma D, producto P where C.idproforma =$idproforma and D.idproducto = P.idproducto
   and C.estadocomprobante =1 and C.idproforma =D.idproforma" or die ("Error Buscando Proforma");
  $resultado =mysqli_query($this->conectar(),$sql);
  return $resultado;

}

// _________________________________________________________________________________________

public function RegistrarProforma($dni,$fecha,$estado,$dnicliente,$empleado,$importe,$mesa){
      $sql = "INSERT INTO 
              proforma(empleado, dni, fecha, idcliente, total, estadocomprobante,mesanum)
              VALUES('$empleado','$dni','$fecha','$dnicliente','$importe','$estado','$mesa')";
      // echo $sql;
      $resultado = mysqli_query($this->conectar(),$sql) or die ("Error Resgistrando Proforma");
      // $idproforma2="SELECT max(idproforma) from proforma";
      // $Ridproforma1=mysqli_query($this->conectar(),$idproforma2);
      $this->desConectar();
      // $Ridproforma2 = mysqli_fetch_assoc($Ridproforma1);
      if($resultado){
          return 1;
      }else{
          return 0;
      }

  }

  public function BuscarProforma($idcliente,$fecha){
      // $sql = "SELECT idproforma FROM proforma WHERE idcliente = '$idcliente' and fecha = '$fecha' ";
      $sql2 = "SELECT max(idproforma) from proforma";
      $resultado = mysqli_query($this->conectar(),$sql2) or die ("Error Buscando Proforma");
      $this->desConectar();
      $dato = mysqli_fetch_assoc($resultado);
      // $aciertos = mysqli_num_rows($resultado);
      if($resultado){
          return $dato;
      }else{
          return "No sencontro Cliente";
      }
      // for($i=0;$i<$aciertos;$i++){
      //     $fila[$i] = mysqli_fetch_array($resultado);
      // }
      // return $fila;
  }

 }
 ?>
<!-- a -->