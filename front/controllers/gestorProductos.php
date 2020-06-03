<?php 
class GestorProductosController{

	public static function ver_productos_destacados(){

		$productos = GestorProductosModel::ver_productos_destacados();

		

		for($i = 0; $i < count($productos); $i++) {
			$item = $productos[$i];
			$id_item = $item["id"];		
			$nombre = $item["titulo"];
			$nombre_completo =$item["titular"];
			$descripcion = $item["descripcion"];
			$precio = $item["precio"];
			$oferta = $item["precioOferta"];
			$imagen = $item["portada"];

			if (strlen($item["titulo"]) > 20) {
				$nombre = substr($item["titulo"],0,20) . "...";
			}else{
				$nombre = $item["titulo"];
			}
			if (strlen($item["descripcion"]) > 40) {
				$descripcion = substr($item["descripcion"],0,40) . "...";
			}else{
				$descripcion = $item["descripcion"];
			}

			if ($oferta != "0.00") {
				$offert = "<div class='overflow-hidden oferta'>$ $oferta</div>";
				$price = "";
				// <div class='overflow-hidden precio'>$ <span style='text-decoration: line-through;'>$precio</span></div>
				$label_oferta = "
					<div class='label_oferta'>
						<span>¡oferta!</span>
					</div>
				";
			}else{
				$offert = "";
				$price = "<div class='overflow-hidden precio'>$ <span>$precio</span></div>";
				$label_oferta = "";
			}


			echo '
			<div class="product-cell">
				<a href="producto_'.$id_item.'">
					<div class="product-cell__image-container">
						<img src="http://localhost/universalvenezuela/backend/'.$imagen.'" alt="dunk-humidity">
					</div>
					<div class="product-cell__item-copy">
						<span class="product-cell__item-brand mb-2">'.$nombre.'</span>
						<span class="product-cell__item-name">'.$descripcion.'</span>
						<span class="product-cell__item-code">'.$item["id_subcategoria"].'</span>
					</div>
					<span class="product-cell__item-button product-cell__item-button--price">$'.$precio.'</span>
				</a>
			</div>
			';

			
		}

	}


	public static function ver_productos_todos($item, $valor, $item2, $valor2){
		

		$productos = GestorProductosModel::ver_productos_todos($item, $valor, $item2, $valor2);

		return $productos;
	}
	
	public static function ver_productos_oferta(){

		$productos = GestorProductosModel::ver_productos_oferta();


		for($i = 0; $i < count($productos); $i++) {
			$item = $productos[$i];

			$id_item = $item["id"];		
			$nombre = $item["titulo"];
			$descripcion = $item["descripcion"];
			$precio = $item["precio"];
			$oferta = $item["precioOferta"];
			$imagen = $item["portada"];

			if (strlen($item["titulo"]) > 20) {
				$nombre = substr($item["titulo"],0,20) . "...";
			}else{
				$nombre = $item["titulo"];
			}
			if (strlen($item["descripcion"]) > 60) {
				$descripcion = substr($item["descripcion"],0,60) . "...";
			}else{
				$descripcion = $item["descripcion"];
			}

			if ($oferta != "0.00") {
				$offert = "<div class='overflow-hidden oferta'>$ $oferta</div>";
				$price = "<div class='overflow-hidden precio' style='color: #000 !important;'>$ <span style='text-decoration: line-through;'>$precio</span></div>";			
				$label_oferta = "
					<div class='label_oferta'>
						<span>¡oferta!</span>
					</div>
				";
			}else{
				$offert = "";
				$price = "<div class='overflow-hidden precio'>$ <span>$precio</span></div>";
				$label_oferta = "";
			}


			echo "
				<div class='item'>
	                <div class='image fit' style='position:relative;'>
	                	$label_oferta
	                  	<img src='backend/$imagen' alt='producto' />
	                </div>
	                <div class='content'>
	                  	<header class='align-center'>	                    
	                    	<h4> <strong> $nombre</strong></h4>
	                  	</header>
	                  	<div class='content-desc'>
	                  		<p>$descripcion</p>
	                  	</div>
	                  	$price
	                  	$offert
	                  	<footer class='align-center'>
	                    	<a href='producto_$id_item' class='button alt'>Ver más</a>
	                  	</footer>
	                </div>
	            </div>

			";

			
		}

	}
	public static function ver_productos_promocion(){

		$promociones = GestorProductosModel::ver_productos_promocion();

		// var_dump($promociones);

		for($i = 0; $i < count($promociones); $i++) {
			$item = $promociones[$i];

			$id_item = $item["id"];		
			$nombre = $item["alias"];
			$descripcion = $item["descripcion"];
			$precio = $item["precio"];
			$imagen = $item["portada"];

			if (strlen($nombre) > 20) {
				$nombre = substr($nombre,0,20) . "...";
			}else{
				$nombre = $nombre;
			}
			if (strlen($item["descripcion"]) > 60) {
				$descripcion = substr($item["descripcion"],0,60) . "...";
			}else{
				$descripcion = $item["descripcion"];
			}


			echo "
				<div class='item'>
	                <div class='image fit'>
	                    <img src='backend/$imagen' alt='promocion' />
	                </div>
	                <div class='content'>
	                    <header class='align-center'>
	                        <h4> <strong>$nombre</strong></h4>
	                    </header>
	                    <div class='content-desc'>
	                    	<p>$descripcion</p>
	                    </div>
	                    <div class='overflow-hidden precio'>$ $precio</div>
	                    <footer class='align-center'>
	                        <a href='promocion_$id_item' class='button alt'>Ver más</a>
	                    </footer>
	                </div>
	            </div>

			";

			
		}

	}
	public static function ver_productos_subcategoria($subcategoria){

		$array = GestorProductosModel::ver_productos_subcategoria($subcategoria);

		$productos = $array["p"];

		$str_productos = "";

		for($i = 0; $i < count($productos); $i++) {
			$item = $productos[$i];

			$id_item 		= $item["id"];		
			$nombre 		= $item["titulo"];
			$descripcion = substr($item["descripcion"],0,40) . "...";
			$precio 		= $item["precio"];
			$oferta 		= $item["precioOferta"];
			$imagen 		= $item["portada"];

			if (strlen($item["titulo"]) > 20) {
				$nombre = substr($item["titulo"],0,20) . "...";
			}else{
				$nombre = $item["titulo"];
			}
			if (strlen($item["descripcion"]) > 40) {
				$descripcion = substr($item["descripcion"],0,40) . "...";
			}else{
				$descripcion = $item["descripcion"];
			}

			// if ($oferta != "0.00") {
			// 	$offert = "<div class='overflow-hidden oferta'>$ $oferta</div>";
			// 	$price = "";			
			// 	$label_oferta = "
			// 		<div class='label_oferta'>
			// 			<span>¡oferta!</span>
			// 		</div>
			// 	";
			// }else{
			// 	$offert = "";
			// 	$price = "<div class='overflow-hidden precio'>$ <span>$precio</span></div>";
			// 	$label_oferta = "";
			// }


			$str_productos .= '
			<div class="product-cell">
				<a href="producto_'.$id_item.'">
					<div class="product-cell__image-container">
						<img src="http://localhost/universalvenezuela/backend/'.$imagen.'" alt="dunk-humidity">
					</div>
					<div class="product-cell__item-copy">
						<span class="product-cell__item-brand mb-2">'.$nombre.'</span>
						<span class="product-cell__item-name">'.$descripcion.'</span>
						<span class="product-cell__item-code">'.$item["id_subcategoria"].'</span>
					</div>
					<span class="product-cell__item-button product-cell__item-button--price">$'.$precio.'</span>
				</a>
			</div>
			';
			

			
		}

		$arr["productos"] = $str_productos;
		

		return $arr;

	}
	public static function ver_detalle_producto($id){

		$array = GestorProductosModel::ver_detalle_producto($id);
		$ruta = Ruta::ctrRutaServidor();
		$productos = $array["relacionados"];
		$str_productos = "";

		$rand = range(0,count($productos) -1);
		shuffle($rand);

		for($i = 0; $i < count($productos); $i++) {

			if ($i < 3) {
				$num_rand = $rand[$i];

				$item = $productos[$num_rand];
				$id_item = $item["id"];		
				$nombre = $item["titulo"];
				$descripcion = $item["descripcion"];
				$precio = $item["precio"];
				$oferta = $item["precioOferta"];
				$imagen = $item["portada"];

				if (strlen($item["titulo"]) > 20) {
					$nombre = substr($item["titulo"],0,20) . "...";
				}else{
					$nombre = $item["titulo"];
				}
				if (strlen($item["descripcion"]) > 60) {
					$descripcion = substr($item["descripcion"],0,60) . "...";
				}else{
					$descripcion = $item["descripcion"];
				}

				if ($oferta != "0.00") {
					$offert = "<div class='overflow-hidden oferta'>$ $oferta</div>";
					$price = "";			
					$label_oferta = "
						<div class='label_oferta'>
							<span>¡oferta!</span>
						</div>
					";
				}else{
					$offert = "";
					$price = "<div class='overflow-hidden precio'>$ <span>$precio</span></div>";
					$label_oferta = "";
				}


				$str_productos .= "
					<div class='item'>
		                <div class='image fit' style='position:relative;'>
		                	$label_oferta
		                  	<img src='".$ruta.$imagen."' alt='producto' />
		                </div>
		                <div class='content'>
		                  	<header class='align-center'>	                    
		                    	<h4> <strong> $nombre</strong></h4>
		                  	</header>
		                  	<p>$descripcion</p>
		                  	$price
		                  	$offert
		                  	<footer class='align-center'>
		                    	<a href='producto_$id_item' class='button alt'>Ver más</a>
		                  	</footer>
		                </div>
		            </div>

				";
			}else{
				break;
			}

			
		}
		$array["str_relacion"] = $str_productos;

		return $array;

	}
	public static function ver_detalle_promocion($id){

		$array = GestorProductosModel::ver_detalle_promocion($id);
		$promociones = $array["relacionados"];
		$str_promociones = "";

		$rand = range(0,count($promociones) -1);
		shuffle($rand);

		for($i = 0; $i < count($promociones); $i++) {

			if ($i < 3) {
				$num_rand = $rand[$i];

				$item = $promociones[$num_rand];

				$id_item = $item["id"];		
				$nombre = $item["alias"];
				$descripcion = $item["descripcion"];
				$precio = $item["precio"];
				$imagen = $item["portada"];

				if (strlen($nombre) > 20) {
					$nombre = substr($nombre,0,20) . "...";
				}else{
					$nombre = $nombre;
				}
				if (strlen($item["descripcion"]) > 60) {
					$descripcion = substr($item["descripcion"],0,60) . "...";
				}else{
					$descripcion = $item["descripcion"];
				}


				$str_promociones .= "
					<div class='item'>
		                <div class='image fit'>
		                    <img src='".$ruta.$imagen."' alt='promocion' />
		                </div>
		                <div class='content'>
		                    <header class='align-center'>
		                        <h4> <strong>$nombre</strong></h4>
		                    </header>
		                    <div class='content-desc'>
		                    	<p>$descripcion</p>
		                    </div>
		                    <div class='overflow-hidden precio'>$ $precio</div>
		                    <footer class='align-center'>
		                        <a href='promocion_$id_item' class='button alt'>Ver más</a>
		                    </footer>
		                </div>
		            </div>

				";
			}else{
				break;
			}

			
		}
		$array["str_relacion"] = $str_promociones;

		return $array;

	}
	
}