<?php 

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();


if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		echo '<script>
		
			localStorage.setItem("usuario","'.$_SESSION["id"].'");

		</script>';

	}

}
?>

<header>
    <nav class="desktop-nav">
        <a class="textreplace logo" href="index">Universal Venezuela</a>
        <ul class="main-menu-list">
        
            <li class="menu-shop">
                <a href="shop">Tienda</a>
            </li>
            <!-- <li class="menu-feed"><a href="feed.html">Feed</a></li> -->
            <li class="menu-events">
                <a href="https://www.instagram.com/universalvzla/?hl=es-la">Eventos</a>
            </li>
        </ul>
        <div class="spacer"></div>
        <button type="button" class="search-btn">
            <span>Buscar</span>
            <i class="search-btn__icon"></i>
        </button>
        <a class="sell mr-2" href="shop">Comprar</a>

        <?php

if(isset($_SESSION["validarSesion"])){

    if($_SESSION["validarSesion"] == "ok"){

        if($_SESSION["modo"] == "directo"){

            if($_SESSION["foto"] != ""){

                echo '<div class="btnSesion">

                        <img class="img-circle" src="'.$url.$_SESSION["foto"].'" width="10%">

                     </div>';

            }else{

                echo '<div class="btnSesion">

                        <img class="img-circle" src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" width="10%">

                    </div>';

            }

            echo '
             <span>'.$_SESSION["nombre"].'</span>
             <span>|</span>
             <span><a href="'.$url.'perfil">Ver Perfil</a></span>
             <span>|</span>
             <span><a href="'.$url.'salir">Salir</a></span>';


        }


    }

}else{

    echo ' <div class="btnSesion">
                <button type="button" class="btn btn-secondary btn-sm p-2 bl-radius ml-1" data-toggle="modal" data-target="#modalIngreso">Iniciar Sesión</button>
                <button type="button" class="btn btn-primary btn-sm p-2 br-radius" data-toggle="modal" data-target="#modalRegistro">Registrarse</button>
            </div>';

}

?>
        
       
        
    </nav>
</header>


<!-- MODAL REGISTRO -->
<div class="modal fade" id="modalRegistro">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header text-center">
            <h3 style="color:purple;" class="ml-5">REGISTRARSE</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form method="post" onsubmit="return registroUsuario()">
				
    
                    <div class="form-group row col-md-9 mx-auto">
                        
                        <div class="input-group">
                            
                            <span class="input-group-addon">
                                
                                <i class="glyphicon glyphicon-user"></i>
                            
                            </span>
    
                            <input type="text" class="form-control input-lg" id="regUsuario" name="regUsuario" placeholder="Nombre Completo" required>
    
                        </div>
    
                    </div>
    
                    <div class="form-group row col-md-9 mx-auto">
                        
                        <div class="input-group">
                            
                            <span class="input-group-addon">
                                
                                <i class="glyphicon glyphicon-envelope"></i>
                            
                            </span>
    
                            <input type="email" class="form-control input-lg" id="regEmail" name="regEmail" placeholder="Correo Electrónico" required>
    
                        </div>
    
                    </div>
    
                    <div class="form-group row col-md-9 mx-auto">
                        
                        <div class="input-group">
                            
                            <span class="input-group-addon">
                                
                                <i class="glyphicon glyphicon-lock"></i>
                            
                            </span>
    
                            <input type="password" class="form-control input-lg" id="regPassword" name="regPassword" placeholder="Contraseña" required>
    
                        </div>
    
                    </div>
    
                    <!--=====================================
                    https://www.iubenda.com/ CONDICIONES DE USO Y POLÍTICAS DE PRIVACIDAD
                    ======================================-->
    
                    <div class="checkBox row col-md-9 mx-auto">
                        
                        <label>
                            
                            <input id="regPoliticas" type="checkbox">
                        
                                <small>
                                    
                                    Al registrarse, usted acepta nuestras condiciones de uso y políticas de privacidad
    
                                    
    
                                </small>
    
                        </label>
    
                    </div>
    
                    
                    <div class="row col-md-9 mx-auto">
                        <div class="input-group">

                        <?php

					$registro = new ControladorUsuarios();
					$registro -> ctrRegistroUsuario();

				?>
				
                            <input type="submit" class="btn btn-success btn-block" value="ENVIAR">	
                        </div>
                    </div>

                </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        ¿Ya tienes una cuenta registrada? | <strong><a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">Ingresar</a></strong>

        </div>
        
      </div>
    </div>
  </div>
  
</div>

<!-- MODAL INGRESO -->
<div class="modal fade" id="modalIngreso">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header text-center">
            <h3 style="color:purple;" class="ml-5">INICIAR SESIÓN</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form method="post" onsubmit="return ingresoUsuario()">
				
    
                    <div class="form-group row col-md-9 mx-auto">
                        
                        <div class="input-group">
                            
                            <span class="input-group-addon">
                                
                                <i class="glyphicon glyphicon-envelope"></i>
                            
                            </span>

                            <input type="email" class="form-control input-lg" id="ingEmail" name="ingEmail" placeholder="Correo Electrónico" required>
                            
                        </div>
    
                    </div>
    
                    <div class="form-group row col-md-9 mx-auto">
                        
                        <div class="input-group">
                            
                            <span class="input-group-addon">
                                
                                <i class="glyphicon glyphicon-lock"></i>
                            
                            </span>

                            <input type="password" class="form-control input-lg" id="ingPassword" name="ingPassword" placeholder="Contraseña" required>

                        </div>
    
                    </div>
    
    
                    
                    <div class="row col-md-9 mx-auto">
                        <div class="input-group">

                        <?php
                            $ingreso = new ControladorUsuarios();
                            $ingreso -> ctrIngresoUsuario();
                        ?>
				
                            <input type="submit" class="btn btn-success btn-block btnIngreso" value="ENVIAR"> <br>
                            <a href="#modalPassword" class="alert alert-link text-primary" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>	
                        </div>
                    </div>

                </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        
        ¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
        
      </div>
    </div>
  </div>
  
</div>

<!-- MODAL NUEVA CONTRASEÑA -->
<div class="modal fade" id="modalPassword">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header text-center">
            <h3 style="color:purple;" class="ml-5">SOLICITUD DE NUEVA CONTRASEÑA</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        <form method="post">
                
            <label class="text-light text-center row col-md-9 mx-auto">Escribe el correo electrónico con el que estás registrado y allí te enviaremos una nueva contraseña:</label>

    
                    <div class="form-group row col-md-9 mx-auto">
                        
                        <div class="input-group">
                            
                            <span class="input-group-addon">
                                
                                <i class="glyphicon glyphicon-envelope"></i>
                            
                            </span>
                        
                            <input type="email" class="form-control input-lg" id="passEmail" name="passEmail" placeholder="Correo Electrónico" required>

                        </div>
    
                    </div>
    
                  
                    <?php

					$password = new ControladorUsuarios();
					$password -> ctrOlvidoPassword();

				?>
                    <div class="row col-md-9 mx-auto">
                        <div class="input-group">
                            <input type="submit" class="btn btn-success btn-block" value="ENVIAR"> <br>
                        </div>
                    </div>

                </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        ¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
        
      </div>
    </div>
  </div>
  
</div>

