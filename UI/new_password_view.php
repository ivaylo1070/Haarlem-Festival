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
  <p class="page_title">Account-recovery new password</p><br><br>
    <form action="" class="recovery-form" method="post">
      <label class="cms_label">New password</label>
			<input id="password" type="password" name="new_pass"><br><br>
      <label class="cms_label">Confirm new password</label>
			<input id="password" type="password" name="new_pass_c"><br><br>
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
      <input class="cms_button" name="new_password" type="submit" value="Submit"><br><br>
    </form>
</body>

    <footer>
    	<h2>@HAARLEMFESTIVAL</h2>
    	<p>Facebook</p>
    </footer>

  </html>
