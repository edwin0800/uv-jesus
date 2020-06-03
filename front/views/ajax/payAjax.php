<?php 
require_once '../../models/conexion.php';
require_once '../../models/consulta.php';
require_once '../../controllers/payment.php';

require '../../views/vendor/autoload.php';

class Pay_ajax{

	public function exec(){
		$respuesta = Pay_::exec();

		echo json_encode($respuesta);
	}

}

$a = new Pay_ajax();

if (isset($_POST["exec"])) {
	$a -> exec();
}

