<?php
include('../Logic/Login_Service.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: profile.php"); // Redirecting To Profile Page
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="description" content="This is the volunteer login page for the content management system.">
    <meta name="keywords" content="cms, content, haarlem, festival, event">
    <link href="style/cms_login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://flag-icon-css.lip.is/">
    <title>Haarlem festival</title>

  </head>
  <header>
    <?php $link_address = "";?>
    <img class="Logoright" src="../Img/logo.png" alt="logo"  title ="logo"/>
    <ul>
    	<li><a href="">EN</a></li>
    	<li><a href="<?php echo $link_address;?>" class="cartIcon" ></a></li>
    	<li><a href="<?php echo $link_address;?>UI/Food_UI.php">Haarlem Food</a></li>
    	<li><a href="<?php echo $link_address;?>UI/Dance_UI.php">Haarlem Dance</a></li>
    	<li><a href="<?php echo $link_address;?>UI/Jazz_UI.php">Haarlem Jazz</a></li>
    	<li><a href="<?php echo $link_address;?>index.php">Home</a></li>
    </ul>
    <header class="header">
    <!--for background image-->
    </header>
  </header>
<body>
  <p class="page_title">Content manager service - Login</p>
  <article id="login">
    <form action="" method="post">
      <label class="cms_label">Name :</label>
      <input id="name" name="username" placeholder="username" type="text"><br><br>
      <label class="cms_label">Password :</label>
      <input id="password" name="password" placeholder="**********" type="password"><br><br>
      <input name="login" type="submit" value=" Log in " class="cms_button"><br><br>
      <input name="register" type="submit" value=" Regiter "class="cms_button"><br><br>
      <p class="forgotten" ><a onClick="document.location.href='UI/forgotten_view.php'">Forgot username/password?</a>.</p><br><br>


    <?php if (isset($message))//displays error message to user
     {
      echo '<label class="text-warning">'.$message.'</label>'.'<br><br>';
    }
      ?>
    </form>
  </article>
  <footer class="footer">
   <nav id="footer_nav">
     <p>@HAARLEMFESTIVAL</p>
     <ul>
       <li><a href="http://www.facebook.com">Facebook</a></li>
     </ul>
   </nav>
  </footer>
  </html>
