<?php
ob_start();
require_once '../Logic/MyAutoLoader.php';
require_once 'header.php';
$Jazz_landing_Page = 'index.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>home</title>

</head>
<body>
<h1>HAARLEM FESTIVAL JAZZ PROGRAM </h1>
            <ul>
                <li><a href="?day=1" name="thursady">Thursday</a></li>
                <li><a href="?day=2" name="friday">Friday</a></li>
                <li><a href="?day=3" name="saturday">Saturday</a></li>
                <li><a href="?day=4" name="sunday">Sunday</a></li>
								<li><a href="JazzLandingPage.php" name="Home">Home</a></li>

            </ul>

						<form>
								<p>
								<label for="">Sort by</label>
						    <input type="radio"name="sort" checked>
						    <label for="date"> Date </label>
						    <input type="radio"name="sort">
						    <label for="artist">Artist</label>
							</p>
						</form>
						 <a href="payment.php">Make payment</a>

						 <main class= 'body'>
						 <aside class="aside">
							 <h2 class ='cheapTicketsh2'>DISCOUNTED TICKETS</h2>

							 <?php
							 $JazzDAO = new Jazz_DAO();
							 $controller = new controller($JazzDAO);
							 $tickets= $controller->GetAll_JazzTickets(); //tickets array

							 //sort array by day
							foreach ($tickets as $key => $part) {
									$string = $part['start'];
									$timestamp = strtotime($string);
									$day =  date("d", $timestamp);
							       $sort[$key] = $day;
							  }
							  array_multisort($sort, SORT_ASC, $tickets);
							 $venue = "";
							$ticket3 = new MultipleEventTicket(85, 200,'3 Day Pass','Access to all shows');
							$ticket3->PrintMultipleEventTicket();
							$ticket1 = new MultipleEventTicket(35, 150,'One Day Pass','Access to all shows for a single day');
							$ticket1->PrintMultipleEventTicket();
							 echo"<h2 class='ttable'>Time Table</h2>";
							 foreach ($tickets as $ticket) {
							 //get date and time from the database;
							 $endDate= $ticket["end"];
							 $startDate=$ticket["start"];
							 //get endtime
							 $end_time= date("H:i",strtotime($endDate));
							 //get date from date &  time from datetinme variable
							 $date = strtotime($startDate);
							 // get concert start time
							 $start_time =date("H:i",$date);
							 // get perfoming band;
							 $artist= $ticket['artist'];
							 $date = date('d M yy',$date);

							 $timeTable = new TimeTable($start_time,$end_time,$artist,"");
							 if($venue != $ticket['venue'] ){
								 $venue = $ticket['venue'];
								echo"<h2 class ='date'>$date</h2>";
								echo"<h3 class = 'indentvenue'>$venue</h3>";

							 }
							 $timeTable->PrintTimeTable();
						 }
						echo "</aside>";
						$id=0;
						$eventDate = $dateHeading="";
						 if(isset($_GET['day']) || isset($_GET['success'])){
							 if($_GET['day'] == '1'){
							 $eventDate = '26 Jul 2020';
							 $dateHeading = "Thursday".' '.$eventDate;
							 $id =1;
						 }elseif($_GET['day'] == '2'){
							 $eventDate = '27 Jul 2020';
							 $dateHeading = "Friday".' '.$eventDate;
							 $id =2;
						 }elseif($_GET['day'] == '3'){
							 $eventDate = '28 Jul 2020';
							 $dateHeading = "Saturday".' '.$eventDate;
							 $id =3;
						 }else{
							 $eventDate = '29 Jul 2020';
							 $dateHeading = "Sunday".' '.$eventDate.' - '. 'All Shows Free';
							 $id =4;
						 }
						 }
							if(isset($_POST['add_to_cart'])){
								$message = 'Item added to cart';
								$items = array(
									'id'			 => $_POST['id'],
									'artist'	 => $_POST['artist'],
									'venue' 	 => $_POST['venue'],
									'date' 		 => $_POST['date'],
								'start_time' => $_POST['start_time'],
									'end_time' => $_POST['end_time'],
									'quantity' => $_POST['quantity'],
									'price' 	 => $_POST['price']
								);
								$cart_items[] = $items;
								$items_data = json_encode($cart_items);
								setcookie('cart',$items_data,time()+3600);
								header('Location:buyTickets.php?day='.$id);


						}

				echo "<section class ='section'>";
				echo "<h2 class ='eventHeading'>$dateHeading</h2>";
				foreach ($tickets as $ticket) {
			    //get date and time from the database;
					$endDate= $ticket["end"];
			    $startDate=$ticket["start"];
			    //get endtime
					$end_time= date("H:i",strtotime($endDate));
			    //get date from date &  time from datetinme variable
			    $date = strtotime($startDate);
			    $start_time =date("H:i",$date);
			    $date = date('d M yy',$date);
					$jazz_ticket = new JazzTicket($ticket['name'],$ticket['Price'],$ticket['seats'],$start_time, $end_time, $ticket['venue'],$date,$ticket["ID"]);
					if($date == $eventDate){
					$jazz_ticket->PrintTicket();
				}
				}

				echo "</section>";
				ob_flush();
				?>
				<div class ='otherEvents'>
			    <table class = 'otherEventstable'>
			    	<caption class ='otherEventsCaption'>You may also like</caption>
			    	<tr>
			    		<th class ='otherEventsHeading'>
			          Historic Tour
			    		</th>
			    		<th class ='otherEventsHeading'>
			          Food
			    		</th>
			    		<th class ='otherEventsHeading'>
			    			Dance
			    		</th>
			    	</tr>
			    <tr>
			    	<td class="column">
			        <img  class="column" src="../Img/historic.jpg" alt="">
			    		<input type="submit" class="findoutmore" value="Find out more">
			    </td>
			    <td class="column">
			      <img class="column" src="../Img/food.jpg" alt="">
			    	<input type="submit" class="findoutmore" value="Find out more">
			    </td>
			    <td class="column">
			      <img class="column" src="../Img/dance.jpg" alt="">
			    	<input type="submit" class="findoutmore" value="Find out more">
			    </td>
			    </table>
				</div>
			</main>


</body>
</html>
