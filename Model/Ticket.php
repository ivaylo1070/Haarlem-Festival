<?php

abstract class Ticket{

  public $ticketID; // stored in cookie for fetching cart from db
  public $title;
  public $start; // start date and time of the event
  public $price;
  public $quantity; // cart item quantity, stored in cookie
}
include_once("Jazz.php");
include_once("Dance.php");
include_once("Reservation.php");
