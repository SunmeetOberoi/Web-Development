<h2 style="text-align:center;">Do you really want to delete your account?</h2>
<br/>
<form action="" method="POST" align="center">
  <input type="submit" name="yes" value="Yes"/>
  <input type="submit" name="no" value="No"/>
</form>

<?php
  include('../include/db.php');
  $c_email = $_SESSION['customer_email'];
  if(isset($_POST['yes'])){
    $del_query = "DELETE FROM customers WHERE customer_email = '$c_email'";
    mysqli_query($con, $del_query);
    echo "<script>alert('Account deleted successfully')</script>";
    echo "<script>window.open('../logout.php', '_self')</script>";
  }
  elseif(isset($_POST['no'])){
    echo "<script>window.open('my_account.php', '_self')</script>";
  }
?>