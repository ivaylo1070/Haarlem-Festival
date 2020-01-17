
<?php
include_once 'config.php';
$dbconn = new config();
$conn = $dbconn->Connect();
class model{

// get tickets by day and event;
	public function GetTickets($date, $eventId){
		$sql = "SELECT *
						FROM ticket
						JOIN venue ON venue.venue=ticket.venue
						JOIN artist ON artist.name=ticket.artist
						WHERE DATE(end)='$date' AND 	event_id = $eventId";

		global $conn;
		$results = $conn->query($sql);
		$numRows = $results->num_rows;
		if($numRows > 0){
			while($row = $results->fetch_assoc()){
			$data[] = $row;
			}
			return $data;
		}
	}
}
