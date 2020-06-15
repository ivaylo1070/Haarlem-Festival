<?php
class Jazz_DAO{

	private	$conn;
	public function __construct(){
		$instance = Config::getInstance(); // create an instance of the config class;
		$this->conn = $instance->getConnection(); // get database connection
	}
// get all jazz tickets;
	public function Get_All_Jazz_Tickets(){
		$sql = "SELECT *
						FROM Jazz_Ticket
						JOIN Venue ON Venue.venue=Jazz_Ticket.venue
						JOIN artist ON artist.name=Jazz_Ticket.artist";

						$results = $this->conn->query($sql);
						$numRows = $results->num_rows;

						if($numRows > 0){
							while($row = $results->fetch_assoc()){
							$data[] = $row;
							}
							return $data;
						}
		}
public function SaveTransaction($name,$surname){
		$sql1 = "INSERT INTO customer (name,surname) VALUES (?, ?)";
if($stmt = $this->conn->prepare($sql1)){
	try {
		$stmt->bind_param("ss", $param_name, $param_surname);
		$param_name = $name;
		$param_surname = $surname;
	} catch (\Exception $e) {
		echo $e->getMessage();
	}
		if($stmt->execute()){
			$sql2 = "SELECT IDENT_CURRENT('customer')";
			$id = $this->conn->query($sql2);
			$sql3 = "INSERT INTO transaction (Id,eventID) VALUES ($id, 4)";
			$result = $this->conn->query($sql3);
			return true; // token and email saved to the database
		} else{
			return false; // did not save
		}

}
	}
}
