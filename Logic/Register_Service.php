<?php

include('User_logic.php'); //includes User_Dao script


//UserDao object is created in order to call its functions
$user_service = new User_logic();

// checks if the sign up button is clicked on register_view page
if (isset($_POST["sign_Up"]))
{
  //assigns text box written values to variables
  $username = htmlspecialchars($_POST["username"]);
  $password= htmlspecialchars($_POST["password"]);
  $new_e_mail= htmlspecialchars($_POST["e-mail"]);
  $password_repeat= htmlspecialchars($_POST["confirm_password"]);
  $phone_number=htmlspecialchars($_POST["phone_number"]);
//if no input shows error message
  if (empty($username) || empty($password) || empty($new_e_mail) || empty($password_repeat))
  {
    $message ='<label>All fields are required</label>';
  }
  else if ($password!=$password_repeat)
{
    $message ='<label>Confirmed password doesn not match</label>';
}
  else
  {
    try
    {
      //calls method in logic layer to forward to DB layer to check if username exist
      $check_username=$user_service->CheckUsernameLogic($username);
      // same for e-mail
      $check_e_mail=$user_service->CheckEmailLogic($new_e_mail);
    }
    catch(Exception $e)//cathes error from previous layer and stores it session
    {
      $_SESSION['error']=$e->getMessage();
    }
  if($check_username)//username is taken
  {
  $message ='<label>The username already exists!</label>';
  }
  else if ($check_e_mail)//e-mail is taken
  {
  $message ='<label>The e-mail is already taken</label>';
  }
  else
  {
    try
    {
      $status="user";// this used when at some point users have different user types like user. admin, or superadmin
      // calls method in logic layer to forward to DB layer nad register user
      $user_service->CreateUserLogic($username,$password,$new_e_mail,$status,$phone_number);
      //relocates to index page user can enter his login information to enter
      header("location: ../UI/lgn_cms.php");
    }
    catch(Exception $e)//cathes error from previous layer and stores it session
    {
      $_SESSION['error']=$e->getMessage();
    }
  }
}
}
?>
