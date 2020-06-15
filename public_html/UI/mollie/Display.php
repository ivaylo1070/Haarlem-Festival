<style>
/*****filter page**************/
input[type=checkbox]{
  display: inline;
}

/*****************/

.flex-container {
    display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -ms-flex-wrap: wrap;
     flex-wrap: wrap;
     -webkit-box-pack: justify;
     -ms-flex-pack: justify;
     justify-content: space-between;
     -ms-flex-pack: distribute;
     justify-content: space-around;
     margin: 5px;
     padding: 5px;
}

.flex-container > form{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  text-align: left;
  font-family: arial;
  min-width:400px ;
  width:400px ;
  padding-bottom:0px;
  padding-left: 2px;
  margin-bottom:10px;
  max-height:32%;
  border:2px solid #cc6611;


}
form  > h1{
color: #cc6611;
text-align: center;
}
form  > h2{
color: red;
}
form img{
  width:100%;
  height: 250px;
}

.description {
  color: green;
}

.card button {
  outline: 0;
  padding: 12px;
  color: #fff;
  background-color: #cc6611;
  text-align: center;
  cursor: pointer;
  width: 50%;
  margin-left: 25%;
  margin-right: 25%;
  font-size: 18px;
}
form input[type=submit] {
  outline: 0;
  padding: 2px;
  color: #fff;
  background-color: #cc6611;
  text-align: center;
  cursor: pointer;
  width:250px;
  font-size: 18px;
}

.card button:hover , form input[type=submit]:hover {
  
  border:2px solid #cc6611 ;
  background-color: #fff;
  color: #cc6611;
}
.flex-container-reservation{

  border:2px solid #cc6611 ;
  width:600px;
  margin-left: auto;
  margin-right: auto;
  padding :30px;

}
.flex-container-reservation select , input[type=email] , input[type=submit] {
  margin:10px;
}

</style>
<?php
 function DisplayDataInFormattedHtml($image,$name,$address,$openTime,$closeTime,$stars,$price,$foodType, $id,$Seats)
	{

		$info ="<form action=\"\" method =\"POST\" class=\"card\">
					 <img src=\"./upload/$image\" \>
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