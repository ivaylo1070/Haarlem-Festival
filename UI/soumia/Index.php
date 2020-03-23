<?php ob_start();  ?>
 <!DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='css/style.css' />
      <link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' />
    

    <title>Page Title</title>
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
        <input type="submit" name="filter" value="Filter food type">
    </form>
    </body>
</html> 

<?php
    require_once("classess/Dal.php");
    require_once 'classess/M_restaurant.php';
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

//****************** manage the cart
   
    if(isset($_POST['add']))
     {
      //print_r($_POST['ProdctID']);
      $count=0;
      if (isset($_SESSION['cart'])) {
        $itemsId= array_column($_SESSION['cart'], 'ProdctID');
       // print_r($itemsId);
              if (in_array($_POST['ProdctID'] , $itemsId)) {
                echo "<script>alert('already in the cart')</script>";
                $count= count($_SESSION['cart']);
                  echo   $count ."items ";

              }else
              {
                  $count= count($_SESSION['cart']);
                  $item_array= array('ProdctID'=>$_POST['ProdctID']) ;
                  $_SESSION['cart'][$count]=$item_array;
                  //print_r($_SESSION['cart']);
                  echo   $count ."items ";
                  //https://www.youtube.com/watch?v=eAK8uYtNTy4   item count
              }
      }
      else{
        $item_array= array('ProdctID'=>$_POST['ProdctID']) ;
        $_SESSION['cart'][0]=$item_array;
        print_r($_SESSION['cart']);

      }



     }
     else if(isset($_POST['reserve']))
      {
            $_SESSION["ProdctID"] =$_POST['ProdctID'] ;
            header('Location: rest_reservation.php');
      
     
      }
    ob_end_flush();
?>
