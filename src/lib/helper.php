<?php
$path = __FILE__;
define("ROOT", str_replace("lib/" . basename(__FILE__), "", $path));

/**
 * Helper class for some often used commands
 */
class Helper {
	/**
	 * Loads the default page header
	 * @param <String> $selectedMenu Menu that got preselected
	 */	
	public static function loadHeader($selectedMenu) {
		include ROOT.'controller/components/headerController.php';
		HeaderController::header($selectedMenu);
	}
	
	/**
	 * Loads the default page footer
	 */
	public static function loadFooter() {
		include ROOT.'view/footer.php';
		die();
	}
	
	/**
	 * Returns the escaped parameter (HTML special chars & SQL special chars)
	 * @param <String> $name The name of the parameter
	 */
	public static function getParameter($name) {
		$raw = "";
		if (isset($_POST[$name])) {
			$raw = $_POST[$name];
			$raw = htmlspecialchars($raw, ENT_COMPAT | ENT_HTML5 , "UTF-8");
			$string = mysql_real_escape_string($raw);
			return $string;
		}
		else {
			return null;
		}
	}
	
	/**
	 * Redirects to another URL
	 * @param <String> $url
	 */
	public static function redirectTo($url) {
		echo '<meta http-equiv="refresh" content="0; url='.$url.'" />';
		die();
	}
}