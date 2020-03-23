<?php
//defines set of all the constants needed to make connection to the database
define('DB_SERVER', 'localhost');//"usermanagement");
/*define('DB_USERNAME', 'hfitteam4_user');
define('DB_PASSWORD', 'b6YMJTmc');
define('DB_NAME', 'hfitteam4_db');*/
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'usermanagement');

// class that is used to make connection to database via singleton pattern
class Config
{
  // variables instance and conn unaccessible outside of Config class directly
  private static $instance= null;
  private $conn;

    private function __construct()
    {
      try{
        // sets database connection using PDO with the constants defined above
        $this->conn = new PDO('mysql:host='.DB_SERVER.'; dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
        // sets attribute for when an exception is made while trying to connect
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          }
          //echoes error if connecting to the database doent work
      catch(PDOException $error )
          {
            throw new PDOException("No connection to the database");// throws this error if there is no connection to the database or other errorwith it
          }
    }
    // generates new instance if there is none
    public static function getInstance()
    {
      if (self::$instance == null)
    {
      self::$instance = new Config();
    }

    return self::$instance;
    }
    // it provides a connection outside of class Config
    public function getConnection()
  {
    return $this->conn;
  }
}
?>
