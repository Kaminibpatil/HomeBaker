<?php
session_start();
include("connect.php");

$email = $_POST['email'];
$password = $_POST['password'];

// Retrieve the hashed password from the database
$query = "SELECT customer_password, customer_id, email_status FROM customer_login WHERE customer_email=?";
$stmt = $connect->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0) {
    echo 0; // User not found
} else {
    $stmt->bind_result($hashed_password, $customer_id, $email_status);
    $stmt->fetch();

    // Verify the password
    if (password_verify($password, $hashed_password)) {
        $_SESSION['customer_id'] = $customer_id;
        if ($email_status == 1) {
            echo $customer_id; // Successful login
        } else {
            echo 2; // Email not verified
        }
    } else {
        echo -1; // Incorrect password
    }
}

$stmt->close();
$connect->close();
?>
