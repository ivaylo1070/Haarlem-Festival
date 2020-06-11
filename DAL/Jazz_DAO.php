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
						FROM ticket
						JOIN venue ON venue.venue=ticket.venue
						JOIN artist ON artist.name=ticket.artist";

						$results = $this->conn->query($sql);
						$numRows = $results->num_rows;

						if($numRows > 0){
							while($row = $results->fetch_assoc()){
							$data[] = $row;
							}
							return $data;
						}
		}
	}
