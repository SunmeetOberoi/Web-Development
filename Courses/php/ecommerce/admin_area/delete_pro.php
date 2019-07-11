<?php
  include("includes/db.php");

  if(isset($_GET['delete_pro'])){
    $pro_id = $_GET['delete_pro'];

    $del_query = "DELETE FROM products WHERE product_id = '$pro_id'";

    $run_del_query = mysqli_query($con, $del_query);

    if($run_del_query){
      echo "<script>alert('A product has been deleted!')</script>";
      echo "<script>window.open('index.php?view_product', '_self')</script>";
    }
  }
 ?>
