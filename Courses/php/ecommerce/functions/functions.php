<?php

$con = mysqli_connect("localhost", "ecommerce_admin", "", "ecommerce");

function get_cats(){
    global $con;
    $get_cats = 'SELECT * FROM categories';
    $run_cats = mysqli_query($con, $get_cats);
    while($row_cat = mysqli_fetch_array($run_cats)){
        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['cat_title'];
        echo "<li><a href=#>$cat_title</a></li>";
    }
}

function get_brands(){
    global $con;
    $get_brands = 'SELECT * FROM brands';
    $run_brands = mysqli_query($con, $get_brands);
    while($row_brand = mysqli_fetch_array($run_brands)){
        $brand_id = $row_brand['brand_id'];
        $brand_title = $row_brand['brand_title'];
        echo "<li><a href=#>$brand_title</a></li>";
    }
}
?>