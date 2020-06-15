<!DOCTYPE html>
<?php
ob_start();
$tickets = [];
?>
<html>
<?php require_once 'header.php'; ?>

<body>
<h1>HAARLEM FESTIVAL DANCE PROGRAM </h1>

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
							 header('Content-Type: text/html; charset=utf-8');
							 $dance_service = new Dance_Service();

							 $tickets= $dance_service->GetDanceTickets(); //tickets array

							 //sort array by day
							foreach ($tickets as $ticket) {
									$string = $ticket->date;
									$timestamp = strtotime($string);
									$day =  date("d", $timestamp);

							  }
							$ticket1 = new MultipleEventTicket(250, null,'3 Day Pass','Access to all Dance Events');
							$ticket1->PrintMultipleEventTicket();
							$ticket2 = new MultipleEventTicket(125, null,'Monday Pass','Access to all Dance Events for a single day');
							$ticket2->PrintMultipleEventTicket();
							$ticket3 = new MultipleEventTicket(125, null,'Tuesday Pass','Access to all Dance Events for a single day');
							$ticket3->PrintMultipleEventTicket();
							$ticket4 = new MultipleEventTicket(125, null,'Wendsday Pass','Access to all Dance Events for a single day');
							$ticket4->PrintMultipleEventTicket();
							 echo"<h2 class='ttable'>Time Table</h2>";
							 $date = new DateTime();
							 foreach ($tickets as $ticket) {
							 $startDate=$ticket->date;
							 //get date from date &  time from datetinme variable
							 if($date != date("d-M",strtotime($startDate))){
							 $date = date("d-M",strtotime($startDate));
								echo"<h2 class ='date'>$date</h2>";}

							 $ticket->PrintTimeTable();
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
								$cart_service->AddToCart(unserialize(base64_decode($_POST["ticket"])),$_POST["quantity"]);
						}

				echo "<section class ='section'>";
				echo "<h2 class ='eventHeading'>$dateHeading</h2>";
				foreach ($tickets as $key => $ticket) {

					$ticket->PrintTicket($key);

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
