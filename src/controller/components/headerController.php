<?php
$controllername = "HeaderController";
class HeaderController {
	public static function header($selectedMenu) {
		include ROOT . 'view/header.php';
	}
}