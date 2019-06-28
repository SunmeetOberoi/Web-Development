<?php
  include("functions/functions.php");
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
        <a href="index.php"><img id="logo" src="images/logo.gif"></a>
        <img id="banner" src="images/ad_banner.gif">
      </div>

      <div class="menubar">
        <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="all_products.php">All Products</a></li>
          <li><a href="customer/my_account.php">My Account</a></li>
          <li><a href="#">Sign Up</a></li>
          <li><a href="cart.php">Shopping Cart</a></li>
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

          <div id="sidebar_title">Categories</div>
          <ul id="cats">
            <?php get_cats(); ?>
          </ul>

          
          <div id="sidebar_title">Brands</div>
          <ul id="cats">
            <?php get_brands(); ?>
          </ul>

        </div>

        <div id="content_area">
          <?php cart(); ?>
          <div id="shopping_cart">
            <span style="float:right; font-size:18px; padding: 5px; line-height: 40px">
              Welcome Guest! <b style="color:yellow;">Shopping Cart -</b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?><a href="cart.php" style="color: yellow;">Goto to Cart</a>
            </span>
          </div>
          <div id="products_box">
            <form action="" method="POST" enctype='multipart/form-data'>

                <table align="center" width="700" bgcolor="skyblue">
                    <tr align="center">
                        <th>Remove</th>
                        <th>Product(s)</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php cart_items(); ?>
                    <tr align="center">
                      <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
                      <td><input type="submit" name="continue" value="Continue Shopping"/></td>
                      <td><button><a href="checkout.php" style="text-decoration: none; color: black;">Checkout</a></button></td>
                    </tr>
                </table>

            </form>

            <?php
              $ip = getIp();
              if(isset($_POST['update_cart'])){
                foreach ($_POST['remove'] as $remove_id) {
                  $delete_query = "DELETE FROM cart WHERE p_id='$remove_id' AND ip_add='$ip';";

                  $run_delete_query = mysqli_query($con, $delete_query);

                  if($run_delete_query){
                    echo "<script>window.open('cart.php', '_self')</script>";
                  }
                }
              }
              if(isset($_POST['continue'])){
                echo "<script>window.open('index.php', '_self')</script>";          
              }
            ?>
          </div>
        </div>

      </div>

      <div id="footer">
        <h2 style="text-align: center; padding-top: 30px;">&copy; 2019 by Sunmeet Oberoi</h2>
      </div>

    </div>
  </body>
</html>