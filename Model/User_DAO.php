<?php
require_once('config.php');//calls Config.php script

class UserDAO
{
  //database connection variable that is used to store the connection to be used within the entire class
  private $conn;

  function __construct()
  {
    //creates instance and establishes single connection for the database
    $instance = Config::getInstance();
    $this->conn = $instance->getConnection();
  }
//function to connect user by
  function ConnectUser($username,$password)
  {
    // query to select all data of particular user from the database with limit of 1
      $query = "SELECT * FROM Volunteer WHERE username ='$username' LIMIT 1";

      $stmt = $this->conn->prepare($query);
      $stmt->execute(array('username' => $username, 'password' => $password));
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      //fetches all user information into an array
      $results=$stmt->fetchAll();
      //returns results array back to logic layer
      return $results;
  }
  //function to check if username exist into the database
  function CheckUserExist($username)
  {
  //default value
  $check=true;

  $query = "SELECT COUNT(username) AS num FROM Voluneer WHERE username = '$username'";

  $stmt = $this->conn->prepare($query);
  $stmt->bindValue(':username', $username);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if($row['num'] > 0){
      return $check;
  }
  else
  {
    return $check=false;
  }
}
//function to write user into the database
 function Register($phone,$username,$password,$new_e_mail,$status)
  {
      //hashes password value
      $passwordHash = password_hash($password, PASSWORD_BCRYPT);
      // writes all user information into database
      $query = "INSERT INTO Volunteer (username, password, Email, status, phone) VALUES (:username, :password, :Email, :status, :phone)";
      //
      $stmt = $this->conn->prepare($query);
      // binds all values to string
      $stmt->bindValue(':phone', $phone);
      $stmt->bindValue(':username', $username);
      $stmt->bindValue(':password', $passwordHash);
      $stmt->bindValue(':Email', $new_e_mail);
      $stmt->bindValue(':status', $status);
      // executes statement to the database
      $stmt->execute();

  }
  //provides new id by reading the last id and adding +1
  function GetNewID()
   {
       $query="SELECT MAX(`id`) FROM `login`";
       $stmt = $this->conn->prepare($query);
       $stmt->execute();

       //fetches only result with fetchColumn
       $value=1+$stmt->fetchColumn();

       return $value;


   }
   //changes pasword in database with $new_password for a specific user
   function ChangePassword($username,$new_password)
   {
       //encrypts password
       $passwordHash = password_hash($new_password, PASSWORD_BCRYPT);

       $query="UPDATE login SET password='$passwordHash' WHERE username='$username'";
       $stmt = $this->conn->prepare($query);
       $stmt->bindValue(':username', $username);
       $stmt->bindValue(':password', $passwordHash);
       $stmt->execute();

   }
   // checks if e-mail exists and returns true or false
   function CheckEmailExist($new_e_mail)
   {

       $check=true;

       $query = "SELECT COUNT(Email) AS num FROM login WHERE Email = '$new_e_mail'";

       $stmt = $this->conn->prepare($query);
       $stmt->bindValue(':Email', $new_e_mail);
       $stmt->execute();
       $row = $stmt->fetch(PDO::FETCH_ASSOC);

       if($row['num'] > 0){
           return $check;
       }
       else
       {
         return $check=false;
       }
    }
   //writes into database new e-mail by providing also the username of whom
   function ChangeEmail($username,$new_e_mail)
   {

     $query="UPDATE login SET Email='$new_e_mail' WHERE username='$username'";
     $stmt = $this->conn->prepare($query);
     $stmt->bindValue(':username', $username);
     $stmt->bindValue(':Email', $new_e_mail);
     $stmt->execute();


   }
   //deletes specific user in database by providing username
   function DeleteUser($username)
   {

       $query="DELETE FROM login WHERE username='$username'";
       $stmt = $this->conn->prepare($query);
       $stmt->bindValue(':username', $username);

       $stmt->execute();
     }

   // provides new e-mail for profile page after it has been chacged in database
     function GetNewEmail($username)
     {

         $query="SELECT Email FROM login WHERE username='$username'";
         $stmt = $this->conn->prepare($query);
         $stmt->bindValue(':username', $username);

         $stmt->execute();
         $result = $stmt->fetchColumn();

         return $result;


   }
   // checks if e-mail that is about to be reset is already taken and returns true or false
   function ResetEmailCheck($recovery_e_mail)
   {

       $check=true;

       $query = "SELECT COUNT(Email) AS num FROM login WHERE Email = '$recovery_e_mail'";

       $stmt = $this->conn->prepare($query);
       $stmt->bindValue(':Email', $recovery_e_mail);
       $stmt->execute();
       $row = $stmt->fetch(PDO::FETCH_ASSOC);

       if($row['num'] > 0){
           return $check;
       }
       else
       {
         return $check=false;
       }
     }

    //inserts token into the database
    function DB_InsertToken($recovery_e_mail,$token)
    {

        $query = "INSERT INTO password_resets(email, token) VALUES ('$recovery_e_mail', '$token')";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':email', $recovery_e_mail);
        $stmt->bindValue(':token', $token);
        try
        {
          $stmt->execute();
        }
        catch(Exception $e)
        {
          throw new Exception("This e-mail already has token");//sends this exception if e-mail already has token in database
        }

    }
    //gets the e-mail address of the token
    function DB_GetEmailToken($token)
    {
        $query= "SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':token', $token);
        $stmt->execute();

        $result = $stmt->fetchColumn();

        return $result;

    }
    // changes the old password with the reset one into the database
    function DB_UpdateRecoveryPass($email,$new_pass)
    {
      //encrypts password
      $passwordHash = password_hash($new_pass, PASSWORD_BCRYPT);

      $query = "UPDATE login SET password='$passwordHash' WHERE Email='$email'";
      $stmt = $this->conn->prepare($query);

      $stmt->bindValue(':password', $passwordHash);
      $stmt->bindValue(':Email', $email);

      $stmt->execute();
    }
    //removes token from database so if user again needs password reset it is available
    function DB_RemoveUsedToken($email)
    {
      //deletes token for user by mathing his address to the token's one
      $query="DELETE FROM password_resets WHERE Email='$email'";
      $stmt = $this->conn->prepare($query);

      $stmt->bindValue(':Email', $email);
      $stmt->execute();
    }
}
 ?>
