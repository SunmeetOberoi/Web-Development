<?php

$con = mysqli_connect("localhost", "ecommerce_admin", "", "ecommerce");

if(mysqli_connect_errno()){
  echo "Failed to connect to MySQL: ". mysql_connect_error();
}

function get_cats(){
	global $con;
	$get_cats = 'SELECT * FROM categories';
	$run_cats = mysqli_query($con, $get_cats);
	while($row_cat = mysqli_fetch_array($run_cats)){
		$cat_id = $row_cat['cat_id'];
		$cat_title = $row_cat['cat_title'];
		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}

function get_brands(){
	global $con;
	$get_brands = 'SELECT * FROM brands';
	$run_brands = mysqli_query($con, $get_brands);
	while($row_brand = mysqli_fetch_array($run_brands)){
		$brand_id = $row_brand['brand_id'];
		$brand_title = $row_brand['brand_title'];
		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}

function get_products(){
	global $con;

	if(isset($_GET['cat'])){
    $cat_id = $_GET['cat'];
    $get_pro_query = "SELECT * FROM products WHERE product_cat = '$cat_id'";

	}
	elseif (isset($_GET['brand'])) {
    $brand_id = $_GET['brand'];
    $get_pro_query = "SELECT * FROM products WHERE product_brand = '$brand_id'";
		
	}else {
    $get_pro_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0, 6";
  }
  $run_get_pro = mysqli_query($con, $get_pro_query);
  if(mysqli_num_rows($run_get_pro)==0) {
    echo "<h3 style='padding:20px';>No Products Found!</h3>";
  }

  while($row_pro = mysqli_fetch_array($run_get_pro)){
    $product_id = $row_pro['product_id'];
    $product_title = $row_pro['product_title'];
    $product_price = $row_pro['product_price'];
    $product_image = $row_pro['product_image'];

    echo "
      <div id='single_product'>
        <h3>$product_title</h3>
        <img src='admin_area/product_images/$product_image' width='180' height='180'/>

        <p><b> Price: $ $product_price</b></p>

        <a href='details.php?pro_id=$product_id' style='float: left;'>Details</a>
        <a href='index.php?add_cart=$product_id'><button style='float:right;'>Add to Cart</button></a>
      </div>
    
    ";  
	}   
}

function get_all_products(){

  global $con;

  $get_pro_query = "SELECT * FROM products";

  $run_get_pro = mysqli_query($con, $get_pro_query);
  if(mysqli_num_rows($run_get_pro)==0) {
    echo "<h3 style='padding:20px';>No Products Found!</h3>";
  }

  while($row_pro = mysqli_fetch_array($run_get_pro)){
    $product_id = $row_pro['product_id'];
    $product_title = $row_pro['product_title'];
    $product_price = $row_pro['product_price'];
    $product_image = $row_pro['product_image'];

    echo "
      <div id='single_product'>
        <h3>$product_title</h3>
        <img src='admin_area/product_images/$product_image' width='180' height='180'/>

        <p><b>$ $product_price</b></p>

        <a href='details.php?pro_id=$product_id' style='float: left;'>Details</a>
        <a href='index.php?add_cart=$product_id'><button style='float:right;'>Add to Cart</button></a>
      </div>
    
    ";  
	}   
}

function get_results(){
  global $con;

  if(isset($_GET['user_query'])){
  
    $search_query = $_GET['user_query'];
    $get_pro_query = "SELECT * FROM products WHERE product_keyword LIKE '%$search_query%'"; 
    $run_get_pro = mysqli_query($con, $get_pro_query);
    if(mysqli_num_rows($run_get_pro)==0) {
      echo "<h3 style='padding:20px';>No Products Found!</h3>";
    }

    while($row_pro = mysqli_fetch_array($run_get_pro)){
      $product_id = $row_pro['product_id'];
      $product_title = $row_pro['product_title'];
      $product_price = $row_pro['product_price'];
      $product_image = $row_pro['product_image'];

      echo "
        <div id='single_product'>
          <h3>$product_title</h3>
          <img src='admin_area/product_images/$product_image' width='180' height='180'/>

          <p><b>$ $product_price</b></p>

          <a href='details.php?pro_id=$product_id' style='float: left;'>Details</a>
          <a href='index.php?add_cart=$product_id'><button style='float:right;'>Add to Cart</button></a>
        </div>
      
      ";  
    }
  }   
}

function getIp() {
  $ip = $_SERVER['REMOTE_ADDR'];
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  return $ip;
}


function cart(){
  global $con;

  if(isset($_GET['add_cart'])){

    $ip=getIp();

    $product_id = $_GET['add_cart'];

    $check_pro_query = "SELECT * FROM cart WHERE ip_add='$ip' AND p_id='$product_id'";

    $run_check_pro_query = mysqli_query($con, $check_pro_query);

    if(mysqli_num_rows($run_check_pro_query) > 0){
      echo "";
    }
    else{
      $insert_product = "INSERT INTO cart VALUES ('$product_id', '$ip', '1');";

      $run_insert_pro_query = mysqli_query($con, $insert_product);

      echo "<script>window.open('index.php', '_self')</script>";
      
    }
  }

}
?>