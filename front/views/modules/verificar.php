<!--=====================================
				VERIFICAR
======================================-->

<?php



	$usuarioVerificado = false;
	
	$item = "EmailEncriptado";
	$valor =  $rutas;

	

	$respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

	if($valor == $respuesta["emailEncriptado"]){

		$id = $respuesta["id"];
		$item2 = "verificacion";
		$valor2 = 0;

		$respuesta2 = ControladorUsuarios::ctrActualizarUsuario($id, $item2, $valor2);
		var_dump($_GET["ruta"]);

		if($respuesta2 == "ok"){

			$usuarioVerificado = true;

		}

	}
		

?>


<div class="container">
	
	<div class="row">
	 
		<div class="col-xs-12 text-center verificar">
			
			<?php

				if($usuarioVerificado){

					echo '<h3>Gracias</h3>
						<h2><small>¡Hemos verificado su correo electrónico, ya puede ingresar al sistema!</small></h2>

						<br>

						
						<button type="button" class="btn btn-secondary btn-sm p-2 bl-radius ml-1" data-toggle="modal" data-target="#modalIngreso">Iniciar Sesión</button>';
				

				}else{

					echo '<h3>Error</h3>

					<h2><small>¡No se ha podido verificar el correo electrónico,  vuelva a registrarse!</small></h2>

					<br>

					<button type="button" class="btn btn-primary btn-sm p-2 br-radius" data-toggle="modal" data-target="#modalRegistro">Registrarse</button>';


				}

			?>

		</div>

	</div>

</div>

