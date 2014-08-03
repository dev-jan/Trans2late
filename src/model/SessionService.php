<?php
class SessionService {
	/**
	 * Create a new Session for a user
	 * @param String $username username of the currenty logged in user
	 */
	public static function createSession($username) {
		// Create a new session with the standard php session 
		$_SESSION["TRANS2LATE_USERNAME"] = $username;
	}
	
	/**
	 * Checks if the current request is from a authorized user
	 * @return boolean TRUE if the user is authorized
	 */
	public static function checkSession() {
		if (isset($_SESSION["TRANS2LATE_USERNAME"])) {
			return true;
		}
		return false;
	}
	
	/**
	 * Destroy the session of the currently logged-in user
	 */
	public static function destorySession() {
		// Destroy PHPSession
		session_destroy();
	}
}