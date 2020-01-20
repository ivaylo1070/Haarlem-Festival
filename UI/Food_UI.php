<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="../css/style.css">
  <?php require("header.php")?>
</head>
<body>
 <h3>A beautiful historic city center</h3>
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
        <input type="submit" name="filter" onclick="myFunction()" value="Filter food type">
    </form>

</body>
<?php
    require_once("Dal.php");
    require_once 'restaurant _dal.php';
    require_once 'Display.php';
    echo "<link rel='stylesheet' type='text/css' href='css/style.css' />";
    session_start();

    $a=$_GET['type'];
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
        }
?>
 <footer>
  <h2>Footer</h2>
 </footer>
</html> 

