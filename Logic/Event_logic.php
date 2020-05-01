<?php

include(realpath(dirname(__FILE__) . '/../DAL') . "/CMS_DAO.php"); //includes User_Dao script
include("../Model/Food_Event.php");
include("../Model/Jazz_Events.php");
include("../Model/Dance_event.php");


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

      $events=array();

      $result=$this->DB_user_conn ->DB_GetAllDanceEvents();

      foreach($result as $event)
      {
        $ID=$event["ID"];
        $Address=$event["venue"];
        $Opening_time=$event["start"];
        $Closing_time=$event["end"];
        $Seats=$event["seats"];
        $Price=$event["price"];
        $Session=$event["session"];
        if(!isset($event["image"]))
        {
          $Image="../Img/r.jpg";
        }
        else
        {
          $Image=$event["image"];
        }

        $dance_event= new Dance_Event($ID,$Address,$Opening_time,$Closing_time,$Seats,$Price,$Image,$Session);;

        array_push($events,$dance_event);
      }

      return $result;
  }
  function GetAllJazzEvents()
  {
      $events=array();

      $result=$this->DB_user_conn ->DB_GetAllJazzEvents();

      foreach($result as $event)
      {
        $ID=$event["ID"];
        $Address=$event["venue"];
        $Opening_time=$event["start"];
        $Closing_time=$event["end"];
        $Seats=$event["seats"];
        $Price=$event["price"];
        if(!isset($event["image"]))
        {
          $Image="../Img/r.jpg";
        }
        else
        {
          $Image=$event["image"];
        }
        $Band=$event["band"];

        $jazz_event= new Jazz_Event($ID,$Address,$Opening_time,$Closing_time,$Seats,$Price,$Image,$Band);;

        array_push($events,$jazz_event);
      }

      return $result;
  }


}
 ?>
