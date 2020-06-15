<?php
include(realpath(dirname(__FILE__) . '/../UI') . "/Display.php"); 
 //session_start();
echo "<link rel='stylesheet' type='text/css' href='css/Style_resto.css' />";
// relationship between user input and db
include('food_logic.php');
$food_service = new Food_logic(); 
$datas;
             echo   "<section class=\"flex-container\">";
             if(isset($_GET['type']))
             {
             	$datas= $food_service-> GetRestrntBytype($_GET['type']);
				// echo   "<section class=\"flex-container\">";
		             foreach ($datas as $data) 
		             {
		               DisplayDataInFormattedHtml($data['image'],$data['Name'],$data['Address'],$data['OpeningTime'],$data['Closingtime'],$data['Stars'],$data['Price'],$data['FoodType'],$data['ID'],$data['Seats']);
		             }
	              //echo "</section>";
             }
             else
             {
             	$datas= $food_service-> GetAllRestrnt();
	             foreach ($datas as $data) 
	             {
	               DisplayDataInFormattedHtml($data['image'],$data['Name'],$data['Address'],$data['OpeningTime'],$data['Closingtime'],$data['Stars'],$data['Price'],$data['FoodType'],$data['ID'],$data['Seats']);
	             }
            
             }
               echo "</section>";
?>
