<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment Processing</title>

    <?php
    session_start();

    // Assuming customer_id is stored in the session when the user logs in
    $customer_id = $_SESSION['customer_id'];
    $api_key = "rzp_test_dUzXB5WFmqpHjV";
    $amount = $_GET['total_price'];
    $current_date = date('Y-m-d'); // Get the current date
    ?>

    <?php include("boostrap-files.php"); ?>
    <?php include("header.php"); ?>
    <style>
        .razorpay-payment-button {
            display: none;
        }
    </style>
</head>

<body>
    <div class="aboutus">
        <img width="100%" src="img/about-background.jpg">
        <div class="content">
            <h1>Menu</h1>
            <div class="more-links">
                <a href="index.php">Home</a>
                <i class="fa fa-angle-double-right" style="font-size:15px;"></i>
                <a href="add-to-cart.php">My Cart</a>
                <i class="fa fa-angle-double-right" style="font-size:15px;"></i>
                <span class="about-link">Pay</span>
            </div>
        </div>
    </div>

    <div class="col-md-5 mx-auto">
        <form id="checkout-form">
            <input type="hidden" name="amount" id="amount" value="<?= $_GET['total_price'] ?>">
            <input type="hidden" name="currency" id="currency" value="INR">
            <input type="hidden" name="order_id" id="order_id" value="<?php echo 'ORD' . rand(10, 100) . 'END'; ?>">
            <input type="hidden" name="hidden" custom="Hidden Element">
            <input type="hidden" id="products" value="<?= urlencode(json_encode($_GET['products'])) ?>">

            <div class="form-group">
                <label for="name">Your Name: <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" min="5" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                <span class="text-danger" id="name-error"></span>
            </div>
            <div class="form-group">
                <label for="phone">Mobile No.: <span class="text-danger">*</span></label>
                <input type="tel" name="phone" id="phone" class="form-control" minlength="10" maxlength="10" pattern="[789][0-9]{9}" oninput="this.value = this.value.replace(/\D/g, '').replace(/^[^789]/, '')">
                <span class="text-danger" id="phone-error"></span>
            </div>
            <div class="form-group">
                <label for="message">Address: <span class="text-danger">*</span></label>
                <textarea class="form-control" name="message" id="message" rows="3" oninput="validateMessage()"></textarea>
                <span class="text-danger" id="message-error"></span>
            </div>
            <button type="button" class="btn btn-primary w-100" id="payButton">Proceed to Pay</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $api_key; ?>"></script>
    <script>
        $(document).ready(function() {
            $('#payButton').click(function() {
                if (validateForm()) {
                    initiatePayment();
                }
            });

            function validateName() {
                var name = $("#name").val();
                if (name.trim() === "") {
                    $("#name-error").text("Please enter your name").addClass("text-danger");
                    return false;
                } else {
                    $("#name-error").text("").removeClass("text-danger");
                    return true;
                }
            }

            function validatePhone() {
                var phone = $("#phone").val();
                if (phone.trim() === "") {
                    $("#phone-error").text("Please enter your phone number").addClass("text-danger");
                    return false;
                } else if (!phone.match(/^[789]\d{9}$/)) {
                    $("#phone-error").text("Please enter a valid 10 digit phone number starting with 7, 8, or 9").addClass("text-danger");
                    return false;
                } else {
                    $("#phone-error").text("").removeClass("text-danger");
                    return true;
                }
            }

            function validateMessage() {
                var message = $("#message").val();
                if (message.trim() === "") {
                    $("#message-error").text("Please enter your address").addClass("text-danger");
                    return false;
                } else {
                    $("#message-error").text("").removeClass("text-danger");
                    return true;
                }
            }

            function validateForm() {
                var isValid = true;
                if (!validateName()) isValid = false;
                if (!validatePhone()) isValid = false;
                if (!validateMessage()) isValid = false;
                return isValid;
            }



        });

        function initiatePayment() {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var address = $('#message').val();
            var amount = $('#amount').val();
            var currency = $('#currency').val();
            var order_id = $('#order_id').val();
            var products = JSON.parse(decodeURIComponent($('#products').val()));

            var options = {
                "key": "<?php echo $api_key; ?>",
                "amount": amount * 100,
                "currency": currency,
                "name": "Home Baker Hub",
                "description": "Join us at Homebaker's Hub and be part of a community",
                "image": "img/food-logo1.png",
                "prefill": {
                    "name": name,
                    "contact": phone
                },
                "theme": {
                    "color": "#F37254"
                },
                "handler": function(response) {
                    $.ajax({
                        url: "api/orders.php",
                        type: "POST",
                        data: {
                            customer_id: "<?php echo $customer_id; ?>",
                            address: address,
                            price: amount,
                            products: products // Send product details as array
                        },
                        success: function(data) {
                            var result = JSON.parse(data);
                            if (result.status === "success") {
                                alert("Order processed successfully. Amount: " + result.price);
                                setTimeout(function() {
                                    window.location.href = 'index.php';
                                }, 100);
                            } else {
                                alert("Order not processed");
                                setTimeout(function() {
                                    window.location.href = 'index.php';
                                }, 100);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error processing order:", error);
                            window.location.href = 'payment_error.php';
                        }
                    });
                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
        }
    </script>

    <?php include("footer.php"); ?>
</body>

</html>