<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="../css/style.css">

  <?php require("header.php")?>
</head>
<body>
 <form action="" method="GET">
      <label class="checkbox-inline">
      <input type="checkbox" name="type" value="European" id="myCheck" >European
      </label>
      <label class="checkbox-inline">
        <input type="checkbox" name="type" value="seafood" id="myCheck">Seafood
      </label>
      <label class="checkbox-inline">
        <input type="checkbox" name="type" value="All" id="myCheck">All
      </label>
        <input type="submit" name="type" value="Filter food type">
    </form>

</body>

</html> 
<?php
   include(realpath(dirname(__FILE__) . '/../DAL') . "/restaurant_dal.php");
   //include('../DAL/restaurant_dal.php');

   $dal = new restaurant_dal();
   $datas=array();
   $datas= $dal->getAllRestaurants();

     /*  $a=$_GET['type'];
        $dal = Dal::getInstance();
        $datas=array();
        if($a=='All' || empty($a))
        {
          $datas= $dal-> getAllRestaurants();
            echo   "<section class=\"flex-container\">";
             foreach ($datas as $data) 
             {
               DisplayDataInFormattedHtml4($data['image'],$data['Name'],$data['Address'],$data['OpeningTime'],$data['Closingtime'],$data['Stars'],$data['Price'],$data['FoodType'],$data['id']);
             }
              echo "</section>";
        }
        else
         {
          $datas = $dal->getRestaurantByFoodType($a);
           echo   "<section class=\"flex-container\">";
             foreach ($datas as $data) 
             {
               DisplayDataInFormattedHtml4($data['image'],$data['Name'],$data['Address'],$data['OpeningTime'],$data['Closingtime'],$data['Stars'],$data['Price'],$data['FoodType'],$data['id']);
             }
              echo "</section>";
          }*/



?>
