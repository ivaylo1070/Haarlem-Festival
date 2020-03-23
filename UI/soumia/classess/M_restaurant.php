<?php
class resturant {
	public $name;
	public $address;
	public $openTime;
	public $closeTime;
	public $stars;
	public $nbrSeats;
	public $price;
	public $foodType;
	public $ImagePath;


	public function __construct (){
  
	}
	public function setRestaurantInfo ( $n, $a,  $o, $c,  $stars,  $seats,  $p,  $ftype){

		$this->name=$n;
		$this->address=$a;
		$this->openTime=$o;
		$this->closeTime=$c;
		$this->stars=$stars;
		$this->nbrSeats=$seats;
		$this->price=$p;
		$this->foodType=$ftype;
	}


	public function Print_RestaurantInfo()
	{
		$info ="Name : ".$this->name."</br> Address :".$this->address."</br> Open between  : ".$this->openTime."\t-\t".$this->closeTime."</br> Ranking : ".$this->stars ."</br> Menu Price : ".$this->price."</br> Food Type :".$this->foodType;
		echo $info;
	}



}


?>