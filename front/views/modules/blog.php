
<link rel="stylesheet" type="text/css" href="views/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="views/css/blog.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow">

<section id="productos" class="home-content">

    <div class="content-container">
        <div class="slideChico">
            <img src="views/images/bg-ofertas.jpg">
        </div>
    </div>

    <div class="wraper">
        <h2>Blog</h2>

        <?php 
            GestorBlogController::ver_blogs();
        ?>

                     
    </div>
</section>


   