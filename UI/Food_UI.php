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

</html> 
<?php
   include "DAL/restaurant_dal.php";

   $d = restaurant_dal::getInstance();
   $datas=array();
   $datas= $d-> getAllRestaurants();


?>
