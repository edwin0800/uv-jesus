<?php 


class GestorBlogController{

	public static function ver_blogs(){

		$articulo = GestorBlogsModel::ver_blogs();

		$num_x = 0;
		$rows = "";
		$cols = "";
		$last = "";

		for($i = 0; $i < count($articulo); $i++) {
			$item = $articulo[$i];

			$id_item = $item["id"];		
			$titulo = $item["titulo"];
			$titulo_completo =$item["titulo"];
			$categoria = $item["categoria"];
			$fecha = $item["fecha"];
			$extracto = $item["extracto"];
			$etiquetas = $item["etiquetas"];
			$imagen = $item["foto"];
			$num_x++;
			
			// if (strlen($item["nombre"]) > 20) {
			// 	$nombre = substr($item["nombre"],0,20) . "...";
			// }else{
			// 	$nombre = $item["nombre"];
			// }
			if (strlen($extracto) > 170) {
				$extracto = substr($extracto,0,170) . "...";
			}


			if ($i == count($articulo) -1 && $num_x == 1) {
				$last = "
					<div class='col-md-12'>
						<div class='row no-gutters border rounded flex-md-row mb-4 shadow-sm h-md-250 position-relative pt-0' style='overflow: hidden !important;'>
				            <div class='col p-4 d-flex flex-column position-static'>
				                <strong class='d-inline-block mb-2 text-primary'>$categoria</strong>
				                <h3 class='mb-0'>$titulo</h3>
				                <div class='mb-1 text-muted'>$fecha</div>
				                <p class='card-text mb-auto'>$extracto</p>
				                 <a href='entrada_$id_item' class='stretched-link'>Leer más</a>
				            </div>
				        </div>

					</div>					
				";

				$rows .= "
					<div class='row'>$last</div>
				";
			}

			
			if ($num_x <= 2) {
				$cols .= "
					<div class='col-md-6'>
						<div class='row no-gutters border rounded flex-md-row mb-4 shadow-sm h-md-250 position-relative pt-0' style='overflow: hidden !important;'>
				            <div class='col p-4 d-flex flex-column position-static'>
				                <strong class='d-inline-block mb-2 text-primary'>$categoria</strong>
				                <h3 class='mb-0'>$titulo</h3>
				                <div class='mb-1 text-muted'>$fecha</div>
				                <p class='card-text mb-auto'>$extracto</p>
				                 <a href='entrada_$id_item' class='stretched-link'>Leer más</a>
				            </div>
				        </div>

					</div>					
				";

				if ($num_x >= 2) {
					$num_x = 0;
					$rows .= "
						<div class='row'>$cols</div>
					";
					$cols = "";
				}
			}
			
			
		}

		echo $rows;

	}


	public static function ver_detalle_blog($id){

		$array = GestorBlogsModel::ver_detalle_blog($id);

		$relacionados = $array["relacionados"];
		$lista = "";

		for ($i=0; $i < count($relacionados); $i++) { 
			$id = $relacionados[$i]["id"];
			$titulo = $relacionados[$i]["titulo"];
			$fecha = $relacionados[$i]["fecha"];
			if (strlen($titulo) > 20) {
				$titulo = substr($titulo,0,20) . "...";
			}
			$arr_fecha = explode("-",$fecha);

			$lista .= "
				<li><a href='entrada_$id'>$titulo $arr_fecha[0]</a></li>
		
			";
		}
		$array["relacionados"] = $lista;
	
		return $array;

	}

	
}