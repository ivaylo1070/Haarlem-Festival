<?php
session_start();
//session_unset();
include_once 'Model.php';
include_once 'controller.php';
$Jazz_landing_Page = 'index.php';
 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Jazz</title>
	</head>
<body>

<?php
$date='2020-07-28';
$eventId= 4;
$model = new model();
$controller = new controller($model);
$tickets = $controller->Get_Tickets($date,$eventId); //tickets array


// id add button is set get ticketI
if(isset($_GET['add'])){
	//increase quantity
	foreach ($tickets as $ticket) {

		if ($ticket['ID'] == $_GET['add']){
		if($ticket['seats'] != $_SESSION['ticket_'.$_GET['add']])
		{
		 $_SESSION['ticket_'.$_GET['add']] += 1;

	}
}
}
	header('Location:'.$Jazz_landing_Page);
}

//decrease quanty;
if(isset($_GET['subtract'])){
	 $_SESSION['ticket_'.$_GET['subtract']]--;
	header('Location:'.$Jazz_landing_Page);
}
	//delete an item from cart
	if(isset($_GET['delete'])){
		$_SESSION['ticket_'.$_GET['delete']]=0;
		header('Location:'.$Jazz_landing_Page);
	}

//  sort timetable by date (default display)
function DisplayTickets(){
	global $tickets;
	sort($tickets);
  echo	"<caption>".'COMPLETE JAZZ PROGRAM'."</caption>";
  echo "<tr>"."<th>".'Artist'."</th>"."<th>".'Start time'."</th>"."<th>".'End time'."</th>"."<th>".'Venue'."</th>"."<th>".'Seats'."</th>"."<th>".'Price'."</th>"."<th id=\"qty\">"."Select Quantity "."</th></tr>";
	foreach ($tickets as $ticket) {

		$ticketID = $ticket["ID"];
    //get date and time from the database;
		$EndDate= $ticket["end"];
    $StartDate=$ticket["start"];
    //get endtime
		$End_time= date("H:i",strtotime($EndDate));
    //get date from date &  time from datetinme variable
    $date = strtotime($StartDate);
    $Start_time =date("H:i",$date);
    $date = date('d/m/yy',$date);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($date==''){

      }

    }else{
      if($ticket['venue']=='Grote Markt'){
      echo "<tr><p class = \"alignleft\"><td>".$ticket["name"]."</td></p><p class = \"alignleft\"><td>".$Start_time."</td></p> <p class = \"alignleft\"><td>".$End_time."</td></p><p class = \"foatleft\"><td>".$ticket["venue"]."</td></p><p class = \"foatright\"><td>".'Open space'."</td></p><p class = \"foatright\"><td>".'Free'."</td></p></tr>";
	}else{

		echo "<tr><td>".$ticket["name"]."</td><td>".$Start_time."</td><td>".$End_time."</td><td>".$ticket["venue"]."</td><td>"."€".number_format($ticket["Price"],2)."</td><td>".$ticket["seats"]."</td>".
    "<td><a href=cart.php?subtract=".$ticketID.">[-]</a>"."<a href=cart.php?add=".$ticketID."> [+] </a><td></tr>";

	}

		}
	}
}


function Make_Payment(){
	$Total= 0;
	$num = 0;
	foreach ($_SESSION as $ticket => $quantity) {
		if ($quantity > 0){
			if (substr($ticket, 0, 7)=='ticket_'){
				//remove ticket name and get id;
				$id =	substr($ticket, 7, (strlen($ticket)-7));
				global $tickets; //tickets array
				//search and display for tickets using id
				foreach ($tickets as $ticket) {
          $StartDate=$ticket["start"];
          $date = strtotime($StartDate);
          $date = date('d/m/yy',$date);
					if($ticket['ID'] == $id){
							$num++;
						$total = $quantity * $ticket["Price"];
            //echo $ticket['name']."Qty = ". $quantity ." "."price = "."€".$ticket["Price"]."Total =". $total."  "."<a href=cart.php?subtract=".$id.">[-]</a>"."<a href=cart.php?add=".$id."> [+] </a>"."<a href=cart.php?delete=".$id.">remove </a>"."<br>";
						echo "<p><input type='text' value='".$num."'>"."<input type='text' value='".$ticket['name']."'>"."<input type='text' value='".$date."'>"."<input type='text' value='".$quantity."'>"."<input type='text' value='".$ticket['Price']."'>"."<input type='text' value='".$total."'></p>";

						//echo $num;
					}

				}

			}
      	$Total += $total;
		}
	}
  echo "<p><input type='text' value='".'Total'."  ". $Total."'>";
}

function Display_Cart_Items(){
	$Total= 0; //grand total;
	$total=0; //unit total
	foreach ($_SESSION as $ticket => $quantity) {
		if ($quantity > 0){
			if (substr($ticket, 0, 7)=='ticket_'){
				//remove ticket name and get id;
				$id =	substr($ticket, 7, (strlen($ticket)-7));
				global $tickets; //tickets array
				//search and display for tickets using id
				foreach ($tickets as $ticket) {
					if($ticket['ID'] == $id){
						$total = $quantity * $ticket["Price"];
						echo $ticket['name']."Qty = ". $quantity ." "."price = "."€".$ticket["Price"]."Total =". $total."  "."<a href=cart.php?subtract=".$id.">[-]</a>"."<a href=cart.php?add=".$id."> [+] </a>"."<a href=cart.php?delete=".$id.">remove </a>"."<br>";
					}
				}
			}
				$Total += $total;
		}
	}
	if($Total == 0){
		echo "<p class=cartempty>".'Your cart is empty'."</p>";
	}else{
	echo "Total in Cart"."   ". $Total;
	echo "<p>"."<a href=payment.php?Checkout=1>Checkout<a/>"."</p>";

}
}
Display_Cart_Items();
//Make_Payment();

?>
</html>
</body>
