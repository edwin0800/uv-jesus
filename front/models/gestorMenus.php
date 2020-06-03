<?php

class gestorMenusModel{

	public static function verMenusModel($tabla){

		$consulta = new Consulta();
		$sql="SELECT * FROM $tabla ORDER BY posicion";

		$resultado = $consulta -> ver_registros($sql);

		return $resultado;

	}

}


?>