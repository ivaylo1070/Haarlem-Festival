<?php
class Dance_DAO {

    private	$conn;

    public function __construct(){
      header('Content-Type: text/html; charset=utf-8');
      $instance = Config::getInstance(); // create an instance of the config class;
      $this->conn = $instance->getConnection(); // get database connection
    }

    function getTicketByID($id){
      header('Content-Type: text/html; charset=utf-8');
      $sql = "SELECT D.price,D.start,D.end,V.venue,V.address,D.seats,D.session
  						FROM Dance AS D
  						JOIN Venue AS V ON V.venue=D.venue
  						WHERE D.ID = $id";

      $data = $conn->query($sql);
      $numRows = $results->num_rows;
      if($numRows = 1){
        return $this->ReadData($data,$id);
      }
    }

    function getDJs($id){
      $sql = "SELECT DJ.name
              FROM DJ_Dance AS DD
              JOIN DJ AS DJ ON DJ.ID=DD.DJ_id
              WHERE DD.dance_id = $id";

              $title="";
              $results = $this->conn->query($sql);
              $numRows = $results->num_rows;
              if($numRows > 0){
                while($row = $results->fetch_assoc()){
                  if($title == ""){$title .= $row["name"];}
                  else{$title .= "/".$row["name"];}
                  }
              }
              return $title;
    }

    public function GetDanceTickets(){
      header('Content-Type: text/html; charset=utf-8');
      $sql = "SELECT D.ID,D.price,D.start,D.end,V.venue,V.address,D.seats,D.session
              FROM Dance AS D
              JOIN Venue AS V ON V.venue=D.venue
              ORDER BY D.start";

      $results = $this->conn->query($sql);
      $numRows = $results->num_rows;
      $data = array();
      if($numRows > 0){
        while($row = $results->fetch_assoc()){
          array_push($data, $this->ReadData($row,$row["ID"]));
        }
      }
      return $data;
    }

    public function ReadData($row,$id){
      return new Dance($this->getDJs($id)." | ".$row['session'], $row['price'], $row['seats'],new DateTime($row["start"]),new DateTime($row["end"]),$row['venue'],$row['address'],$row["start"],$id);
    }


}

?>
