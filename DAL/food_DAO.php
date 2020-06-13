<?php
require_once('..//Config/Config.php');//calls Config.php script

class food_DAO
{
  //database connection variable that is used to store the connection to be used within the entire class
     private $connection;
      function __construct()
      {
        $instance = Config::getInstance();
        $this->connection = $instance->getConnection();
      }
    public function getAllRestaurants()
        {
           /* $result = $this->connection->query("SELECT  ID, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt;");
            if (!$result)
            {
                throw new Exception("MySQL Error: ");
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
             $query = "SELECT ID, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt";
              $stmt = $this->connection->prepare($query);
              $stmt->execute();
             // $stmt->setFetchMode(PDO::FETCH_ASSOC);
              $results=$stmt->fetch_assoc();
              return $results;*/
            $result = $this->connection->query("SELECT  ID, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt");
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
            $result = $this->connection->query("SELECT  ID, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt WHERE FoodType LIKE '%$query%';");
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
            $result = $this->connection->query("SELECT  ID, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt where  id ='$id';");
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
              $query = "SELECT ID, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt";
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
