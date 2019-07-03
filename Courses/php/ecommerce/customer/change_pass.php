<h2 style="text-align: center;">Change Your Password</h2>

<form action="" method="POST">
  <table align="center" width="800">
      
    <tr>
      <td align="right"><b>Enter Current Password: </b></td>
      <td><input type="password" name="current_pass" required/></td>
    </tr>
    
    <tr>
      <td align="right"><b>Enter New Password: </b></td>
      <td><input type="password" name="new_pass" required/></td>
    </tr>
    
    <tr>
      <td align="right"><b>Confirm New Password: </b></td>
      <td><input type="password" name="new_pass_again" required/></td>
    </tr>

    <tr align="center">
      <td colspan="2" align="center"><input type="submit" name="change_pass" value="Change Password"/></td>
    </tr>

  </table>
</form>

<?php 
  if(isset($_POST['change_pass'])){
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $c_email = $_SESSION['customer_email'];

    $sel_c = "SELECT customer_pass FROM customers WHERE customer_email='$c_email'";
    $run_sel_c = mysqli_query($con, $sel_c);

    $hash = mysqli_fetch_array($run_sel_c)['customer_pass'];

    if(!password_verify($current_pass, $hash)){
      echo "<script>alert('Incorrect Password')</script>";
      echo "<script>window.open('my_account.php?change_pass', '_self')</script>";
    }else{
      $new_hash = password_hash($new_pass, PASSWORD_DEFAULT);
      $update_pass_query = "UPDATE customers SET customer_pass='$new_hash' WHERE customer_email = '$c_email'";
      $run_update_pass = mysqli_query($con, $update_pass_query);
      echo "<script>alert('Password Changed Succesfully')</script>";
      echo "<script>window.open('my_account.php', '_self')</script>";
    }
  }
?>