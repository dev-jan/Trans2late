<?php
$controllername = "LoginController";
class LoginController {
	public static function index() {
		include ROOT . 'view/login/loginpage.php';
		Helper::loadFooter();
	}
	
	public static function check() {
		$error = false;
		$username = Helper::getParameter("username");
		$password = Helper::getParameter("password");
		Helper::loadModel("UserService");
		$isCorrectUser = UserService::checkuser($username, $password);
		if ($isCorrectUser) {
			Helper::loadModel("SessionService");
			SessionService::createSession($username);
			Helper::redirectTo(WEBROOT);
		}
		else {
			// wait 2 seconds to prevent bots to brute-force
			sleep(2);
			$error = true;
			include ROOT . 'view/login/loginpage.php';
		}
	}
	
	public static function logout() {
		Helper::loadModel("SessionService");
		SessionService::destorySession();
		Helper::redirectTo(WEBROOT."login");
	}
}