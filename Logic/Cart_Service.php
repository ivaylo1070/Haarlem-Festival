<?php

require_once("../Model/Ticket.php");
require_once("../DAL/cart_dal.php");
$dance_dal= new Dance_dal();
$jazz_dal= new Jazz_dal();
$reservation_dal= new Reservation_dal();

public function saveCart($cart){
  setcookie('cart', 'serialize($cart)', time() + 60*100000, '/');
}

//for updated information
public function ReadCart(){
  $basicCart = unserialize($_COOKIE['cart']);
  $tickets = [];
  foreach ($basicCart as $id => $quantity){
    $ticket = getTicketByID($id);
    $tickets[$ticket->ticketID] = $ticket;
  }
  $_SESSION["cart"]=$tickets;
}

public function ClearCart(){
  setcookie('cart', 'serialize($cart)', time() - 60*100000, '/');
}

public function AddToCart($ticket){
  if($ticket->quantity > 0){
    if(!empty($_SESSION["cart"][$ticket->ticketID])){
      $_SESSION["cart"][$ticket->ticketID]->quantity = $ticket->quantity;
      //update cart ticket quantity if it already exists.
    }
    else{
      $_SESSION["cart"][$ticket->ticketID] = $ticket;
      //otherwise creates new ticket.
    }
  }
  else{
    if(!empty($_SESSION["cart"][$ticket->ticketID])){
      unset($_SESSION["cart"][$ticket->ticketID]);
      // delete from array when quantity is 0.
    }
  }
saveCart($_SESSION["cart"]);
//update cookie

}

public function RemoveFromCart($ticket){
  if($ticket->quantity > 0){
    if(!empty($_SESSION["cart"][$ticket->ticketID])){
      $_SESSION["cart"][$ticket->ticketID]->quantity = $ticket->quantity;
    }
    else{
      $_SESSION["cart"][$ticket->ticketID] = $ticket;
    }
  }
}
