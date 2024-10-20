<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <title>Reset password</title>
    <style>
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
            <img src="img/food-logo1.png" width="250px" alt="">
        </a>
    </div>
    <div class="container">
        <div class="col-lg-4 offset-lg-4 bg-light rounded" id="reset-box">
            <h2 class="text-center p-2 rounded">Reset Your Password</h2>
            <div id="reset-error" class="alert text-center"></div>
            <form action="" method="POST" role="form" class="p-2" id="reset-form" onsubmit="return reset();">
                <div class="form-group">
                    <p class="text-center">Changed your password.</p>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" minlength="8" oninput="password()">
                        <div class="input-group-append" onclick="togglePassword('pass', 'pass-eye')">
                            <i id="pass-eye" class="fas fa-eye"></i>
                        </div>
                    </div>
                    <span class="text-danger" id="pass2-error"></span>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Confirm password" minlength="8" oninput="password2()">
                        <div class="input-group-append" onclick="togglePassword('cpass', 'cpass-eye')">
                            <i id="cpass-eye" class="fas fa-eye"></i>
                        </div>
                    </div>
                    <span class="text-danger" id="pass1-error"></span>
                </div>

                <div class="form-group text-center">
                    <div class="d-inline-block" style="width: 50%;">
                        <input type="submit" name="submit" value="Reset Password" class="btn btn-success w-100" id="reset">
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
        function reset() {
            var x4 = password();
            var x5 = password2();
            if (x4 == true && x5 == true) {
                return true;
            } else return false;
        }

        function password() {
            var password = document.getElementById("pass").value;

            if (password === "") {
                document.getElementById("pass").classList.add("is-invalid");
                document.getElementById("pass2-error").innerHTML = "Password is required";
                return false;
            } else if (password.length < 8) {
                document.getElementById("pass").classList.add("is-invalid");
                document.getElementById("pass2-error").innerHTML =
                    "Password must be at least 8 characters long";
                return false;
            } else {
                document.getElementById("pass").classList.remove("is-invalid");
                document.getElementById("pass2-error").innerHTML = "";
                return true;
            }
        }

        function password2() {
            var password1 = document.getElementById("pass").value.trim();
            var password2 = document.getElementById("cpass").value.trim();

            if (password2 === "") {
                document.getElementById("cpass").classList.add("is-invalid");
                document.getElementById("pass1-error").innerHTML =
                    "Confirm password is required";
                return false;
            } else if (password2 !== password1) {
                document.getElementById("cpass").classList.add("is-invalid");
                document.getElementById("pass1-error").innerHTML = "Passwords does not match";
                return false;
            } else {
                document.getElementById("cpass").classList.remove("is-invalid");
                document.getElementById("pass1-error").innerHTML = "";
                return true;
            }
        }


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
            $("#reset").click(function() {
                $("#reset-form").submit(function(e) {
                    e.preventDefault();
                    var formVal = reset();
                    if (formVal == true) {
                        var password = $("#pass").val();
                        var email = new URLSearchParams(window.location.search).get('email'); // Get email from URL parameters

                        $.ajax({
                            url: "api/resetpassword.php",
                            type: "POST",
                            data: {
                                password: password,
                                email: email
                            },
                            success: function(data) {
                                if (data == 1) {
                                    $("#reset-error").removeClass("alert-success");
                                    $("#reset-error").addClass("alert-danger").html('Unable to update password');
                                    $("#reset-form")[0].reset();
                                } else {
                                    $("#reset-error").removeClass("alert-danger");
                                    alert("Password changed successfully!");
                                    window.location.assign("sign_in.php");
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