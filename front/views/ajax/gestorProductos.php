<?php 
require_once '../../models/conexion.php';
require_once '../../models/consulta.php';
require_once '../../models/gestorProductos.php';

require_once '../../controllers/gestorProductos.php';

class GestorProductosAjax{

	public function verMediaSlide(){
		$id = $_POST["id_prodcto"];
		$respuesta = GestorProductosController::ver_detalle_producto($id);

		echo json_encode($respuesta["media"]);
	}

}

$p_j = new GestorProductosAjax();

if (isset($_POST["verMediaSlide"])) {
	$p_j -> verMediaSlide();
}


