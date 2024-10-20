<?php
$connect = mysqli_connect("localhost", "root", "", "food_hunt") or die("connection failed");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Fetch counts from respective tables
$totalUsers = 0;
$totalProducts = 0;
$totalOrders = 0;
$totalreviews=0;
$totalcontacts=0;

// Query to fetch count from customer_login table
$sql = "SELECT COUNT(*) AS totalUsers FROM customer_login";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalUsers = $row['totalUsers'];
}

// Query to fetch count from product_details table
$sql = "SELECT COUNT(*) AS totalProducts FROM product_details";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalProducts = $row['totalProducts'];
}

// Query to fetch count from orders table
$sql = "SELECT COUNT(*) AS totalOrders FROM orders";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalOrders = $row['totalOrders'];
}

$sql = "SELECT COUNT(*) AS totalreviews FROM reviews";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalreviews = $row['totalreviews'];
}
$sql = "SELECT COUNT(*) AS totalcontacts FROM massage";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalcontacts = $row['totalcontacts'];
}
// Close database connection
$connect->close();

// Prepare JSON response
$response = array(
    'totalUsers' => $totalUsers,
    'totalProducts' => $totalProducts,
    'totalOrders' => $totalOrders,
    'totalreviews' => $totalreviews,
    'totalcontacts'=>$totalcontacts
);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
