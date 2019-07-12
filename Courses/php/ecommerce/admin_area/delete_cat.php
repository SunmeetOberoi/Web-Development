<?php
  include("includes/db.php");

  if(isset($_GET['delete_cat'])){
    $cat_id = $_GET['delete_cat'];

    $del_query = "DELETE FROM categories WHERE cat_id = '$cat_id'";

    $run_del_query = mysqli_query($con, $del_query);

    if($run_del_query){
      echo "<script>alert('A category has been deleted!')</script>";
      echo "<script>window.open('index.php?view_cats', '_self')</script>";
    }
  }
 ?>
