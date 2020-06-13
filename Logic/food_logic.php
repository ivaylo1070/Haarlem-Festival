<?php

include(realpath(dirname(__FILE__) . '/../DAL') . "/food_DAO.php"); //includes User_Dao script

class Food_logic
{
  //variable used to store the access to the database class into this entire class
     private $conn;
      function __construct()
      {
          $this->conn = new food_DAO();
      }
      function sayhi()
      {
          $this->conn ->sayHi();
      }
 
      function GetAllRestrnt()
      {
          $results=$this->conn->GetAllResto();//getAllRestaurants();
          return $results;
      }
      function GetRestrntById($id)
      {
          $results=$this->conn->getRestaurantByID($id);
          return $results;
      }
       function GetRestrntBytype($type)
      {
          $results=$this->conn->getRestaurantByFoodType($type);
          return $results;
      }

   }
 ?>
