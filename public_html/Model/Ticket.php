<?php

abstract class Ticket{

  public $ticketID; // stored in cookie for fetching cart from db
  public $title;
  public $period; // start and end time of the event
  public $price;
  public $quantity; // cart item quantity, stored in cookie
  public $seats;
  public $venue;


  public function __construct($start_time,$end_time) {
    $this->period = date("H:i",$start_time) . " - " . date("H:i",$end_time);
    $this->quantity = 0;

  }

  function SetQuantity($quantity)
  {
    $this->quantity=$quantity;
  }

  public function PrintTicketInCart($key)
  {
      echo "<form class= 'ticketForm' action' = 'index.php' method = post>
      <table style='width:100%' bgcolor = '#C4C4C4'>
         <tr>
           <th></th>
           <th></th>
           <th></th>
         </tr>
         <tr>
           <td width = '50%' class='artist'>$this->title</td>
           <td width = '28%'align ='right'>€ $this->price</td>
           <td width = '22%'>Available Seats: $this->seats</td>
         </tr>
         <tr>
           <td>Date: Time: $this->period</td>
           <td class = 'seats_label'align ='right'>Quantity</td>
           <td>
           <section>
           <div class='value-button' id='decrease' onclick='decreaseValue()' value='Decrease Value'></div>
           <input type='number' name ='quantity' id='number' value='$this->quantity' size='4' class ='quantity' />
           <div class='value-button' id='increase' onclick='increaseValue()' value='Increase Value'></div>
           </section>
           </td>
         </tr>
         <tr>
           <td>$this->venue</td>
           <td></td>
           <td></td>
         </tr>
         <tr>
           <td></td>
           <td></td>
           <td> <input class ='button2' type='submit' value='remove' name = 'remove_from_cart'></td>
         </tr>
        </table>
        <input type='hidden' name='ticket' value='".serialize($this)."'>
        <input type='hidden' name='key' value='$key'>

        </form>";
      }

      public function printTimeTable(){
        echo "<p class = 'timetablerow'> $this->period $this->title </p>";
      }
}
