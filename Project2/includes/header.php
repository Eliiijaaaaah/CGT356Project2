<div class="header">
	<?php
		@session_start();
		$activeItem = $_SESSION["activeItem"];
	?>
    <div class="login">
	<?php
		if($_SESSION['loggedIn'] == true) {
			echo "Welcome back, ".$_SESSION['firstname']."("."<span><a href='logout.php'>logout</a></span>".")";
		}
		else {
			echo "<span><a href='login.php'>login or register</a></span>";
		}
	?>
	<link rel="stylesheet" href="includes/master.css" type="text/css" />
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

	  </div>
    	<ul class="menu">
				<li><a href="index.php" id="home" <?php if($activeItem == "home")echo "class='active'" ?>>Home</a></li>
	      <li><a href="shipping.php" id="shipping" <?php if($activeItem == "shipping")echo "class='active'" ?>>Shipping</a></li>
				<li><a href="billing.php" id="billing" <?php if($activeItem == "billing")echo "class='active'" ?>>Billing</a></li>
				<li><a href="account.php" id="account" <?php if($activeItem == "account")echo "class='active'" ?>>Account Info</a></li>
				<li><a href="readme.php" id="readme" <?php if($activeItem == "readme")echo "class='active'" ?>>Readme</a></li>
			</ul>
</div>
