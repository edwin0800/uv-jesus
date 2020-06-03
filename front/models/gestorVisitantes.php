<?php 

class GestorVisitantesModel{

	public static function nuevo_visitante($dispositivo){

		$consulta = new Consulta();

		$fecha = date("Y-m-d");
		$consulta->nuevo_registro("insert into visitantes (dispositivo,fecha) values ('$dispositivo', '$fecha')");
		
		$arr["status"] = "ok";

		return $arr;
	}

}