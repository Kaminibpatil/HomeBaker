<?php
// Check if product_id is set and not empty
if (isset($_POST['r_id']) && !empty($_POST['r_id'])) {
    $r_id = $_POST['r_id'];

    // Database connection
    $connect = mysqli_connect("localhost", "root", "", "food_hunt");
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute SQL DELETE statement
    $sql = "DELETE FROM reviews WHERE r_id = '$r_id'";
    if (mysqli_query($connect, $sql)) {
        // Deletion successful
        $response = array("success" => true);
    } else {
        // Deletion failed
        $response = array("success" => false);
    }

    // Close database connection
    mysqli_close($connect);

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Product ID not provided
    $response = array("success" => false, "message" => "Product ID not provided.");
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
