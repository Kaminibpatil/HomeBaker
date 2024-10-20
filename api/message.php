<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Establish database connection
$connect = mysqli_connect("localhost", "root", "", "food_hunt") or die("Connection failed");

// Process the form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $sub = $_POST["sub"];
    $message = $_POST["message"];
    $customer_id = $_POST['customer_id'];
    // Insert the message into the database
    $sql = "INSERT INTO `massage` (`customer_id`, `customer_name`, `customer_email`, `subject`, `message`) 
    VALUES (?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("issss", $customer_id, $name, $email, $sub, $message);

    if ($stmt->execute()) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '*****';                     //SMTP username
            $mail->Password   = '******';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to

            //Recipients
            $mail->setFrom($email, 'Customer Contact');
            $mail->addAddress('kbpatil370922@kkwagh.edu.in');                                  //Add a recipient

            //Content
            $mail->isHTML(true);                                        //Set email format to HTML
            $mail->Subject = "Home Baker's Customer Message";
            $mail->Body = " <p><strong>Customer ID: </strong>$customer_id</p> <p><strong>Name:</strong> $name</p><p><strong>Email:</strong> $email</p><p><strong>Subject:</strong>$sub</p><p><strong>Message:</strong> $message</p>";

            if ($mail->send()) {
                echo 0; // Success
            } else {
                echo 1; // Failure
            }
        } catch (Exception $e) {
            echo 2;
        }
    }
    $stmt->close();
}
$connect->close();
