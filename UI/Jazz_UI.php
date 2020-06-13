<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../Logic/MyAutoLoader.php';
require_once 'header.php';
$Jazz_landing_Page = 'index.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<form class='' action='index.php' method='post'>
		<table class = 'timetable' width = '90%'>
			<caption>Haarlem Festival Jazz Time Table</caption>
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
$JazzDAO = new Jazz_DAO();
$controller = new controller($JazzDAO);
$tickets= $controller->GetAll_JazzTickets(); //tickets array
sort($tickets);
echo "<tr>";
for ($day=26; $day < 30; $day++) {
	$tableData = new TableData($day,$tickets);
	$tableData->PrintTableData();
}
echo "</tr>";
 ?>
</table>
</form>

</body>
</html>
