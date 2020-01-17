<?php
include_once 'cart.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>payment</title>
	</head>
	<body>
		<h2>Payment details</h2>
		<?php
		Make_Payment();
			?>

			<div class="wrapper">
    <div class="container">
        <form action="">
            <h1>
                <i class="fas fa-shipping-fast"></i>
                Shipping Details
            </h1>
            <div class="name">
                <div>
                    <label for="f-name">First</label>
                    <input type="text" name="f-name">
                </div>
                <div>
                    <label for="l-name">Last</label>
                    <input type="text" name="l-name">
                </div>
            </div>
            <div class="street">
                <label for="name">Street</label>
                <input type="text" name="address">
            </div>
            <div class="address-info">
                <div>
                    <label for="city">City</label>
                    <input type="text" name="city">
                </div>
                <div>
                    <label for="state">State</label>
                    <input type="text" name="state">
                </div>
                <div>
                    <label for="zip">Zip</label>
                    <input type="text" name="zip">
                </div>
            </div>
            <h1>
                <i class="far fa-credit-card"></i> Payment Information
            </h1>
            <div class="cc-num">
                <label for="card-num">Credit Card No.</label>
                <input type="text" name="card-num">
            </div>
            <div class="cc-info">
                <div>
                    <label for="card-num">Exp</label>
                    <input type="text" name="expire">
                </div>
                <div>
                    <label for="card-num">CCV</label>
                    <input type="text" name="security">
                </div>
            </div>
            <div class="btns">
                <button>Purchase</button>
                <button>Back to cart</button>
            </div>
        </form>
    </div>
</div>

			<h3>Select a payment method</h3>
			<i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>

			<form action="pdfTicket.php" method="post">
			<p>	<label for="">Card Number</label>
				<input type="text" name="" value="name"></p>
			<p>	<label for="">Exiry Date</label>
				<input type="text" name="" value=""></p>
			   <p><label for="">Security Code</label>
				<input type="text" name="" value=""></p>

		<h3>Customer Details</h3>
		<p>The invoice will be sent to your email</p>
		<form action="pdfTicket.php" method="post">
		<p>	<label for="">Name</label>
			<input type="text" name="" value="name">
			<label for="">Surnme</label>
			<input type="text" name="" value=""></p>
		   <p><label for="">Email</label>
			<input type="text" name="" value=""></p>
			<p><label for="">Verify email</label>
			<input type="text" name="" value=""></p>




		<?php
		if(isset($_GET['Checkout']))
		{

		}else {
			header('Location:'.$Jazz_landing_Page);
		}
		?>
	<P>	<button type="submit" name="paymentbtn">Make Payment</button></P>
</form>
	</body>
</html>
