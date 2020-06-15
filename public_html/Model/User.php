<?php

class User
{
  //defining user variables
  private $id;
  private $username;
  private $password;
  private $email;
  private $phone_number;
  private $status;

public function __construct($ID,$Username,$Password,$Email,$Status,$Phone_number)
{
$this->id=$ID;
$this->username=$Username;
$this->password=$Password;
$this->email=$Email;
$this->status=$Status;
$this->phone_number=$Phone_number;
}
  //getter for username
  public function get_username()
  {
    return $this->username;
  }
  //setter for username
  public function set_username($Password)
  {
    $this->username=$Username;
  }
  //getter for password
  public function get_password()
  {
    return $this->password;
  }
  //setter for password
  public function set_password($Password)
  {
    $this->password=$password;
  }
  //getter for email
  public function get_email()
  {
    return $this->email;
  }
  //setter for email
  public function set_email($Email)
  {
    $this->email=$Email;
  }
  //getter for status
  public function get_status()
  {
    return $this->status;
  }
  //setter for status
  public function set_email($Status)
  {
    $this->status=$Status;
  }
}
 ?>
