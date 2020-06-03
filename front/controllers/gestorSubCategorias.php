<?php 


class GestorSubCategoriasController{

    public static function ver_subcategorias($item, $valor){

        $subcategorias = GestorSubCategoriasModel::ver_subcategorias($item, $valor);
        return $subcategorias;
    }

}