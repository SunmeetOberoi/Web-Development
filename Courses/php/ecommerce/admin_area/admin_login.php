<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles/admin_styles.css">
  </head>
  <body>
    <div class="login">
    	<h1>Admin Login</h1>
        <form method="post" action="">
        	<input type="text" name="email" placeholder="Username" required="required" />
            <input type="password" name="password" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Let me in.</button>
        </form>
    </div>
  </body>
</html>

<?php
  include('includes/db.php');
  session_start();
  if(isset($_POST['login'])){
    $a_email = $_POST['email'];
    echo $a_pass = $_POST['password'];
    echo $sel_a = "SELECT password FROM admins WHERE email='$a_email'";
    $run_sel_a = mysqli_query($con, $sel_a);

    echo $hash = mysqli_fetch_array($run_sel_a)['password'];

    if(!password_verify($a_pass, $hash)){
      echo "<script>alert('Email or Password incorrect')</script>";
      echo "<script>window.open('admin_login.php', '_self')</script>";
    }
    else{
      $_SESSION['admin_email'] = $a_email;

      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
?>
