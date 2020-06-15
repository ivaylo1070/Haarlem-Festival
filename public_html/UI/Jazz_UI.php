<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../Logic/MyAutoLoader.php';
?>
<!DOCTYPE html>
<html>
  <?php require_once 'header.php'; ?>

<body>

  <h1 class="headingJazz">Haarlem Festival Jazz Time Table</h1>
	<form class = 'form' action='index.php' method='post'>
		<table class = 'timetable' width = '90%'>

			<tr>
				<th class ='timetableHeading'>
					26 July Thursday
				</th>
				<th class ='timetableHeading'>
					27 July Friday
				</th>
				<th class ='timetableHeading'>
					28 July Saturday
				</th>
				<th class ='timetableHeading'>
					29 July Sunday<br>
					Free Shows
				</th>
				<tr>
<?php
$controller = new controller();
$tickets= $controller->GetAll_JazzTickets(); //tickets array
echo "<tr class = 'rowJazz'>";
for ($day=26; $day < 30; $day++) {
	$controller->Print_Time_Table($day,$tickets);
}
echo "</tr>";
 ?>
</table>
</form>

</body>

</html>
