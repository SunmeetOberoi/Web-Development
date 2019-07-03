<?php
	session_start();
	include("../functions/functions.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>My Online Shop</title>
		<link rel="stylesheet" type="text/css" media="all" href="styles/style.css"/>
	</head>
	<body>
		<div class="main_wrapper">

			<div class="header_wrapper">
				<a href="../index.php"><img id="logo" src="../images/logo.gif"></a>
				<img id="banner" src="../images/ad_banner.gif">
			</div>

			<div class="menubar">
				<ul id="menu">
					<li><a href="../index.php">Home</a></li>
					<li><a href="../all_products.php">All Products</a></li>
					<li><a href="../customer/my_account.php">My Account</a></li>
          <li><a href="../customer_register.php">Sign Up</a></li>
					<li><a href="../cart.php">Shopping Cart</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
				<div id="form">
					<form method="GET" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search a Product"/>
						<input type="submit" name="search" value="Search"/>
					</form>
				</div>
			</div>      

			<div class="content_wrapper">

				<div id="sidebar">

					<div id="sidebar_title">My Account</div>
					<ul id="my_acc">
            <?php
            if(isset($_SESSION['customer_email'])){
              $c_email = $_SESSION['customer_email'];
              $get_image = "SELECT customer_image FROM customers WHERE customer_email = '$c_email'";
              $run_get_image = mysqli_query($con, $get_image);
              $image = mysqli_fetch_array($run_get_image)['customer_image'];
              echo "<p style:'text-align:center;'><img src='customer_images/$image' width='150' height='150'/></p>";
            }
						?>
						<li><a href="my_account.php?my_orders">My Orders</a></li>
						<li><a href="my_account.php?edit_account">Edit Account</a></li>
						<li><a href="my_account.php?change_pass">Change Password</a></li>
						<li><a href="my_account.php?delete_account">Delete Account</a></li>
					</ul>

				</div>

				<div id="content_area">
					<?php cart(); ?>
					<div id="shopping_cart">
						<span style="float:right; font-size:18px; padding: 5px; line-height: 40px">

							<?php
								if(isset($_SESSION['customer_email'])){
									$c_email = $_SESSION['customer_email'];
									$get_name_query = "SELECT customer_name FROM customers WHERE customer_email='$c_email'";
									$run_get_name = mysqli_query($con, $get_name_query);
									$c_name = mysqli_fetch_array($run_get_name)['customer_name'];
								}
								else
									$c_name = "Guest";
								echo "<b>Welcome </b>$c_name !";
							?>
								
							<?php
								if(!isset($_SESSION['customer_email']))
									echo "<a href='../checkout.php' style='color:orange;'>Login</a>";
								else
									echo "<a href='../logout.php' style='color:orange;'>Logout</a>";
							?>

            </span>
          </div>
          <?php
          if(isset($_GET['edit_account'])){
            include('edit_account.php');
          }
          elseif (isset($_GET['my_orders'])) {
          }
          elseif (isset($_GET['change_pass'])) {
          }
          elseif(isset($_GET['delete_account'])){

          }else{
            echo "<h2 style='text-align: center; padding:20px;'>Welcome: $c_name</h2>    
            <p style='text-align:center' ><b>You can see your order progress <a href='my_account.php?my_orders'>here!</a></b></p>";
          }
          ?>
				</div>

			</div>

			<div id="footer">
				<h2 style="text-align: center; padding-top: 30px;">&copy; 2019 by Sunmeet Oberoi</h2>
			</div>

		</div>
	</body>
</html>