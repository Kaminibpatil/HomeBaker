<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "food_hunt") or die("connection failed");

// Include PHPMailer files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $otp = rand(100000, 999999);

    // Save OTP in session or database
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $email;
    $query = "UPDATE customer_login SET mail_otp='$otp' WHERE customer_email='$email'";
    if (mysqli_query($connect, $query)) {

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '*******';                     //SMTP username
            $mail->Password   = '*******';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to

            //Recipients
            $mail->setFrom('kbpatil370922@kkwagh.edu.in', 'Home Baker Hub');
            $mail->addAddress($email);                                  //Add a recipient

            //Content
            $mail->isHTML(true);                                        //Set email format to HTML
            $mail->Subject = 'Verify Email ID';
            $mail->Body = '<p>Your OTP for email verification is: <b>' . $otp . '</b></p><br><br><h3>Regards,<br>Home Baker Hub</h3>';

            if ($mail->send()) {
                header("Location: verify.php?email=" . urlencode($email));
                exit();
            } else {
                echo "Something went wrong, please try again later.";
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Failed to store OTP in the database.";
    }
} else {
    echo "Email not provided.";
}
