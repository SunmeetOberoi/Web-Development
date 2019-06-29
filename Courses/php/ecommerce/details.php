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
        <img id="logo" src="images/logo.gif">
        <img id="banner" src="images/ad_banner.gif">
      </div>

      <div class="menubar">
        <ul id="menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">All Products</a></li>
          <li><a href="#">My Account</a></li>
          <li><a href="#">Sign Up</a></li>
          <li><a href="#">Shopping Cart</a></li>
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
          <div id="shopping_cart">
            <span style="float:right; font-size:18px; padding: 5px; line-height: 40px">
              Welcome Guest! <b style="color:yellow;">Shopping Cart -</b>Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?><a href="cart.php" style="color: yellow;">Got to Cart</a>
            </span>
          </div>
          <div style="width: 780px;text-align: center;">
            <?php
              if(isset($_GET['pro_id'])){
                $product_id = $_GET['pro_id'];
                $get_pro_query = "SELECT * FROM products WHERE product_id = '$product_id'";
                $run_get_pro = mysqli_query($con, $get_pro_query);
                while($row_pro = mysqli_fetch_array($run_get_pro)){

                  $product_title = $row_pro['product_title'];
                  $product_price = $row_pro['product_price'];
                  $product_image = $row_pro['product_image'];
                  $product_desc = $row_pro['product_desc'];
          
                  echo "
                      <div>
                          <h3>$product_title</h3>
                          <img src='admin_area/product_images/$product_image' width='400' height='300' style='border: 2px solid black;'/>
          
                          <p><b>$ $product_price</b></p>
                          <p>$product_desc</p>
                          <br/>
                          <a href='index.php' style='float: left;'>Go Back</a>
                          <a href='index.php?add_cart=$product_id'><button style='float:right;' margin='5px'>Add to Cart</button></a>
                      </div>
                  
                  ";
                }
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