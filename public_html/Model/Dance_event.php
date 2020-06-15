<?php

class Dance_Event
{
private $id;
private $address;
private $opening_time;
private $closing_time;
private $seats;
private $price;
private $image;
private $session;

function __construct($ID,$Address,$Opening_time,$Closing_time,$Seats,$Price,$Image,$Session)
{
  $this->id=$ID;
  $this->address=$Address;
  $this->opening_time=$Opening_time;
  $this->closing_time=$Closing_time;
  $this->seats=$Seats;
  $this->price=$Price;
  $this->image=$Image;
  $this->session=$Session;
}
function SetAddress($Address)
{
  $this->address=$Address;
}
function GetAddress()
{
  return $address;
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
function SetImage($Image)
{
  $this->image=$image;
}
function GetImage()
{
  return $image;
}
function SetSession($Session)
{
  $this->session=$Session;
}
function GetSession()
{
  return $session;
}
}
 ?>
