<table width="795" align="center" bgcolor="pink">

  <tr align="center">
    <td colspan="4"> <h2>View All Brands Here</h2> </td>
  </tr>

  <tr align='center' bgcolor='skyblue'>
    <th>S.No.</th>
    <th>Title</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>


  <?php
    include('includes/db.php');
    $get_brand = "SELECT * FROM brands";
    $run_get_brand = mysqli_query($con, $get_brand);
    $i = 0;
    while ($brand_row = mysqli_fetch_array($run_get_brand)) {

      $brand_id = $brand_row['brand_id'];
      $brand_title = $brand_row['brand_title'];
      $i++;

      echo "
        <tr align='center'>
          <td>$i</td>
          <td>$brand_title</td>
          <td><a href='index.php?edit_brand=$brand_id'>Edit</a></td>
          <td><a href='delete_brand.php?delete_brand=$brand_id'>Delete</a></td>
        </tr>
      ";

    }
    ?>

</table>
