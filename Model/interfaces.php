<?php

interface Iuser {
  public function CreateUserLogic($username,$password,$new_e_mail,$status,$phone_number);
  public function DeleteUserLogic($username);
  public function ConnectUserLogic($username,$password);
  public function ChangeEmailLogic($username,$new_e_mail);
  public function ChangePasswordLogic($username,$new_password);
  public function CheckEmailLogic($new_e_mail);
  public function CheckUsernameLogic($username);
  public function GetNewEmailLogic($username);
  public function ResetLogic($recovery_e_mail);
  public function ResetPassLogic($recovery_e_mail);
  public function GetEmailTokenLogic($token);
  public function WriteRecoveryPassLogic($email,$new_pass);
  public function RemoveTokenLogic($email);
}
 ?>
