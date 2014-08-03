<?php
class SessionService {
	/**
	 * Create a new Session for a user
	 * @param String $username username of the currenty logged in user
	 */
	public static function createSession($username) {
		// TODO: Implement Session management
	}
	
	/**
	 * Checks if the current request is from a authorized user
	 * @return boolean TRUE if the user is authorized
	 */
	public static function checkSession() {
		// TODO: Implement real check
		return true;
	}
}