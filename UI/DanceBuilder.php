<?php
require_once("TicketBuilder.php");
class DanceBuilder extends TicketBuilder{

  function PrintTicket($ticket){
      echo "<body>
            <form id=\"ticket\">

              <input type=\"hidden\" name=\"name[]\">

              <label id=\"title\">$ticket->title</label>
              <label id=\"price\">$ticket->price</label></br>

              <img src=\"../Img/ticket_time.png\" id=\"imgtime\"/>
              <label><p id=\"time\">$ticket->start - $ticket->end</p></label>
              <label id=\"quantity\">ammount <button type=\"button\"> - </button><input type=\"number\" name=\"quantity\" value=\"$ticket->quantity\"><button type=\"button\"> + </button> seats: $ticket->seats</label>
              <img src=\"../Img/ticket_pin.png\" id=\"imgloc\"/>
              <label><p>$ticket->venue</br>$ticket->address</p></label>
              <button type=\"button\" id=\"addtocart\"> add to cart </button>

            </form>

            </body>";
  }
}
