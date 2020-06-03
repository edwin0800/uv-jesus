<?php
    if (!isset($_GET["id"])) {
        echo "<script> window.location.href = 'index' </script>";
    } 

?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow">



<?php 
    $info = GestorProductosController::ver_detalle_promocion($_GET["id"]);
    $promo = $info["promo"];
    $productos = $promo["productos"];
    $relacionados = $info["str_relacion"];
    // var_dump($info);
    
    $id = $_GET["id"];
    $nombre_promo = $promo["alias"];
    $descripcion_promo = $promo["descripcion"];
    $imagen_promo = $promo["foto"];
    $precio_promo = $promo["precio"];
    $destacado = false;
    $info_string = "";
    $categorias_promo = "";
    $price = "<span>$$precio_promo</span>";
    $categorias_usadas = [];

    for ($i=0; $i < count($productos); $i++) { 
        $producto = $productos[$i];
        $id_product = $producto["id"];
        $nom_product = $producto["nombre"];
        $inv_product = $producto["unidades_promo"];
        $categoria_producto = $producto["categoria"];
        $info_categoria_x = $producto["info_categoria_x"];
        $categorias_aux = $categoria_producto;
        $use= true;

        if (isset($info_categoria_x[0])) {
            if ($info_categoria_x[0]["padre"] != "no") {
                $categorias_aux = $info_categoria_x[0]["padre"];
            }
        }


        $info_string .= "            
            <p class='info'><a href='producto_$id_product'>$nom_product</a> * $inv_product </p>         
        ";

        for ($keys=0; $keys < count($categorias_usadas); $keys++) { 
            if ($categorias_usadas[$keys] == $categorias_aux) {
                $use = false;
                break;
            }
        }

        if ($use) {
            $categorias_promo .= "                       
                <li><a href='categoria_$categorias_aux'>$categorias_aux</a></li>       
            ";

            array_push($categorias_usadas, $categorias_aux);
        }
            
    }
        
?>

<section class="categories_banner_area" style="background-image: url(backend/<?php echo $imagen_promo; ?>); margin-top: 60px;">
    <div class="container">
        <div class="c_banner_inner">
            <h3>Promoción</h3>
            <ul>
                <?php echo $categorias_promo; ?>
            </ul>
        </div>
    </div>
</section>
<section id="productos" class="home-content">

    <div class="wraper product">
          <!-- Left Column / Headphones Image -->
        <div class="left-column">
            <div>
                <center>
                    <?php 
                        $imagen_aux = getimagesize("backend/$imagen_promo");  
                        $ancho = $imagen_aux[0];            
                        $alto = $imagen_aux[1];   
            
                        if ($ancho > 900 && $alto > 700) {
                            $class_zoom = "zoom";
                        }else{
                            $class_zoom = "";
                        }

                    ?>
                    <div class="<?php echo $class_zoom; ?>">
                        <img  src="backend/<?php echo $imagen_promo; ?>" alt="imagen producto">    
                    </div>
                </center>
            </div>
            <div class="img_min">
                
            </div>
        </div>


          <!-- Right Column -->
        <div class="right-column">

            <!-- Product Description -->
            <div class="product-description">
                <h1 style="margin-bottom: .7em;"><?php echo $nombre_promo; ?></h1>
                <p><?php echo $descripcion_promo; ?></p>
            </div>
            
            <!-- Product Configuration -->
            <div class="product-configuration">
                <span>Productos de la promoción</span>
              <!-- Cable Configuration -->
              <div class='cable-config'>
                <?php echo $info_string; ?>
                </div>
                    
            </div>
            <!-- Product Pricing -->
            <div class="">
                <span style="font-size: 23px;"><?php echo $price; ?></span>
            </div>

            
        </div>
    </div>
    <div class="wraper vinos">
        <?php if ($relacionados != ""): ?>
            <h2>Más promociones</h2>
        <?php endif ?>
            
        <div class="grid-container">
            <?php echo $relacionados ?>
        </div>
    </div>
        
</section>



