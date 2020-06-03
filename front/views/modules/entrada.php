
<?php  
    
    if (!isset($_GET["id"])) {
        echo "<script> window.location.href = 'index' </script>";
    }

?>
<link rel="stylesheet" type="text/css" href="views/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="views/css/blog.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow">

<?php 
    $array = GestorBlogController::ver_detalle_blog($_GET["id"]);
    $info = $array["blog"];
    $lista = $array["relacionados"];

    if (isset($info[0]["titulo"])) {
        $item = $info[0];
        $titulo = $item["titulo"];
        $subtitulo = $item["subtitulo"];
        $alias = $item["alias"];
        $titulo_completo = $item["titulo"];
        $autor = $item["autor"];
        $categoria = $item["categoria"];
        $fecha = $item["fecha"];
        $extracto = $item["extracto"];
        $contenido = $item["contenido"];
        $etiquetas = $item["etiquetas"];
        $imagen = $item["foto"];
    }else{
        echo "<script> window.location.href = 'index' </script>";
    }
        
?>

<main role="main" class="container " style="margin-top: 150px;">
  <div class="row">
    <div class="col-md-8 blog-main">

        <div class="pb-4 mb-4 font-italic border-bottom">
            <center>
                <img src="backend/<?php echo $imagen;?>" style='max-height: 400px; width: 100%;'>    
            </center>
            
        </div>

        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $titulo; ?></h2>
            <p class="blog-post-meta"><?php echo $fecha; ?> by <a href="#"><?php echo $autor; ?></a></p>

            <?php echo htmlspecialchars_decode($contenido); ?>

        </div>

 
    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      

      <div class="p-4 bg-light rounded">
            <h4 class="font-italic">Más entradas</h4>
            <ol class="list-unstyled mb-0">
                <?php echo $lista; ?>                          
            </ol>
      </div>

    </aside>

  </div>

</main>

   