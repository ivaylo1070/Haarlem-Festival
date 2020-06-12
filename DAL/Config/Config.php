<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// singleton connection to database;
class Config{
// store class instance
private static $instance = null;
private $conn;
// assign database conncetion details;
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbhname = "haarlem_f";

// prevent a connection from being created outside this class;
private function __construct(){
	// conncet to the database
		$this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbhname);
		if (!$this->conn) {
			die ("connection failed ".mysqli_connect_error());
		}
	}
// create an instance of this class
public static function getInstance()
  {
    if(!self::$instance)
    {
			// create an instance if none exists;
      self::$instance = new Config();
    }
		//return instance
    return self::$instance;
  }
  // return database connection;
  public function getConnection()
  {
    return $this->conn;
  }
}
?>
