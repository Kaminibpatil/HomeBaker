<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "food_hunt") or die("connection failed");

if (isset($_POST['mail_otp'])) { // Check if the mail_otp parameter is set in the POST request
    // Retrieve the email from the session
    $email = $_POST['email'];
    
    // Retrieve the entered OTP from the POST request
    $enteredOTP = $_POST['mail_otp'];
    
    // Prepare and execute the SQL statement to retrieve the OTP from the database for the given email
    $stmt = $connect->prepare("SELECT mail_otp, customer_id FROM customer_login WHERE customer_email=?");
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        $stmt->bind_result($storedOTP, $customer_id);
        $stmt->fetch();
        $stmt->close();
        
        // Compare the entered OTP with the stored OTP
        if ($enteredOTP == $storedOTP) {
            // Prepare and execute the SQL statement to update the email status
            $stmt_u = $connect->prepare("UPDATE customer_login SET mail_otp='', email_status=1 WHERE customer_email=?");
            $stmt_u->bind_param("s", $email);
            if ($stmt_u->execute()) {
                echo $customer_id;   
            } else {
                echo 0; // Failed to update email status
            }
        } else {
            echo -1; // OTP does not match
        }
    } else {
        echo 2; // Failed to retrieve OTP from database
    }
} else {
    echo "Invalid request"; // If mail_otp parameter is not set
}
?>
