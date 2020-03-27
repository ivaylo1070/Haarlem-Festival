<?php

include(realpath(dirname(__FILE__) . '/../DAL') . "/CMS_DAO.php"); //includes User_Dao script
include("../Model/Food_Event.php");

class Event_logic
{
  private $DB_cms_conn;


  function __construct()
  {
      $this->DB_cms_conn = new CMS_DAO();
  }
  function GetAllFoodEvents()
  {
      $events=array();

      $result=$this->DB_user_conn ->DB_GetAllFoodEvents();

      foreach($result as $event)
      {
        $ID=$event["ID"];
        $Name=$event["Name"];
        $Address=$event["Address"];
        $Opening_time=$event["OpeningTime"];
        $Closing_time=$event["Closingtime"];
        $Stars=$event["Stars"];
        $Seats=$event["Seats"];
        $Price=$event["Price"];
        $Food_type=$event["FoodType"];
        $Image=$event["image"];

        $food_event= new Food_Event($ID,$Name,$Address,$Opening_time,$Closing_time,$Stars,$Seats,$Price,$Food_type,$Image);;

        array_push($events,$food_event);
      }

      return $events;
  }

  function GetAllDanceEvents()
  {

      $result=$this->DB_user_conn ->DB_GetAllDanceEvents();

      return $result;
  }
  function GetAllJazzEvents()
  {

      $result=$this->DB_user_conn ->DB_GetAllJazzEvents();

      return $result;
  }


}
 ?>
