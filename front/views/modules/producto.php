<?php
    if (!isset($_GET["id"])) {
        echo "<script> window.location.href = 'index' </script>";
    }
?>

<?php 
    $ruta = Ruta::ctrRutaServidor();
    $info = GestorProductosController::ver_detalle_producto($_GET["id"]);
    $producto = $info["producto"];
    $relacionados = $info["str_relacion"];
    $media = json_decode($producto["multimedia"],true);
    $subcategoria = $producto["id_subcategoria"];

    



    


    
    $id = $_GET["id"];
    $nombre_producto = $producto["titulo"];
    $descripcion_producto = $producto["descripcion"];
    $imagen_producto = $producto["portada"];
    $precio_producto = $producto["precio"];
    $oferta_producto = $producto["precioOferta"];
    $tags = json_decode($producto["detalles"]);
   
    if($producto["detalles"] != null){

        $detalles = json_decode($producto["detalles"], true);

       

    }
    
    
    $media_string = "";
    $imgs = "";
    

    

    

    if (count($media) == 0) {
        echo "
            <style>
                .tp-span-wrapper{
                    display: none !important;
                }                
            </style>

        ";
    }

        
?>







<section class="categories_banner_area" >
    <div class="container">
        <div class="c_banner_inner">
            <h3><?php ""; ?></h3>
            <!-- <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li class="current"><a href="#">Simple Product</a></li>
            </ul> -->
        </div>
    </div>
</section>

<div class="container">


<div class="row d-flex justify-content-between">


<?php
    echo '<div class="col-md-6 col-sm-6 col-xs-12 visorImg">
                            
            <figure class="visor">';

            if($media != null){

                for($i = 0; $i < count($media); $i ++){
        
                    echo '<img id="lupa'.($i+1).'" class="img-thumbnail" src="'.$ruta.$media[$i]["foto"].'">';
        
                }						

        echo '</figure>

                <div class="flexslider">
                    
                    <ul class="slides">';

                    for($i = 0; $i < count($media); $i ++){

                        echo '<li>
                             <img value="'.($i+1).'" class="img-thumbnail" src="'.$ruta.$media[$i]["foto"].'" alt="'.$producto["titulo"].'">
                        </li>';

                    }

            }		
                                            
            echo '</ul>

        </div>

        </div>';			



    ?>



    <div class="col-md-6 col-sm-6 col-xs-12">
    <figure class="lupa">
		<img src="">
    </figure>

        <h1 class="display-lg-2 display-md-4 text-center" id="nombreProducto"><?php echo $nombre_producto; ?></h1>
        <div class="pdp-details-tabs">
            <div class="pdp-details-tabs__button pdp-details-tabs__button--disabled  bg-dark">
                <h3 class="text-light" id="marcaProducto"><?php 
                $subcat = GestorSubCategoriasController::ver_subcategorias("id", $subcategoria);
                echo ($subcat[0]["subcategoria"]) ;?>
                </h3>
            </div>
        </div>

        <h2 class="text-center h1 mt-4 font-weight-bold" id="precioProducto"><?php echo $precio_producto; ?> $</h2>

        <div class="pdp-scrollable-list"></div>
        <div class="pdp-scrollable-shadow"></div>
        <div class="pdp-offer-actions pdp-offer-actions--active">

        <?php
        if(isset($_SESSION["validarSesion"])){

            if($_SESSION["validarSesion"] == "ok"){

                echo '

                <a class="pdp-offer-actions__action pdp-offer-actions__action--buy" idUsuario="'.$_SESSION["id"].'" href="pay_'.$id.'"><h3>Pagar Paypal</h3></a>
                <a class="pdp-offer-actions__action" id="zelle" data-target="zelle" idUsuario="'.$_SESSION["id"].'" style="background: beige;"><h3>Pagar Zelle</h3></a>

';

            }

            }else{

            echo '

                <a href="#modalIngreso" data-toggle="modal" class="pdp-offer-actions__action pdp-offer-actions__action--buy"><h3>Pagar Paypal</h3></a>
                <a href="#modalIngreso" data-toggle="modal" class="pdp-offer-actions__action" style="background: beige;"><h3>Pagar Zelle</h3></a>

                ';

            }

            ?>
        </div>
        
        <div class="pdp-description mt-4">
            <h2 class="text-center h1">Detalles del Producto</h2>
            <div class="card row">
                <div class="card-body bg-primary"><h3 class="font-weight-bold text-light text-center"><?php echo $descripcion_producto; ?></h3></div>
            </div>
                <?php 
                // echo $descripcion_producto; 
                // print_r($m); 
                // print_r($path);
            //    print_r($id_media);
            //    print_r($index_);

           
            echo '<div class="card"><div class="card-body bg-secondary row">';
                    
            if($producto["tipo"] == "fisico"){

                if($detalles["Talla"]!=null){
    
                    echo '<div class="col-md-6 col-xs-12">
    
                        <select class="form-control seleccionarDetalle" id="seleccionarTalla">
                            
                            <option value="">Talla</option>';
    
                            for($i = 0; $i < count($detalles["Talla"]); $i++){
    
                                echo '<option value="'.$detalles["Talla"][$i].'">'.$detalles["Talla"][$i].'</option>';
    
                            }
    
                        echo '</select>
    
                    </div>';
    
                }
    
                if($detalles["Color"]!=null){
    
                    echo '<div class="col-md-6 col-xs-12">
    
                        <select class="form-control seleccionarDetalle" id="seleccionarColor">
                            
                            <option value="">Color</option>';
    
                            for($i = 0; $i < count($detalles["Color"]); $i++){
    
                                echo '<option value="'.$detalles["Color"][$i].'">'.$detalles["Color"][$i].'</option>';
    
                            }
    
                        echo '</select>
    
                    </div>';
    
                }
    
                if($detalles["Marca"]!=null){
    
                    echo '<div class="col-md-6 mx-auto mt-4 col-xs-12">
    
                        <select class="form-control seleccionarDetalle" id="seleccionarMarca">
                            
                            <option value="">Marca</option>';
    
                            for($i = 0; $i < count($detalles["Marca"]); $i++){
    
                                echo '<option value="'.$detalles["Marca"][$i].'">'.$detalles["Marca"][$i].'</option>';
    
                            }
    
                        echo '</select>
    
                    </div>';
    
                }
    
            }
                    
                    
              echo'</div></div>';
               ?>
            
            <a class="pdp-action-buttons__want"></a>
        </div>

    </div>
</div>


</div>

</div>