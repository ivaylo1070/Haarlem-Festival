<?php

class Jazz_Service{

  private $id = 0;
  private $venue;
  private $btn;
  private $Jazz_DAO;
  private $day;

public function __construct(){
  $this->Jazz_DAO = new Jazz_DAO();
}

public function Get_All_Jazz_Tickets(){
  $result = $this->Jazz_DAO->Get_All_Jazz_Tickets_();
return $result;
}


public function Save_Transaction($transaction){
  $result = $this->Jazz_DAO->SaveTransaction($transaction);
return $result;
}

public function Print_Time_Table_($day,$tickets)
{
  $this->day = $day;

  echo "<td class = 'tdticket'>";
      // check for day
       if($day == 29){
         $this->venue = 'Grote Markt';
         $this->btn= 'Free for all';
       }else{
         $this ->venue = 'Patronaat Hall';
         $this->btn = 'Buy ticket(s)';
       }
       // print table data heading;
      echo "<h2 class = 'indentvenue'>$this->venue</h2>";
      foreach ($tickets as $ticket) {
        $timestamp = $ticket->date->getTimestamp();
        $date = date("d",$timestamp);
      // check for day
      if($date == $this->day){
        $ticket->printTimeTable();
       }
        }

        if($this->day == 26){
          $this->id = 1;
        }elseif($this->day == 27){
          $this->id = 2;
        }elseif($this->day == 28){
          $this->id = 3;
        }else{
          $this->id =4;
        }

// display buy button;
echo" <a href='buyTickets.php?day=$this->id'><input type='button'  class='buyticketbtn' value='$this->btn'> </a>
</td>";
}
}
