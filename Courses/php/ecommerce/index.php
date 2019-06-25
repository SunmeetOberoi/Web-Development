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
            <li><a href="#">Laptops</a></li>
            <li><a href="#">Computers</a></li>
            <li><a href="#">Mobiles</a></li>
            <li><a href="#">Cameras</a></li>
            <li><a href="#">IPads</a></li>
            <li><a href="#">Tablets</a></li>
          </ul>

          
          <div id="sidebar_title">Brands</div>
          <ul id="cats">
            <li><a href="#">HP</a></li>
            <li><a href="#">Dell</a></li>
            <li><a href="#">Motorola</a></li>
            <li><a href="#">Sony Ericson</a></li>
            <li><a href="#">LG</a></li>
            <li><a href="#">Apple</a></li>
          </ul>

        </div>

        <div id="content_area">This is content area</div>

      </div>

      <div id="footer">This is footer area</div>

    </div>
  </body>
</html>