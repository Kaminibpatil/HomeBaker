<?php
include("connect.php");

$prod_id = $_POST['prod_id'];
$type = $_POST['type'];
$customer_id = $_POST['customer_id'];

// echo "Type:" . $type;

// Sanitize input to prevent SQL injection
// $prod_id = mysqli_real_escape_string($connect, $prod_id);
// $type = mysqli_real_escape_string($connect, $type);
// $customer_id = mysqli_real_escape_string($connect, $customer_id);

if ($type == 'menu') {
    $query = "INSERT INTO add_to_cart SELECT c.customer_id, m.menu_id,m.menu_name, m.menu_image, m.menu_price FROM menu m JOIN customer_login c WHERE m.menu_id='$prod_id' AND c.customer_id='$customer_id'";
} else {
    $query="INSERT INTO add_to_cart SELECT c.customer_id, m.product_id,m.product_name, m.product_image, m.product_price FROM product_details m JOIN customer_login c WHERE m.product_id='$prod_id' AND c.customer_id='$customer_id'";
}

$sql = mysqli_query($connect, $query);

if ($sql) {
    echo 1; // Success
} else {
    echo 0; // Failure
}
