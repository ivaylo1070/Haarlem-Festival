<?php

session_start();

include('User_logic.php'); //includes User_logic script or logic layer

$user_service = new User_logic(); //creates User_logic variable in order to access its methods

//if button with name recover on forgotten_view page is pressed then following script is executed
if(isset($_POST["recover"]))
{
  //stores insrted e-mail in variable
  $recovery_e_mail=htmlspecialchars($_POST["r_e-mail"]);
  // shows error for not input by user
  if (empty($recovery_e_mail))
  {
    $message ='<label>No e-mail provided</label>';
  }
  else
  {
    try
    {
      //calls method in logic layer to check if user with such mail exist
      $check=$user_service->ResetLogic($recovery_e_mail);
    }
    catch(Exception $e)//cathes error from previous layer and stores it session
    {
      $_SESSION['error']=$e->getMessage();
    }
      if (!$check) //e-mail doesn't exist
      {
        $message ='<label>No user with this e-mail found</label>';
      }
      else
      {
        try
        {
          // calls method in logic layer to generate and send token to user's e-mail and write it into the database. It is used to verify recovery by user.
          $user_service->ResetPassLogic($recovery_e_mail);
        }
        catch(Exception $e)//cathes error from previous layer and stores it session
        {
          $_SESSION['error']=$e->getMessage();
        }

      }
  }
}
//if button with name token on pending_view page is pressed then following script is executed
if(isset($_POST['token']))
{
  $token = htmlspecialchars($_POST['token_value']); // saves input data in variable

  try
  {
    $r_email=$user_service->GetEmailTokenLogic($token); // calls method in logic layer to get the e-mail for this specific token
  }
  catch(Exception $e)//cathes error from previous layer and stores it session
  {
    $_SESSION['error']=$e->getMessage();
  }

  if (empty($token))//no input by user
  {
    $message ='<label>No token provided</label>';
  }
  else if(!isset($r_email))//token is wrong
  {
    $message ='<label>Invalid token</label>';
  }
  else
  {
    $_SESSION['e_mail'] = $r_email;//saves recovery e-mail in superglobal or session

    header('location: ../UI/new_password_view.php');
  }
}
//if button with name new_password on new_password_view page is pressed then following script is executed
  if (isset($_POST['new_password']))
  {
    // saves user input from textboxes into variables
    $new_pass = htmlspecialchars($_POST['new_pass']);
    $new_pass_c = htmlspecialchars($_POST['new_pass_c']);
    //gets recovery e-mail from superglobal and stores it
    $email=$_SESSION['e_mail'];

    if (empty($new_pass) || empty($new_pass_c))//error for no input
    {
      $message ='<label> Password is required</label>';
    }
    else if ($new_pass !== $new_pass_c)//error if password and confirm password do not match
    {
      $message ='<label> Password do not match</label>';
    }
    else
    {
      try
      {
        // calls method from logic layer to forward to DB layer and change password of user with specific e-mail
        $user_service->WriteRecoveryPassLogic($email,$new_pass);
        // calls method from logic layer to forward to DB layer to delete token in database so recovery can be used again
        $user_service->RemoveTokenLogic($email);

        header('location: lgn_cms.php');
      }
      catch(Exception $e)//cathes error from previous layer and stores it session
      {
        $_SESSION['error']=$e->getMessage();
      }
    }
  }
 ?>
