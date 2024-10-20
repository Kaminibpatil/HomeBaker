<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact-us</title>
    <?php include("boostrap-files.php"); ?>
</head>

<body>
    <?php include("header.php"); ?>
    <div class="aboutus">
        <img width="100%" src="img/about-background.jpg">
        <div class="content ">
            <h1>Contact Us</h1>
            <div class="more-links">
                <a href="index.php">Home</a>
                <i class=" fa fa-angle-double-right" style="font-size:15px; "></i>
                <span class="about-link">Contact Us</span>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row justify-content-around">
            <div class="col-md-6 col-8 ">

                <h3 style="font-weight:bold">Contact Us</h3>
                <div class="row">
                    <div class="col">
                        <div class="contact-info">
                            <i class="fa fa-home"></i>
                            <h5>Address</h5>
                        </div>
                        <p>570 8th Ave, New York, NY 10018 United States</p>
                        <div class="seperator"></div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <div class="contact-info">
                            <i class="fa fa-phone-square"></i>
                            <h5>Contact</h5>
                        </div>
                        <p>Mobile: (08) 123 456 789<br>Hotline: 1009 678 456</p>

                        <div class="seperator"></div>
                    </div>
                </div>
                <div class="row mt-5 ">
                    <div class="col">
                        <div class="contact-info ">
                            <i class="far fa-envelope-open"></i>
                            <h5>Email</h5>
                        </div>
                        <p>skmali@gmail.com<br>
                            kbpatil@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-10">
                <h3 style="font-weight:bold">Tell Us Your Message</h3>
                <form role="form" class="form-group" id="msg-form">
                    <div class="form-group">
                        <label for="name">Your Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" oninput="validateName()">
                        <span class="text-danger" id="name-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" oninput="validateEmail()">
                        <span class="text-danger" id="email-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="sub">Subject:</label>
                        <input type="text" class="form-control" name="sub" id="sub">
                        <span class="text-danger" id="subject-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="message">Message: <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="message" id="message" rows="3" oninput="validateMessage()"></textarea>
                        <span class="text-danger" id="message-error"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
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
        function validateName() {
            var name = $("#name").val();
            if (name.trim() === "") {
                $("#name-error").text("Please enter your name").addClass("text-danger");
            } else {
                $("#name-error").text("").removeClass("text-danger");
            }
        }

        function validateEmail() {
            var email = $("#email").val();
            if (email.trim() === "") {
                $("#email-error").text("Please enter your email").addClass("text-danger");
            } else if (!isValidEmail(email)) {
                $("#email-error").text("Please enter a valid email address").addClass("text-danger");
            } else {
                $("#email-error").text("").removeClass("text-danger");
            }
        }

        function validateMessage() {
            var message = $("#message").val();
            if (message.trim() === "") {
                $("#message-error").text("Please enter your message").addClass("text-danger");
            } else {
                $("#message-error").text("").removeClass("text-danger");
            }
        }

        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }


        $(document).ready(function(){
            $("#msg-form").on("submit", function(e) {
                e.preventDefault();
            var customer_id = sessionStorage.getItem('customer_id');
            if (customer_id === null) {
                window.location.assign("sign_in.php");
                return false;
            }

            validateName();
            validateEmail();
            validateMessage();

            // Check if there are any error messages
            if ($("#name-error").text() !== "" || $("#email-error").text() !== "" || $("#message-error").text() !== "") {
                return false; // Prevent form submission if there are errors
            }
            $.ajax({
                url: "api/message.php",
                type: "POST",
                data: {
                    name: $("#name").val(),
                    email: $("#email").val(),
                    sub: $("#sub").val(),
                    message: $("#message").val(),
                    customer_id: customer_id
                },
                success: function(data) {
                    if (data == 1) {
                        $("#message-error").text("Failed to send message").addClass("text-danger");
                        $("#msg-form")[0].reset(); // Reset form fields
                    } else {
                        $("#message-error").text("Message sent successfully").removeClass("text-danger").addClass("text-success");
                        $("#msg-form")[0].reset(); // Reset form fields
                    }
                },
            });
        });
    });

    </script>
    <?php include("footer.php");  ?>
</body>

</html>