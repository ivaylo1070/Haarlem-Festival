<?php
session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: UI/usr_prof.php"); // Redirecting To Home Page
}
 ?>
