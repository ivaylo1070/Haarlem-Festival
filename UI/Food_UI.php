<?php
ob_start(); 
session_start();
require("header.php"); // Includes reservation  Script

$link_address = "";
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta name="description" content="make online reservation for eating outside via our reservation system ">
    <meta name="keywords" content="resrvation ,dinner outside , eating , European cuisine , dutch food , french food">
    <link href="style/cms_login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Haarlem festival</title>
  </head>

<body>
    <form action="" method="GET" background-color="red">
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
    <?php include('../Logic/food_service.php');
      if(isset($_POST['reserve']))
      {
            $_SESSION["ProdctID"] =$_POST['ProdctID'] ;
            $_SESSION["Menuprice"]=$_POST['Menuprice'] ;
            $_SESSION["RestoName"] =$_POST['RestoName'] ;
            $_SESSION["RestoAddress"]=$_POST['RestoAddress'] ;
            $_SESSION["nbrOfSeats"]=$_POST['nbrOfSeats'] ;
            header('Location: UI/Resto_reservation.php');
      }

       ob_end_flush();
    ?>

</body>
    <footer>
      <h2>@HAARLEMFESTIVAL</h2>
      <p>Facebook</p>
    </footer>

  </html>
