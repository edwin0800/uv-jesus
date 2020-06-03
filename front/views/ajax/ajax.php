<?php 

require_once '../../models/conexion.php';
require_once '../../models/consulta.php';
require_once '../../models/gestorProductos.php';

require_once '../../controllers/gestorProductos.php';
require_once '../../controllers/rutas.php';


$ruta = Ruta::ctrRutaServidor();


if(!empty($_POST)){

    //EXTRAER DATOS DEL PRODUCTO

     if($_POST['action'] == 'subcategorias'){
        
         $producto_id = $_POST['producto'];

         $valor = $producto_id;

         $respuesta = GestorProductosController::ver_productos_subcategoria($valor);

        foreach ($respuesta as $key => $value) {
            echo $value;
        }
             exit;

    }


    if($_POST['action'] == 'orden'){
        
        $valor = $_POST['producto'];

        $respuesta = GestorProductosController::ver_productos_todos(null, $valor, null, null);

        

        foreach ($respuesta as $key => $value) {
            $tags =  preg_split("[,]", $value["detalles"]);
         $detalles = "";
         $descripcion = substr($value["descripcion"],0,50) . "...";
        for($i=0; $i<count($tags); $i++){
            $detalles .= '<li class="list-group-item list-group-item-success"><h4 class="font-weight-bold">'.strtoupper($tags[$i]).'</h4></li>';
        }

            echo '<div class="product-cell">
            <a href="producto_'.$value["id"].'">
                <div class="product-cell__image-container">
                    <img alt="dunk-humidity" src="'.$ruta.$value["portada"].'">
                </div>
                <div class="product-cell__item-copy">
                    <span class="product-cell__item-brand">
                    '.$value["titulo"].'
                    </span>
                    <span class="product-cell__item-name">
                    '.$descripcion.'
                    </span>
                    <span class="product-cell__item-code">
                    '.$value["id"].'
                    </span>
                    <span class="product-cell__item-variant">
                        <ul>'. $detalles.'</ul>
                    </span>
                </div>
                <span class="product-cell__item-button product-cell__item-button--price">
                '.$value["precio"].'
                </span>
            </a>
        </div>';
        }
             exit;

    }


    if($_POST['action'] == 'precio'){
        
        $item = $_POST['action'];
        $valor = $_POST['producto'];

        $respuesta = GestorProductosController::ver_productos_todos($item, $valor, null, null);

        

        foreach ($respuesta as $key => $value) {
            $tags =  preg_split("[,]", $value["detalles"]);
         $detalles = "";
         $descripcion = substr($value["descripcion"],0,50) . "...";
        for($i=0; $i<count($tags); $i++){
            $detalles .= '<li class="list-group-item list-group-item-success"><h4 class="font-weight-bold">'.strtoupper($tags[$i]).'</h4></li>';
        }

            echo '<div class="product-cell">
            <a href="producto_'.$value["id"].'">
                <div class="product-cell__image-container">
                    <img alt="dunk-humidity" src="'.$ruta.$value["portada"].'">
                </div>
                <div class="product-cell__item-copy">
                    <span class="product-cell__item-brand">
                    '.$value["titulo"].'
                    </span>
                    <span class="product-cell__item-name">
                    '.$descripcion.'
                    </span>
                    <span class="product-cell__item-code">
                    '.$value["id"].'
                    </span>
                    <span class="product-cell__item-variant">
                        <ul>'. $detalles.'</ul>
                    </span>
                </div>
                <span class="product-cell__item-button product-cell__item-button--price">
                '.$value["precio"].'
                </span>
            </a>
        </div>';
        }
             exit;

    }



    if($_POST['action'] == 'todos'){
        
        $item = $_POST['action'];
        

        $respuesta = GestorProductosController::ver_productos_todos($item, null, null, null);

        

        foreach ($respuesta as $key => $value) {
            $tags =  preg_split("[,]", $value["detalles"]);
         $detalles = "";
         $descripcion = substr($value["descripcion"],0,50) . "...";
        for($i=0; $i<count($tags); $i++){
            $detalles .= '<li class="list-group-item list-group-item-success"><h4 class="font-weight-bold">'.strtoupper($tags[$i]).'</h4></li>';
        }

            echo '<div class="product-cell">
            <a href="producto_'.$value["id"].'">
                <div class="product-cell__image-container">
                    <img alt="dunk-humidity" src="'.$ruta.$value["portada"].'">
                </div>
                <div class="product-cell__item-copy">
                    <span class="product-cell__item-brand">
                    '.$value["titulo"].'
                    </span>
                    <span class="product-cell__item-name">
                    '.$descripcion.'
                    </span>
                    <span class="product-cell__item-code">
                    '.$value["id"].'
                    </span>
                    <span class="product-cell__item-variant">
                        <ul>'. $detalles.'</ul>
                    </span>
                </div>
                <span class="product-cell__item-button product-cell__item-button--price">
                '.$value["precio"].'
                </span>
            </a>
        </div>';
        }
             exit;

    }









    if($_POST['action'] == 'talla'){
        
        $item = $_POST['action'];
        $valor = $_POST['producto'];

        $respuesta = GestorProductosController::ver_productos_todos($item, $valor, null, null);

        

        foreach ($respuesta as $key => $value) {
            $tags =  preg_split("[,]", $value["detalles"]);
         $detalles = "";
         $descripcion = substr($value["descripcion"],0,50) . "...";
        for($i=0; $i<count($tags); $i++){
            $detalles .= '<li class="list-group-item list-group-item-success"><h4 class="font-weight-bold">'.strtoupper($tags[$i]).'</h4></li>';
        }

            echo '<div class="product-cell">
            <a href="producto_'.$value["id"].'">
                <div class="product-cell__image-container">
                    <img alt="dunk-humidity" src="'.$ruta.$value["portada"].'">
                </div>
                <div class="product-cell__item-copy">
                    <span class="product-cell__item-brand">
                    '.$value["titulo"].'
                    </span>
                    <span class="product-cell__item-name">
                    '.$descripcion.'
                    </span>
                    <span class="product-cell__item-code">
                    '.$value["id"].'
                    </span>
                    <span class="product-cell__item-variant">
                        <ul>'. $detalles.'</ul>
                    </span>
                </div>
                <span class="product-cell__item-button product-cell__item-button--price">
                '.$value["precio"].'
                </span>
            </a>
        </div>';
        }
             exit;

    }
    exit;
}

?>