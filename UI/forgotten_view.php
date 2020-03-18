<?php
include('../Logic/Recovery_Service.php'); // Includes Login Script
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
  <p class="page_title">Content manager service - Account recovery</p>

    <form action="" class="recovery-form" method="post">
      <label class="cms_label">E-mail :</label>
      <input id="e-mail" name="r_e-mail" placeholder="e-mail" type="text"><br><br>
      <?php if (isset($_SESSION['error']))//displays error message to user
       {
        echo '<label class="text-warning">'.$_SESSION['error'].'</label>'.'<br><br>';
        unset($_SESSION['error']);
      }
        ?>
      <?php if (isset($message))//displays error message to user
      {
        echo '<label class="text-warning">'.$message.'</label>'.'<br><br>';
      }
        ?>
      <input name="recover" class="cms_button"type="submit" value=" Send "><br><br>
      <p class="forgotten" >Don't have an account? <a onClick="document.location.href='Register_view.php'">Sign up now</a>.</p>
    </form>


    <footer>
    	<h2>@HAARLEMFESTIVAL</h2>
    	<p>Facebook</p>
    </footer>

  </html>
