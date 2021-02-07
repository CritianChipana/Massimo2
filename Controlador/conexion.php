<?php
class conexion
{
	protected function conectar()
	{
		//$a =mysqli_connect('localhost','root','','massimo-luis');
		// $a =mysqli_connect('localhost','root','','rata');
		$a =mysqli_connect('localhost','root','admin','masimo');
		// mysqli_select_db('sistema');
		return $a;
	}
	protected function desconectar()
	{
		mysqli_close($this->conectar());
		
	}
}
?>