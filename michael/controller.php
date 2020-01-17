
<?php
class controller{
private $model;
//constructor
public function __construct($model){
	$this->model = $model;
}
//get tickets by day and event
	public function Get_Tickets($date,$eventId){
		$result = $this->model->GetTickets($date,$eventId);
	return $result;
	}
}
