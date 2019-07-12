<!DOCTYPE html>
<?php
  include("includes/db.php");
  session_start();
  if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('admin_login.php', '_self')</script>";
  }
  if(isset($_GET['edit_pro'])){
    $pro_id = $_GET['edit_pro'];
    $get_pro_query = "SELECT * FROM products WHERE product_id = '$pro_id'";
    $run_pro_query = mysqli_query($con, $get_pro_query);
    $pro_row = mysqli_fetch_array($run_pro_query);
    $pro_title = $pro_row['product_title'];
    $pro_catID = $pro_row['product_cat'];
    $pro_brandID = $pro_row['product_brand'];
    $pro_image = $pro_row['product_image'];
    $pro_price = $pro_row['product_price'];
    $pro_desc = str_replace (array("\r\n", "\n", "\r"), ' ', $pro_row['product_desc']);
    $pro_keywords = $pro_row['product_keyword'];

    $get_brand = "SELECT brand_title FROM brands WHERE brand_id='$pro_brandID'";
    $run_get_brand = mysqli_query($con, $get_brand);
    $pro_brand = mysqli_fetch_array($run_get_brand)['brand_title'];

    $get_cat = "SELECT cat_title FROM categories WHERE cat_id='$pro_catID'";
    $run_get_cat = mysqli_query($con, $get_cat);
    $pro_cat = mysqli_fetch_array($run_get_cat)['cat_title'];
  }
?>
<html>
  <head>
    <title>Edit & Update Product</title>
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
  </head>
  <body bgcolor="skyblue">

    <form action="" method="POST" enctype="multipart/form-data">
      <table align="center" width="795" border="2" bgcolor="#187eae">

        <tr align="center">
          <td colspan="2"><h2>Edit & Update Product</h2></td>
        </tr>
        <tr>
          <td align="right"><b>Product Title:</b></td>
          <td><input type="text" name="product_title" size="70" value="<?php echo $pro_title ?>" required/></td>
        </tr>
        <tr>
          <td align="right"><b>Product Category:</b></td>
          <td>
            <select name="product_cat" required>
              <option value="<?php echo $pro_catID ?>"><?php echo $pro_cat ?></option>
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
              <option value="<?php echo $pro_brandID ?>"><?php echo $pro_brand ?></option>
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
          <td><input type="file" name="product_image"/><img src="product_images/<?php echo $pro_image ?>" height="50px" width="50px"/></td>
        </tr>
        <tr>
          <td align="right"><b>Product Price:</b></td>
          <td><input type="text" name="product_price" value="<?php echo $pro_price ?>" required/></td>
        </tr>
        <tr>
          <td align="right"><b>Product Description:</b></td>
          <td><textarea name="product_desc" cols="30" rows="5"></textarea></td>
        </tr>
        <tr>
          <td align="right"><b>Product Keyword:</b></td>
          <td><input type="text" name="product_keyword" size="50" value="<?php echo $pro_keywords ?>" required/></td>
        </tr>
        <tr align="center">
          <td colspan="2"><input type="submit" name="update_product" value="Update Now" style="padding: 10px; border-radius: 5px;"/></td>
        </tr>
      </table>
    </form>

    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script>
      CKEDITOR.replace("product_desc");
      CKEDITOR.instances['product_desc'].setData('<?php echo $pro_desc ?>');
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
  if(isset($_POST['update_product'])){

    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keyword = $_POST['product_keyword'];

    echo $product_image = $_FILES['product_image']['name'];
    $product_image_temp = $_FILES['product_image']['tmp_name'];

    if($product_image != ''){
      move_uploaded_file($product_image_temp, "product_images/$product_image");

      $update_query = "UPDATE products SET product_title = '$product_title', product_cat = '$product_cat', product_brand = '$product_brand', product_price = '$product_price', product_desc = '$product_desc', product_image = '$product_image', product_keyword = '$product_keyword' WHERE product_id = '$pro_id'";

    }else{
      $update_query = "UPDATE products SET product_title = '$product_title', product_cat = '$product_cat', product_brand = '$product_brand', product_price = '$product_price', product_desc = '$product_desc', product_keyword = '$product_keyword' WHERE product_id = '$pro_id'";
    }

    $update_product = mysqli_query($con, $update_query);

    if($update_product){
      echo "<script>alert('Product has been Updated!')</script>";
      echo "<script>window.open('index.php?view_product', '_self')</script>";
    }

  }
?>
