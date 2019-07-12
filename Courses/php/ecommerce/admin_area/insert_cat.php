<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('admin_login.php', '_self')</script>";
  }
 ?>
<form action="" method="POST" style="padding:80px;">

  <b>Insert New Category</b>

  <input type="text" name="new_cat" required/>
  <input type="submit" name="add_cat" value="Add Category"/>

</form>

<?php
  include('includes/db.php');

  if(isset($_POST['add_cat'])){
    $new_cat = $_POST['new_cat'];
    $insert_query = "INSERT INTO categories (cat_id, cat_title) VALUES (NULL, '$new_cat')";
    $run_cat = mysqli_query($con, $insert_query);

    if($run_cat){
      echo "<script>alert('New category has been inserted')</script>";
      echo "<script>window.open('index.php?view_cats', '_self')</script>";
    }
  }

 ?>
