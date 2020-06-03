<?php 


class GestorPagesController{

	public static function ver_page($page){

		$page = GestorPagesModel::ver_page($page);

		$texto = htmlspecialchars_decode($page["cuerpo"]);
		
		echo $texto;

	}
	
}