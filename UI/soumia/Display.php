<?php
//https://www.youtube.com/watch?v=eAK8uYtNTy4  for the styling
//https://www.youtube.com/watch?reload=9&v=Ipa9xAs_nTg  for the image 


 echo "<link rel='stylesheet' type='text/css' href='css/style.css' />";
  echo "<link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' />";
  echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">";
  
 function DisplayDataInFormattedHtml4($image,$name,$address,$openTime,$closeTime,$stars,$price,$foodType, $id)
	{

		$info ="<form action=\"\" method =\"POST\" class=\"card\">
					 <img src=\"./upload/$image\" \>
					  <h1>".$id."</h1>
					   <h1>".$price."</h1>
					  <h1>".$name."</h1>
					     Price : <span  class=\"description\">  ".$price."</span> <br>

					     <input type='hidden' name='ProdctID'  value='$id'>
					     <input type='hidden' name='Menuprice'  value='$price'>

					     type : <span class=\"description\">".$foodType."</span> <br>
						 location :<span class=\"description\"> ".$address."</span><br>
						 rating : <span class=\"description\"> ".$stars ."</span><br>
						 opening time : <span class=\"description\"> ".$openTime."\t-\t".$closeTime."</span><br>
					  <p><button type =\"submit\"  name=\"reserve\"> Reserve Now </button>
					</form> 	";
			echo $info ;
	}
	 function DisplayDataInFormattedHtmlForReservation($image,$name,$address,$openTime,$closeTime,$stars,$price,$foodType, $id, $seats)
	{

		$info ="<form action=\"\" method =\"POST\" class=\"card\">
					 <img src=\"./upload/$image\" \>
					  <h1>".$name."</h1>
					  <h2> Number of seats  Left is  ".$seats."</h2>
					     Price : <span  class=\"description\">  ".$price."</span> 

					     <input type='hidden' name='ProdctID'  value='$id'>

					     type : <span class=\"description\">".$foodType."</span> 
						 location :<span class=\"description\"> ".$address."</span>
						 rating :<i class=\"fas fa-star\"></i> <i class=\"fas fa-star\"></i> <i class=\"fas fa-star\"></i> <span class=\"description\"> ".$stars ."</span><br>
						 opening time : <span class=\"description\"> ".$openTime."\t-\t".$closeTime."</span><br>
					</form> 	";
			echo $info ;
	}


?>