<?php
  include("includes/db.php");
  session_start();
  if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('admin_login.php', '_self')</script>";
  }
  else{
    if(isset($_GET['delete_brand'])){
      $brand_id = $_GET['delete_brand'];

      $del_query = "DELETE FROM brands WHERE brand_id = '$brand_id'";

      $run_del_query = mysqli_query($con, $del_query);

      if($run_del_query){
        echo "<script>alert('A brand has been deleted!')</script>";
        echo "<script>window.open('index.php?view_brands', '_self')</script>";
      }
    }
  }

 ?>
