<?php
require 'cart.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>home</title>
<link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
</head>
<body>
	<?php require("UI/header.php")?>
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
	<form class="" action="cart.php" method="post">
		<a href="cart.php">view cart</a>
	</form>
<table>

<?php
	//Display_Cart_Items();
	DisplayTickets();
?>

</table>
</body>
</html>
