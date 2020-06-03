<?php 

class GestorProductosModel{


	public static function ver_productos_destacados(){

		$consulta = new Consulta();

		$productos = $consulta->ver_registros("select * from productos where estado = 1 ORDER BY ventas LIMIT 12");
			

		return $productos;
	}
	public static function ver_productos_todos($item, $valor, $item2, $valor2){

		$consulta = new Consulta();

		if($valor != null){

			if($item == 'precio'){
				$productos = $consulta->ver_registros("select * from productos where estado = 1 AND " .$valor);
			}
	
			if($item == 'talla'){
				$productos = $consulta->ver_registros("select * from productos where estado = 1 AND (detalles LIKE '%$valor%')");
			}
			if($item == 'todos'){
				$productos = $consulta->ver_registros("select * from productos where estado = 1 order by id DESC");
			}

				switch ($valor) {
					case 'reciente':
						$productos = $consulta->ver_registros("select * from productos where estado = 1 order by id DESC");
						break;

					case 'antiguo':
						$productos = $consulta->ver_registros("select * from productos where estado = 1 order by id ASC");
						break;

					case 'barato':
						$productos = $consulta->ver_registros("select * from productos where estado = 1 order by precio ASC");
						break;

					case 'caro':
						$productos = $consulta->ver_registros("select * from productos where estado = 1 order by precio DESC");
						break;
				}
				

		}else{
			$productos = $consulta->ver_registros("select * from productos where estado = 1 order by id DESC");
		}

		
		
		
		// }else if(($item != null && $valor != null)  && ($item2 != null && $valor2 != null)){
		// 	$productos = $consulta->ver_registros("select * from productos where estado = 1  and $item = $valor and  and $item2 = $valor2");
		// }else{
		// 	$productos = $consulta->ver_registros("select * from productos where estado = 1");
		// }

		return $productos;
	}
	public static function ver_productos_oferta(){

		$consulta = new Consulta();

		$productos = $consulta->ver_registros("select * from productos where oferta != '0.00' && estado = 1");
			

		return $productos;
	}
	public static function ver_productos_promocion(){
		

		$consulta = new Consulta();

		$promociones = $consulta->ver_registros("select * from promociones where estado = 1");

		for ($i=0; $i < count($promociones); $i++) { 
			$promo = $promociones[$i];
			$ides = explode("-",$promo["id_productos"]);
			$unidades = explode("-",$promo["cantidad"]);
			$promo["productos"] = [];

			for ($j=0; $j < count($ides); $j++) { 

				$id_ = $ides[$j];
				$product = $consulta->ver_registros("select * from productos where id = '$id_'");

				$aux_product = $product[0];
				$aux_product["unidades_promo"] = $unidades[$j];

				array_push($promo["productos"],$aux_product);
			}

			$promociones[$i] = $promo;
			
		}
			

		return $promociones;
	}
	public static function ver_productos_subcategoria($subcategoria){

		$consulta = new Consulta();

		$hijos = $consulta->ver_registros("select * from productos where id_subcategoria = '$subcategoria'");

		$sql_part = "";

		if($subcategoria != null){
			$productos = $consulta->ver_registros("select * from productos where id_subcategoria = '$subcategoria' && estado = 1");
		}else{
			$productos = $consulta->ver_registros("select * from productos where estado = 1");
		}


		for ($i=0; $i < count($hijos); $i++) { 
			$son = $hijos[$i];
			$c_son = $son["titulo"];
			$productos_aux = $consulta->ver_registros("select * from productos where id_subcategoria = '$c_son' && estado = 1");

			for ($j=0; $j < count($productos_aux); $j++) { 
				array_push($productos, $productos_aux[$j]);
			}

		}

		$info_subcategoria = $consulta->ver_registros("select * from subcategorias where id = '$subcategoria'");

		$arr["p"] = $productos;
		$arr["c"] = (isset($info_subcategoria[0])) ? $info_subcategoria[0] : [];
			
		return $arr;
	}
	public static function ver_detalle_producto($id){

		$consulta = new Consulta();
		$producto = $consulta->ver_registros("select * from productos where id = '$id'");
		$subcategoria = $producto[0]["id_subcategoria"];
		$media = $producto[0]["multimedia"];
		$info_categoria = $consulta->ver_registros("select * from subcategorias where id = '$subcategoria'");
		$subcategoria = $info_categoria[0]["subcategoria"];
		$arr_relacion = GestorProductosModel::ver_productos_subcategoria($subcategoria);
		$productos_relacionados = $arr_relacion["p"];
		$p_relacion = [];

		for ($i=0; $i < count($productos_relacionados); $i++) { 
			if ($productos_relacionados[$i]["id"] != $id) {
				array_push($p_relacion, $productos_relacionados[$i]);
			}
		}

		$arr["producto"] = $producto[0];
		$arr["relacionados"] = $p_relacion;
		$arr["media"] = $media;
		$arr["categoria"] = (isset($info_categoria[0])) ? $info_categoria[0] : [];
			
		return $arr;
	}
	public static function ver_detalle_promocion($id){

		$consulta = new Consulta();

		$promo = $consulta->ver_registros("select * from promociones where id = '$id'");

		$mas_promociones = $consulta->ver_registros("select * from promociones where estado = 1");
		
		$mas_promociones = GestorProductosModel::aux_promo($mas_promociones);
		$promo = GestorProductosModel::aux_promo($promo);	

		$p_relacion = [];

		for ($i=0; $i < count($mas_promociones); $i++) { 
			if ($mas_promociones[$i]["id"] != $id) {
				array_push($p_relacion, $mas_promociones[$i]);
			}
		}

		$arr["promo"] = $promo[0];
		$arr["relacionados"] = $p_relacion;
			
		return $arr;
	}
	public static function aux_promo($mas_promociones){

		$consulta = new Consulta();
		for ($i=0; $i < count($mas_promociones); $i++) { 
			$promo = $mas_promociones[$i];
			$ides = explode("-",$promo["id_productos"]);
			$unidades = explode("-",$promo["cantidad"]);
			$promo["productos"] = [];

			for ($j=0; $j < count($ides); $j++) { 
				$id_ = $ides[$j];
				$product = $consulta->ver_registros("select * from productos where id = '$id_'");
				$subcategoria_x = $product[0]["categoria"];
				$info_categoria_x = $consulta->ver_registros("select * from subcategorias where subcategoria = '$subcategoria_x'");

				$aux_product = $product[0];
				$aux_product["unidades_promo"] = $unidades[$j];
				$aux_product["info_categoria_x"] = $info_categoria_x;

				array_push($promo["productos"],$aux_product);
			}

			$mas_promociones[$i] = $promo;
			
		}

		return $mas_promociones;
	}


}