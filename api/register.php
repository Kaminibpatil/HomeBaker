<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Establish database connection
$connect = mysqli_connect("localhost", "root", "", "food_hunt") or die("Connection failed");

// Get user input
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
//hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$email_check_query = "SELECT * FROM customer_login WHERE customer_email=?";
$stmt = $connect->prepare($email_check_query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo -2; // Email already exists
    die;
} else {
    // Insert new customer data
    $customer_id = rand(); // Generate customer ID
    $sql = "INSERT INTO customer_login (customer_id, customer_name, customer_mobile, customer_email, customer_password) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sssss", $customer_id, $name, $phone, $email, $hashed_password);

    if ($stmt->execute()) {
        $otp = rand(100000, 999999); // Generate OTP

        // Update OTP in the database
        $stmt_otp = $connect->prepare("UPDATE customer_login SET mail_otp=? WHERE customer_email=?");
        $stmt_otp->bind_param("is", $otp, $email);
        $stmt_otp->execute();

        // Send verification email
        $mail = new PHPMailer(true);
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '******'; // Your email address
            $mail->Password = '*******'; // Your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom('kbpatil370922@kkwagh.edu.in', "Home Baker's Hub");
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Verify Email';
            $mail->Body = "Your OTP for email verification is: <strong>$otp</strong>";

            // Send email
            $mail->send();
            echo 1; // Success
        } catch (Exception $e) {
            echo 0; // Failed to send email
        }
    } else {
        echo -1; // Failed to insert customer data
    }
}
