
<?php
class controller{
private $Jazz_DAO;

public function __construct($Jazz_DAO){
	$this->Jazz_DAO = $Jazz_DAO;
}
//get all jazz tickets
	public function GetAll_JazzTickets(){
		$result = $this->Jazz_DAO->Get_All_Jazz_Tickets();
	return $result;
	}
}
