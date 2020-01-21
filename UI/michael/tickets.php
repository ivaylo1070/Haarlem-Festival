<?php
include_once 'config.php';
include_once 'DAL.php';
include_once 'controller.php';
include_once 'day.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>home</title>
		<style><?php include 'css/mystyle.css'; ?></style>
	</head>
	<body>
		<form class="" action="index.php" method="post">
			<input type="submit" name="home" value="Home">
		</form>
    <caption><?php echo  $day." ".'jazz events'.", venue :"." ".$venue ?></caption>
    <table>
      <tr>
        <th>Date</th>
        <th>Band</th>
				<th>start time</th>
        <th>end time</th>
				<th>venue</th>
				<th>seats</th>
        <th>Price</th>
      </tr>
		<?php
		$displaytickets = new controller();
		$result = $displaytickets->GetTickets($artist);
    foreach ($result as $row) {
    echo "<tr><td>".$row["Price"]."</td><td>".$row["start"]."</td><td>".$row["end"]."</td><td>".$row["artist"]."</td><td>".$row["venue"]."</td><td>".$row["address"]."</td></tr>";
    }
		?>
  </table>
	<form>
  <indput onclick="decreaseValue()">
  <input type="number" id="number" value="1"/>
</form>
	</body>
</html>
