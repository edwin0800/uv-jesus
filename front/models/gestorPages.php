<?php 

class GestorPagesModel{

	public static function ver_page($name_page){

		$consulta = new Consulta();
				
		$arr = $consulta->ver_registros("select * from pages where name_page = '$name_page'");
	
		return $arr[0];
	}

}