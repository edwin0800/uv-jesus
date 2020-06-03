<?php 
    require 'views/vendor/autoload.php';

    $id = $_GET["id"];

    //
    echo "<h1>Coloca un loader.</h1>";

    $info = GestorProductosController::ver_detalle_producto($id);

    Pay_::payment($info["producto"]);

    

?>