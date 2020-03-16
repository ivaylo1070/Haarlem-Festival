<?php

//creates session
session_start();

include('User_logic.php'); //includes User_logic script or access to logic layer

$user_service = new User_logic(); //creates User_logic variable in order to access its methods

//if button with name login on index page is pressed then following script is executed
if (isset($_POST["login"]))
{
  //strores username and password typed by user into variables
  $username = $_POST["username"];
  $password= $_POST["password"];
  //if these variables are empty an error message is shown to user
  if (empty($username) || empty($password))
  {
    $message ='<label>All fields are required</label>';
  }
  else
  {
    //calls method in user layer to access user data by providing username and password.
    try
    {
      $results=$user_service->ConnectUserLogic($username,$password);
    }
    catch(Exception $e)//cathes error from previous layer and stores it session
    {
      $_SESSION['error']=$e->getMessage();
    }

    if(count($results) > 0)//if there is existing user with this information it executes following script
    {
      if($password= $results[0]["password"]) //checks if encrypted password in database and typed by user match
      {
        //stores non-trivial user values into session variables
      $_SESSION['username'] = $results[0]["username"];
      $_SESSION['password'] = $results[0]["password"];
      $_SESSION['e_mail'] = $results[0]["Email"];

      header("location: /UI/event-edit.php");
      }
      // if user information is incorrect it displays this error message
      else{
      $message ='<label> Wrong Data</label>';
      }
      }
      // if user information is incorrect it displays this error message
    else{
      $message ='<label> Wrong Data</label>';
        }
  }
}
?>
