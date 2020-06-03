
<?php  
    
    if (!isset($_GET["id"])) {
        echo "<script> window.location.href = 'index' </script>";
    }

?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow">

<?php 
    $info = GestorProductosController::ver_productos_categoria($_GET["id"]);
    $categoria = $info["categoria"];
    

    if (isset($categoria["foto"])) {
        $img_categoria =  $categoria["foto"];
        $nombre = $categoria["nombre"];
        $padre = ($categoria["padre"] != "no") ? $categoria["padre"] . " " : "";
    }else{
        echo "<script> window.location.href = 'index' </script>";
    }
        
?>

<section id="productos" class="home-content">

    <div class="content-container">
        <div class="slideChico">
            <img src='<?php echo "backend/$img_categoria" ?>'>
        </div>
    </div>

    <div class="wraper vinos">
        <h2>
            <?php 
                echo $padre . $nombre; 
                
            ?>
        </h2>
        
        <div class="grid-container">
            
            <?php echo $info["productos"]; ?>

        </div>
                     
    </div>
</section>


   