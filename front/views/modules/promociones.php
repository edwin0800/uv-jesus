   
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow">

<section id="productos" class="home-content">

    <div class="content-container">
        <div class="slideChico">
            <img src="views/images/bg-ofertas.jpg">
        </div>
    </div>

    <div class="wraper vinos">
        <h2>Promociones</h2>
        
        <div class="grid-container">
            <?php 
                GestorProductosController::ver_productos_promocion();
            ?>

        </div>
                     
    </div>
</section>


   