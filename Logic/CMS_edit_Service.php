<?php

include_once("Event_logic.php");
$cms_service = new Event_logic();
$listView_food;

if(isset($_POST["event_cms_select"]))
{
  $event_type=$event_cms_select;
  $food_events=$cms_service->GetAllFoodEvents();
  $_SESSION["food"]=$food_events;

  if($event_type=="Food")
  {
      $food_events=$cms_service->GetAllFoodEvents();
      $_SESSION["food"]=$food_events;
  }
  else if($event_type=="Jazz")
  {
      $results_jazz=$cms_service->GetAllJazzEvents();
      $_SESSION["jazz"]=$results_jazz;
  }
  else if($event_type=="Dance")
  {
      $results_dance=$cms_service->GetAllDanceEvents();
      $_SESSION["dance"]=$results_dance;
  }
  else if($event_type=="All")
  {
      $results_food=$cms_service->GetAllFoodEvents();
      $results_jazz=$cms_service->GetAllJazzEvents();
      $results_dance=$cms_service->GetAllDanceEvents();

      $_SESSION["food"]=$results_food;
      $_SESSION["jazz"]=$results_jazz;
      $_SESSION["dance"]=$results_dance;

  }
}
?>
