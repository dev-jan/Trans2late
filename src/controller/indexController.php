<?php
$controllername = "IndexController";
class IndexController {
	public static $param;
	public static function index() {
		Helper::checkLoggedIn();
		Helper::loadHeader("home");
		include ROOT . 'view/index.php';
		Helper::loadFooter();
	}
}