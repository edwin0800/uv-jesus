<?php 


class GestorSlideController{

	public static function verImagenes(){

		$imagenes = GestorSlideModel::verImagenes();


		for($i = 0; $i < count($imagenes); $i++) {
			$item = $imagenes[$i];

			$id_item = $item["idimagen"];

			$texto = htmlspecialchars_decode($item["text_imagen"]);
			$ruta = $item["imagen"];


			echo "
				<li>
					<img src='backend/$ruta'>
					$texto
				</li>

			";

			
		}

	}

	public static function ver_config_slide(){

		$registros = GestorSlideModel::ver_config_slide();
		
		return $registros;
	}
	
}