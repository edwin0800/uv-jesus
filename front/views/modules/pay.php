<?php 
    require 'views/vendor/autoload.php';

    $id = $_GET["id"];

    //
    include 'views/modules/loader1.php';


    $info = GestorProductosController::ver_detalle_producto($id);

    Pay_::payment($info["producto"]);
?>