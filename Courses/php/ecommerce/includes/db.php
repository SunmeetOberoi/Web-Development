<?php
  $con = mysqli_connect("localhost", "ecommerce_admin", "", "ecommerce");

  if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: ". mysql_connect_error();
  }
  
?>