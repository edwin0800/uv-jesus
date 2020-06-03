<?php 

class GestorSubCategoriasModel{


	public static function ver_subcategorias($item, $valor){

        $consulta = new Consulta();
        
        if($item == null){
            $subcategorias = $consulta->ver_registros("select * from subcategorias");
        }else{
		$subcategorias = $consulta->ver_registros("select * from subcategorias where $item = $valor");
        }

			

		return $subcategorias;
    }

}
