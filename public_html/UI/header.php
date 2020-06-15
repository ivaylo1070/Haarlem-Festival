
<?php $link_address = "";
ini_set('default_charset', 'UTF-8');
setlocale(LC_ALL, 'fr_CA.utf-8');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../Logic/MyAutoLoader.php';
$cart_service = new Cart_Service();
?>
<head>
	 <meta name="description" content="make online reservation for eating outside via our reservation system ">
	 <meta name="keywords" content="resrvation ,dinner outside , eating , European cuisine , dutch food , french food">
	 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	 <link href="style/cms_login.css" rel="stylesheet" type="text/css">
	 <link rel="stylesheet" href="../CSS/style.css" type="text/css">
	 <title>Haarlem festival</title>
 </head>
<img class="Logoright" src="../Img/logo.png" alt="logo"  title ="logo"/>
<?php if(!isset($_SESSION['cart'])){$_SESSION['cart']=[];}?>
<ul>
	<li><a href="">EN</a></li>
	<li><a href="<?php echo $link_address;?>/UI/Cart_UI.php" class="cartIcon"> <?php echo count($_SESSION["cart"])." ITEMS";
				?></a></li>
	<li><a href="<?php echo $link_address;?>/UI/Food_UI.php">Haarlem Food</a></li>
	<li><a href="<?php echo $link_address;?>/UI/Dance_UI.php">Haarlem Dance</a></li>
	<li><a href="<?php echo $link_address;?>/UI/Jazz_UI.php">Haarlem Jazz</a></li>
	<li><a href="/index.php">Home</a></li>
</ul>
<header class="header">
<!--for background image-->
<!-- the good header -->
</header>
