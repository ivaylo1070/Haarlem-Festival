<?php
include(realpath(dirname(__FILE__) . '/../UI') . "/Display.php"); 
 //session_start();
echo "<link rel='stylesheet' type='text/css' href='css/Style_resto.css' />";
// relationship between user input and db
include('food_logic.php');
$food_service = new Food_logic(); 
$datas= $food_service-> GetAllRestrnt();
             echo   "<section class=\"flex-container\">";
             foreach ($datas as $data) 
             {
               DisplayDataInFormattedHtml4($data['image'],$data['Name'],$data['Address'],$data['OpeningTime'],$data['Closingtime'],$data['Stars'],$data['Price'],$data['FoodType'],$data['id'],$data['Seats']);
             }
              echo "</section>";
?>
