<?php

require_once("../Model/Ticket.php");
require_once("../DAL/dance_dal.php");


$dance_dal= new Dance_dal();
function ReadCart(){
  $basicCart = unserialize($_COOKIE['cart']);
  foreach ($basicCart as $id => $quantity){
    $ticket = getTicketByID($id);

  }
}
