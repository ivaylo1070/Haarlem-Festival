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
<style>
* {
  box-sizing: border-box;
}

.column {
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
	background-color: #FFFFFF;



}

caption{
  padding: 15px;
	font-size: 40px;
	font-weight: bold;
}
.buyticketbtn{
	display: block;
	margin: auto;
	background-color: #B25900;
  border-color:  #B25900;
	color: white;
	cursor: pointer;
	font-size: 18px;
	width: 200px;
	height: 40px;
	border-radius: 5px;
}
.artist{
	text-indent: 15%;
	line-height: 50%;
}
.indentvenue{
	text-indent: 10%;
		line-height: 50%;
			margin-top: 0%;
			padding-top: 0px;
}

.form{
	border: 1px solid;
  border-color: #A99678;
	background-image: url(../Img/jazz1.jpg);
	background-repeat: no-repeat; repeat;
	background-size: 100% 100%;
	background-position: center;

}
a{
  text-decoration: none;
}
</style>
</head>
<body>
	<form class='form' action='index.php' method='post'>
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
