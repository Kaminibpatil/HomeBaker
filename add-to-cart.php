<!DOCTYPE html>
<html lang="en">

<head>
    <title>add to cart</title>
    <?php include("boostrap-files.php"); ?>
</head>

<body class="background-color">
    <?php include("header.php"); ?>
    <div class="aboutus">
        <img height="auto" width="100%" src="img/about-background.jpg">
        <div class="content">
            <h1>My Cart</h1>
            <div class="more-links">
                <a href="index.php">Home</a>
                <i class="fa fa-angle-double-right" style="font-size:15px;"></i>
                <span class="about-link">My Cart</span>
            </div>
        </div>
    </div>

    <div class="float-left cart-container mb-5" id="show-cart"></div>
    <div id="checkout"></div>

    <script src="form/js/new-account-validation.js"></script>
    <script>
        $(document).ready(function() {
            var final_total;
            var customer_id = sessionStorage.getItem('customer_id');
            var str = "";
            $.ajax({
                url: "api/fetch-cart-items.php",
                type: "POST",
                data: {
                    customer_id: customer_id
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    if (JSON.stringify(data) !== '[]') {
                        var count = 0;
                        var total_price = 0;
                        $.each(data, function(key, value) {
                            total_price += parseInt(value.product_price);
                            // Generate cart item HTML and append to str variable
                            str += `<div class="row">
                                    <div class="col ml-sm-5">
                                        <div class="d-flex">
                                            <img width="230px" height="230px" src="image/${value.product_image}" alt="">
                                            <div class="mt-5 ml-2">
                                                <p class="heading-h3">${value.product_name}</p>
                                                <p class="heading-h3 mt-2" style="font-size:25px">₹ ${value.product_price}/-</p>
                                                <p class="heading-h3" style="font-size:14px">Order it now</p>
                                                <p class="text-success" style="font-size:14px">In stock</p>
                                                <div class="wrap-elements">
                                                    <span class="quantity">
                                                        <label for="dropdown" class="ml-3 mt-2">Qty</label>
                                                        <select name="" id="dropdown" prod_price="${value.product_price}" prod_id="${value.product_id}" class="custome-select">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select>
                                                    </span>
                                                    <a href="#" class="ml-4 delete-btn" id="${value.product_id}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            count++;
                        });

                        final_total = total_price;
                        $(document).on("change", "#dropdown", function() {
                            var quantity = $(this).val();
                            var prod_price = $(this).attr("prod_price");
                            final_total += parseInt(prod_price) * (parseInt(quantity) - 1);
                            $("#total").html(`₹ ${final_total}/-`);
                        });

                        var checkout = `<div class="d-lg-block d-none float-right mr-4" style="background:white;width:22%;height:180px !important">
                                            <h5 style="font-weight:normal" class="mt-5 text-center">Subtotal<span style="font-family: 'Poppins', sans-serif;font-weight:bold">(${count})</span><br><span id="total">₹ ${total_price}/-</span></h5>
                                            <a href="#" id="proceedToPay" type="button" class="p-2 add-to-cart-btn w-75 mt-4" style="margin-left:35px">Proceed to Pay</a>
                                        </div>`;
                        $("#checkout").append(checkout);
                        $("#show-cart").append(str);
                    }
                }
            });

            $(document).on("click", "#proceedToPay", function(e) {
                e.preventDefault();
                var products = [];
                $(".custome-select").each(function() {
                    var product = {
                        id: $(this).attr("prod_id"),
                        name: $(this).closest(".d-flex").find(".heading-h3").first().text().trim(),
                        price: $(this).attr("prod_price"),
                        img: $(this).closest(".d-flex").find("img").attr("src"),
                        quantity: $(this).val()
                    };
                    products.push(product);
                });

                var total_price = final_total;
                var productInfo = encodeURIComponent(JSON.stringify(products));
                if (typeof final_total !== 'undefined') {
                    window.location.href = 'pay.php?total_price=' + total_price + '&products=' + productInfo;
                } else {
                    console.error("final_total is not defined.");
                }
            });

            $(document).on("click", ".delete-btn", function(e) {
                e.preventDefault();
                var id = $(this).attr("id");
                console.log(id);
                $.ajax({
                    url: "api/delete-cart-items.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);
                        $("#" + id).closest('.row').remove();
                    }
                });
            });
        });
    </script>
</body>

</html>
