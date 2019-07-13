<div>
  <h2 align="center">Confirm your order</h2>
  <div style="text-align: center; padding:10px;">
    <button type="button" name="confirm_order" href="order_confirmed.php" style="radius: 5px;"><a href="checkout.php?order_confirmed" style="text-decoration:none; color:black;">Confirm Order</a></button>
  </div>
</div>

<?php
  include('includes/db.php');
  if(isset($_GET['order_confirmed'])){
    $ip = getIp();
    //fetch cart items
    $get_order = "SELECT * FROM cart WHERE ip_add = '$ip'";
    $run_get_order = mysqli_query($con, $get_order);
    $email = $_SESSION['customer_email'];
    $time_stamp = time();
    while($row_pro = mysqli_fetch_array($run_get_order)){
      //insert elements in the orders table
      $pro_id = $row_pro['p_id'];
      $qty = $row_pro['qty'];
      $insert_query = "INSERT INTO orders (c_email, p_id, qty, time_stamp) VALUES ('$email', '$pro_id', '$qty', FROM_UNIXTIME($time_stamp))";
      $run_insert = mysqli_query($con, $insert_query);
    }
    //empty cart
    $empty_query = "DELETE FROM cart WHERE ip_add='$ip'";
    $run_empty_query = mysqli_query($con, $empty_query);
    echo "<script>alert('Your order is confirmed!')</script>";
    echo "<script>window.open('customer/my_account.php', '_self')</script>";
  }
 ?>
