<?php
require_once '../Logic/MyAutoLoader.php';
ob_start();
session_start();
$Jazz_landing_Page = 'index.php';
?>
<!DOCTYPE html>
<html>
<?php require_once 'header.php';?>


<body>
<h1>CART </h1>


						 <a href="payment.php">Make payment</a>

						 <main class= 'body'>

      <?php
			  echo "<section class ='section'>";

				  foreach ($_SESSION["cart"] as $key => $item)
          {
            $item->PrintTicketInCart($key);
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

<?php if(isset($_POST['remove_from_cart'])){
	$message = 'Item removed from cart';
	$cart_service->AddToCart($_POST["key"]);



}?>
