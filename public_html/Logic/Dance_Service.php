<?php

class Dance_Service{

  function GetDanceTickets(){
    $dance_DAO = new Dance_DAO();

    return $dance_DAO->GetDanceTickets(); //tickets array

  }
}
