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
      <table align="center" width="795" border="2" bgcolor="#187eae">

        <tr align="center">
          <td colspan="2"><h2>Insert New Post Here</h2></td>
        </tr>
        <tr>
          <td align="right"><b>Product Title:</b></td>
          <td><input type="text" name="product_title" size="70" required/></td>
        </tr>
        <tr>
          <td align="right"><b>Product Category:</b></td>
          <td>
            <select name="product_cat" required>
              <option value="">Select Category</option>
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
            <select name="product_brand" required>
              <option value="">Select Brand</option>
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
          <td><input type="file" name="product_image" required/></td>
        </tr>
        <tr>
          <td align="right"><b>Product Price:</b></td>
          <td><input type="text" name="product_price" required/></td>
        </tr>
        <tr>
          <td align="right"><b>Product Description:</b></td>
          <td><textarea name="product_desc" cols="30" rows="5"></textarea></td>
        </tr>
        <tr>
          <td align="right"><b>Product Keyword:</b></td>
          <td><input type="text" name="product_keyword" size="50" required/></td>
        </tr>
        <tr align="center">
          <td colspan="2"><input type="submit" name="insert_post" value="Insert Now" style="padding: 10px; border-radius: 5px;"/></td>
        </tr>
      </table>
    </form>

    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script>
      CKEDITOR.replace("product_desc");
      // validation for ck-editor
      $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['product_desc'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Please enter a description' );
                e.preventDefault();
            }
        });
    </script>

  </body>
</html>

<?php
  if(isset($_POST['insert_post'])){

    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keyword = $_POST['product_keyword'];

    $product_image = $_FILES['product_image']['name'];
    $product_image_temp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_temp, "product_images/$product_image");

    $insert_product_query = "INSERT INTO products
    (product_title, product_cat, product_brand, product_price, product_desc, product_image, product_keyword) VALUES ('$product_title', '$product_cat', '$product_brand', '$product_price', '$product_desc', '$product_image', '$product_keyword');";

    $insert_product = mysqli_query($con, $insert_product_query);

    if($insert_product){
      echo "<script>alert('Product has been inserted!')</script>";
      echo "<script>window.open('index.php?insert_product', '_self')</script>";
    }

  }
?>
