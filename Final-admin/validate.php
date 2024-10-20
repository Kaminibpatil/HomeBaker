<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "food_hunt") or die("connection failed");

$name = $_POST['name'];
$password = $_POST['password'];

$query = "SELECT aid, admin_name , admin_pwd  FROM admin WHERE admin_name=? AND admin_pwd=?";
$stmt = $connect->prepare($query);
$stmt->bind_param("ss", $name, $password);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0) {
    echo 0; // User not found
} else {
    $stmt->bind_result($aid, $admin_name, $admin_pwd);
    $stmt->fetch();
    $_SESSION['aid'] = $aid;
    echo 1;
}
