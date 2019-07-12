<?php
  session_start();
  if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('admin_login.php', '_self')</script>";
  }
 ?>
<table width="795" align="center" bgcolor="pink">

  <tr align="center">
    <td colspan="6"> <h2>View All Customers Here</h2> </td>
  </tr>

  <tr align='center' bgcolor='skyblue'>
    <th>S.No.</th>
    <th>Name</th>
    <th>Email</th>
    <th>Image</th>
    <th>Delete</th>
  </tr>


  <?php
    include('includes/db.php');
    $get_customers = "SELECT * FROM customers";
    $run_get_customers = mysqli_query($con, $get_customers);
    $i = 0;
    while ($c_row = mysqli_fetch_array($run_get_customers)) {

      $c_id = $c_row['customer_id'];
      $c_name = $c_row['customer_name'];
      $c_image = $c_row['customer_image'];
      $c_email = $c_row['customer_email'];
      $i++;

      echo "
        <tr align='center'>
          <td>$i</td>
          <td>$c_name</td>
          <td>$c_email</td>
          <td><img src='../customer/customer_images/$c_image' height='60' width='60'></td>
          <td><a href='delete_c.php?delete_c=$c_id'>Delete</a></td>
        </tr>
      ";
    }
    ?>

</table>
