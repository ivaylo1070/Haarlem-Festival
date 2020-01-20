<?php
require_once("../Model/restaurant_M.php");
require_once("cart_dal.php");

class restaurant_dal  extends cart_dal{

  public function GetDanceTickets($sort)
  {
    $sql = "SELECT D.price,D.start,D.end,DJ.DJ,V.venue,V.address,D.seats,D.session
            FROM Dance AS D
            JOIN venue ON venue.venue=ticket.venue AS V
            JOIN DJ ON DJ.ID=Dance.DJ
            ORDER BY $sort";

    global $conn;
    $results = $conn->query($sql);
    $numRows = $results->num_rows;
    if($numRows > 0){
      while($row = $results->fetch_assoc())
      {
      $data[] = $row;
      }
      return $data;
    }
  }
  public function getAllRestaurants()
  {    
         global $conn;    
            $result = $conn->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From restaraunt;");
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
            $result = $conn->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From restaraunt WHERE FoodType LIKE '%$query%';");
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
            $result = $conn->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From restaraunt WHERE   id ='$id';");
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
