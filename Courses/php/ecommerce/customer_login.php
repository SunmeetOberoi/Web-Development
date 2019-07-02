<?php
  include('includes/db.php');
?>
<div align="center">
  <form method="POST" action="">
    <table width="600" bgcolor="skyblue" style="padding: 10px" >

      <tr align="center">
        <td colspan="2"><h2>Login or Register to BUY!</h2></td>
      </tr>

      <tr align="center">
        <td align="right"><b>Email:</b></td>
        <td><input type="email" name="email" placeholder="Enter e-mail" required/></td>
      </tr>

      <tr align="center">
        <td align="right"><b>Password:</b></td>
        <td><input type="password" name="pass" placeholder="Enter password" required/></td>
      </tr>

      <tr align="center">
        <td colspan="2"><a href="checkout.php?forgot_password">Forgot Password?</a></td>
      </tr>      

      <tr align="center">
        <td colspan="2"><input type="submit" name="login" value="Login"/></td>
      </tr>

    </table>
    <h2 style="float: right; padding-right: 20px;"><a href="customer_register.php" style="text-decoration: none;">New? Register Here</a></h2>
  </form>
</div>

<?php
  if(isset($_POST['login'])){
    $c_email = $_POST['email'];
    $c_pass = $_POST['pass'];
    $sel_c = "SELECT customer_pass FROM customers WHERE customer_email='$c_email'";
    $run_sel_c = mysqli_query($con, $sel_c);

    $hash = mysqli_fetch_array($run_sel_c)['customer_pass'];

    $check_customer = mysqli_num_rows($run_sel_c);

    if(!password_verify($c_pass, $hash)){
      echo "<script>alert('Email or Password incorrect')</script>";
      echo "<script>window.open('checkout.php', '_self')</script>";
    }
    else{
      $ip = getIp();
      $sel_cart = "SELECT * FROM cart WHERE ip_add = '$ip'";
      $run_cart = mysqli_query($con, $sel_cart);
      $check_cart = mysqli_num_rows($run_cart);

      $_SESSION['customer_email'] = $c_email;

      if($check_cart == 0)
        echo "<script>window.open('customer/my_account.php', '_self')</script>";
      else
        echo "<script>window.open('checkout.php', '_self')</script>";
    }
  }
?>