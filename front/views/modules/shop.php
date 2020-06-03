<?php $ruta = Ruta::ctrRutaServidor();?>
<section class="shop-header">
        <div class="shop-container">
            <div class="shop-header__content">
                <div class="shop-header-title-wrapper">
                    <h1>
                        Todos Nuestros Zapatos
                    </h1>
                </div>
                <div class="sort-dropdown shop-dropdown">
                    <div class="shop-dropdown__label">
                        <span>
                            Ordenar por
                        </span>
                    </div>
                    <div class="css-10nd86i shop-dropdown-value">
                        <div class="css-vj8t7z sdp__control">
                            <div class="css-1hwfws3 sdp__value-container sdp__value-container--has-value">
                            <select name="" id="orden"  class="css-1ep9fjw sdp__indicator sdp__dropdown-indicator text-dark">
                                <option value="reciente">RECIENTES</option>
                                <option value="antiguo">ANTIGUO</option>
                                <option value="barato">MAS BARATO</option>
                                <option value="caro">MAS CARO</option>
                            </select>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Shop COntainer -->
    <div class="shop-container">
        <section class="shop-content">
            <aside class="shop-sidebar">
                <div class="filters-dropdown shop-dropdown">
                    <div class="shop-dropdown__value">
                        <span>
                            NINGÚN FILTRO
                        </span>
                        
                    </div>
                    <div class="shop-dropdown__button">
                        <span>
                            INICIO
                        </span>
                    </div>
                    <div class="filters-dropdown__filters-list">
                    </div>
                </div>
                <div class="shop-filter">
                    <div class="shop-filter__title shop-filter__title--short">
                    </div>
                    
                </div>
               
                
                <div class="shop-filter">
                    <div class="shop-filter__title">
                        <span>
                            MARCA
                        </span>
                        <i class="marcaSlide">
                        </i>
                    </div>
                    <div class="shop-filter__body with-scroll marcaItems">

                    <?php
                    
					$item = null;
					$valor = null;
                    $subcategoria = GestorSubCategoriasController::ver_subcategorias($item, $valor);
                    
						if($subcategoria > 0){
							foreach ($subcategoria as $key => $value) {
								echo '<div class="form-check ">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" nomCat="'.$value["id"].'" value="'.$value["id"].'" name="categoria">'.$value["subcategoria"].'
                                        </label>
                                     </div>';
							}
						}else{
							echo "";
                    }
				?>
                
                    </div>
                    <div class="shop-filter__shader">
                    </div>
                </div>




               
                <div class="shop-filter">
                    <div class="shop-filter__title">
                        <span>
                            Precio
                        </span>
                        <i class="precioSlide">
                        </i>
                    </div>


                    <div class="shop-filter__body precioItems">

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" prec="(precio >= 0 AND precio <= 100)" name="precio"><span>$0 - $100</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" prec="(precio >= 100 AND precio <= 200)" name="precio"><span>$100 - $200</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" prec="(precio >= 200 AND precio <= 300)" name="precio"><span>$200 - $300</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" prec="(precio >= 300 AND precio <= 400)" name="precio"><span>$300 - $400</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" prec="(precio >= 400 AND precio <= 500)" name="precio"><span>$400 - $500</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" prec="(precio >= 500 AND precio <= 600)" name="precio"><span>$500 - $600</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" prec="(precio >= 600 AND precio <= 700)" name="precio"><span>$600 - $700</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" prec="(precio >= 700 AND precio <= 800)" name="precio"><span>$700 - $800</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" prec="(precio >= 800 AND precio <= 900)" name="precio"><span>$800 - $900</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" prec="(precio >= 900 AND precio <= 1000)" name="precio"><span>$900 - $1000</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" prec="(precio >= 1000)" name="precio"><span>$1000+
                        </span></label>
                    </div>
                    
                    </div>
                </div>
                <div class="shop-filter shop-filter--noborder">
                    <div class="shop-filter__title">
                        <span>
                            Tallas
                        </span>
                        <i class="tallaSlide">
                        </i>
                    </div>
                    <div class="shop-filter__body shop-filter__body--toggles tallaItems">
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="1">
                            <span>
                                1
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="1.5">
                            <span>
                                1.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="2">
                            <span>
                                2
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="2.5">
                            <span>
                                2.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="3">
                            <span>
                                3
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="3.5">
                            <span>
                                3.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="4">
                            <span>
                                4
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="4.5">
                            <span>
                                4.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="5">
                            <span>
                                5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="5.5">
                            <span>
                                5.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="6">
                            <span>
                                6
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="6.5">
                            <span>
                                6.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="7">
                            <span>
                                7
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="7.5">
                            <span>
                                7.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="8">
                            <span>
                                8
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="8.5">
                            <span>
                                8.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="9">
                            <span>
                                9
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="9.5">
                            <span>
                                9.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="10">
                            <span>
                                10
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="10.5">
                            <span>
                                10.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="11">
                            <span>
                                11
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="11.5">
                            <span>
                                11.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="12">
                            <span>
                                12
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="12.5">
                            <span>
                                12.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="13">
                            <span>
                                13
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="13.5">
                            <span>
                                13.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="14">
                            <span>
                                14
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="14.5">
                            <span>
                                14.5
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="15">
                            <span>
                                15
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="16">
                            <span>
                                16
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="17">
                            <span>
                                17
                            </span>
                        </div>
                        <div class="shop-filter__item shop-filter__item--toggle tallas" etiq="18">
                            <span>
                                18
                            </span>
                        </div>
                    </div>
                </div>
            </aside>
            <section class="shop-content__items-area lazy">
                <div class="shop-items-grid">
                <?php
                        $item = null;
                        $valor = null;
                        $item2 = null;
                        $valor2 = null;
                        $productos = GestorProductosController::ver_productos_todos($item, $valor, $item2, $valor2);

                        

                        foreach ($productos as $key => $value) {
                            $descripcion = substr($value["descripcion"],0,50) . "...";
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
                                    '.$value["detalles"].'
                                    </span>
                                </div>
                                <span class="product-cell__item-button product-cell__item-button--price">
                                '.$value["precio"].'
                                </span>
                            </a>
                        </div>';
                        }
                ?>
               
                    
                </div>
                <!-- <div class="shop-load-more">
                    <a>
                        Cargar Más
                    </a>
                </div> -->
            </section>
        </section>
    </div>