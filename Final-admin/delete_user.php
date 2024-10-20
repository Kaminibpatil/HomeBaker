<?php
$connect=mysqli_connect("localhost","root","","food_hunt") or die("connection failed");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Check if ID parameter exists
if (isset($_POST['customer_id'])) {
    $customer_id = $_POST['customer_id'];

    // Prepare SQL statement to delete user by ID
    $sql = "DELETE FROM customer_login WHERE customer_id = ?";

    // Prepare and bind parameters
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $customer_id);

    // Execute statement
    if ($stmt->execute()) {
        // Return success response
        $response['success'] = true;
    } else {
        // Return error response
        $response['success'] = false;
    }

    // Close statement and database connection
    $stmt->close();
    $connect->close();

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Return error if ID parameter is missing
    $response['success'] = false;
    $response['error'] = 'ID parameter is missing.';
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
