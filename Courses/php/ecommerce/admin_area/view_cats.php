<?php
  session_start();
  if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('admin_login.php', '_self')</script>";
  }
 ?>
<table width="795" align="center" bgcolor="pink">

  <tr align="center">
    <td colspan="4"> <h2>View All Categories Here</h2> </td>
  </tr>

  <tr align='center' bgcolor='skyblue'>
    <th>S.No.</th>
    <th>Title</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>


  <?php
    include('includes/db.php');
    $get_cat = "SELECT * FROM categories";
    $run_get_cat = mysqli_query($con, $get_cat);
    $i = 0;
    while ($cat_row = mysqli_fetch_array($run_get_cat)) {

      $cat_id = $cat_row['cat_id'];
      $cat_title = $cat_row['cat_title'];
      $i++;

      echo "
        <tr align='center'>
          <td>$i</td>
          <td>$cat_title</td>
          <td><a href='index.php?edit_cat=$cat_id'>Edit</a></td>
          <td><a href='delete_cat.php?delete_cat=$cat_id'>Delete</a></td>
        </tr>
      ";

    }
    ?>

</table>
