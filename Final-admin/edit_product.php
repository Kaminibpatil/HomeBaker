<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "food_hunt");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve and sanitize input data
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
    $product_rating = mysqli_real_escape_string($conn, $_POST['product_rating']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);

    // Prepare SQL update statement
    $sql = "UPDATE product_details SET 
            product_name = '$product_name',
            product_price = '$product_price',
            product_category = '$product_category',
            product_ratting = '$product_rating',
            product_description = '$product_description'
            WHERE product_id = '$product_id'";

    // Execute SQL update statement
    if (mysqli_query($conn, $sql)) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false, "error" => mysqli_error($conn));
    }

    // Close database connection
    mysqli_close($conn);

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle invalid request method
    $response = array("success" => false, "error" => "Invalid request method");
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
