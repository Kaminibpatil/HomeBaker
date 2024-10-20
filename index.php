<?php include 'api/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <title>Home Baker's Hub</title>
    <script src="form/js/new-account-validation.js"></script>

    <?php include("boostrap-files.php"); ?>
    <style>
        .img {
            width: 100%;
            height: 650px;
        }

        .name {
            color: black;
        }
    </style>
</head>


<body>
    <?php include("header.php"); ?>
    <!--menu ends-->
    <div style="position:relative;top: 50px;" id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/scrolls.png" alt="Los Angeles" class="d-block img">
                <div class="carousel-caption name">
                    <h3>Home Baker's Hub</h3>
                    <p>Platform for HomeBaker's!</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="img/scrol .png" alt="New York" class="d-block w-100 img">
                <div class="carousel-caption name">
                <h3>Home Baker's Hub</h3>
                    <p>Platform for HomeBaker's!</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <br><br>
    <!-- <div class="col offset-lg-4 mt-5">
        <img width="186" height="168" src="img/discount.png" alt="">
    </div> -->
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="col-lg-6 col-md-12 ">
                    <img width="400" class="burger-img" height="400" src="img/baker.jpg">
                </div>
            </div>
            <div class=" col-lg-6 col-md-12">
                <h2>Healthy food can be delicious</h2>
                <div style="color: gray; text-align:justify;"> Welcome to Homebaker's Hub, your premier destination for discovering and savoring the finest homemade baked goods. Our platform was born out of a passion for baking and a desire to support home bakers in their entrepreneurial journeys.
                    <br><br> We understand the unique challenges faced by home-based bakers, from limited marketing reach to the complexities of managing orders and payments. That's why we've created a dedicated space where talent meets opportunity, enabling home bakers to showcase their delicious creations to a wider audience and connect with baking enthusiasts who appreciate the personal touch of homemade treats.

                </div>
                <div class="m-5">

                    <a href="aboutus.php"> <button class="btn btn-lg btn-warning " style="color:white;">Know More</button></a>

                </div>


            </div>
        </div>

    </div>
    <div id="sampele"></div>
    <div class="text-center">
        <h1>SPECIAL DISHES</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <ul class="nav nav-pills justify-content-center " id="mytab">
                    <li class="nav-item ml-4 mt-2">

                        <a class="nav-link active special-dish " data-toggle="pill" href="#cheesecakes">Cheesecake Charm</a>
                    </li>
                    <li class="nav-item ml-4 mt-2">
                        <a class="nav-link special-dish " data-toggle="pill" href="#cupcakes">Happy Cupcakes</a>
                    </li>
                    <li class="nav-item ml-4 mt-2">
                        <a class="nav-link special-dish " data-toggle="pill" href="#pastries">Pastry Magic</a>
                    </li>
                    <li class="nav-item ml-4 mt-2">
                        <a class="nav-link  special-dish " data-toggle="pill" href="#donut">Yum Donuts</a>
                    </li>
                </ul>
                <!-- cheesecakes-->
                <div class="tab-content ">
                    <div class="tab-pane fade show active" id="cheesecakes">
                        <div class="row justify-content-around " id="cheesecakes-details">


                        </div>
                    </div>

                    <!-- cupcakes-->
                    <div class="tab-pane fade " id="cupcakes">
                        <div class="row justify-content-around" id="cupcakes-details">

                        </div>
                    </div>
                    <!-- DESRTS-->
                    <div class="tab-pane fade " id="pastries">
                        <div class="row justify-content-around" id="pastries-details">


                        </div>
                    </div>
                    <!-- donut-->
                    <div class="tab-pane fade " id="donut">
                        <div class="row justify-content-around" id="donut-details">


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br><br>
    <div class=" container-fluid">
        <div class="row justify-content-around">
            <div class="col-lg-3  col-sm-5  col-10  div-pad">
                <div class="row ">
                    <div class="col features">

                        <div>
                            <img src="img/shipping.png" height="90px" width="90px">
                        </div>
                        <div>
                            <h3 class="heading">Free shipping</h3>
                            <span class="cheesecakes-description ml-3 ">Sign up for updates and get free shipping</span>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-sm-5  col-10 div-pad">
                <div class="row ">
                    <div class="col features">

                        <div>
                            <img src="img/watch.png" height="90px" width="90px">
                        </div>
                        <div>
                            <h3 class="heading">30 Minutes Delivery</h3>
                            <span class="cheesecakes-description ml-3">Everything you order will be quickly delivered to your
                                door.</span>

                        </div>

                    </div>
                </div>
            </div>
            <div class=" col-lg-3  col-sm-5  col-10 div-pad">
                <div class="row ">
                    <div class="col features">

                        <div>
                            <img src="img/guarantee.png" height="90px" width="90px">
                        </div>
                        <div>
                            <h3 class="heading">Best Quality Guarantee</h3>
                            <span class="cheesecakes-description ml-3">Poco is an international chain of family
                                restaurants.</span>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>


    <div class="container-fluid client-review-background">
        <h1 class="review-heading">What Our Client Says!</h1>
        <div id="demo1" class="carousel slide" data-ride="carousel">

            <!-- Carousel inner -->
            <?php
            // Start carousel inner
            echo '<div class="carousel-inner">';

            // Fetch reviews from the database and display them in the carousel
            $sql = "SELECT * FROM reviews";
            $result = mysqli_query($connect, $sql);
            $num_reviews = mysqli_num_rows($result);

            // Loop through each review and generate a carousel item
            for ($i = 0; $i < $num_reviews; $i++) {
                $row = mysqli_fetch_assoc($result);
                // Determine if this item should be active
                $activeClass = ($i == 0) ? 'active' : '';
                // Output the carousel item HTML
                echo '<div class="carousel-item ' . $activeClass . '">';
                echo '<div class="row justify-content-around">';
                echo '<div class="col-md-3 col-5 client-review">';
                echo '<div class="row">';
                echo '<div class="col">';
                echo '<img width="80" class="rounded-circle" height="80" src="review/'. $row["review_pic"] . '" alt="Profile Picture">';
                echo '<i class="fas fa-quote-left colon p-2"></i>';
                echo '<span class="client-name">' . $row["review_name"] . '</span>' . '<br>';
                echo '<div class="row">';
                echo '<p class="client-discription">' . $row["review_desc"] . '</p>';
                echo '</div>';
                echo '<div class="text-center">';
                echo '<div class="ml-3 mt-2 d-sm-inline d-flex">';
                // Output star ratings based on the review's rating
                $rating = intval($row["review_rating"]);
                for ($j = 0; $j < 5; $j++) {
                    if ($j < $rating) {
                        echo '<span class="fa fa-star checked"></span>';
                    } else {
                        echo '<span class="fa fa-star"></span>';
                    }
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            // End carousel inner
            echo '</div>';
            ?>

            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#demo1" data-slide="prev">
                <span class="carousel-control-prev-icon bg-warning" style="height: 30px;width: 30px;"></span>
            </a>
            <a class="carousel-control-next" href="#demo1" data-slide="next">
                <span class="carousel-control-next-icon bg-warning" style="height: 30px;width: 30px;"></span>
            </a>

            <!-- Carousel indicators -->
            <ul class="carousel-indicators">
                <?php
                // Loop through each review and generate a carousel indicator
                for ($i = 0; $i < $num_reviews; $i++) {
                    // Determine if this indicator should be active
                    $activeClass = ($i == 0) ? 'active' : '';
                    // Output the indicator HTML
                    echo '<li data-target="#demo1" data-slide-to="' . $i . '" class="indicators ' . $activeClass . '"></li>';
                }
                ?>
            </ul>
        </div>
    </div>




    <div class="container mt-5">
        <div class="review-section">
            <h3>Add Your Own Review</h3>
            <button class="btn btn-primary" data-toggle="modal" data-target="#reviewModal">ADD</button>
        </div>
    </div>


    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel">Add Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reviewForm" onsubmit="return user_review();" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="reviewName">Name </label> <span class="text-danger">*</span>
                            <input type="text" class="form-control" id="reviewName" placeholder="Enter your name" oninput="review_name()">
                            <span class="text-danger" id="reviewName-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="reviewmob">Mobile No.</label> <span class="text-danger">*</span>
                            <input type="tel" name="reviewmob" id="reviewmob" class="form-control" placeholder="Mobile No" minlength="10" maxlength="10" pattern="[789][0-9]{9}" title="Please enter a valid mobile number starting with 7, 8, or 9" oninput="this.value = this.value.replace(/\D/g, '').replace(/^[^789]/, '')">
                            <span class="text-danger" id="reviewmob-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="reviewDescription">Review </label> <span class="text-danger">*</span>
                            <textarea class="form-control" id="reviewDescription" rows="3" placeholder="Enter your review" oninput="review_desc()"></textarea>
                            <span class="text-danger" id="reviewDescription-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="reviewProfilePic">Profile Picture</label> <span class="text-danger">*</span>
                            <input type="file" class="form-control-file" id="reviewProfilePic" accept="image/*" oninput="review_image()">
                            <span class="text-danger" id="reviewProfilePic-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="reviewRating">Rating</label> <span class="text-danger">*</span>
                            <div id="reviewRating">
                                <i class="fas fa-star" data-value="1"></i>
                                <i class="fas fa-star" data-value="2"></i>
                                <i class="fas fa-star" data-value="3"></i>
                                <i class="fas fa-star" data-value="4"></i>
                                <i class="fas fa-star" data-value="5"></i>
                            </div>
                            <span class="text-danger" id="reviewRating-error"></span>
                        </div>
                        <button type="submit" class="btn btn-primary" id="sub">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#reviewRating .fa-star').click(function() {
                let rating = $(this).data('value');
                $('#reviewRating .fa-star').removeClass('checked');
                $(this).addClass('checked');
                $(this).prevAll('.fa-star').addClass('checked');
                review_rating();

            });
        });
        $(document).ready(function() {
            $("#sub").click(function(e) {
                e.preventDefault();
                var formVal = user_review();
                if (formVal == true) {
                    var reviewName = $("#reviewName").val();
                    var reviewDescription = $("#reviewDescription").val();
                    var reviewProfilePic = $("#reviewProfilePic")[0].files[0]; // Get the file object
                    var reviewRating = $("#reviewRating .fa-star.checked").length;
                    var reviewmob = $("#reviewmob").val();

                    var formData = new FormData();
                    formData.append('reviewName', reviewName);
                    formData.append('reviewDescription', reviewDescription);
                    formData.append('reviewProfilePic', reviewProfilePic);
                    formData.append('reviewRating', reviewRating);
                    formData.append('reviewmob', reviewmob);


                    $.ajax({
                        url: "api/review.php",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,

                        success: function(data) {
                            if (data == 1) {
                                alert('Review submitted successfully!');
                                $("#reviewForm")[0].reset();
                                $('#reviewModal').modal('hide');
                            } else {
                                alert('Failed to upload review. Please try again');
                                $("#reviewForm")[0].reset();
                                $('#reviewModal').modal('hide');
                            }
                        }
                    })
                }
            });
        });
    </script>





    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12 img-hover">
                <img src="image/footer/foot1.jpg">
            </div>
            <div class="col-md-3 col-sm-6 col-12 img-hover">
                <img src="image/footer/foot2.jpg">
            </div>
            <div class="col-md-3 col-sm-6 col-12 img-hover">
                <img src="image/footer/foot3.jpg">
            </div>
            <div class="col-md-3 col-sm-6 col-12 img-hover">
                <img src="image/footer/foot4.jpg">
            </div>
        </div>
    </div>

    <script src="form/js/fetch-products-by-category.js">

    </script>

    <script src="form/js/fetch-wishlist.js"></script>


    <?php
    include("footer.php");
    ?>





</body>

</html>