<?php
$path = __FILE__;
define("ROOT", str_replace("lib/" . basename(__FILE__), "", $path));

/**
 * Helper class for some often used commands
 */
class Helper {
	/**
	 * Loads the default page header
	 * @param String $selectedMenu Menu that got preselected
	 */	
	public static function loadHeader($selectedMenu) {
		include ROOT.'controller/components/headerController.php';
		HeaderController::header($selectedMenu);
	}
	
	/**
	 * Loads the default page footer
	 */
	public static function loadFooter() {
		include ROOT.'view/pagewrappers/footer.php';
		die();
	}
	
	/**
	 * Returns the escaped parameter (HTML special chars & SQL special chars)
	 * @param String $name The name of the parameter
	 */
	public static function getParameter($name) {
		$raw = "";
		if (isset($_POST[$name])) {
			$raw = $_POST[$name];
		}
		elseif (isset($_GET[$name])) {
			$raw = $_GET[$name];
		}
		else {
			return null;
		}
		$raw = htmlspecialchars($raw, ENT_COMPAT | ENT_HTML5 , "UTF-8");
		$string = Database::escapeString($raw);
		return $string;
	}
	
	/**
	 * Checks if the current user is logged in, else it redirects to to login page
	 */
	public static function checkLoggedIn() {
		Helper::loadModel("SessionService");
		if (!SessionService::checkSession()) {
			Helper::redirectTo(WEBROOT."login");
		}
	}
	
	/**
	 * Redirects to another URL
	 * @param String $url
	 */
	public static function redirectTo($url) {
		echo '<meta http-equiv="refresh" content="0; url='.$url.'" />';
		die();
	}
	
	/**
	 * Load a specific model class
	 * @param String $name
	 */
	public static function loadModel($name) {
		require ROOT . "model/" . $name . ".php";
	}
}