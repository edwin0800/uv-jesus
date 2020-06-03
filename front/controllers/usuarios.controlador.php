<?php
 
class ControladorUsuarios{

	/*=============================================
				REGISTRO DE USUARIO
	=============================================*/

	public function ctrRegistroUsuario(){

		if(isset($_POST["regUsuario"])){

			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUsuario"]) && preg_match('/^[^0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])) {

				$encriptar = crypt($_POST["regPassword"], '$2a$07$usesomesillystringforsalt$');

				$encriptarEmail = md5($_POST["regEmail"]);

				$datos = array("nombre" => strtoupper($_POST["regUsuario"]),
							   "password" => $encriptar,
							   "email" => strtolower($_POST["regEmail"]),
							   "modo" => "directo",
							   "verificacion"=> 0,
							   "emailEncriptado" => $encriptarEmail);

				$tabla = "usuarios";

				$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

				if($respuesta == "ok"){
				

					/*=============================================
					ACTUALIZAR NOTIFICACIONES NUEVOS USUARIOS
					=============================================*/

					$traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

					$nuevoUsuario = $traerNotificaciones["nuevosUsuarios"] + 1;

					ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevosUsuarios", $nuevoUsuario);

					echo '<script> 

					Swal.fire({
						title: "¡Cuenta creada satisfactoriamente!",
						text: "¡Por favor, ingrese con el correo y la contraseña que acaba de crear.",
						icon: "success",
						confirmButtonColor: "#3085d6",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
					  }).then((result) => {
						if (result.value) {
							history.back();
						}
					  })

					</script>';


				}

			}else{

				echo '<script> 


						Swal.fire({
							title: "¡ERROR!",
							text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
							icon: "error",
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
							    history.back();
							}
						  })

						</script>';

				

			}

		}

	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuario($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function ctrActualizarUsuario($id, $item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	public function ctrIngresoUsuario(){

		if (isset($_POST["ingEmail"])) {

			if (preg_match('/^[^0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');

				$tabla = "usuarios";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

				if ($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar) {
					
					if ($respuesta["verificacion"] == 1) {

						

						echo '<script> 


						Swal.fire({
							title: "¡Su cuenta ha sido suspendida!",
							text: "Por favor, comuníquese con el administrador de la página para solventar el problema",
							icon: "error",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
							    history.back();
							}
						  })

						</script>';

												

					}else{

						$_SESSION["validarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["password"] = $respuesta["password"];
						$_SESSION["modo"] = $respuesta["modo"];

						echo '<script>

							window.location = localStorage.getItem("rutaActual");

							</script>';
					}


				}else{

					echo '<script> 


						Swal.fire({
							title: "¡ERROR AL INGRESAR!",
							text: "Por favor, revise que el correo electrónico exista, o la contraseña coincida con el correo ingresado",
							icon: "error",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
								window.location = localStorage.getItem("rutaActual");
							}
						  })

						</script>';

				}



			}else{

				echo '<script> 


						Swal.fire({
							title: "¡ERROR!",
							text: "Error al ingresar al sistema, no se permiten caracteres especiales",
							icon: "error",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
								history.back();
							}
						  })

						</script>';

			}
			

		}
	}

	/*=============================================
	OLVIDO DE CONTRASEÑA
	=============================================*/

	public function ctrOlvidoPassword(){

		if(isset($_POST["passEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])){

				/*=============================================
				GENERAR CONTRASEÑA ALEATORIA
				=============================================*/

				function generarPassword($longitud){

					$key = "";
					$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";

					$max = strlen($pattern)-1;

					for($i = 0; $i < $longitud; $i++){

						$key .= $pattern{mt_rand(0,$max)};

					}

					return $key;

				}

				$nuevaPassword = generarPassword(11);

				$encriptar = crypt($nuevaPassword, '$2a$07$usesomesillystringforsalt$');

				$tabla = "usuarios";

				$item1 = "email";
				$valor1 = $_POST["passEmail"];

				$respuesta1 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item1, $valor1);

				if($respuesta1){

					$id = $respuesta1["id"];
					$item2 = "password";
					$valor2 = $encriptar;

					$respuesta2 = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item2, $valor2);

					if($respuesta2  == "ok"){

						/*=============================================
						CAMBIO DE CONTRASEÑA
						=============================================*/

						date_default_timezone_set("America/Caracas");

					$url = Ruta::ctrRuta();

					$mail = new PHPMailer;

					$mail->Charset = 'UTF-8';

					$mail->isMail();

					$mail->setFrom('eulin-palma@hotmail.com', 'xZoneX');

					$mail->addReplyTo('eulin-palma@hotmail.com', "xZoneX");

					$mail->Subject = "Solicitud de nueva contraseña";

					$mail->addAddress($_POST["passEmail"]);

					$mail->msgHTML('	<div style="width: 100%; background: #eee; position: relative; font-family: sans-serif; padding-bottom: 40px">

								<center>
									
									<img style="padding: 20px; width: 15%;" src="frontend/view/img/plantilla/logo.png">

								</center>

								<div style="position: relative; margin: auto; width: 600px; background: white; padding: 20px;">

									<center>

										<img style="padding: 20px; width: 15%;" src="frontend/view/img/plantilla/icon-pass.png">

										<h3 style="font-weight: 100; color: #999">SOLICITUD DE NUEVA CONTRASEÑA</h3>

										<hr style="border: 1px solid #ccc; width: 80%">

										<h4 style="font-weight: 100; color: #999; padding: 0 20px"><strong>Nueva contraseña: </strong>'.$nuevaPassword.'</h4>

										<a href="'.$url.'" target="_blank" style="text-decoration: none;">
											<div style="line-height: 60px; background: #0aa; width: 60%; color: white">Ingrese nuevamente al sitio</div>
										</a>

										<br>

										<hr style="border: 1px solid #ccc; width: 80%">

										<h5 style="font-weight: 100; color:#999">Si no se inscribió en esta cuenta, o piensa que recibió este correo por error, puede ignorar este mensaje.</h5>

									</center>


								</div>

								</div>');

					$envio = $mail->Send();

					if (!$envio) {

						echo '<script> 


						Swal.fire({
							title: "¡ERROR!",
							text: "Ha ocurrido un problema enviando el cambio de contraseña a '.strtoupper($_POST["passEmail"]).$mail->ErrorInfo.'",
							icon: "error",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  })

						</script>';
						
						

					}else{


						echo '<script> 


						Swal.fire({
							title: "¡LISTO!",
							text: "Por favor, revise la bandeja de entrada o la carpeta de spam de su correo electrónico '.strtoupper($_POST["passEmail"]).' para cambiar su contraseña",
							icon: "success",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  })

						</script>';

						

					}
					
					
				}

			}else{

				echo '<script> 


						Swal.fire({
							title: "¡ERROR!",
							text: "El correo electrónico no existe en el sistema",
							icon: "error",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  })

						</script>';

			


			}

			




			}else{

				echo '<script> 


						Swal.fire({
							title: "¡ERROR!",
							text: "Error al enviar el correo electrónico, verifique y vuelva a intentar",
							icon: "error",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  })

						</script>';

				

			}

		}

	}



	/*=============================================
	ACTUALIZAR PERFIL
	=============================================*/

	public function ctrActualizarPerfil(){

		if(isset($_POST["editarNombre"])){

			/*=============================================
			VALIDAR IMAGEN
			=============================================*/

			$ruta = "";

			if(isset($_FILES["datosImagen"]["tmp_name"]) && !empty($_FILES["datosImagen"]["tmp_name"])){

				/*=============================================
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				=============================================*/

				$directorio = "vistas/img/usuarios/".$_POST["idUsuario"];

				if(!empty($_POST["fotoUsuario"])){

					unlink($_POST["fotoUsuario"]);
				
				}else{

					mkdir($directorio, 0755);

				}

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				list($ancho, $alto) = getimagesize($_FILES["datosImagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;	

				$aleatorio = mt_rand(100, 999);

				if($_FILES["datosImagen"]["type"] == "image/jpeg"){

					$ruta = "vistas/img/usuarios/".$_POST["idUsuario"]."/".$aleatorio.".jpg";

					/*=============================================
					MOFICAMOS TAMAÑO DE LA FOTO
					=============================================*/

					$origen = imagecreatefromjpeg($_FILES["datosImagen"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}

				if($_FILES["datosImagen"]["type"] == "image/png"){

					$ruta = "vistas/img/usuarios/".$_POST["idUsuario"]."/".$aleatorio.".png";

					/*=============================================
					MOFICAMOS TAMAÑO DE LA FOTO
					=============================================*/

					$origen = imagecreatefrompng($_FILES["datosImagen"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
    			
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

			}

			if($_POST["editarPassword"] == ""){

				$password = $_POST["passUsuario"];

			}else{

				$password = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			}

			$datos = array("nombre" => $_POST["editarNombre"],
						   "email" => $_POST["editarEmail"],
						   "password" => $password,
						   "foto" => $ruta,
						   "id" => $_POST["idUsuario"]);

			$tabla = "usuarios";

			$respuesta = ModeloUsuarios::mdlActualizarPerfil($tabla, $datos);

			if($respuesta == "ok"){

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $datos["id"];
				$_SESSION["nombre"] = $datos["nombre"];
				$_SESSION["foto"] = $datos["foto"];
				$_SESSION["email"] = $datos["email"];
				$_SESSION["password"] = $datos["password"];
				$_SESSION["modo"] = $_POST["modoUsuario"];


				echo '<script> 


						Swal.fire({
							title: "¡OK!",
							text: "¡Su cuenta ha sido actualizada correctamente!",
							icon: "success",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
								history.back();
							}
						  })

						</script>';



			}

		}

	}


	/*=============================================
	MOSTRAR COMPRAS
	=============================================*/

	static public function ctrMostrarCompras($item, $valor){

		$tabla = "compras";

		$respuesta = ModeloUsuarios::mdlMostrarCompras($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR COMENTARIOS EN PERFIL
	=============================================*/

	static public function ctrMostrarComentariosPerfil($datos){

		$tabla = "comentarios";

		$respuesta = ModeloUsuarios::mdlMostrarComentariosPerfil($tabla, $datos);

		return $respuesta;

	}


	/*=============================================
	ACTUALIZAR COMENTARIOS
	=============================================*/

	public function ctrActualizarComentario(){

		if(isset($_POST["idComentario"])){

			if(preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["comentario"])){

				if($_POST["comentario"] != ""){

					$tabla = "comentarios";

					$datos = array("id"=>$_POST["idComentario"],
								   "calificacion"=>$_POST["puntaje"],
								   "comentario"=>$_POST["comentario"]);

					$respuesta = ModeloUsuarios::mdlActualizarComentario($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script> 


						Swal.fire({
							title: "¡GRACIAS POR COMPARTIR SU OPINIÓN!",
							text: "¡Su calificación y comentario ha sido guardado!",
						   	icon: "success",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
								history.back();
							}
						  })

						</script>';

					}

				}else{

					echo '<script> 


						Swal.fire({
							title: "¡ERROR AL ENVIAR SU CALIFICACIÓN!",
							text: "¡El comentario no puede estar vacío!",
							icon: "error",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
								history.back();
							}
						  })

						</script>';

			

				}	

			}else{

				echo '<script> 


						Swal.fire({
							title: "¡ERROR AL ENVIAR SU CALIFICACIÓN!",
							text: "¡El comentario no puede llevar caracteres especiales!",
							icon: "error",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
								history.back();
							}
						  })

						</script>';


			}

		}

	}

	/*=============================================
	AGREGAR A LISTA DE DESEOS
	=============================================*/

	static public function ctrAgregarDeseo($datos){

		$tabla = "deseos";

		$respuesta = ModeloUsuarios::mdlAgregarDeseo($tabla, $datos);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR LISTA DE DESEOS
	=============================================*/

	static public function ctrMostrarDeseos($item){

		$tabla = "deseos";

		$respuesta = ModeloUsuarios::mdlMostrarDeseos($tabla, $item);

		return $respuesta;

	}

	/*=============================================
	QUITAR PRODUCTO DE LISTA DE DESEOS
	=============================================*/
	static public function ctrQuitarDeseo($datos){

		$tabla = "deseos";

		$respuesta = ModeloUsuarios::mdlQuitarDeseo($tabla, $datos);

		return $respuesta;

	}

	/*=============================================
	ELIMINAR USUARIO
	=============================================*/

	public function ctrEliminarUsuario(){

		if(isset($_GET["id"])){

			$tabla1 = "usuarios";		
			$tabla2 = "comentarios";
			$tabla3 = "compras";
			$tabla4 = "deseos";

			$id = $_GET["id"];

			if($_GET["foto"] != ""){

				unlink($_GET["foto"]);
				rmdir('vistas/img/usuarios/'.$_GET["id"]);

			}

			$respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla1, $id);
			
			ModeloUsuarios::mdlEliminarComentarios($tabla2, $id);

			ModeloUsuarios::mdlEliminarCompras($tabla3, $id);

			ModeloUsuarios::mdlEliminarListaDeseos($tabla4, $id);

			if($respuesta == "ok"){

				$url = Ruta::ctrRuta();
				
				echo '<script> 


						Swal.fire({
							title: "¡SU CUENTA HA SIDO BORRADA!",
							text: "¡Debe registrarse nuevamente si desea ingresar!",
							icon: "success",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
								window.location = "'.$url.'salir";
							}
						  })

						</script>';

		    	

		    }

		}

	}

	/*=============================================
	FORMULARIO CONTACTENOS
	=============================================*/

	public function ctrFormularioContactenos(){

		if(isset($_POST['mensajeContactenos'])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreContactenos"]) &&
			preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["mensajeContactenos"]) &&
			preg_match('/^[^0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailContactenos"])){

				/*=============================================
				ENVÍO CORREO ELECTRÓNICO
				=============================================*/

					date_default_timezone_set("America/Caracas");

					$url = Ruta::ctrRuta();	

					$mail = new PHPMailer;

					$mail->CharSet = 'UTF-8';

					$mail->isMail();

					$mail->setFrom('eulin-palma@hotmail.com', 'Eulin Palma');

					$mail->addReplyTo('eulin-palma@hotmail.com', 'Eulin Palma');

					$mail->Subject = "Ha recibido una consulta";

					$mail->addAddress("eulin-palma@hotmail.com");

					$mail->msgHTML('

						<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

						<center><img style="padding:20px; width:10%" src="http://www.tutorialesatualcance.com/tienda/logo.png"></center>

						<div style="position:relative; margin:auto; width:600px; background:white; padding-bottom:20px">

							<center>

							<img style="padding-top:20px; width:15%" src="http://www.tutorialesatualcance.com/tienda/icon-email.png">


							<h3 style="font-weight:100; color:#999;">HA RECIBIDO UNA CONSULTA</h3>

							<hr style="width:80%; border:1px solid #ccc">

							<h4 style="font-weight:100; color:#999; padding:0px 20px; text-transform:uppercase">'.$_POST["nombreContactenos"].'</h4>

							<h4 style="font-weight:100; color:#999; padding:0px 20px;">De: '.$_POST["emailContactenos"].'</h4>

							<h4 style="font-weight:100; color:#999; padding:0px 20px">'.$_POST["mensajeContactenos"].'</h4>

							<hr style="width:80%; border:1px solid #ccc">

							</center>

						</div>

					</div>');

					$envio = $mail->Send();

					if(!$envio){

						echo '<script> 


						Swal.fire({
							title: "¡ERROR!",
							text: "¡Ha ocurrido un problema enviando el mensaje!",
						   	icon: "error",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
								history.back();
							}
						  })

						</script>';


					}else{

						echo '<script> 


						Swal.fire({
							title: "¡OK!",
							text: "¡Su mensaje ha sido enviado, muy pronto le responderemos!",
							icon: "success",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
								history.back();
							}
						  })

						</script>';


					}

			}else{


				echo '<script> 


						Swal.fire({
							title: "¡ERROR!",
							text: "¡Problemas al enviar el mensaje, revise que no tenga caracteres especiales!",
						   	icon: "error",
							showCancelButton: false,
							confirmButtonColor: "#3085d6",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {
								history.back();
							}
						  })

						</script>';



			}

		}

	}

}