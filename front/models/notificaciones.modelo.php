<?php
 
require_once "conexion2.php";

class ModeloNotificaciones{
		
	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	static public function mdlMostrarNotificaciones($tabla){

		$stmt = Conexion2::conectar2()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	ACTUALIZAR NOTIFICACIONES
	=============================================*/

	static public function mdlActualizarNotificaciones($tabla, $item, $valor){

		$stmt = Conexion2::conectar2()->prepare("UPDATE $tabla SET $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	
}