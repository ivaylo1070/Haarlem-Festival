<?php
require_once("../Model/restaurant_M.php");
//require_once("cart_dal.php");
 class restaurant_dal 
{

    private static $_instance=null;  
    private $connection=null;

    private function __construct() {
      $this->connection = mysqli_connect("localhost","hfitteam4_user","b6YMJTmc","hfitteam4_db");
      if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
       }
    }

    public static function getInstance() 
    {
      if(!self::$_instance) { // If no instance then make one
        self::$_instance = new restaurant_dal(); //new self();
      }
      return self::$_instance;
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
