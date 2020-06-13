
<?php $link_address = "";
?>
<head>
	 <meta name="description" content="make online reservation for eating outside via our reservation system ">
	 <meta name="keywords" content="resrvation ,dinner outside , eating , European cuisine , dutch food , french food">
	 <link href="style/cms_login.css" rel="stylesheet" type="text/css">
	 <link rel="stylesheet" href="../CSS/style.css" type="text/css">
	 <title>Haarlem festival</title>
 </head>
<img class="Logoright" src="../Img/logo.png" alt="logo"  title ="logo"/>
<ul>
	<li><a href="">EN</a></li>
	<li><a href="<?php echo $link_address;?>" class="cartIcon"> <?php echo count($_SESSION['cart_array'])." ITEMS";
				?></a></li>
	<li><a href="<?php echo $link_address;?>/UI/Food_UI.php">Haarlem Food</a></li>
	<li><a href="<?php echo $link_address;?>/UI/Dance_UI.php">Haarlem Dance</a></li>
	<li><a href="<?php echo $link_address;?>/UI/JazzLandingPage.php">Haarlem Jazz</a></li>
	<li><a href="/index.php">Home</a></li>
</ul>
<header class="header">
<!--for background image-->
<!-- the good header -->
</header>
