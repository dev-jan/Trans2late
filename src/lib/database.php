<?php
include_once dirname(__FILE__).'/../config.php';
/**
 * Class that grants access to the Database
 * This class is a singelton class!
 */
class Database {
	public $db; // Databaseconnection object
	private static $dbwrapper; // Database wrapper
	
	public static function getDatabaseWrapper() {
		if (Database::$dbwrapper == null) {
			Database::$dbwrapper = new Database();
			$db = Database::$dbwrapper;
			$db->connect();
		}
		return Database::$dbwrapper;
	}
	
	/**
	 * Open a connection to the mySQL Database
	 */
	public function connect() {
		$this->db = @mysqli_connect(DATABASE_HOSTNAME, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
		if (mysqli_connect_errno($this->db)) {
			echo "<h1>DATABASE ERROR! (see the serverlog for more informations)</h1>";
			error_log("[trans2late] DB connection failed: ".mysqli_error($this->db));
		}
		$this->db->set_charset("utf8");
	}
	
	/**
	 * Execute a SQL query in the database
	 * @param <String> $sql SQL query
	 * @return <dbResult> Result of the executed sql query
	 */
	public function query($sql) {
		$result = $this->db->query($sql);
		
		if ($result !== false) {
			return $result;
		}
		else {
			error_log("[trans2late] Query Failed: ".$sql);
			return null;
		}
	}
	
	/**
	 * Escapes a String (SQL & HTML)
	 * @param <String> $string string to escape
	 * @return string escaped string
	 */
	public static function escapeString($string) {
		$string = htmlspecialchars($string, ENT_COMPAT | ENT_HTML5 , "UTF-8");
		$dbwrapper = Database::getDatabaseWrapper();
		$string = mysqli_real_escape_string($dbwrapper->db, $string);
		return $string;
	}
}