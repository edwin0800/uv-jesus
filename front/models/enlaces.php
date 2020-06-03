<?php

class EnlacesModels{

	public static function enlacesModel($enlaces){

		if( $enlaces == "producto" ||
			$enlaces == "nosotros" ||
			$enlaces == "ofertas" ||
			$enlaces == "promociones" ||
			$enlaces == "promocion" ||
			$enlaces == "categoria" ||
			$enlaces == "blog" ||
			$enlaces == "entrada" ||
			$enlaces == "contacto" ||
			$enlaces == "slide" ||
			$enlaces == "shop" ||
			$enlaces == "perfil" ||
			$enlaces == "salir" ||
			$enlaces == "pay" ||
			$enlaces == "ExecutePayment" ||			
			$enlaces == "home"){

			$module = "views/modules/".$enlaces.".php";

		}else if($enlaces == "verificar"){
			$module = "views/modules/".$enlaces.".php";
		}
		else if($enlaces == "index"){
			$module = "views/modules/index.php";
		}else if ($enlaces == "acceso") {
			$module = "views/modules/access.php";
		}else{
			$module = "views/modules/error404.php";
		}

		return $module;

	}


}