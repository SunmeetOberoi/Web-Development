<!DOCTYPE html>
<?php
  include('includes /db.php');
  if(isset($_GET['delete_c'])){
    $c_id = $_GET['delete_c'];
    $del_query = "DELETE FROM customers WHERE customer_id = '$c_id'";
    $run_del = mysqli_query($con, $del_query);
    if($run_del){
      echo "<script>alert('Customer has been deleted')</script>";
      echo "<script>window.open('index.php?view_customers', '_self')</script>";
    }
  }
 ?>
