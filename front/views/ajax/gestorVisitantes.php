<?php 
require_once '../../models/conexion.php';
require_once '../../models/consulta.php';
require_once '../../models/gestorVisitantes.php';

require_once '../../controllers/gestorVisitantes.php';

class GestorVisitantesAjax{

	public function nuevo_visitante(){
		$respuesta = GestorVisitantesController::nuevo_visitante();

		echo json_encode($respuesta);
	}

}

$p_j = new GestorVisitantesAjax();

if (isset($_POST["nuevo_visitante"])) {
	$p_j -> nuevo_visitante();
}


