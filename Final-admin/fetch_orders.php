<?php

$connect=mysqli_connect("localhost","root","","food_hunt") or die("connection failed");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Fetch data from customer_login table
$sql = "SELECT * FROM orders";
$result = $connect->query($sql);

// Initialize an empty array to store users
$users = array();
$sr_no = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['sr_no'] = $sr_no++;
        $users[] = $row; // Add each row to the users array
    }
}

// Close database connection
$connect->close();

// Send JSON response
header('Content-Type: application/json');
echo json_encode($users);
?>
