<?php
$controllername = "ProjectController";
class ProjectController {
	public static function index() {
		// Check if the user is logged in
		// TODO: Check permission on the requested project
		Helper::checkLoggedIn();
		$urlParams = Helper::getUrlParams();
		// Get the project url from the request url
		// e.g.: test.com/project/jquery  ->  jquery
		$projecturl = $urlParams[1];
		
		// Load the requested project from the database
		Helper::loadModel("ProjectService");
		$project = ProjectService::getProjectByUrl($projecturl);
		
		// Load all mainvalues of the project
		Helper::loadModel("MainValueService");
		$mainvalues = MainValueService::getAllMainValues($project["id"]);
		
		// Load the view
		Helper::loadHeader("project");
		if ($project != null) {
			require ROOT . "view/project/projectOverview.php";
		}
		else {
			echo "Error: Project not found";
		}
		Helper::loadFooter();
	}
}