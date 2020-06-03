<?php 

class GestorSlideModel{

	public static function verImagenes(){
		
		$consulta = new Consulta();

		$registros = $consulta->ver_registros("select * from slide order by orden");

		return $registros;
	}
	public static function ver_config_slide(){
		$consulta = new Consulta();


		$speed = $consulta->ver_registros("select * from config where config_name = 'speed_slider'");
		$effect = $consulta->ver_registros("select * from config where config_name = 'effect_slider'");
		$auto = $consulta->ver_registros("select * from config where config_name = 'auto_slider'");
		$effect_t_slider = $consulta->ver_registros("select * from config where config_name = 'effect_text_slider'");
		
		$arr["speed"] = $speed[0];
		$arr["effect"] = $effect[0];
		$arr["auto"] = $auto[0];
		$arr["effect_t_slider"] = $effect_t_slider[0];		

		return $arr;
	}


}