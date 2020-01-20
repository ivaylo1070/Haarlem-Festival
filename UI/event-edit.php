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
<h1>
  <label>Event categories </label>
<form method="post">
  <input type="radio"  name="event" value="all">   <label>All </label>
    <input type="radio"  name="event" value="food">   <label>Food </label>
      <input type="radio"  name="event" value="dance">   <label>Dance </label>
        <input type="radio"  name="event" value="jazz">   <label>Jazz </label>
</form>
<?php
if ($_POST["event"]=="all"){

}
elseif ($_POST["event"]=="food") {
  // code...

elseif ($_POST["event"]=="dance") {
  // code...
}
elseif ($_POST["event"]="jazz") {
  // code...
}
?>
</h1>
</body>
  <footer>
  	<h2>@HAARLEMFESTIVAL</h2>
  	<p>Facebook</p>
  </footer>
</html>
