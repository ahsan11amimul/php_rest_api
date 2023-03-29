<?php
/**
 * @since: 29/03/2023
 * database connection.
 *
 */

class Database {
	private $host = "127.0.0.1";
	private $database_name = "php_api";
	private $username = "root";
	private $password = "";
	public $conn;

	public function getConnection() {
		$this->conn = null;
		try {
			$this->conn = new PDO( "mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username,
				$this->password );
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//$this->conn->exec( "set names utf8" );
		} catch ( PDOException $exception ) {
			echo "Database could not be connected: " . $exception->getMessage();
		}

		return $this->conn;
	}
}
