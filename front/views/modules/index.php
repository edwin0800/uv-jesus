
<?php include 'slider.php'; ?>

<div class="items-masonry">
		<div class="items-masonry__container">
			<h1>Zapatos Destacados</h1>
			<div class="items-masonry__filters-container">
				<div class="items-masonry__filters">
				<?php
					$item = null;
					$valor = null;
					$subcategoria = GestorSubCategoriasController::ver_subcategorias($item, $valor);
					
			
                    
						if($subcategoria > 0){
							foreach ($subcategoria as $key => $value) {
								echo '<button type="button" style="cursor: pointer;" class="subcategorias" nomCat="'.$value["id"].'" value="'.strtoupper($value["subcategoria"]).'">'.strtoupper($value["subcategoria"]).'</button>';
							}
						}else{
							echo "<h3 style='text-align:center; margin: auto; padding:15px; font-size:24px; color:white;'>Sin Categorias</h3>";
                    }
				?>
					
				</div>
			</div>
			<div class="items-masonry__items">
				<?php
					
					$productos = GestorProductosController::ver_productos_destacados();
					
					
					
					// 	foreach ($productos as $key => $value) {
						
					// }
                    
				?>
			</div>
			<a class="items-masonry__more-link" href="shop" style="text-decoration: none;">Ver todos los Zapatos</a>
		</div>
	</div>

	<div class="latest-feed">
		<div class="latest-feed__container">
			<h1>Síguenos en nuestras redes sociales</h1>

			

			<div class="latest-feed__items">
				<div class="feed-item">
					<a class="feed-item__image-container" href="#">
						<div class="feed-item__image" style="background-image: url('views/img/zapatos/0aeeefbc279b63cb8834b2b5e4650c0a229eaa8e_screen-shot-2019-06-26-at-6.03.28-pm.png');">
							<div class="feed-item__block-shader"></div>
							<div class="feed-item__instagram">
								<span>Instagram</span>
							</div>
							<div class="feed-item__play-icon"></div>
						</div>
					</a>
					<div class="feed-item__content feed-item__content--has-video">
						<h1>@universal<br/>venezuela</h1>
					</div>
					<a class="feed-item__cta" href="#">Ve a nuestro Instagram</a>
				</div>
				<div class="feed-item">
					<a class="feed-item__image-container" href="#">
						<div class="feed-item__image" style="background-image: url('views/img/zapatos/0aeeefbc279b63cb8834b2b5e4650c0a229eaa8e_screen-shot-2019-06-26-at-6.03.28-pm.png');">
							<div class="feed-item__block-shader"></div>
							<div class="feed-item__facebook">
								<span>Universal</span>
							</div>
						</div>
					</a>
					<div class="feed-item__content">
						<h1>Yeezy Boost 700 Utility Black Release Info</h1>
					</div>
					<a class="feed-item__cta" href="#">Ver más</a>
				</div>
				<div class="feed-item">
					<a class="feed-item__image-container" href="#">
						<div class="feed-item__image" style="background-image: url('views/img/zapatos/0aeeefbc279b63cb8834b2b5e4650c0a229eaa8e_screen-shot-2019-06-26-at-6.03.28-pm.png');">
							<div class="feed-item__block-shader"></div>
							<div class="feed-item__category">
								<span>Venezuela</span>
							</div>
						</div>
					</a>
					<div class="feed-item__content">
						<h1>Air Jordan 1 "Black Gym Red" Release Info </h1>
					</div>
					<a class="feed-item__cta" href="#">Ver más</a>
				</div>
			</div>
			<a class="latest-feed__more-posts" href="http://localhost/uv-jesus/front/shop" style="text-decoration: none;">Nuestras ultimas publicaciones</a>
		</div>
	</div>