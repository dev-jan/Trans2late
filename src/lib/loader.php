<?php
/**
 * This file loads the requested controller
 */

// Read the configuration file...
require_once dirname(__FILE__).'/config.php';
// Delete the serverurl from the url and cut it into small pizza pices
$absoluteURL = str_replace(WEBROOT, "", $_SERVER["REQUEST_URI"]);
$urlPices = explode("/", $absoluteURL);

// Choose the controller to load
$controllerToLoad = "indexController.php"; // Default controller
$action = "index"; // Default action
$controllerfounded = false;

// Load the Controller that matches to the URL (if the controller exists)
if (file_exists("controller/" . strtolower($urlPices[0]) . "Controller.php")) {
	$controllerToLoad = $urlPices[0] . "Controller.php";
	// Load the action if a action is defined
	if (isset($urlPices[1])) {
		$action = strtolower($urlPices[1]);
	}
	$controllerfounded = true;
}
else {
	// URL doesn't match to a controller... maybe something else?
	
	// Check for some aliases
	include 'lib/aliases.php';
	foreach ($aliases as $alias) {
		if (strtolower($alias["alias"]) == strtolower($urlPices[0])) {
			$controllerToLoad = $alias["controller"];
			$action = $alias["action"];
			$controllerfounded = true;
		}
	}
}
// URL is the main URL? (e.g. www.mycompany.com/translate/)
if ($urlPices[0] == "") {
	$controllerfounded = true;
}

// if no controller/alias founded show 404 error page
if ($controllerfounded == false) {
	echo "Error: Page not found";
	// TODO: Load a nice styled error page...
	die();
}


// Lets load the controller with the action
require 'controller/'.$controllerToLoad;
$controllername::$param = $urlPices; //saves the URL params into the controller
// Run the action, if the action exists
if (method_exists($controllername, $action)) {
	$controllername::$action();
}
elseif (method_exists($controllername, "index")) {
	// by default run the index action, if the index action exists
	$controllername::index();
}
else {
	// if the controller has no index action... well, then the controller is stupid -.-
	echo "Internal Error: Controller has no index action... :(";
	// TODO: Load a nice styled error page...
}
