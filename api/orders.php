<?php
include("connect.php");

// Retrieve POST data
$customer_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$products = isset($_POST['products']) ? json_decode($_POST['products'], true) : [];

$all_successful = true;

foreach ($products as $product) {
    $p_id = mysqli_real_escape_string($connect, $product['id']);
    $p_name = mysqli_real_escape_string($connect, $product['name']);
    $p_image = mysqli_real_escape_string($connect, $product['img']);
    $p_price = mysqli_real_escape_string($connect, $product['price']);
    $Qty = mysqli_real_escape_string($connect, $product['quantity']);

    // Insert the order into the orders table
    $query = "INSERT INTO orders (customer_id, product_id, product_name, product_image, product_price, Qty, address) 
              VALUES ('$customer_id', '$p_id', '$p_name', '$p_image', '$p_price', '$Qty', '$address')";
    $sql = mysqli_query($connect, $query);

    if ($sql) {
        // Delete the item from the add_to_cart table
        $query_delete = "DELETE FROM add_to_cart WHERE product_id='$p_id' AND customer_id='$customer_id'";
        $sql_delete = mysqli_query($connect, $query_delete);

        if (!$sql_delete) {
            $all_successful = false;
            break;
        }
    } else {
        $all_successful = false;
        break;
    }
}

if ($all_successful) {
    echo json_encode(["status" => "success", "price" => $price]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to process order."]);
}
