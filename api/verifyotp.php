<?php
include("connect.php");

$femail = $_POST['email'];
$input_otp = $_POST['forgototp'];

$query = "SELECT forgototp FROM customer_login WHERE customer_email='$femail'";
$result = mysqli_query($connect, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $stored_otp = $row['forgototp'];
    if ($stored_otp == $input_otp) {
        echo 1; // Success
    } else {
        echo -1; // OTP does not match
    }
} else {
    echo 2; // Failed to retrieve OTP from database
}
?>
