
<?php
class config{
private $servername;
private $username;
private $password;
private $dbhname;

public function Connect(){
		$this->servername = "localhost";
		$this->username = "hfitteam4_user";
		$this->password = "b6YMJTmc";
		$this->dbhname = "hfitteam4_db";

		$conn = new mysqli($this->servername,$this->username,$this->password,$this->dbhname);

		if (!$conn) {
			die ("connection failed ".mysqli_connect_error());
		}
		return $conn;
	}
}
?>
