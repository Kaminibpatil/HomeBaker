<?php
include("connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$femail = $_POST['femail'];
$query = "select * from customer_login where customer_email='$femail'";
$query = mysqli_query($connect, $query);

if (mysqli_num_rows($query) == 0) {
    echo 0;    //email not exist
    die();
} else {
    $otp = rand(100000, 999999); // Generate OTP
    $stmt_otp = $connect->prepare("UPDATE customer_login SET forgototp=? WHERE customer_email=?");
    $stmt_otp->bind_param("is", $otp, $femail);
    $stmt_otp->execute();
    $stmt_otp->close(); 

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '*****';                     //SMTP username
        $mail->Password   = '*******';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to

        //Recipients
        $mail->setFrom('kbpatil370922@kkwagh.edu.in', 'Home Baker Hub');
        $mail->addAddress($femail);                                  //Add a recipient

        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = 'Reset Password OTP';
        $mail->Body = '<p>Your OTP for reset password is: <b>' . $otp . '</b></p><br><br><h3>Regards,<br>Home Baker Hub</h3>';

        if ($mail->send()) {
            echo 1; // Success
        } else {
            echo  2;
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
