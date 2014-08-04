<?php
class ProjectService {
	/**
	 * Return a project from a given urlpart
	 * @param String $url requested project (e.g. "testproject")
	 * @return Array the project as database object
	 */
	public static function getProjectByUrl ($url) {
		$db = Database::getDatabaseWrapper();
		
		$query = "SELECT * FROM project WHERE url = '$url'";
		$result = $db->query($query);
		return $result->fetch_assoc();
	}
}