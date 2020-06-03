<?php 


class GestorVisitantesController{

	public static function nuevo_visitante(){

		$dispositivo = GestorVisitantesController::browser();

		$resp = GestorVisitantesModel::nuevo_visitante($dispositivo);

		return $resp;

	}

	public static function browser(){

		$tablet_browser = 0;
		$mobile_browser = 0;
		$body_class = "desktop";
		$http_server = strtolower($_SERVER['HTTP_USER_AGENT']);

		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', $http_server)) {
			$tablet_browser++;
			$body_class = "tablet";
		}

		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', $http_server)) {
			$mobile_browser++;
			$body_class = "mobile";
		}

		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or (isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])) ) {
			$mobile_browser++;
			$body_class = "mobile";
		}

		$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0,4));

		return $body_class;

	}
	
}