<?php
require_once("../Logic/Cart_Service.php");
require_once("../UI/DanceBuilder.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>home</title>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<body>
	<?php require("header.php")?>
	<section>
			<h1>HAARLEM FESTIVAL DANCE PROGRAM </h1>
			<form>
					<p>
					<label for="">Sort by</label>
			    <label><input type="radio"name="sort" checked> Date </label>
			    <label><input type="radio"name="sort">Artist</label>
				</p>
			</form>

		  <h1>WWF</h1>
		  <p>The World Wide Fund for Nature (WWF) is....</p>

<?php

  foreach ($_SESSION["cart"] as $item){
      $item_price = $item["quantity"]*$item["price"];
	?>
			<tr>
			<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
			<td><?php echo $item["code"]; ?></td>
			<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
			<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
			<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
			<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
			</tr>
			<?php
			$total_quantity += $item["quantity"];
			$total_price += ($item["price"]*$item["quantity"]);
				}
				?>
	</section>

</body>
</html>
