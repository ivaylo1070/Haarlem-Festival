<?php
require_once('config.php');//calls Config.php script

class CMS_DAO
{
  //database connection variable that is used to store the connection to be used within the entire class
  private $conn;

  function __construct()
  {
    //creates instance and establishes single connection for the database
    $instance = Config::getInstance();
    $this->conn = $instance->getConnection();
  }
  function DB_GetAllFoodEvents()
  {
    $query = "SELECT * FROM Restaraunt";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //fetches all user information into an array
    $results=$stmt->fetchAll();
    //returns results array back to logic layer
    return $results;
  }
  function DB_GetAllDanceEvents()
  {
    $query = "SELECT * FROM Dance";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //fetches all user information into an array
    $results=$stmt->fetchAll();
    //returns results array back to logic layer
    return $results;
  }

  function DB_GetAllJazzEvents()
  {
    $query = "SELECT * FROM Jazz";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //fetches all user information into an array
    $results=$stmt->fetchAll();
    //returns results array back to logic layer
    return $results;
  }
}
?>
