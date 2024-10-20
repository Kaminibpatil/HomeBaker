<?php
include("connect.php");
$productId = $_POST['productId'];
$query = "DELETE FROM orders WHERE product_id='$productId'";
$sql = mysqli_query($connect, $query);


if ($sql) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to cancel order."]);
}
