<?php  
require_once 'models/conexion.php';
require_once 'models/consulta.php';
require_once 'models/enlaces.php';
require_once 'models/gestorSlide.php';
require_once 'models/gestorPages.php';
require_once 'models/gestorVisitantes.php';
require_once 'models/gestorProductos.php';
require_once 'models/gestorMenus.php';
require_once 'models/gestorBlogs.php';
require_once 'models/gestorCategorias.php';
require_once 'models/gestorSubCategorias.php';
require_once 'models//usuarios.modelo.php';
require_once "models/notificaciones.modelo.php";


require_once 'controllers/rutas.php';
require_once 'controllers/enlaces.php';
require_once 'controllers/template.php';
require_once 'controllers/gestorSlide.php';
require_once 'controllers/gestorPages.php';
require_once 'controllers/gestorVisitantes.php';
require_once 'controllers/gestorProductos.php';
require_once 'controllers/gestorMenus.php';
require_once 'controllers/gestorBlog.php';
require_once 'controllers/gestorCategorias.php';
require_once 'controllers/gestorSubCategorias.php';
require_once "controllers/usuarios.controlador.php";
require_once "controllers/notificaciones.controlador.php";
require_once "controllers/payment.php";

require_once "views/PHPMailer/PHPMailerAutoload.php";


$template = new templateControllers();
$template -> template();



