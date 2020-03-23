<?php
//require_once("../Model/Dal.php");
require_once('config.php');//
 class restaurant_dal 
{
         private $connection;
          function __construct()
          {
            //creates instance and establishes single connection for the database
            $instance = Config::getInstance();
            $this->connection = $instance->getConnection();
          }
       public function getAllRestaurants()
        {        
            $result = $this->connection->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt;");
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
            $result = $this->connection->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt WHERE FoodType LIKE '%$query%';");
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
            $result = $this->connection->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt WHERE   id ='$id';");
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
}
