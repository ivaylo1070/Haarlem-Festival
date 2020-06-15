<?php


 echo "<link rel='stylesheet' type='text/css' href='css/Style_resto.css' />";
 function DisplayDataInFormattedHtml($image,$name,$address,$openTime,$closeTime,$stars,$price,$foodType, $id,$Seats)
	{

		$info ="<form action=\"\" method =\"POST\" class=\"card\">
					 <img src=\"../Img/$image\" \>
					  <h1>".$name."</h1>
					     Price : <span  class=\"description\">  ".$price."</span> <br>

					     <input type='hidden' name='ProdctID'  value='$id'>
					     <input type='hidden' name='Menuprice'  value='$price'>
					     <input type='hidden' name='RestoName'  value='$name'>
					     <input type='hidden' name='RestoAddress'  value='$address'>
					     <input type='hidden' name='nbrOfSeats'  value='$Seats'>
					     type : <span class=\"description\">".$foodType."</span> <br>
						 location :<span class=\"description\"> ".$address."</span><br>
						 rating : <span class=\"description\"> ".$stars ."</span><br>
						 opening time : <span class=\"description\"> ".$openTime."\t-\t".$closeTime."</span><br>
					  <p><button type =\"submit\"  name=\"reserve\"> Reserve Now </button>
					</form> 	";
			echo $info ;
	}

?>
