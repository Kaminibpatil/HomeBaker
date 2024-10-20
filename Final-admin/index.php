<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        ul li {
            list-style: none;
        }

        ul li a {
            color: black;
            text-decoration: none;
        }

        ul li a:hover {
            color: black;
            text-decoration: none;
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

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

        <a class="navbar-brand" href="../index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">Home Baker Hub</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../aboutus.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contact.php">Contact</a>
                </li>


            </ul>

        </div>

    </nav>

    <br><br><br><br>
    <div class="middle" style="  padding:40px; border:1px solid black; margin:0px auto; width:400px;">
        <ul class="nav nav-tabs navbar_inverse" id="myTab" style="background:green;border-radius:10px 10px 10px 10px;" role="tablist">


            <a class="nav-link" id="profile-tab" style="color:white;margin-left: 70px;" aria-controls="profile" aria-selected="false">Welcome Admin</a>

        </ul>
        <div class="tab-content" id="myTabContent">
            <!--login Section-- starts-->
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
                <div class="footer" style="color:green;"></div>
                <form role="form" class="p-2" id="login-form" onsubmit="return user_login();">
                    <div id="login-error" class="alert text-center"></div>
                    <div class="form-group">
                        <label for="name">Admin:</label>
                        <input type="text" class="form-control" name="name" id="name" oninput="user_name()">
                        <span class="text-danger" id="name-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="password" oninput="user_password1()">
                            <div class="input-group-append" onclick="togglePassword('password', 'pass-eye')">
                                <i id="pass-eye" class="fas fa-eye"></i>
                            </div>
                        </div>
                        <span class="text-danger" id="pass-error"></span>
                    </div>
                    <div class="form-group text-center">
                        <div class="d-inline-block" style="width: 50%;">
                            <button type="submit" name="login" class="btn btn-outline-success w-100" id="login">Login</button>
                        </div>
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

        function user_login() {
            var name = user_name();
            var password = user_password1();
            if (name == true && password == true) {
                return true;
            } else return false;
        }

        function user_password1() {
            var password = document.getElementById("password").value;

            if (password === "") {
                document.getElementById("password").classList.add("is-invalid");
                document.getElementById("pass-error").innerHTML = "Password is required";
                return false;
            } else if (password.length < 8) {
                document.getElementById("password").classList.add("is-invalid");
                document.getElementById("pass-error").innerHTML =
                    "Password must be at least 8 characters long";
                return false;
            } else {
                document.getElementById("password").classList.remove("is-invalid");
                document.getElementById("pass-error").innerHTML = "";
                return true;
            }
        }

        function user_name() {
            var name = document.getElementById("name").value.trim();

            if (name === "") {
                document.getElementById("name").classList.add("is-invalid");
                document.getElementById("name-error").innerHTML = "Name is required";
                return false;
            } else {
                document.getElementById("name").classList.remove("is-invalid");
                document.getElementById("name-error").innerHTML = "";
                return true;
            }
        }



        $(document).ready(function() {
            $("#login").click(function() {
                $("#login-form").submit(function(e) {
                    e.preventDefault();
                    var formVal = user_login();
                    var name = $("#name").val();
                    var password = $("#password").val();
                    if (formVal == true) {
                        $.ajax({
                            url: "validate.php",
                            type: "POST",
                            data: {
                                name: name,
                                password: password
                            },
                            success: function(data) {
                                if (data == 0) {
                                    $("#login-error").removeClass("alert-success");
                                    $("#login-error").addClass("alert-danger").html("Name & Password not matched.");
                                    $("#login-form")[0].reset();
                                } else if (data == 1) {
                                    sessionStorage.setItem('aid', data);
                                    console.log(sessionStorage.getItem('aid'));
                                    window.location.assign('dashboard.php');
                                } else {
                                    $("#login-error").removeClass("alert-success");
                                    $("#login-error").addClass("alert-danger").html("something wrong.");
                                    $("#login-form")[0].reset();
                                }

                            }
                        })
                    }
                });
            });
        });
    </script>
</body>

</html>