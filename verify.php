<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;800&family=Prata&family=Red+Hat+Display&family=Rokkitt:wght@100;900&display=swap&family=Poppins:wght@200&display=swap&family=Orbitron:wght@900&display=swap&family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
</head>

<body style="height:100%">
    <div class="d-flex justify-content-center">
        <a href="index.php">
            <img src="img/food-logo1.png" width="250px" alt="">
        </a>
    </div>
    <div class="container">
        <div class="col-lg-4 offset-lg-4 bg-light rounded" id="verify-box">
            <h2 class="text-center mt-2">Email Verification</h2>
            <div id="verify-error" class="alert text-center"></div>
            <form id="verify-form" role="form" class="p-2">
                <div class="form-group">
                    <p class="text-center">To verify your email, enter the OTP that we have sent to your email.</p>
                </div>
                <div class="form-group text-center">
                    <div class="text-center">
                        <div class="d-inline-block" style="width: 50%;">
                            <input type="tel" name="mail_otp" id="mail_otp" minlength="6" maxlength="6" class="form-control" pattern="[0-9]{6}" title="Please enter a 6-digit number" oninput="this.value = this.value.replace(/[^0-9]/g, ''); user_otp()">
                        </div>
                    </div>
                    <span class="text-danger" id="otp-error"></span>
                </div>
                <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                <div class="form-group text-center">
                    <div class="d-inline-block" style="width: 50%;">
                        <button type="submit" class="btn btn-success w-100" id="verify">Verify OTP</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="form/js/index.js"></script>

    <script>
        $(document).ready(function() {
            $("#verify").click(function() {
                $("#verify-form").submit(function(e) {
                    e.preventDefault();
                    if (user_otp()) {
                        var mail_otp = $("#mail_otp").val();
                        var email = $("input[name='email']").val();
                        $.ajax({
                            url: "api/verifymail.php",
                            type: "POST",
                            data: {
                                mail_otp: mail_otp,
                                email: email
                            },
                            success: function(data) {
                                if (data == -1) {
                                    $("#verify-error").removeClass("alert-danger");
                                    $("#verify-error").addClass("alert-danger").html('OTP does not match. Please try again.');
                                    $("#verify-form")[0].reset();
                                } else if (data == 0) {
                                    $("#verify-error").removeClass("alert-danger");
                                    $("#verify-error").addClass("alert-danger").html("Failed to update email status.");
                                } else if (data == 2) {
                                    $("#verify-error").removeClass("alert-danger");
                                    $("#verify-error").addClass("alert-danger").html("Failed to retrieve OTP from database.");
                                } else {
                                    sessionStorage.setItem('customer_id', data);
                                    console.log(sessionStorage.getItem('customer_id'));
                                    window.location.assign('index.php');
                                }
                            }
                        })
                    }
                });
            });
        });

        function user_otp() {
            var mail_otp = document.getElementById("mail_otp").value.trim();

            if (mail_otp === "") {
                document.getElementById("mail_otp").classList.add("is-invalid");
                document.getElementById("otp-error").innerHTML = "OTP is required";
                return false;
            } else {
                document.getElementById("mail_otp").classList.remove("is-invalid");
                document.getElementById("otp-error").innerHTML = "";
                return true;
            }
        }
    </script>
</body>

</html>