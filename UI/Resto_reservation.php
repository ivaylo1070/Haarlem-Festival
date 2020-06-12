<?php
    echo "<link rel='stylesheet' type='text/css' href='css/style.css' />";
    session_start();
     require_once 'Display.php';
      $RestrntID= $_SESSION["ProdctID"] ;// send the restaurant id in session 
	  $price=$_SESSION["Menuprice"];

	if(isset($_POST['AddToCart']))
     {
      //print_r($_POST['ProdctID']);
      $count=0;
      if (isset($_SESSION['cart_array'])) {
        $itemsId= array_column($_SESSION['cart_array'], 'ProdctID');
       // print_r($itemsId);
              if (in_array($RestrntID, $itemsId)) {
                echo "<script>alert('already in the cart')</script>";
                $count= count($_SESSION['cart_array']);
                  echo   $count ."items ";

              }else
              {
                  $count= count($_SESSION['cart_array']);
                  $item_array= array('ProdctID'=>$RestrntID) ;
                  $_SESSION['cart_array'][$count]=$item_array;
                  //print_r($_SESSION['cart']);
                 // echo   $count ."items ";
                  //https://www.youtube.com/watch?v=eAK8uYtNTy4   item count
              }
      }
      else{
        $item_array= array('ProdctID'=>$RestrntID) ;
        $_SESSION['cart_array'][0]=$item_array;
        print_r($_SESSION['cart_array']);

      }
     }
?>
<?php ob_start(); 
	 require("header.php"); 
 ?>
 <!DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <title> Reservation </title>
  </head>
    <body>
    	<p>
    		<?php 
    		  echo "<h1>". $_SESSION["RestoName"]."</h1>" ;
              echo "<h2>". $_SESSION["RestoAddress"]." </h2>";
              ?>
    	</p>
    	<p >
			 Note : a reservation fee of 10 eur per person will be charged when a reservation is made on haarlem festival website
			 this fee will be deducted from the final check on visiting the restaurant 
			 <br> <span style="color:red;">* reservation is mandatory</span>
		</p>
	    <form action="" method="POST">

			    <section class="flex-container-reservation">
				  <span>Reservation details<span> <br>
				   Date <select id="rdate" name="rdate"> 
				  <option value="26">26</option>
				  <option value="27">27</option>
				  <option value="28">28</option>
				  <option value="29">29</option>
				</select>
		        time <select id="rtime"  name="rtime"> 
				  <option value="4.30">4.30</option>
				  <option value="5.30">5.30</option>
				  <option value="6.30">6.30</option>
				  <option value="8.30">8.30</option>
				</select> <br>	
				Number Of Adults <select id="radults" name="adults" onchange="myFunction();"> 
				  <option value="1">1</option>
				  <option value="2">2</option>
				  <option value="3">3</option>
				  <option value="4">4</option>
				    <option value="5">5</option>
				  <option value="6">6</option>
				</select> 
				Number Of Kids <select id="rkids" name ="kids" onchange="myFunction();" > 
				  <option value="1">1</option>
				  <option value="2">2</option>
				  <option value="3">3</option>
				  <option value="4">4</option>
				    <option value="5">5</option>
				  <option value="6">6</option>
				</select> <br>	
				Price  <input type="text" id="MenuPrice" value="<?php echo $_SESSION["Menuprice"];?>" disabled><br>
				Email <input type="email" name="email"/><br>
				<input style="color:red;" type="text" value="<?php echo "Number of seat left ". $_SESSION["nbrOfSeats"]; ?>" disabled/><br>

				<textarea rows="4" cols="50">
			     Do you have any special requirements? allergies,wheelchair ect.
				 let us know about it 
				</textarea> <bR>
				Total  <input type="text" id="total" value="0" disabled> <br>
				<input type="hidden" value = "<?php $_SESSION["ProdctID"] ;?> // send restaurant id" />
			   <input type="submit" name="AddToCart" value="Add to the cart" />
			</section>
	
	    </form>


 <script>

		function myFunction()
		 {
	 		var eAdult = document.getElementById("radults");
			  var nbrOfAdults = eAdult.options[eAdult.selectedIndex].value;

			   var ekids= document.getElementById("rkids");
			   var nbrOfKids = ekids.options[ekids.selectedIndex].value;

			   var MenuPrice= document.getElementById("MenuPrice").value;

			  var total =(nbrOfAdults*MenuPrice)+(nbrOfKids*MenuPrice/2);
			  document.getElementById("total").value=total;
		}
</script>

    </body>
        <footer>
    	<h2>@HAARLEMFESTIVAL</h2>
    	<p>Facebook</p>
    </footer>
</html> 
