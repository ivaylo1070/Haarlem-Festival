<?php

include(realpath(dirname(__FILE__) . '/../DAL') . "/User_DAO.php"); //includes User_Dao script

class User_logic
{
  //variable used to store the access to the database class into this entire class
  private $DB_user_conn;

  function __construct()
  {
      // creates new UserDAO object or DB layer used to access the database from the logic layer
      $this->DB_user_conn = new UserDAO();

  }
  //method used to access the register mehtod intp the database
  function CreateUserLogic($username,$password,$new_e_mail,$status)
  {

      //calls new id method in database class to get new id from it
      $id = $this->DB_user_conn->GetNewID();
      //calls register method in database class
      $this->DB_user_conn ->Register($id,$username,$password,$new_e_mail,$status);


  }
  //calls delete method inside UserDAO class
  function DeleteUserLogic($username)
  {

      $this->DB_user_conn->DeleteUser($username);

  }
  // calls the method to retrieve user information so the login can be established
  function ConnectUserLogic($username,$password)
  {
      //calls DAO method to retrieve user information
      $results=$this->DB_user_conn->ConnectUser($username,$password);

      return $results;

  }
  //method calls DB layer to change e-mail with new ones for user
  function ChangeEmailLogic($username,$new_e_mail)
  {

      $this->DB_user_conn->ChangeEmail($username,$new_e_mail);

  }
  //method calls DB layer to change password with new one for user
  function ChangePasswordLogic($username,$new_password)
  {

      $this->DB_user_conn->ChangePassword($username,$new_password);

  }
  // it calls DB layer method to check if the new e-mail isn'talready in use by different user
  function CheckEmailLogic($new_e_mail)
  {

      $check=true;

      $check=$this->DB_user_conn->CheckEmailExist($new_e_mail);

      return $check;


  }
  //method calls DB layer to check if user has taken this username
  function CheckUsernameLogic($username)
  {

      $check=true;

      $check=$this->DB_user_conn->CheckUserExist($username);

      return $check;

  }
  // it retrives e-mail from DB layer after it has beem changed in profile page
    function GetNewEmailLogic($username)
    {
        $result=$this->DB_user_conn->GetNewEmail($username);

        return $result;

  }
  // this method calls DAO to check retreive from if user with specific e-mail exists
  function ResetLogic($recovery_e_mail)
  {
    $check=true;
    //calls DAO method ResetEmailCheck and provides the e-mail for check
    $check=$this->DB_user_conn->ResetEmailCheck($recovery_e_mail);

    return $check;
  }
  //this method generates a token and sends it to the database and the e-mail of user
  function ResetPassLogic($recovery_e_mail)
  {
    // creates and encrypts token that will be sent to e-mail and database
    $token = bin2hex(openssl_random_pseudo_bytes(8));
    // calls method DB_InsertToken in DAO to write it in datase
    $this->DB_user_conn->DB_InsertToken($recovery_e_mail,$token);

    $to = $recovery_e_mail; // to whom token will be sent
    $subject = "Reset your password on 627341.infhaarlem.nl";
    //message with token's value added for user to read when they open message
    $msg = "Hi there, this is your recovery token " . $token . " use it to reset your password on our site or use http://627341.infhaarlem.nl/UI/pending_view.php";
    $msg = wordwrap($msg,70);
    //from whom this is sent
    $headers = "From: 627341@student.inholland.nl";
    mail($to, $subject, $msg, $headers);//sends e-mail with the information written above to the specified e-mail address to user
    //relocates user to the pending page where they can verify password
    header('location: ../UI/pending_view.php');
  }
  // retrieve e-mail form DB layer by providng its token value to recover password
  function GetEmailTokenLogic($token)
  {
    $result=$this->DB_user_conn->DB_GetEmailToken($token);

    return $result;
  }
// it calls a method from DB layer to change user's password based on their e-mail
  function WriteRecoveryPassLogic($email,$new_pass)
  {
    $result=$this->DB_user_conn->DB_UpdateRecoveryPass($email,$new_pass);
  }
  // calls a method from DB layer to delete user's toke so the user can use it again in the future
  function RemoveTokenLogic($email)
  {
    $this->DB_user_conn->DB_RemoveUsedToken($email);
  }
}
 ?>
