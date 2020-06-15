<?php
require_once("Ticket.php");

class Dance extends Ticket{

  public $end;
  public $address;
  public $date;


  public function __construct($title, $price, $seats,$start_time,$end_time,$venue,$address,$date,$id) {
    $this->title = $title;
    $this->price = $price;
    $this->seats = $seats;
    $this->venue = $venue;
    $this->address = $address;
    $this->date = $date;
    $this->ticketID = $id;
    parent::__construct($start_time->getTimestamp(),$end_time->getTimestamp());
  }

  public function PrintTicket()
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
           <td>$this->address</td>
           <td></td>
         </tr>
         <tr>
           <td></td>
           <td></td>
           <td> <input class ='button1' type='submit' value='add to cart' name = 'add_to_cart'></td>
         </tr>
        </table>
        <input type='hidden' name='ticket' value='".base64_encode(serialize($this))."'>

        </form>";
      }
}

?>
