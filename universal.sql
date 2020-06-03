-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2020 a las 18:34:32
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `email`, `foto`, `password`, `perfil`, `estado`, `fecha`) VALUES
(1, 'EULIN PALMA', 'admin@tiendavirtual.com', 'vistas/img/perfiles/499.png', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'administrador', 1, '2019-08-28 08:51:59'),
(2, 'Editor de la Tienda', 'editor@tiendavirtual.com', 'vistas/img/perfiles/477.png', '$2a$07$asxx54ahjppf45sd87a5auBnK0T8g/TaNYrkZQmRmlyohJLox8X9S', 'editor', 1, '2018-03-27 18:56:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `img` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabeceras`
--

CREATE TABLE `cabeceras` (
  `id` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `palabrasClaves` text COLLATE utf8_spanish_ci NOT NULL,
  `portada` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cabeceras`
--

INSERT INTO `cabeceras` (`id`, `ruta`, `titulo`, `descripcion`, `palabrasClaves`, `portada`, `fecha`) VALUES
(1, 'zapatos', 'Zapatos', 'Zapatos de alta calidad, importados desde USA', 'zapato,calzado,vans,converse,nike,fila', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:05:11'),
(2, 'gorras', 'Gorras', 'Las mejores gorras de todo tipo totalmente nuevas e importadas desde USA', 'Gorras,cachucha', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:06:13'),
(3, 'nike', 'Nike', 'Una de las mejores marcas de zapatos deportivos', 'Zapato,nike,Deportivo,futbol,basquet', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:07:03'),
(4, 'fila', 'Fila', 'Zapatos marca Fila, casuales y deportivos, importados desde USA', 'Fila, Zapato,casuales,Deportivos', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:08:03'),
(5, 'converse', 'Converse', 'Zapatos Converse de alta calidad, casuales y semideportivos, importados desde USA', 'Zapato, Casual,Converse', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:08:51'),
(6, 'zapato-nike-001', 'Zapato Nike 001', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno', 'Zapato,Nike,001', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:22:12'),
(7, 'zapato-converse-modelo-313', 'Zapato Converse Modelo 313', 'Zapato Converse de excelente calidad al mejor precio importados desde USA', 'converse,zapato,calidad,casual,botines', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 19:16:47'),
(8, 'zapato-nike-002', 'Zapato Nike 002', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 2', 'Zapato,Nike,002', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:22:12'),
(9, 'zapato-nike-003', 'Zapato Nike 003', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 2', 'Zapato,Nike,003', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:22:12'),
(10, 'zapato-nike-004', 'Zapato Nike 004', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 4', 'Zapato,Nike,004', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:22:12'),
(11, 'zapato-nike-005', 'Zapato Nike 005', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 5', 'Zapato,Nike,005', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:22:12'),
(12, 'zapato-nike-006', 'Zapato Nike 006', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 6', 'Zapato,Nike,006', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:22:12'),
(13, 'zapato-nike-007', 'Zapato Nike 007', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 7', 'Zapato,Nike,007', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:22:12'),
(14, 'zapato-nike-008', 'Zapato Nike 008', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 8', 'Zapato,Nike,008', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:22:12'),
(15, 'zapato-nike-009', 'Zapato Nike 009', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 9', 'Zapato,Nike,009', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:22:12'),
(16, 'zapato-nike-010', 'Zapato Nike 010', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 10', 'Zapato,Nike,010', 'vistas/img/cabeceras/default/default.jpg', '2020-03-20 18:22:12'),
(17, 'zapato-fila-0312', 'Zapato Fila 0312', 'ZAPATO FILA IMPORTADO DE ALTA CALIDAD', 'Fila,Zapato,Importado,Calidad', 'vistas/img/cabeceras/default/default.jpg', '2020-03-21 13:28:55'),
(18, 'nike-air-force-1', 'Nike Air Force 1', 'Nike Air Force 1', 'nike, air,force', 'vistas/img/cabeceras/nike-air-force-1.jpg', '2020-04-30 14:39:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `precioOferta` float NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imgOferta` text COLLATE utf8_spanish_ci NOT NULL,
  `finOferta` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `ruta`, `estado`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `fecha`) VALUES
(7, 'ZAPATOS', 'zapatos', 1, 0, 0, 0, '', '0000-00-00 00:00:00', '2020-03-20 18:05:11'),
(8, 'GORRAS', 'gorras', 1, 0, 0, 0, '', '0000-00-00 00:00:00', '2020-03-20 18:06:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `puntuacion_vendedor` float NOT NULL,
  `puntuacion_comprador` float NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_vendedor`, `id_comprador`, `id_producto`, `puntuacion_vendedor`, `puntuacion_comprador`, `comentario`, `fecha`) VALUES
(1, 14, 13, 496, 3.5, 0, 'Buen Comprador, sin problemas', '2020-03-12 04:26:48'),
(2, 15, 14, 464, 0, 4.5, 'Buen Vendedor', '2020-03-12 04:26:18'),
(3, 13, 15, 496, 4, 0, 'El curso es muy bueno, pero puede ser mejor.', '2020-03-12 04:24:35'),
(4, 13, 16, 496, 0, 4.5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n		cillum dolore eu fugiat nulla pariatur', '2020-03-12 04:25:30'),
(6, 15, 13, 496, 2, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n		consequat. ', '2020-03-12 04:24:44'),
(7, 16, 14, 500, 0, 4, 'el producto puede ser mejor', '2020-03-12 04:25:39'),
(8, 13, 15, 464, 5, 0, 'El zapato es muy bonito, cómodo y resistente, soy maratonista y estos zapatos han sido una maravilla', '2020-03-12 04:24:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `impuesto` float NOT NULL,
  `envioNacional` float NOT NULL,
  `envioInternacional` float NOT NULL,
  `tasaMinimaNal` float NOT NULL,
  `tasaMinimaInt` float NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `modoPaypal` text COLLATE utf8_spanish_ci NOT NULL,
  `clienteIdPaypal` text COLLATE utf8_spanish_ci NOT NULL,
  `llaveSecretaPaypal` text COLLATE utf8_spanish_ci NOT NULL,
  `modoPayu` text COLLATE utf8_spanish_ci NOT NULL,
  `merchantIdPayu` int(11) NOT NULL,
  `accountIdPayu` int(11) NOT NULL,
  `apiKeyPayu` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `impuesto`, `envioNacional`, `envioInternacional`, `tasaMinimaNal`, `tasaMinimaInt`, `pais`, `modoPaypal`, `clienteIdPaypal`, `llaveSecretaPaypal`, `modoPayu`, `merchantIdPayu`, `accountIdPayu`, `apiKeyPayu`) VALUES
(1, 19, 1, 2, 10, 15, 'MX', 'sandbox', 'AecffvSZfOgj6g1MkrVmz12ACMES2-InggmWCpU5CblR-z5WwkYBYjmLsh9yPRLuRape1ahjqpcJet4N', 'EAx1SVMHGV6MJKwl-pnOSzaJASlAINZdYRdS--wkgaPYLevcGw88V0PU_W_rg00xLkBknybCjsO_xzA0', 'sandbox', 508029, 512321, '4Vj8eK4rloUd272L48hsrarnUA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `envio` int(11) NOT NULL,
  `metodo` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `pago` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `nuevosUsuarios` int(11) NOT NULL,
  `nuevasVentas` int(11) NOT NULL,
  `nuevasVisitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `nuevosUsuarios`, `nuevasVentas`, `nuevasVisitas`) VALUES
(1, 0, 0, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id` int(11) NOT NULL,
  `barraSuperior` text COLLATE utf8_spanish_ci NOT NULL,
  `textoSuperior` text COLLATE utf8_spanish_ci NOT NULL,
  `colorFondo` text COLLATE utf8_spanish_ci NOT NULL,
  `colorPlantilla` text COLLATE utf8_spanish_ci NOT NULL,
  `colorTexto` text COLLATE utf8_spanish_ci NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `icono` text COLLATE utf8_spanish_ci NOT NULL,
  `redesSociales` text COLLATE utf8_spanish_ci NOT NULL,
  `apiFacebook` text COLLATE utf8_spanish_ci NOT NULL,
  `pixelFacebook` text COLLATE utf8_spanish_ci NOT NULL,
  `googleAnalytics` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id`, `barraSuperior`, `textoSuperior`, `colorFondo`, `colorPlantilla`, `colorTexto`, `logo`, `icono`, `redesSociales`, `apiFacebook`, `pixelFacebook`, `googleAnalytics`, `fecha`) VALUES
(1, '#000000', '#ffffff', '#16A0ED', '#ffffff', '#ffffff', 'vistas/img/plantilla/logo.png', 'vistas/img/plantilla/icono.png', '[{\"red\":\"fa-facebook\",\"estilo\":\"facebookBlanco\",\"url\":\"http://facebook.com/\",\"activo\":1},{\"red\":\"fa-youtube\",\"estilo\":\"youtubeBlanco\",\"url\":\"http://youtube.com/\",\"activo\":1},{\"red\":\"fa-twitter\",\"estilo\":\"twitterBlanco\",\"url\":\"http://twitter.com/\",\"activo\":1},{\"red\":\"fa-google-plus\",\"estilo\":\"google-plusBlanco\",\"url\":\"http://google.com/\",\"activo\":1},{\"red\":\"fa-instagram\",\"estilo\":\"instagramBlanco\",\"url\":\"http://instagram.com/\",\"activo\":1}]', '\r\n      		<script>   window.fbAsyncInit = function() {     FB.init({       appId      : \'131737410786111\',       cookie     : true,       xfbml      : true,       version    : \'v2.10\'     });            FB.AppEvents.logPageView();             };    (function(d, s, id){      var js, fjs = d.getElementsByTagName(s)[0];      if (d.getElementById(id)) {return;}      js = d.createElement(s); js.id = id;      js.src = \"https://connect.facebook.net/en_US/sdk.js\";      fjs.parentNode.insertBefore(js, fjs);    }(document, \'script\', \'facebook-jssdk\'));  </script>\r\n      		', '\r\n  			<!-- Facebook Pixel Code --> 	<script> 	  !function(f,b,e,v,n,t,s) 	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod? 	  n.callMethod.apply(n,arguments):n.queue.push(arguments)}; 	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\'; 	  n.queue=[];t=b.createElement(e);t.async=!0; 	  t.src=v;s=b.getElementsByTagName(e)[0]; 	  s.parentNode.insertBefore(t,s)}(window, document,\'script\', 	  \'https://connect.facebook.net/en_US/fbevents.js\'); 	  fbq(\'init\', \'131737410786111\'); 	  fbq(\'track\', \'PageView\'); 	</script> 	<noscript><img height=\"1\" width=\"1\" style=\"display:none\" 	  src=\"https://www.facebook.com/tr?id=149877372404434&ev=PageView&noscript=1\" 	/></noscript> <!-- End Facebook Pixel Code -->    \r\n  			', '  \r\n  				<!-- Global site tag (gtag.js) - Google Analytics --> 	<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-999999-1\"></script> 	<script> 	  window.dataLayer = window.dataLayer || []; 	  function gtag(){dataLayer.push(arguments);} 	  gtag(\'js\', new Date());  	  gtag(\'config\', \'UA-9999999-1\'); 	</script>      \r\n            \r\n            \r\n            \r\n      ', '2020-03-21 00:02:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT 14,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `destacado` int(11) NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `titular` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `multimedia` text COLLATE utf8_spanish_ci NOT NULL,
  `detalles` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `portada` text COLLATE utf8_spanish_ci NOT NULL,
  `vistas` int(11) NOT NULL,
  `ventas` int(11) NOT NULL,
  `vistasGratis` int(11) NOT NULL,
  `ventasGratis` int(11) NOT NULL,
  `ofertadoPorCategoria` int(11) NOT NULL,
  `ofertadoPorSubCategoria` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `precioOferta` float NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imgOferta` text COLLATE utf8_spanish_ci NOT NULL,
  `finOferta` datetime NOT NULL,
  `peso` float NOT NULL,
  `entrega` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_usuario`, `id_categoria`, `id_subcategoria`, `tipo`, `ruta`, `estado`, `destacado`, `titulo`, `titular`, `descripcion`, `multimedia`, `detalles`, `precio`, `portada`, `vistas`, `ventas`, `vistasGratis`, `ventasGratis`, `ofertadoPorCategoria`, `ofertadoPorSubCategoria`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `peso`, `entrega`, `fecha`) VALUES
(1, 14, 7, 22, 'fisico', 'zapato-nike-001', 1, 0, 'Zapato Nike 001', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno...', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno', '[{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-12.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-4.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-5.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-2.jpg\"}]', '{\"Talla\":[\"41\",\"42\",\"43\",\"44\"],\"Color\":[\"Blanco con negro\",\"Rojo con blanco\",\"Azul con rojo\"],\"Marca\":[]}', 160, 'vistas/img/productos/zapato-nike-001.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 10, '2020-03-20 19:14:01'),
(2, 14, 7, 24, 'fisico', 'zapato-converse-modelo-313', 1, 1, 'Zapato Converse Modelo 313', 'Zapato Converse de excelente calidad al mejor precio importados desde USA...', 'Zapato Converse de excelente calidad al mejor precio importados desde USA', '[{\"foto\":\"vistas/img/multimedia/zapato-converse-modelo-313/producto_img_5-1.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-converse-modelo-313/producto_img_5-2.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-converse-modelo-313/producto_img_5-13.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-converse-modelo-313/producto_img_5-14.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-converse-modelo-313/producto_img_5-5.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-converse-modelo-313/producto_img_5-4.jpg\"}]', '{\"Talla\":[\"35\",\"36\",\"37\",\"40\",\"45\"],\"Color\":[\"Rojo\",\"Verde\",\"Cyan\",\"Amarillo\"],\"Marca\":[]}', 299, 'vistas/img/productos/zapato-converse-modelo-313.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 2, 13, '2020-03-20 20:11:43'),
(3, 14, 7, 22, 'fisico', 'zapato-nike-002', 1, 0, 'Zapato Nike 002', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno...', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 2', '[{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-12.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-4.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-5.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-2.jpg\"}]', '{\"Talla\":[\"41\",\"42\",\"43\",\"44\"],\"Color\":[\"Blanco con negro\",\"Rojo con blanco\",\"Azul con rojo\"],\"Marca\":[]}', 170, 'vistas/img/productos/zapato-nike-002.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 2, 11, '2020-03-20 19:14:01'),
(4, 14, 7, 22, 'fisico', 'zapato-nike-003', 1, 0, 'Zapato Nike 003', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno...', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 3', '[{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-12.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-4.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-5.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-2.jpg\"}]', '{\"Talla\":[\"41\",\"42\",\"43\",\"44\"],\"Color\":[\"Blanco con negro\",\"Rojo con blanco\",\"Azul con rojo\"],\"Marca\":[]}', 130, 'vistas/img/productos/zapato-nike-003.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 10, '2020-03-20 19:14:01'),
(5, 14, 7, 22, 'fisico', 'zapato-nike-004', 1, 0, 'Zapato Nike 004', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno...', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 4', '[{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-12.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-4.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-5.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-2.jpg\"}]', '{\"Talla\":[\"41\",\"42\",\"43\",\"44\"],\"Color\":[\"Blanco con negro\",\"Rojo con blanco\",\"Azul con rojo\"],\"Marca\":[]}', 185, 'vistas/img/productos/zapato-nike-004.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 10, '2020-03-20 19:14:01'),
(6, 14, 7, 22, 'fisico', 'zapato-nike-005', 1, 0, 'Zapato Nike 005', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno...', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 5', '[{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-12.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-4.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-5.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-2.jpg\"}]', '{\"Talla\":[\"41\",\"42\",\"43\",\"44\"],\"Color\":[\"Blanco con negro\",\"Rojo con blanco\",\"Azul con rojo\"],\"Marca\":[]}', 195, 'vistas/img/productos/zapato-nike-001.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 10, '2020-03-20 19:14:01'),
(7, 14, 7, 22, 'fisico', 'zapato-nike-006', 1, 1, 'Zapato Nike 006', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno...', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 6', '[{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-12.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-4.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-5.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-2.jpg\"}]', '{\"Talla\":[\"41\",\"42\",\"43\",\"44\"],\"Color\":[\"Blanco con negro\",\"Rojo con blanco\",\"Azul con rojo\"],\"Marca\":[]}', 210, 'vistas/img/productos/zapato-nike-002.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 10, '2020-03-20 20:11:36'),
(8, 14, 7, 22, 'fisico', 'zapato-nike-007', 1, 0, 'Zapato Nike 007', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno...', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 7', '[{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-12.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-4.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-5.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-2.jpg\"}]', '{\"Talla\":[\"41\",\"42\",\"43\",\"44\"],\"Color\":[\"Blanco con negro\",\"Rojo con blanco\",\"Azul con rojo\"],\"Marca\":[]}', 205, 'vistas/img/productos/zapato-nike-003.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 10, '2020-03-20 19:14:01'),
(9, 14, 7, 22, 'fisico', 'zapato-nike-008', 1, 0, 'Zapato Nike 008', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno...', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 8', '[{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-12.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-4.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-5.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-2.jpg\"}]', '{\"Talla\":[\"41\",\"42\",\"43\",\"44\"],\"Color\":[\"Blanco con negro\",\"Rojo con blanco\",\"Azul con rojo\"],\"Marca\":[]}', 200, 'vistas/img/productos/zapato-nike-004.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 10, '2020-03-20 19:14:01'),
(10, 14, 7, 22, 'fisico', 'zapato-nike-009', 1, 0, 'Zapato Nike 009', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno...', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 9', '[{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-12.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-4.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-5.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-2.jpg\"}]', '{\"Talla\":[\"41\",\"42\",\"43\",\"44\"],\"Color\":[\"Blanco con negro\",\"Rojo con blanco\",\"Azul con rojo\"],\"Marca\":[]}', 220, 'vistas/img/productos/zapato-nike-001.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 10, '2020-03-20 19:14:01'),
(11, 14, 7, 22, 'fisico', 'zapato-nike-010', 1, 1, 'Zapato Nike 010', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno...', 'Zapato de excelente calidad marca Nike modelo 001, perfecto para correr y jugar futbol o basquet. Ideal para el bosque, zapato todo terreno 10', '[{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-12.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-4.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_3-5.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-11.jpg\"},{\"foto\":\"vistas/img/multimedia/zapato-nike-001/producto_img_1-2.jpg\"}]', '{\"Talla\":[\"41\",\"42\",\"43\",\"44\"],\"Color\":[\"Blanco con negro\",\"Rojo con blanco\",\"Azul con rojo\"],\"Marca\":[]}', 250, 'vistas/img/productos/zapato-nike-002.jpg', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 10, '2020-03-20 20:11:32'),
(12, 14, 7, 23, 'fisico', 'zapato-fila-0312', 1, 0, 'Zapato Fila 0312', 'ZAPATO FILA IMPORTADO DE ALTA CALIDAD...', 'ZAPATO FILA IMPORTADO DE ALTA CALIDAD', '[{\"foto\":\"vistas/img/multimedia/zapato-fila-0312/producto_img_2-5.jpg\"}]', '{\"Talla\":[],\"Color\":[],\"Marca\":[]}', 400, 'vistas/img/productos/zapato-fila-0312.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.8, 3, '2020-03-21 16:14:38'),
(13, 14, 7, 22, 'fisico', 'nike-air-force-1', 1, 0, 'Nike Air Force 1', 'Nike Air Force 1...', 'Nike Air Force 1', '[{\"foto\":\"vistas/img/multimedia/nike-air-force-1/zapatillas nike 1-542fcv.jpg\"}]', '{\"Talla\":[\"11\",\"12\",\"13\",\"14\",\"15\"],\"Color\":[\"blanco\"],\"Marca\":[\"Nike\"]}', 150, 'vistas/img/productos/nike-air-force-1.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 0, '2020-04-30 14:39:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `imgFondo` text COLLATE utf8_spanish_ci NOT NULL,
  `tipoSlide` text COLLATE utf8_spanish_ci NOT NULL,
  `imgProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `estiloImgProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `estiloTextoSlide` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo1` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo2` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo3` text COLLATE utf8_spanish_ci NOT NULL,
  `boton` text COLLATE utf8_spanish_ci NOT NULL,
  `url` text COLLATE utf8_spanish_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`id`, `nombre`, `imgFondo`, `tipoSlide`, `imgProducto`, `estiloImgProducto`, `estiloTextoSlide`, `titulo1`, `titulo2`, `titulo3`, `boton`, `url`, `orden`, `fecha`) VALUES
(2, 'Calzados', 'vistas/img/slide/slide2/fondo.jpg', 'slideOpcion1', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"\",\"width\":\"\"}', '{\"top\":\"20\",\"right\":\"\",\"left\":\"5\",\"width\":\"25\"}', '{\"texto\":\"CALZADO\",\"color\":\"#f12b2b\"}', '{\"texto\":\"\",\"color\":\"#777\"}', '{\"texto\":\"Deportivos para damas y caballeros\",\"color\":\"#6cff00\"}', 'Ver calzados', 'calzado', 2, '2019-08-28 09:43:28'),
(3, 'Ropa dama', 'vistas/img/slide/slide3/fondo.jpg', 'slideOpcion1', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"\",\"width\":\"\"}', '{\"top\":\"10\",\"right\":\"\",\"left\":\"5\",\"width\":\"40\"}', '{\"texto\":\"Las mejores prendas\",\"color\":\"#29ffaf\"}', '{\"texto\":\"Para las mujeres de la casa\",\"color\":\"#ffffff\"}', '{\"texto\":\"\",\"color\":\"#936ce6\"}', 'Ropa para dama', 'ropa-para-dama', 3, '2019-08-28 09:48:19'),
(4, 'Gym', 'vistas/img/slide/slide4/fondo.jpg', 'slideOpcion2', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"0\",\"width\":\"\"}', '{\"top\":\"20\",\"right\":\"5\",\"left\":\"\",\"width\":\"45\"}', '{\"texto\":\"Ropa deportiva\",\"color\":\"#f6c8f7\"}', '{\"texto\":\"Para damas  y caballeros\",\"color\":\"#e47dff\"}', '{\"texto\":\"\",\"color\":\"#888\"}', 'VER PRODUCTO', 'ropa-deportiva', 4, '2019-08-28 09:50:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `subcategoria` text COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ofertadoPorCategoria` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `precioOferta` float NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imgOferta` text COLLATE utf8_spanish_ci NOT NULL,
  `finOferta` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `subcategoria`, `id_categoria`, `ruta`, `estado`, `ofertadoPorCategoria`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `fecha`) VALUES
(22, 'Nike', 7, 'nike', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2020-03-20 18:07:04'),
(23, 'Fila', 7, 'fila', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2020-03-20 18:08:03'),
(24, 'Converse', 7, 'converse', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2020-03-20 18:08:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `modo` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `verificacion` int(11) NOT NULL,
  `emailEncriptado` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `email`, `modo`, `foto`, `verificacion`, `emailEncriptado`, `fecha`) VALUES
(1, 'EULIN ILICH', '$2a$07$usesomesillystringforedQWw8kQ8MezxIvEEaFAlmXpAJvCW05u', 'eulin-palma@hotmail.com', 'directo', 'vistas/img/usuarios/1/254.jpg', 0, '8df791987faa866ea452406e311d0b4d', '2020-04-21 15:31:00'),
(55, 'ILICH', '$2a$07$usesomesillystringforeT8aEq5PB79vQqN8KJvNnDbGrba5RR32', 'eulinpr@gmail.com', 'directo', '', 0, '9cb5fe35aae443988e6adbd9a0c282e5', '2020-04-26 12:56:50'),
(56, 'EDWIN', '$2a$07$usesomesillystringforevJAJbJeDIQIYUCMDNbBMZyELvUrgwaO', 'castellanoedwin285@gmail.com', 'directo', '', 0, 'a894f9cf3a3d26be1f14a62d84f67ecb', '2020-04-30 14:40:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitaspaises`
--

CREATE TABLE `visitaspaises` (
  `id` int(11) NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `visitaspaises`
--

INSERT INTO `visitaspaises` (`id`, `pais`, `codigo`, `cantidad`, `fecha`) VALUES
(1, 'Aragua', 'VED', 2, '2020-03-12 17:59:20'),
(2, 'Caracas', 'VEA', 65, '2020-03-12 18:00:06'),
(3, 'Merida', 'VEL', 10, '2020-03-12 18:01:20'),
(4, 'Barinas', 'VEE', 5, '2020-03-12 18:00:36'),
(5, 'Guarico', 'VEJ', 3, '2020-03-12 18:01:10'),
(6, 'Carabobo', 'VEG', 34, '2020-03-12 18:00:40'),
(7, 'Falcon', 'VEI', 8, '2020-03-12 18:00:54'),
(8, 'Puerto Cabello', 'VEG', 2, '2020-03-12 18:01:35'),
(9, 'France', 'FR', 1, '2020-03-20 19:35:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitaspersonas`
--

CREATE TABLE `visitaspersonas` (
  `id` int(11) NOT NULL,
  `ip` text COLLATE utf8_spanish_ci NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `visitas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `visitaspersonas`
--

INSERT INTO `visitaspersonas` (`id`, `ip`, `pais`, `visitas`, `fecha`) VALUES
(1, '153.202.197.216', 'Japan', 1, '2017-11-08 18:37:07'),
(3, '249.170.168.184', 'Spain', 1, '2017-11-28 19:16:16'),
(5, '249.170.168.184', 'Spain', 1, '2017-11-28 19:16:19'),
(6, '234.13.198.119', 'Colombia', 1, '2017-11-28 19:16:03'),
(7, '141.46.61.241', 'Germany', 1, '2017-11-28 19:13:45'),
(8, '40.179.75.60', 'United States', 1, '2017-11-28 19:14:05'),
(9, '153.205.198.22', 'Japan', 1, '2017-11-01 19:14:18'),
(10, '148.21.177.158', 'United States', 1, '2017-10-28 19:14:34'),
(11, '40.224.125.226', 'United States', 1, '2017-11-28 19:14:56'),
(12, '10.98.135.68', 'China', 1, '2017-11-28 19:15:57'),
(13, '23.121.157.131', 'United States', 1, '2017-11-28 19:15:37'),
(17, '8.12.238.123', 'United States', 1, '2017-11-28 19:28:27'),
(18, '148.21.177.158', 'United States', 1, '2017-11-28 19:33:05'),
(19, '153.202.197.216', 'Japan', 1, '2017-11-28 19:33:50'),
(27, '153.205.198.22', 'Japan', 1, '2017-10-28 20:05:19'),
(31, '153.205.198.22', 'Japan', 1, '2017-11-28 20:09:49'),
(32, '153.205.198.22', 'Japan', 1, '2017-11-29 19:23:07'),
(33, '153.205.198.22', 'Japan', 1, '2017-11-30 23:01:27'),
(34, '153.205.198.22', 'Japan', 1, '2017-12-04 14:55:27'),
(35, '153.205.198.22', 'Japan', 1, '2017-12-05 20:58:04'),
(36, '153.205.198.22', 'Japan', 1, '2017-12-06 21:11:13'),
(37, '153.205.198.22', 'Japan', 1, '2017-12-07 22:32:13'),
(38, '153.205.198.22', 'Japan', 1, '2017-12-11 15:32:10'),
(39, '153.205.198.22', 'Japan', 1, '2017-12-13 15:45:58'),
(40, '153.205.198.22', 'Japan', 1, '2017-12-19 02:37:45'),
(41, '153.205.198.22', 'Japan', 1, '2017-12-19 12:54:21'),
(42, '153.205.198.22', 'Unknown', 1, '2017-12-30 15:41:47'),
(43, '153.205.198.22', 'Japan', 1, '2018-01-02 15:46:52'),
(44, '153.205.198.22', 'Japan', 1, '2018-01-03 13:54:29'),
(45, '153.205.198.22', 'Japan', 1, '2018-01-04 16:54:03'),
(46, '153.205.198.22', 'Japan', 1, '2018-01-05 17:17:05'),
(47, '153.205.198.22', 'Japan', 1, '2018-01-08 13:57:21'),
(48, '153.205.198.22', 'Japan', 1, '2018-01-09 15:46:40'),
(49, '153.205.198.22', 'Japan', 1, '2018-01-10 20:34:12'),
(50, '153.205.198.22', 'Japan', 1, '2018-01-11 14:08:56'),
(51, '153.205.198.22', 'Japan', 1, '2018-01-15 18:10:09'),
(52, '153.205.198.22', 'Japan', 1, '2018-01-16 16:15:33'),
(53, '153.205.198.22', 'Japan', 1, '2018-01-17 21:39:17'),
(54, '153.205.198.22', 'Japan', 1, '2018-01-18 20:16:09'),
(55, '153.205.198.22', 'Japan', 1, '2018-01-19 15:05:32'),
(56, '153.205.198.22', 'Japan', 1, '2018-01-22 14:38:48'),
(57, '153.205.198.22', 'Japan', 1, '2018-01-25 15:44:30'),
(58, '153.205.198.22', 'Japan', 1, '2018-01-26 21:24:38'),
(59, '153.205.198.22', 'Japan', 1, '2018-01-29 20:45:50'),
(60, '153.205.198.22', 'Japan', 1, '2018-01-30 22:32:35'),
(61, '153.205.198.22', 'Japan', 1, '2018-01-31 18:35:33'),
(62, '153.205.198.22', 'Japan', 1, '2018-02-07 17:37:45'),
(63, '153.205.198.22', 'Japan', 1, '2018-02-13 16:52:37'),
(64, '153.205.198.22', 'Japan', 1, '2018-02-14 13:33:04'),
(65, '153.205.198.22', 'Japan', 1, '2018-02-16 13:50:44'),
(66, '153.205.198.22', 'Japan', 1, '2018-02-23 17:06:23'),
(67, '153.205.198.22', 'Japan', 1, '2018-03-02 17:25:19'),
(68, '153.205.198.22', 'Japan', 1, '2018-03-03 12:06:54'),
(69, '153.205.198.22', 'Japan', 1, '2018-03-05 16:27:57'),
(70, '153.205.198.22', 'Japan', 1, '2018-03-06 17:59:36'),
(71, '153.205.198.22', 'Japan', 1, '2018-03-08 14:56:34'),
(72, '153.205.198.22', 'Japan', 1, '2018-03-08 14:56:34'),
(73, '153.205.198.22', 'Japan', 1, '2018-03-12 19:38:37'),
(74, '153.205.198.22', 'Japan', 1, '2018-03-13 20:35:47'),
(75, '153.205.198.22', 'Japan', 1, '2018-03-14 19:41:17'),
(76, '153.205.198.22', 'Japan', 1, '2018-03-15 16:41:11'),
(77, '153.205.198.22', 'Japan', 1, '2018-03-16 19:21:45'),
(78, '153.205.198.22', 'Japan', 1, '2018-03-17 12:23:58'),
(79, '153.205.198.22', 'Japan', 1, '2018-03-19 00:38:47'),
(80, '153.205.198.22', 'Japan', 1, '2018-03-19 12:57:20'),
(81, '153.205.198.22', 'Japan', 1, '2018-03-20 20:33:33'),
(82, '153.205.198.22', 'Japan', 1, '2018-03-21 19:30:58'),
(83, '153.205.198.22', 'Japan', 1, '2018-03-23 19:41:03'),
(84, '153.205.198.22', 'Japan', 1, '2018-03-26 12:42:06'),
(85, '153.205.198.22', 'Japan', 1, '2018-03-27 13:26:30'),
(86, '163.172.160.190', 'France', 1, '2018-03-27 23:23:14'),
(87, '163.172.160.190', 'Unknown', 1, '2019-07-09 16:01:35'),
(88, '163.172.160.190', 'Unknown', 1, '2019-07-10 18:11:20'),
(89, '163.172.160.190', 'France', 1, '2019-07-11 10:04:38'),
(90, '163.172.160.190', 'Unknown', 1, '2019-07-12 10:44:56'),
(91, '163.172.160.190', 'Unknown', 1, '2019-07-13 22:11:14'),
(92, '163.172.160.190', 'Unknown', 1, '2019-07-15 20:13:36'),
(93, '163.172.160.190', 'Unknown', 1, '2019-08-21 14:49:54'),
(94, '163.172.160.190', 'Unknown', 1, '2019-08-22 17:02:47'),
(95, '::1', 'Unknown', 1, '2019-08-22 17:09:33'),
(96, '163.172.160.190', 'Unknown', 1, '2019-08-26 14:37:36'),
(97, '163.172.160.190', 'Unknown', 1, '2019-08-28 07:49:29'),
(98, '163.172.160.190', 'France', 1, '2020-03-12 03:28:25'),
(99, '163.172.160.190', 'France', 1, '2020-03-20 19:35:58'),
(100, '163.172.160.190', 'Unknown', 1, '2020-03-21 12:26:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cabeceras`
--
ALTER TABLE `cabeceras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitaspaises`
--
ALTER TABLE `visitaspaises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitaspersonas`
--
ALTER TABLE `visitaspersonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cabeceras`
--
ALTER TABLE `cabeceras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deseos`
--
ALTER TABLE `deseos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `visitaspaises`
--
ALTER TABLE `visitaspaises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `visitaspersonas`
--
ALTER TABLE `visitaspersonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
