<?php 

class GestorBlogsModel{


	public static function ver_blogs(){

		$consulta = new Consulta();

		$articulos = $consulta->ver_registros("select * from articulos where estado = 'activado'");
			

		return $articulos;
	}

	public static function ver_detalle_blog($id){

		$consulta = new Consulta();

		$blog = $consulta->ver_registros("select * from articulos where id = '$id' && estado = 'activado'");
		$relacionados = [];

		$articulos = $consulta->ver_registros("select * from articulos where estado = 'activado'");

		for ($i=0; $i < count($articulos); $i++) { 
			if ($articulos[$i]["id"] != $blog[0]["id"]) {
				array_push($relacionados, $articulos[$i]);
			}
		}
	

		$arr["blog"] = $blog;
		$arr["relacionados"] = $relacionados;
					
		return $arr;
	}


}