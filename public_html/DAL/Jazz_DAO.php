<?php
class Jazz_DAO{

	private	$conn;
	public function __construct(){
		$instance = Config::getInstance(); // create an instance of the config class;
		$this->conn = $instance->getConnection(); // get database connection
	}
	public function Get_All_Jazz_Tickets_(){
		$sql = "SELECT ID, Price, start, end, artist, venue, seats, event_id
						FROM Jazz_Ticket";
						$results = $this->conn->query($sql);
						$numRows = $results->num_rows;

						if($numRows > 0){
							while($row = $results->fetch_assoc()){

							$data[] = new JazzTicket($row['artist'],$row['Price'], $row['seats'],new DateTime($row['start']),new DateTime($row['end']),$row['venue'],$row['start'],$row['ID']);
							}
							return $data;
						}
		}

public function SaveTransaction($transaction){
		$sql1 = "INSERT INTO Transaction (name,surname) VALUES (?, ?)";
		if($stmt = $this->conn->prepare($sql1)){
			try {
		$stmt->bind_param("ss", $param_name, $param_surname);
		$param_name = $transaction->name;
		$param_surname = $transaction->surname;
		} catch (\Exception $e) {
		echo $e->getMessage();
		}
		if($stmt->execute()){
			$sql2 = "SELECT IDENT_CURRENT('Customer')";
			$id = $this->conn->query($sql2);
			$sql3 = "INSERT INTO Customer (Id,eventID) VALUES ($id, 4)";
			$result = $this->conn->query($sql3);
			return $id; // token and email saved to the database
		}

}
	}
}
