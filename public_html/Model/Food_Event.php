<?php

class Food_Event extends Ticket
{
  private $opening_time;
  private $closing_time;
  private $stars;
  private $food_type;
  private $image;

  function __construct($ID,$Name,$Address,$Opening_time,$Closing_time,$Stars,$Seats,$Price,$Food_type,$Image)
  {
    $this->ticketID=$ID;
    $this->title=$Name;
    $this->venue=$Address;
    $this->opening_time=$Opening_time;
    $this->closing_time=$Closing_time;
    $this->stars=$Stars;
    $this->seats=$Seats;
    $this->price=$Price;
    $this->food_type=$Food_type;
    $this->image=$Image;
    parent::__construct($Opening_time,$Closing_time);
  }
  function SetName($name)
  {
    $this->title=$name;
  }
  function GetName()
  {
    return $title;
  }
  function SetAddress($Address)
  {
    $this->venue=$Address;
  }
  function GetAddress()
  {
    return $venue;
  }
  function SetOpeningTime($Opening_time)
  {
    $this->opening_time=$Opening_time;
  }
  function GetOpeningTime()
  {
    return $opening_time;
  }
  function SetClosingTime($Opening_time)
  {
    $this->closing_time=$Closing_time;
  }
  function GetClosingTime()
  {
    return $closing_time;
  }
  function SetStars($Stars)
  {
    $this->stars=$Stars;
  }
  function GetStars()
  {
    return $stars;
  }
  function SetSeats($Seats)
  {
    $this->seats=$Seats;
  }
  function GetSeats()
  {
    return $seats;
  }
  function SetPrice($Price)
  {
    $this->price=$Price;
  }
  function GetPrice()
  {
    return $price;
  }
  function SetFoodType($Food_type)
  {
    $this->food_type=$Food_type;
  }
  function GetFoodType()
  {
    return $food_type;
  }
  function SetImage($Image)
  {
    $this->image=$image;
  }
  function GetImage()
  {
    return $image;
  }
}

?>
