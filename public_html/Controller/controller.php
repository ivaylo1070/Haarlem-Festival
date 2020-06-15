
<?php
class controller{
private $Jazz_Service;

public function __construct(){
	$this->Jazz_Service = new Jazz_Service();
}
//get all jazz tickets
	public function GetAll_JazzTickets(){
		$result = $this->Jazz_Service->Get_All_Jazz_Tickets();
	return $result;
	}
   /* jazz home time table*/
	public function Print_Time_Table($day,$tickets){
		$result = $this->Jazz_Service->Print_Time_Table_($day,$tickets);
	return $result;
	}

	public function Save_Transaction_($transaction){
	  $result = $this->Jazz_Service->Save_Transaction($transaction);
	return $result;
	}
}
