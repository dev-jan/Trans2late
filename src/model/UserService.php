<?php
class UserService {
	/**
	 * Checks if the given usercredentials are correct or not
	 * @param String $username username to check
	 * @param String $password plain text password to check
	 */
	public static function checkuser ($username, $password) {
		$db = Database::getDatabaseWrapper();
		
		$salt = UserService::getSaltOfUser($username);
		
		// Check if the salt is a real salt
		if ($salt == null) {
			return false;
		}
		
		$query = "SELECT id FROM user
					WHERE username = '$username' 
					AND password = SHA2('$password$salt', 256)";
		
		$result = $db->query($query);
		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}
	
	/**
	 * Return the Salt of a user (from the database)
	 * @param String $username
	 * @return String
	 */
	public static function getSaltOfUser ($username) {
		$db = Database::getDatabaseWrapper();
		
		$query = "SELECT salt FROM user WHERE username = '$username'";
		$result = $db->query($query); 
		if ($result != null) {
			$resultrow = $result->fetch_assoc();
			return $resultrow["salt"];
		}
		else {
			return null;
		}
	}
	
	/**
	 * Return the currently logged in user
	 * @return Array
	 */
	public static function getCurrentUser () {
		$db = Database::getDatabaseWrapper();
		Helper::loadModel("SessionService");
		$currentUsername = SessionService::getCurrentUsername();
		
		$query = "SELECT * FROM user WHERE username = '$currentUsername'";
		$result = $db->query($query);
		$user = $result->fetch_assoc();
		return $user;
	}
}