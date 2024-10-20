<?php
include("connect.php");
$wishlist_id = $_POST['wishlist_id'];
$customer_id = $_POST['customer_id'];
$query = "INSERT INTO add_to_cart SELECT customer_id, product_id, product_name, product_image, product_price FROM wishlist WHERE product_id='$wishlist_id' AND customer_id='$customer_id'";
$sql = mysqli_query($connect, $query);

$query1 = "DELETE FROM wishlist WHERE product_id='$wishlist_id'";
$sql1 = mysqli_query($connect, $query1);
if ($sql == true && $sql1 == true) {
    echo 1;
} else {
    echo 0;
}
