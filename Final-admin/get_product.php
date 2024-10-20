<?php
// Check if product_id is set and not empty
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Database connection
    $connect = mysqli_connect("localhost", "root", "", "food_hunt");
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute SQL SELECT statement
    $sql = "SELECT * FROM product_details WHERE product_id = '$product_id'";
    $result = mysqli_query($connect, $sql);

    // Check if a row is returned
    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result); // Fetch product details
    } else {
        $product = array(); // Product not found
    }

    // Close database connection
    mysqli_close($connect);

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($product);
} else {
    // Product ID not provided
    $response = array("error" => true, "message" => "Product ID not provided.");
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
