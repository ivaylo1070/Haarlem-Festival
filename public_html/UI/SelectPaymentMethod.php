<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ("mollie/vendor/autoload.php");
require_once ("mollie/examples/functions.php");

$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8"); // key from the slides

$payment = $mollie->payments->create([
        "amount" => [
        "currency" => "EUR",
        "value" => "18.69"
    ],
    "description" => "Haarlem Festival Payment",
    "redirectUrl" => "http://hfitteam4.infhaarlem.nl/UI/PaymentConfirmation.php" ,
]);

header("Location: " . $payment->getCheckoutUrl(), true, 303);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=UTF-8">
        <title>Haarlem Festival</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
	   <h1>Home page </h1>
	    Golden membership pay once
	    premuim membership
    </body>
</html>
