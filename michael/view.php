<?php
class view{
private $model;
private $controller;
public $result;

public function __construct($model, $controller){
    $this->model= $model;
    $this->controller=$controller;

  }
  public function DisplayResults(){
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['Thursday'])){
      $day=1;
      $venue="Patronaat";
  		 }
    elseif(isset($_POST["Friday"])){
      $day= 2;
      $venue="Patronaat";
    }elseif(isset($_POST["Saturday"])){
        $day=3;
        $venue="Patronaat";
      }elseif(isset($_POST['Sunday'])){
        $day=4;
        $venue="Grote Markt";
      }
      $result = $this->controller->GetTickets($day);

}else{
  header('Location: index.php');
}
}
 ?>
