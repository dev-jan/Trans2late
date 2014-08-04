<?php
class MainValueService {
	
	/**
	 * Returns all MainValues of a project
	 * @param Int $projectId
	 * @return DBList All mainvalues of a project as database result
	 */
	public static function getAllMainValues($projectId) {
		$db = Database::getDatabaseWrapper();
		
		$query = "SELECT * FROM mainvalue WHERE project_id = '$projectId'";
		$result = $db->query($query);
		return $result;
	}
}