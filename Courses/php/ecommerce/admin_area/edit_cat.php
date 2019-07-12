<!DOCTYPE html>
<?php
  include('includes/db.php');
  session_start();
  if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('admin_login.php', '_self')</script>";
  }
  if(isset($_GET['edit_cat'])){
    $cat_id = $_GET['edit_cat'];
    $get_cat = "SELECT cat_title FROM categories WHERE cat_id='$cat_id'";
    $run_cat = mysqli_query($con, $get_cat);
    $cat_title = mysqli_fetch_array($run_cat)['cat_title'];
  }

 ?>
<form action="" method="POST" style="padding:80px;">

  <b>Update Category</b>

  <input type="text" name="new_cat" value="<?php echo $cat_title ?>" required/>
  <input type="submit" name="update_cat" value="Update Category"/>

</form>

<?php

  if(isset($_POST['update_cat'])){
    $new_cat = $_POST['new_cat'];
    $update_query = "UPDATE categories SET cat_title='$new_cat' WHERE cat_id='$cat_id'";
    $run_cat = mysqli_query($con, $update_query);

    if($run_cat){
      echo "<script>alert('Category has been updated')</script>";
      echo "<script>window.open('index.php?view_cats', '_self')</script>";
    }
  }

 ?>
