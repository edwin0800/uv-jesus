<?php 


class GestorCategoriasController{

    public static function ver_categorias($item, $valor){

        $categorias = GestorCategoriasModel::ver_categorias($item, $valor);
        return $categorias;
    }

}