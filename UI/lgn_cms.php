<?php
include('../DAL/dhs_login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: event-edit.php"); // Redirecting To The event Page
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="description" content="This is the volunteer login page for the content management system.">
    <meta name="keywords" content="cms, content, haarlem, festival, event">
    <link rel="stylesheet" href="../css/style.css">
    <title>Haarlem festival</title>

  </head>
  <img class="Logoright" src="../Img/logo.png" alt="logo"  title ="logo"/>
  <ul>
    <li><a href="#">EN</a></li>
    <li><a href="#" class="userIcon" >Username</a></li>
    <li><a href="#">Haarlem Food</a></li>
    <li><a href="#">Haarlem Dance</a></li>
    <li><a href="#">Haarlem Jazz</a></li>
    <li><a href="#">Home</a></li>
  </ul>
  <header class="header">

  </header>
<body>
  <article id="login">
  <p> Content management service</p>
    <form action="" method="post">
      <label>Username :</label>
      <input id="name" name="username" placeholder="username" type="text"><br><br>
      <label>Password :</label>
      <input id="password" name="password" placeholder="**********" type="password"><br><br>
      <input name="submit" type="submit" value=" Login " class="login-button"><br><br>
      <input type="button" value=" Register " onclick="location.href= '../UI/Register.php'" class="login-button"><br><br>
      <input type="button" value=" Forgot username/password? " class="login-button2">
      <span><?php echo $error; ?></span>
    </form>
  </article>
</body>
  <footer>
  	<h2>@HAARLEMFESTIVAL</h2>
  	<p>Facebook</p>
  </footer>
</html>
