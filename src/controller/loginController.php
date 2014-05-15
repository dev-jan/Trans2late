<?php
$controllername = "LoginController";
class LoginController {
	public static $param;
	public static function index() {
		include ROOT . 'view/login/loginpage.php';
		Helper::loadFooter();
	}
}