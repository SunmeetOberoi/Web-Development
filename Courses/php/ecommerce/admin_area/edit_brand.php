<!DOCTYPE html>
<?php
  include('includes/db.php');

  if(isset($_GET['edit_brand'])){
    $brand_id = $_GET['edit_brand'];
    $get_brand = "SELECT brand_title FROM brands WHERE brand_id='$brand_id'";
    $run_brand = mysqli_query($con, $get_brand);
    $brand_title = mysqli_fetch_array($run_brand)['brand_title'];
  }

 ?>
<form action="" method="POST" style="padding:80px;">

  <b>Update Brand</b>

  <input type="text" name="new_brand" value="<?php echo $brand_title ?>" required/>
  <input type="submit" name="update_brand" value="Update Brand"/>

</form>

<?php

  if(isset($_POST['update_brand'])){
    $new_brand = $_POST['new_brand'];
    $update_query = "UPDATE brands SET brand_title='$new_brand' WHERE brand_id='$brand_id'";
    $run_brand = mysqli_query($con, $update_query);

    if($run_brand){
      echo "<script>alert('Brand has been updated')</script>";
      echo "<script>window.open('index.php?view_brands', '_self')</script>";
    }
  }

 ?>
