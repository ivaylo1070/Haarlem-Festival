<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
require("header.php"); // Includes reservation  Script
?>
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
        <input type="submit" value="Filter food type">
    </form>
    <?php include('../Logic/food_service.php');
      if(isset($_POST['reserve']))
      {
            $_SESSION["ProdctID"] =$_POST['ProdctID'] ;
            $_SESSION["Menuprice"]=$_POST['Menuprice'] ;
            $_SESSION["RestoName"] =$_POST['RestoName'] ;
            $_SESSION["RestoAddress"]=$_POST['RestoAddress'] ;
            $_SESSION["nbrOfSeats"]=$_POST['nbrOfSeats'];

            header('Location: Resto_reservation.php');
      }

       ob_end_flush();
    ?>

</body>
    <footer>
      <h2>@HAARLEMFESTIVAL</h2>
      <p>Facebook</p>
    </footer>

  </html>
