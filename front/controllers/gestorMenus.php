<?php

class gestorMenusController {

		public static function verMenusController(){

			$resultado = gestorMenusModel::verMenusModel('menu');
			$respuesta = gestorMenusModel::verMenusModel('menu');

			foreach ($resultado as $row => $item) {

				if ($item["estado"]!="padre" && $item["estado"]=="normal" && $item["estado"]!="hijo") {

					if ($item["url"]=="categoria") {
						$categoria = "categoria_".$item["etiqueta"];
					}else{
						$categoria = $item["url"];
					}
				
					echo '<li>
							<a href="'.$categoria.'">'.$item["nombre"].'</a>
						</li>';

				}elseif ($item["estado"]=="padre" || $item["estado"]=="padre/hijo") {
					echo '<li>
							<a href="'.$item["url"].'" class="main-menu">'.$item["nombre"].'<i class="fa fa-angle-down"></i> </a>
							<div class="sub-menu">
								<ul id="'.$item["nombre"].'">';
								foreach ($respuesta as $row => $value) {
									if ($item["nombre"]==$value["padre"]) {

										if ($value["url"]=="categoria") {
											$category = "categoria_".$value["etiqueta"];
										}else{
											$category = $value["url"];
										}

										echo '<li><a href="'.$category.'">'.$value["nombre"].'</a></li>';
									}
								}
							echo'</ul>
							</div>
						</li>';
				}
			}

		}

}

?>