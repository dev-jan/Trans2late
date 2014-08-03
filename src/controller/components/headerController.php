<?php
$controllername = "HeaderController";
class HeaderController {
	public static function header($selectedMenu) {
		// Name of the currently logged-in user
		Helper::loadModel("UserService");
		$user = UserService::getCurrentUser();
		$nameOfUser = $user["prename"] . " " . $user["surname"];
		include ROOT . 'view/pagewrappers/header.php';
	}
}