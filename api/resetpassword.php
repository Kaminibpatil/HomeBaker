<?php
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $connect->prepare("UPDATE customer_login SET customer_password=?, forgototp='' WHERE customer_email=?");
    if ($stmt === false) {
        echo 1;
        die();
    }

    $stmt->bind_param("ss", $password, $email);

    if ($stmt->execute()) {
        echo 0;
    } else {
        echo 1;
    }

    $stmt->close();
}
?>
