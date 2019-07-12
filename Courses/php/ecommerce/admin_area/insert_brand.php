<!DOCTYPE html>
<form action="" method="POST" style="padding:80px;">

  <b>Insert New Brand</b>

  <input type="text" name="new_brand" required/>
  <input type="submit" name="add_brand" value="Add Brand"/>

</form>

<?php
  include('includes/db.php');

  if(isset($_POST['add_brand'])){
    $new_brand = $_POST['new_brand'];
    $insert_query = "INSERT INTO brands (brand_title) VALUES ('$new_brand')";
    $run_cat = mysqli_query($con, $insert_query);

    if($run_cat){
      echo "<script>alert('New brand has been inserted')</script>";
      echo "<script>window.open('index.php?view_brands', '_self')</script>";
    }
  }

 ?>
