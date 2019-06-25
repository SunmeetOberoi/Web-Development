<?php
  include("includes/db.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Inserting Product</title>
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script> -->
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
  </head>
  <body bgcolor="skyblue">

    <form action="insert_product.php" method="POST" enctype="multipart/form-data">
      <table align="center" width="900" border="2" bgcolor="orange">

        <tr align="center">
          <td colspan="2"><h2>Insert New Post Here</h2></td>
        </tr>
        <tr>
          <td align="right"><b>Product Title:</b></td>
          <td><input type="text" name="product_title"/></td>
        </tr>
        <tr>
          <td align="right"><b>Product Category:</b></td>
          <td>
            <select name="product_cat">
              <option>Select Category</option>
              <?php
                $get_cats = 'SELECT * FROM categories';
                $run_cats = mysqli_query($con, $get_cats);
                while($row_cat = mysqli_fetch_array($run_cats)){
                    $cat_id = $row_cat['cat_id'];
                    $cat_title = $row_cat['cat_title'];
                    echo "<option value=$cat_id>$cat_title</option>";
                }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td align="right"><b>Product Brand:</b></td>
          <td>
            <select name="product_brand">
              <option>Select Brand</option>
              <?php
                $get_brands = 'SELECT * FROM brands';
                $run_brands = mysqli_query($con, $get_brands);
                while($row_brand = mysqli_fetch_array($run_brands)){
                    $brand_id = $row_brand['brand_id'];
                    $brand_title = $row_brand['brand_title'];
                    echo "<option value=$brand_id>$brand_title</option>";
                }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td align="right"><b>Product Image:</b></td>
          <td><input type="file" name="product_image"/></td>
        </tr>
        <tr>
          <td align="right"><b>Product Price:</b></td>
          <td><input type="text" name="product_price"/></td>
        </tr>
        <tr>
          <td align="right"><b>Product Description:</b></td>
          <td><textarea name="product_desc" cols="30" rows="5"></textarea></td>
        </tr>
        <tr>
          <td align="right"><b>Product Keyword:</b></td>
          <td><input type="text" name="product_keyword"/></td>
        </tr>
        <tr align="center">
          <td colspan="2"><input type="submit" name="insert_post" value="Insert Now" style="padding: 10px; border-radius: 5px;"/></td>
        </tr>
      </table>
    </form>

    <script>
      CKEDITOR.replace("product_desc");
    </script>

  </body>
</html>