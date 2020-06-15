<?php


require_once '../DAL/config.php';

	class Dal
	{

		private static $_instance=null;
		private $connection=null;
		private function __construct() {
			$this->connection = mysqli_connect(host,username, password,database);
		}

		public static function getInstance()
		{
			if(!self::$_instance) { // If no instance then make one
				self::$_instance = new Dal(); //new self();
			}
			return self::$_instance;
		}
       public function getAllRestaurants()
        {
            $result = $this->connection->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From restaraunt;");
            if (!$result)
            {
                throw new Exception("MySQL Error: '$error'");
            }
            else
            {
                $Restaurants = array();
                while($row = $result->fetch_assoc())
                {

                 $Restaurants[]=$row;
                }
                return $Restaurants;
            }
        }
          // all restuarants that match given search query
        public function getRestaurantByFoodType($query) {
            $query = $this->connection->escape_string($query);
            $result = $this->connection->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From restaraunt WHERE FoodType LIKE '%$query%';");
            if (!$result)
            {
                throw new Exception("MySQL Error: '$error'");
            }
            else
            {
                $Restaurants = array();
                while($row = $result->fetch_assoc())
                {

                 $Restaurants[]=$row;
                }
                return $Restaurants;
            }

        }
        // all restuarants that match given search query
        public function getRestaurantByID($id) {
            $result = $this->connection->query("SELECT id, Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType ,image From restaraunt WHERE   id ='$id';");
            if (!$result)
            {
                throw new Exception("MySQL Error: '$error'");
            }
            else
            {
                $Restaurants = array();
                while($row = $result->fetch_assoc())
                {

                 $Restaurants[]=$row;
                }
                return $Restaurants;
            }

        }

        //******************************************** insert Delete Update
         public function InsertRestaurant($name, $address,  $openTime, $closeTime,  $stars,  $nbrSeats,  $price,  $foodType, $image)
         {
            $query = "INSERT INTO restaraunt (Name, Address, OpeningTime, Closingtime, Stars, Seats, Price, FoodType,image)
				VALUES ('$name', '$address', '$openTime','$closeTime', '$stars', '$nbrSeats','$price', '$foodType','$image');";

				if ($this->connection->query($query) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $sql . "<br>" . $this->connection->error;
				}
        }
        public function DeleteRestaurant($id)
         {
            $query = "DELETE FROM restaraunt  where ID =$id";

                if ($this->connection->query($query) === TRUE) {
                    echo "Deleted successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $this->connection->error;
                }
        }
         public function UpdateRestaurant($name, $address,  $openTime, $closeTime,  $stars,  $nbrSeats,  $price,  $foodType, $image)
         {
            $query = "UPDATE restaraunt
            set Name='$name', Address='$address',
             OpeningTime='$openTime', Closingtime='$closeTime',
             Stars='$stars', Seats='$nbrSeats',
              Price='$price', FoodType='$foodType',image='$image');";

                if ($this->connection->query($query) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $this->connection->error;
                }
        }


   }
?>
