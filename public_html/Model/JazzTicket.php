<?php

//define('server',$_SERVER["PHP_SELF"]);

class JazzTicket extends Ticket{
  public $start_time;
  public $end_time;
  public $date;


  public function __construct($artist, $price, $seats,$start_time,$end_time,$venue,$date,$id) {
    $this->title = $artist;
    $this->price = $price;
    $this->seats = $seats;
    $this->start_time = $start_time;
    $this->end_time = $end_time;
    $this->venue = $venue;
    $this->date = new DateTime($date);
    $this->ticketID = $id;
    parent::__construct($start_time->getTimestamp(),$end_time->getTimestamp());
  }


  public function PrintTicket(){
    $timestamp = $this->date->getTimestamp();
    $date = date("d",$timestamp);
    if($this->venue == 'Grote Markt'){
      echo "<form class= 'ticketForm'>
          <table style='width:100%' bgcolor = '#C4C4C4'>
         <tr>
           <th></th>
           <th></th>
           <th></th>
         </tr>
         <tr>
           <td width = '50%' class='artist'>$this->title</td>
         </tr>
         <tr>
           <td>Date: $date |  Time: $this->period</td>
           <td class = 'seats_label'align ='center'>€ 0.00</td>
           <td>
           <section>

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
         </tr>
        </table>
        </form>";
    }else{
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
           <td>Date: $date |  Time: $this->period</td>
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
           <td> <input class ='button1' type='submit' value='Add to cart' name = 'add_to_cart'></td>
         </tr>
        </table>
        <input type='hidden' name='ticket' value='".base64_encode(serialize($this))."'>
        </form>";
      }


    }
    public function printTimeTable(){
            echo "<p class = 'timetablerow'>$this->period $this->title</p>";
    }
}



 ?>
