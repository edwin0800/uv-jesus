<!--=====================================
			VALIDAR SESIÓN
======================================-->

<?php

$url = Ruta::ctrRuta();
$servidor = Ruta::ctrRutaServidor();

if(!isset($_SESSION["validarSesion"])){

	echo '<script>
	
		window.location = "'.$url.'";

	</script>';

	exit();

}

?>


<!--=====================================
SECCIÓN PERFIL
======================================-->

<div class="container-fluid">

	<div class="container">

		<ul class="nav nav-tabs mt-5">

			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#compras"><i class="fa fa-list-ul"></i> MIS COMPRAS</a></a>
			</li>


		  <!-- 
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#deseos"><i class="fa fa-user"></i> EDITAR PERFIL</a></a>
			</li> -->

	  		
		
		</ul>

		<div class="tab-content">

			<!--=====================================
			PESTAÑA COMPRAS
			======================================-->

	  		<div id="compras" class="tab-pane fade show active">
		    
				<div class="panel-group">

				<?php


					$item = "id_usuario";
					$valor = $_SESSION["id"];

					$compras = ControladorUsuarios::ctrMostrarCompras($item, $valor);

					if(!$compras){

						echo '<div class="col-12 text-center error404">
				               
				    		<h1><small>¡Oops!</small></h1>
				    
				    		<h2>Aún no tienes compras realizadas en esta tienda</h2>

				  		</div>';

					}else{

						foreach ($compras as $key => $value1) {

							$ordenar = "id";
							$item = "id";
							$valor = $value1["id_producto"];

							$productos = ControladorProductos::ctrListarProductos($ordenar, $item, $valor);

							foreach ($productos as $key => $value2) {
							
								echo '<div class="card">
									    
									    <div class="card-body row">

											<div class="col-lg-2 col-md-3 col-12">

												<figure>
												
													<img class="img-thumbnail" src="'.$servidor.$value2["portada"].'">

												</figure>

											</div>

											<div class="col-md-9 col-12">

												<h1><small>'.$value2["titulo"].'</small></h1>';

												if($value2["tipo"] == "virtual"){

													echo '<a href="'.$url.'curso/'.$value1["id"].'/'.$value1["id_usuario"].'/'.$value1["id_producto"].'/'.$value2["ruta"].'">
														<button class="btn btn-default pull-left">Ir al curso</button>
														</a>';

												}else{

													echo '<h6>Proceso de entrega: <i class="fa fa-calendar"></i> '.$value2["entrega"].' días hábiles</h6>';

													if($value1["envio"] == 0){

														echo '<div class="progress" style="height: 2rem">

															<div class="progress-bar bg-info" role="progressbar" style="width:33.33%">
																<span><i class="fa fa-check"></i> Despachado</span>
															</div>

															<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:33.33%">
															<span><i class="fa fa-clock-o"></i> Enviando</span>
															</div>

															<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width:33.33%">
															<span><i class="fa fa-clock-o"></i> Entregado</span>
															</div>

														</div>';

													}

													if($value1["envio"] == 1){

														echo '<div class="progress" style="height: 2rem">

															<div class="progress-bar bg-info" role="progressbar" style="width:33.33%">
															<span><i class="fa fa-check"></i> Despachado</span>
															</div>

															<div class="progress-bar" role="progressbar" style="width:33.33%">
															<span><i class="fa fa-check"></i> Enviando</span>
															</div>

															<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width:33.33%">
															<span><i class="fa fa-clock-o"></i> Entregado</span>
															</div>

														</div>';

													}

													if($value1["envio"] == 2){

														echo '<div class="progress" style="height: 2rem">

															<div class="progress-bar bg-info" role="progressbar" style="width:33.33%">
															<span><i class="fa fa-check"></i> Despachado</span>
															</div>

															<div class="progress-bar" role="progressbar" style="width:33.33%">
															<span><i class="fa fa-check"></i> Enviando</span>
															</div>

															<div class="progress-bar bg-success" role="progressbar" style="width:33.33%">
															<span><i class="fa fa-check"></i> Entregado</span>
															</div>

														</div>';

													}

												}

												echo '<h4 class="text-center"><small>Comprado el '.substr($value1["fecha"],0,-8).'</small></h4>
																
											</div>';

											
												
													
												
														
													echo '

													

												

											</div>

									    </div>

									</div>';

							}
							
						}
					}
				?>
				  
				

				</div>

		  	</div>

		  

			<!--=====================================
			PESTAÑA PERFIL
			======================================-->
		  	
		  	<div id="perfil" class="tab-pane fade">
		    	
				<div class="row">
					
					<form method="post" enctype="multipart/form-data">
					
						<div class="col-md-3 col-sm-4 col-xs-12 text-center">
							
							<br>

							<figure id="imgPerfil">
								
							<?php

							echo '<input type="hidden" value="'.$_SESSION["id"].'" id="idUsuario" name="idUsuario">
							      <input type="hidden" value="'.$_SESSION["password"].'" name="passUsuario">
							      <input type="hidden" value="'.$_SESSION["foto"].'" name="fotoUsuario" id="fotoUsuario">
							      <input type="hidden" value="'.$_SESSION["modo"].'" name="modoUsuario" id="modoUsuario">';


							if($_SESSION["modo"] == "directo"){

								if($_SESSION["foto"] != ""){

									echo '<img src="'.$url.$_SESSION["foto"].'" class="img-thumbnail">';

								}else{

									echo '<img src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" class="img-thumbnail">';

								}
					

							}else{

								echo '<img src="'.$_SESSION["foto"].'" class="img-thumbnail">';
							}		

							?>

							</figure>

							<br>

							<?php

							if($_SESSION["modo"] == "directo"){
							
							echo '<button type="button" class="btn btn-default" id="btnCambiarFoto">
									
									Cambiar foto de perfil
									
									</button>';

							}

							?>

							<div id="subirImagen">
								
								<input type="file" class="form-control" id="datosImagen" name="datosImagen">

								<img class="previsualizar">

							</div>

						</div>	

						<div class="col-md-9 col-sm-8 col-xs-12">

						<br>
							
						<?php

						if($_SESSION["modo"] != "directo"){

							echo '<label class="control-label text-muted text-uppercase">Nombre:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control"  value="'.$_SESSION["nombre"].'" readonly>

									</div>

									<br>

									<label class="control-label text-muted text-uppercase">Correo electrónico:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control"  value="'.$_SESSION["email"].'" readonly>

									</div>

									<br>

									<label class="control-label text-muted text-uppercase">Modo de registro en el sistema:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="fa fa-'.$_SESSION["modo"].'"></i></span>
										<input type="text" class="form-control text-uppercase"  value="'.$_SESSION["modo"].'" readonly>

									</div>

									<br>';
		

						}else{

							echo '<label class="control-label text-muted text-uppercase" for="editarNombre">Cambiar Nombre:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" id="editarNombre" name="editarNombre" value="'.$_SESSION["nombre"].'">

									</div>

								<br>

								<label class="control-label text-muted text-uppercase" for="editarEmail">Cambiar Correo Electrónico:</label>

								<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										<input type="text" class="form-control" id="editarEmail" name="editarEmail" value="'.$_SESSION["email"].'">

									</div>

								<br>

								<label class="control-label text-muted text-uppercase" for="editarPassword">Cambiar Contraseña:</label>

								<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="text" class="form-control" id="editarPassword" name="editarPassword" placeholder="Escribe la nueva contraseña">

									</div>

								<br>

								<button type="submit" class="btn btn-default backColor btn-md pull-left">Actualizar Datos</button>';

						}

						?>

						</div>

						<?php

							$actualizarPerfil = new ControladorUsuarios();
							$actualizarPerfil->ctrActualizarPerfil();

						?>					

					</form>

					<button class="btn btn-danger btn-md pull-right" id="eliminarUsuario">Eliminar cuenta</button>

					<?php

							$borrarUsuario = new ControladorUsuarios();
							$borrarUsuario->ctrEliminarUsuario();

						?>	

				</div>

		  	</div>

		</div>

	</div>

</div>

<!--=====================================
VENTANA MODAL PARA COMENTARIOS
======================================-->

<div  class="modal fade modalFormulario" id="modalComentarios" role="dialog">
	
	<div class="modal-content modal-dialog">
		
		<div class="modal-body modalTitulo">
			
			<h3 class="backColor">CALIFICA ESTE PRODUCTO</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<form method="post" onsubmit="return validarComentario()">

				<input type="hidden" value="" id="idComentario" name="idComentario">
				
				<h1 class="text-center" id="estrellas">

		       		<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>

				</h1>

				<div class="form-group text-center">

		       		<label class="radio-inline"><input type="radio" name="puntaje" value="0.5">0.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="1.0">1.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="1.5">1.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="2.0">2.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="2.5">2.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="3.0">3.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="3.5">3.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="4.0">4.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="4.5">4.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="5.0" checked>5.0</label>

				</div>

				<div class="form-group">
			  		
			  		<label for="comment" class="text-muted">Tu opinión acerca de este producto: <span><small>(máximo 300 caracteres)</small></span></label>
			  		
			  		<textarea class="form-control" rows="5" id="comentario" name="comentario" maxlength="300" required></textarea>

			  		<br>
					
					<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">

				</div>

				<?php

					$actualizarComentario = new ControladorUsuarios();
					$actualizarComentario -> ctrActualizarComentario();

				?>

			</form>

		</div>

		<div class="modal-footer">
      	
      	</div>

	</div>

</div>