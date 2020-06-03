<?php 

class GestorCategoriasModel{


	public static function ver_categorias($item, $valor){

        $consulta = new Consulta();
        
        if($item == null){
            $categorias = $consulta->ver_registros("select * from categorias");
        }else{
		$categorias = $consulta->ver_registros("select * from categorias where $item = $valor");
        }

			

		return $categorias;
    }

}
