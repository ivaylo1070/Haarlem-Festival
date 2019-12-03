
<!DOCTYPE html>
<html>
  <head>
    <meta name="description" content="This is the volunteer login page for the content management system.">
    <meta name="keywords" content="cms, content, haarlem festival">
    <link href="style/cms_login.css" rel="stylesheet" type="text/css">
    <title>Haarlem festival</title>

  </head>
  <header>
    <nav>
      <a href='#'>
        <img src="img/logo.jpg">
      </a>
      <a href='background'>
        <img src="img/header_img.jpg">
      </a>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="haarlem_foog.php">Haarlem Food</a></li>
        <li><a href="haarlem_dance.php">Haarlem Dance</a></li>
        <li><a href="haarlem_jazz.php">Haarlem Jazz</a></li>
    </nav>
  </header>
<body>
  <article id="login">
  <h2>Login Form</h2>
    <form action="" method="post">
      <label>UserName :</label>
      <input id="name" name="username" placeholder="username" type="text">
      <label>Password :</label>
      <input id="password" name="password" placeholder="**********" type="password"><br><br>
      <input name="submit" type="submit" value=" Login ">
      <span><?php echo $error; ?></span>
    </form>
</article>
</body>
</html>
