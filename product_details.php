<!DOCTYPE html>
<html lang="en">

<head>

    <title>product details</title>
    <?php include("boostrap-files.php"); ?>
</head>

<body>
    <?php include("header.php"); ?>
    <div class="aboutus">
        <img height="auto" width="100%" src="img/about-background.jpg">
        <div class="content" style="font-size:23px">

            <div class="more-links">
                <a href="index.php">Home</a>
                <!-- <i class=" fa fa-angle-double-right" style="font-size:15px; "></i>
                <span class="about-link" id="product_type"></span> -->
                <i class=" fa fa-angle-double-right" style="font-size:15px; "></i>
                <span class="about-link" id="prod_heading"></span>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="product-image-segment">
                    <div class="product-image-background">
                        <div>
                            <img style="position:relative;" height="95%" width="95%" src="" alt="" id="prod_image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 ">
                <div>
                    <h1 style="font-size:50px;font-weight:bold" id="prod_name"></h1>
                    <p class="prod-description"></p>
                    <span class="price" style="font-size:35px;"></span>
                </div>
                <div class="w-100  mt-5 horizontal-line">
                    <a href="#" id="cart">
                        <div class="add-to-cart add-to-cart-product-btn mr-5  " style="border-radius:10px !important">
                            <i class="fas fa-shopping-basket"></i>
                            <span>Add to Cart</span>
                        </div>
                    </a>
                    <a href="" id="share-btn">
                        <div class="add-to-cart add-to-cart-share-btn ml-5" style="border-radius:10px !important">
                            <i class="fas fa-share-alt"></i>
                            <span>Share</span>
                        </div>
                    </a>
                </div>
                <div class="imp-points mt-5">
                    <ul class="point-list">
                        <li>Free global shipping on all orders</li>
                        <li>30 days easy returns if you change your mind</li>
                        <li>Order before noon for same day dispatch
                        </li>
                    </ul>
                </div>
                <div class=" mt-5 " style="font-weight: bold;">
                    <span class="mr-3">Guaranteed Safe Checkout</span>
                    <img src="img/trust-symbols.png" alt="trust symbols">
                </div>




            </div>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            var prod_id = "<?php echo $_GET['id']; ?>";
            var type = "<?php echo $_GET['type']; ?>";
            console.log(prod_id);
            if (type != 'menu') {

                $.ajax({
                    url: "api/display-selected-product-details.php",
                    type: "POST",
                    data: {
                        prod_id: prod_id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        $.each(data, function(key, value) {
                            $("#prod_image").attr('src', 'image/' + value.product_image);
                            $("#prod_name").html(value.product_name);
                            $(".prod-description").html(value.product_description);
                            $(".price").html(" ₹" + value.product_price + "/-");
                            $("#prod_heading").html(value.product_name);
                            $("#product_type").html(value.product_category);
                        });


                    }
                });
            } else {
                $.ajax({
                    url: "api/display-selected-menu-details.php",
                    type: "POST",
                    data: {
                        prod_id: prod_id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        $.each(data, function(key, value) {
                            $("#prod_image").attr('src', 'image/' + value.menu_image);
                            $("#prod_name").html(value.menu_name);

                            $(".price").html(" ₹" + value.menu_price + "/-");
                            $("#prod_heading").html(value.menu_name);
                            $("#product_type").html(value.menu_category);
                        });


                    }
                });
            }
        });

        $("#share-btn").click(function() {



            var url = window.location.href;
            var title = "Delicious Product";

            shareFood(url, title);
        });

        // to share food
        function shareFood(url, title) {
            if (navigator.share) {
                navigator.share({
                    title: title,
                    url: url
                }).then(() => {
                    console.log('Thanks for sharing!');
                }).catch(console.error);
            } else {
                // Fallback if Web Share API is not supported
                alert('Your browser does not support the Web Share API. Please copy the link manually: ' + url);
            }
        }


        $(document).on("click", "#cart", function() {
            console.log("click");
            if (sessionStorage.getItem('customer_id') != null) {
                var prod_id = "<?php echo $_GET['id']; ?>";
                var type = "<?php echo $_GET['type']; ?>";
                console.log("Product ID:", prod_id);
                console.log("Product Type:", type);
                var customer_id = sessionStorage.getItem('customer_id');
                console.log("Customer ID:", customer_id);
                $.ajax({
                    url: "api/add-to-cart-main.php",
                    type: "POST",
                    data: {
                        prod_id: prod_id,
                        customer_id: customer_id,
                        type: type
                    },
                    success: function(data) {
                        console.log("Response:", data); // Debugging
                        if (data == 1) {
                            alert("Product added successfully");
                        } else {
                            alert("Something went wrong!");
                        }
                    }
                });
            } else {
                window.location.assign("sign_in.php");
            }

        });
    </script>

    <?php include("footer.php"); ?>