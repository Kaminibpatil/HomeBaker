<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;800&family=Prata&family=Red+Hat+Display&family=Rokkitt:wght@100;900&display=swap&family=Poppins:wght@200&display=swap&family=Orbitron:wght@900&display=swap&family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
    <script src="form/js/new-account-validation.js"></script>
    <style>
        #signup-box,
        #forgot-box {
            display: none;
        }

        .input-group {
            position: relative;
        }

        .input-group-append {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            padding: 0 10px;
            cursor: pointer;
        }

        .input-group-append i {
            font-size: 1.2em;
        }
    </style>
</head>

<body style="height:100%">
    <div class="d-flex justify-content-center">
        <a href="index.php">
            <img src="img/food-logo1.png" width="250px" alt=""></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
                <h2 class="text-center mt-2">Login</h2>
                <form role="form" class="p-2" id="login-form" onsubmit="return user_login();">
                    <div id="login-error" class="alert text-center"></div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" oninput="user_email()">
                        <span class="text-danger" id="email-error"></span>
                    </div>
                    <div class="form-group input-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" minlength="8" id="password" oninput="user_password1()">
                        <div class="input-group-append" onclick="togglePassword('password', 'login-eye')">
                            <i id="login-eye" class="fas fa-eye"></i>
                        </div>
                    </div>
                    <span class="text-danger" id="pass-error"></span>
                    <div class="form-group row">
                        <div class="col-6">
                            <a href="index.php" class="float-left"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
                        </div>
                        <div class="col-6">
                            <a href="#" id="forgot-btn" class="float-right">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="d-inline-block" style="width: 50%;">
                            <button type="submit" name="login" class="btn btn-primary w-100" id="login">Login</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="text-center">New User? <a href="" class="sign">Sign Up here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="signup-box">
                <h2 class="text-center mt-2">Sign Up</h2>
                <div id="signin-error" class="alert text-center"></div>
                <form role="form" class="p-2" id="signup-form" onsubmit="return new_account_validation()">
                    <div class="form-group">
                        <input type="text" name="name" id="name" min="5" class="form-control" placeholder="Full Name" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                        <span class="text-danger" id="name-error"></span>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Mobile No" minlength="10" maxlength="10" pattern="[789][0-9]{9}" title="Please enter a valid mobile number starting with 7, 8, or 9" oninput="this.value = this.value.replace(/\D/g, '').replace(/^[^789]/, '')">
                        <span class="text-danger" id="phone-error"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" name="cemail" id="cemail" class="form-control" placeholder="E-mail" oninput="user_emails()">
                        <span class="text-danger" id="cemail-error"></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" minlength="8" oninput="user_password()">
                            <div class="input-group-append" onclick="togglePassword('pass', 'pass-eye')">
                                <i id="pass-eye" class="fas fa-eye"></i>
                            </div>
                        </div>
                        <span class="text-danger" id="pass2-error"></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Confirm password" minlength="8" oninput="user_password2()">
                            <div class="input-group-append" onclick="togglePassword('cpass', 'cpass-eye')">
                                <i id="cpass-eye" class="fas fa-eye"></i>
                            </div>
                        </div>
                        <span class="text-danger" id="pass1-error"></span>
                    </div>
                    <div class="form-group text-center">
                        <div class="d-inline-block" style="width: 50%;">
                            <button type="submit" class="btn btn-primary w-100" id="signup">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="text-center">Already have an account? <a href="" id="login-btn" class="login">Login here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="forgot-box">
                <h2 class="text-center mt-2">Reset Password</h2>
                <div id="forgot-error" class="alert text-center"></div>
                <form action="" method="POST" role="form" class="p-2" id="forgot-form" onsubmit="return mail()">
                    <div class="form-group text-center">
                        <p>To reset your password, enter the email address and we will send OTP on you email.</p>
                    </div>
                    <div class="form-group">
                        <input type="email" name="femail" id="femail" class="form-control" placeholder="E-mail" oninput="usermail()">
                        <span class="text-danger" id="femail-error"></span>
                    </div>
                    <br>

                    <div class="form-group text-center">
                        <div class="d-inline-block" style="width: 50%;">
                            <input type="submit" name="forgot" id="forgot" value="Get OTP" class="btn btn-primary w-100">
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <a href="" class="login">Back to login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="form/js/index.js"></script>

    <script>
        function togglePassword(fieldId, eyeId) {
            const passwordField = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(eyeId);
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
        $(document).ready(function() {
            $(".login").click(function(e) {
                e.preventDefault();
                $("#login-box").show();
                $("#signup-box").hide();
                $("#forgot-box").hide();
            });
            $(".sign").click(function(e) {
                e.preventDefault();
                $("#login-box").hide();
                $("#signup-box").show();
                $("#forgot-box").hide();
            });
            $("#verify").click(function(e) {
                e.preventDefault();
                $("#signup-box").hide();
                $("#verify-box").show();
                $("#forgot-box").hide();
            });

            $("#forgot-btn").click(function(e) {
                e.preventDefault();
                $("#login-box").hide();
                $("#forgot-box").show();
            });
        });
        $(document).ready(function() {
            $("#login").click(function() {
                $("#login-form").submit(function(e) {
                    e.preventDefault();
                    var formVal = user_login();
                    var email = $("#email").val();
                    var password = $("#password").val();
                    if (formVal == true) {
                        $.ajax({
                            url: "api/login.php",
                            type: "POST",
                            data: {
                                email: email,
                                password: password
                            },
                            success: function(data) {
                                if (data == 0) {
                                    $("#login-error").removeClass("alert-success");
                                    $("#login-error").addClass("alert-danger").html("Email Id is not registered.");
                                    $("#login-form")[0].reset();
                                } else if (data === '2') {
                                    $("#login-error").removeClass("alert-success");
                                    $("#login-error").addClass("alert-danger").html('Your email id is not verified. <br> <a href="verification.php?email=' + email + '">Verify Mail</a>');
                                    $("#login-form")[0].reset();
                                } else if (data === '-1') {
                                    $("#login-error").removeClass("alert-success");
                                    $("#login-error").addClass("alert-danger").html("Password did not matched");
                                    $("#login-form")[0].reset();
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

        $(document).ready(function() {
            $("#forgot-form").submit(function(e) {
                e.preventDefault();
                var formVal = mail();
                var femail = $("#femail").val();
                if (formVal == true) {
                    $.ajax({
                        url: "api/mail.php",
                        type: "POST",
                        data: {
                            femail: femail,
                        },
                        success: function(data) {
                            if (data == 0) {
                                $("#forgot-error").removeClass("alert-success");
                                $("#forgot-error").addClass("alert-danger").html("Email Id is not registered.");
                                $("#forgot-form")[0].reset();
                            } else if (data == 2) {
                                $("#forgot-error").removeClass("alert-success");
                                $("#forgot-error").addClass("alert-danger").html('Failed to send OTP. Please try again later.');
                                $("#forgot-form")[0].reset();
                            } else {
                                $("#forgot-error").removeClass("alert-danger");
                                $("#forgot-error").addClass("alert-success").html('To reset password enter otp that we have sent to your mail.<br><a href="reset.php?email=' + femail + '">Verify OTP</a>');
                                $("#forgot-form")[0].reset();
                            }

                        }
                    });
                }
            });
        });


        $(document).ready(function() {
            $("#signup").click(function() {
                $("#signup-form").submit(function(e) {
                    e.preventDefault();
                    var formVal = new_account_validation();
                    if (formVal == true) {
                        var name = $("#name").val();
                        var phone = $("#phone").val();
                        var email = $("#cemail").val();
                        var password = $("#pass").val();

                        $.ajax({
                            url: "api/register.php",
                            type: "POST",
                            data: {
                                name: name,
                                phone: phone,
                                email: email,
                                password: password
                            },
                            success: function(data) {
                                if (data == 1) {
                                    $("#signin-error").removeClass("alert-danger");
                                    $("#signin-error").addClass("alert-success").html('You have successfully created an account.<br> <a href="verify.php?email=' + email + '">Verify Mail</a>');
                                    $("#signup-form")[0].reset();
                                } else if (data == -2) {
                                    $("#signin-error").removeClass("alert-success");
                                    $("#signin-error").addClass("alert-danger").html("Email Id is already registered.");
                                    $("#signup-form")[0].reset();
                                } else if (data == 0) {
                                    $("#signin-error").removeClass("alert-success");
                                    $("#signin-error").addClass("alert-danger").html("Failed to send OTP. Please try again later.");
                                } else {
                                    $("#signin-error").removeClass("alert-success");
                                    $("#signin-error").addClass("alert-danger").html("Mobile No is already registered.");
                                    $("#signup-form")[0].reset();
                                }
                            },
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>