<?php

include_once("Config.php");
include_once("dance_dal.php");
include_once("jazz_dal.php");
include_once("Reservation_dal.php");
include_once("restaurant_dal.php");

$dbconn = new config();
$conn = $dbconn->Connect();
abstract class cart_dal{

  function getTicketByID($id){
    // add code in child class.
    return $ticket;
    }
}
