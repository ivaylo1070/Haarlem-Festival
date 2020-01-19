<?php
require_once("../Model/Dance.php");
require_once("cart_dal.php");

class Dance_dal extends cart_dal{


  function getTicketByID($id){
    $sql = "SELECT T.price,T.start,T.end,DJ.DJS,V.venue,V.address,T.seats,T.session
						FROM Ticket AS T
						JOIN venue ON venue.venue=ticket.venue AS V
            JOIN DJ ON DJ.ID=Dance.DJ
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

  public function GetDanceTickets($sort){
    $sql = "SELECT D.price,D.start,D.end,DJ.DJ,V.venue,V.address,D.seats,D.session
            FROM Dance AS D
            JOIN venue ON venue.venue=ticket.venue AS V
            JOIN DJ ON DJ.ID=Dance.DJ
            ORDER BY $sort";

    global $conn;
    $results = $conn->query($sql);
    $numRows = $results->num_rows;
    if($numRows > 0){
      while($row = $results->fetch_assoc()){
      $data[] = $row;
      }
      return $data;
    }
  }
}
