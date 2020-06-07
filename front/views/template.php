<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns#">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

<?php session_start(); ?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Obsequiar flores sea la ocasi&oacute;n; representa afecto, atenci&oacute;n, cortes&iacute;a. Ud. cuenta con una respuesta inmediata a sus necesidades.">
<meta name="keywords" content="floreria Zona Sur, flores Argentina, arreglos florales, condolencias, recien nacido, flor creativa">
<meta name="author" content="La divina flor">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<meta name="theme-color" content="#9cb740">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
<title>Universal Venezuela</title>
<link rel="icon" href="views/img/favicon/favicon-32x32.png">


<link rel="stylesheet" href="views/css/style.css">
<link rel="stylesheet" href="views/css/slide.css">
<link rel="stylesheet" href="views/css/bootstrap.css">
<link rel="stylesheet" href="views/css/flexslider.css">
<link rel="stylesheet" href="views/css/bootstrap-tagsinput.css">
<link rel="stylesheet" href="views/css/plugins/font-awesome.min.css">
<script src="views/js/jquery.min.js"></script>
<script src="views/js/bootstrap.js"></script>
<script src="views/js/jquery.flexslider.js"></script>
<script src="views/js/bootstrap-tagsinput.min.js"></script>
<script src="views/js/sweetalert2.js"></script>
<script src="views/js/sweetalert.min.js"></script>











</head>
<body>

	
	<?php include 'views/modules/header.php'; ?>

	<div class="wrapper" id="sb-site">


		
		<?php 
	        $modulos = new Enlaces();
			$modulos -> enlacesController();
	    ?>


		<?php include 'views/modules/footer.php'; ?>

	</div>

	<script src="views/js/jquery.lazy.min.js"></script>
	<script src="views/js/script.js"></script>
	<script src="views/js/usuarios.js"></script>
	<script src="views/js/ajax.js"></script>
	<script src="views/js/slide.js"></script>
	

</body>
</html>