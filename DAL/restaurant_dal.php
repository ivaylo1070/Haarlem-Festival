<?php
require_once("../Model/restaurant_M.php");
require_once("cart_dal.php");

class restaurant_dal  extends cart_dal{

  public function GetDanceTickets($sort)
  {
      public function getAllRestaurants()
      {    
             global $conn;    
                $result = $conn->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt;");
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
      public function getRestaurantByFoodType($query)
      {
                global $conn;   
                $query = $conn->escape_string($query);
                $result = $conn->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt WHERE FoodType LIKE '%$query%';");
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
      public function getRestaurantByID($id)
      {
        global $conn; 
                $result = $conn->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From Restaraunt WHERE   id ='$id';");
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
