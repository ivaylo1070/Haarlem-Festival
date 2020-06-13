<?php
require_once('Config.php');//calls Config.php script

class food_DAO
{
  //database connection variable that is used to store the connection to be used within the entire class
     private $connection;
      function __construct()
      {
        //creates instance and establishes single connection for the database
        $instance = Config::getInstance();
        $this->connection = $instance->getConnection();
      }
    public function getAllRestaurants()
        {
            $result = $this->connection->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From restaraunt;");
            if (!$result)
            {
                throw new Exception("MySQL Error: '$error'");
            }
            else
            {
                $Restaurants = array();
                while($row = $result->fetch_assoc())
                {

                 $Restaurants[]=$row;
                }
                return $Restaurants;
            }
        }
            // all restuarants that match given search query
        public function getRestaurantByFoodType($query) {
            $query = $this->connection->escape_string($query);
            $result = $this->connection->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From restaraunt WHERE FoodType LIKE '%$query%';");
            if (!$result)
            {
                throw new Exception("MySQL Error: '$error'");
            }
            else
            {
                $Restaurants = array();
                while($row = $result->fetch_assoc())
                {

                 $Restaurants[]=$row;
                }
                return $Restaurants;
            }

        }
        // all restuarants that match given search query
        public function getRestaurantByID($id) {
            $result = $this->connection->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From restaraunt WHERE   id ='$id';");
            if (!$result)
            {
                throw new Exception("MySQL Error: '$error'");
            }
            else
            {
                $Restaurants = array();
                while($row = $result->fetch_assoc())
                {

                 $Restaurants[]=$row;
                }
                return $Restaurants;
            }

        }
         function GetAllResto()
          {
            // query to select all data of particular user from the database with limit of 1
              $query = "SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From restaraunt;";

              $stmt = $this->connection->prepare($query);
              $stmt->execute();
              $stmt->setFetchMode(PDO::FETCH_ASSOC);
              $results=$stmt->fetchAll();
              return $results;
          }
      public function sayHi()
        {
            echo "get all rsto dao class ";
        }
      }

 ?>
