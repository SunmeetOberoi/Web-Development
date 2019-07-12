<?php
  session_start();
  if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('admin_login.php', '_self')</script>";
  }
 ?>
<table width="795" align="center" bgcolor="pink">

  <tr align="center">
    <td colspan="6"> <h2>View All Products Here</h2> </td>
  </tr>

  <tr align='center' bgcolor='skyblue'>
    <th>S.No.</th>
    <th>Title</th>
    <th>Image</th>
    <th>Price</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>


  <?php
    include('includes/db.php');
    $get_products = "SELECT * FROM products";
    $run_get_products = mysqli_query($con, $get_products);
    $i = 0;
    while ($pro_row = mysqli_fetch_array($run_get_products)) {

      $pro_id = $pro_row['product_id'];
      $pro_title = $pro_row['product_title'];
      $pro_image = $pro_row['product_image'];
      $pro_price = $pro_row['product_price'];
      $i++;

      echo "
        <tr align='center'>
          <td>$i</td>
          <td>$pro_title</td>
          <td><img src='product_images/$pro_image' height='60' width='60'></td>
          <td>$price</td>
          <td><a href='index.php?edit_pro=$pro_id'>Edit</a></td>
          <td><a href='delete_pro.php?delete_pro=$pro_id'>Delete</a></td>
        </tr>
      ";

    }
    ?>

</table>
