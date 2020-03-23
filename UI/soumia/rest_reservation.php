<?php
    echo "<link rel='stylesheet' type='text/css' href='css/style.css' />";
session_start();
   require_once("classess/Dal.php");
    require_once 'Display.php';
        $dal = Dal::getInstance();
        $id= $_SESSION["ProdctID"] ;// send the restaurant id in session 
        $price=$_SESSION["Menuprice"];

        $datas= $dal-> getRestaurantByID($id);// get the right restaurant 
         foreach ($datas as $data) 
             { 
               DisplayDataInFormattedHtmlForReservation($data['image'],$data['Name'],$data['Address'],$data['OpeningTime'],$data['Closingtime'],$data['Stars'],$data['Price'],$data['FoodType'],$data['id'],$data['Seats']);
             }
?>
<?php ob_start();  ?>
 <!DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='css/style.css' />
      <link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' />
    

    <title>Page Title</title>
  </head>
    <body>

    	<p>
			 Note : a reservation fee of 10 eur per person will be charged when a reservation is made on haarlem festival website
			 this fee will be deducted from the final check on visiting the restaurant 
			 <br>* reservation is mandatory
			</p>
	    <form action="test.php" method="GET">

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
				Number Of Adults <select id="radults" name="adults"> 
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

				<textarea rows="4" cols="50">
			     Do you have any special requirements? allergies,wheelchair ect.
				 let us know about it 
				</textarea> <bR>
				Total  <input type="text" id="total" value="0" disabled> <br>
				<input type="hidden" value = "<?php $_SESSION["ProdctID"] ;?> // send restaurant id" />
				<input type="submit" value="reserve" />
			   <input type="submit" value="Add to the cart" />
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
</html> 
