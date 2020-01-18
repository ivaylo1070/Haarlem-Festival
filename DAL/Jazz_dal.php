<?php
require("../Model/Jazz.php");
require_once("cart_dal.php");

class jazz_dal() extend cart_dal{

  /* // edit for jazz
  function getTicketByID($id){
    $sql = "SELECT T.price,T.start,T.end,T.DJ,V.venue,V.address,T.seats,T.session
						FROM Ticket AS T
						JOIN venue ON venue.venue=ticket.venue AS V
						WHERE Ticket.ID = $id";

    global $conn;
    $data = $conn->query($sql);
    $numRows = $results->num_rows;
    if($numRows = 1){
      $ticket = new Dance();
      $ticket->ticketID = $id;
      $ticket->title = $data['T.DJ']." | ".$data['T.session'];
      $ticket->start = $data['T.start'];
      $ticket->price = $data['T.price'];
      $ticket->end = $data['T.end'];
      $ticket->seats = $data['T.seats'];
      $ticket->venue = $data['V.venue'];
      $ticket->address = $data['V.address'];
      return $ticket;
    }

}
