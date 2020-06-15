<?php


class Cart_Service{

  public function __construct(){

  }
  public function saveCart($cart){
    setcookie('cart', '', -3600, '/');
    setcookie('cart', serialize($cart), time() + 60*100000, '/');
  }

  //for updated information
  public function ReadCart(){
    if (isset($_COOKIE["cart"])){
      $basicCart = unserialize($_COOKIE['cart']);
      $tickets = [];
      foreach ($basicCart as $id => $quantity){
        $ticket = getTicketByID($id);
        $tickets[$ticket->ticketID] = $ticket;
      }
      $_SESSION["cart"]=$tickets;
      $this->saveCart($_SESSION["cart"]);

    }
    else {
      $cart = [];
      $this->saveCart($cart);
    }
  }

  public function ClearCart(){
    setcookie('cart', 'serialize($cart)', time() - 60*100000, '/');
  }

  public function AddToCart($ticket,$quantity){
    $ticket->SetQuantity($quantity);
    $_SESSION["cart"][]= $ticket;
    $_SESSION["cart"] = array_values($_SESSION["cart"]);
    $this->saveCart($_SESSION["cart"]);
    //update cookie

  }

  public function RemoveFromCart($key,$ticket){
    unset($_SESSION["cart"][$key]);
    $_SESSION["cart"] = array_values($_SESSION["cart"]);
    $this->saveCart($_SESSION["cart"]);
    //update cookie
  }

}
