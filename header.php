<style>
    .scrollToTop {
        text-decoration: none;

        position: fixed;
        bottom: 2%;
        opacity: 1;
        color: white !important;
        right: 5%;
        z-index: 9;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        background: #fb524f;

        border-radius: 100%;
        font-size: 18px;

    }

    .sign-in {
        color: white;
        padding: 10px;
        background-color: #ffc107;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: black
    }

    .sign-in:hover {
        color: white;
        text-decoration: none;
    }

    #search-icon,
    #close-search {
        display: none;
        /* Only one will be displayed at a time */
    }

    #search-icon {
        display: inline;
        /* Show the search button by default */
    }

    .custom-dropdown {
        position: relative;
        display: inline-block;
    }

    .custom-dropdown select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: #fb3;
        color: black;
        padding: 10px;
        border-radius: 10px;
        border: none;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        cursor: pointer;
    }

    .custom-dropdown select option {
        cursor: pointer;
    }

    .custom-dropdown::after {
        content: '\25BC';
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        font-size: 12px;
        color: black;
    }

    .goog-te-gadget img {
        display: none !important;
    }

    .goog-te-banner-frame,
    .goog-te-menu-frame,
    .goog-te-gadget-icon,
    .goog-te-gadget-simple,
    .goog-te-banner,
    .goog-te-banner-frame.skiptranslate,
    .goog-te-banner div,
    .goog-te-banner-frame .skiptranslate,
    .goog-te-banner-frame .skiptranslate div,
    .goog-te-menu2,
    #goog-gt-tt,
    .goog-te-balloon-frame,
    .goog-te-menu-frame,
    .goog-te-menu-frame *,
    .goog-te-menu2 * {
        display: none !important;
    }


    body>.skiptranslate {
        display: none;
    }

    body {
        top: 0px !important;
    }
</style>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }

    function doGTranslate(element) {
        var language = element.value;
        var select = document.querySelector('#google_translate_element select');
        if (select) {
            select.value = language;
            select.dispatchEvent(new Event('change'));
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            html: true
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        var searchInput = document.getElementById("search");
        var searchIcon = document.getElementById("search-icon");
        var closeSearchBtn = document.getElementById("close-search");
        var showSearch = document.getElementById("show-search");

        searchInput.addEventListener("input", function() {
            if (searchInput.value) {
                searchIcon.style.display = "none";
                closeSearchBtn.style.display = "inline";
            } else {
                searchIcon.style.display = "inline";
                closeSearchBtn.style.display = "none";
            }
        });

        closeSearchBtn.addEventListener("click", function() {
            searchInput.value = "";
            closeSearchBtn.style.display = "none";
            searchIcon.style.display = "inline";
            showSearch.innerHTML = "";
            searchInput.focus(); // Keep the focus on the search input
        });
    });
</script>
<header>
    <div class="container-fluid ">
        <nav class="navbar p-2 navbar-light navbar-expand-lg bg-white fixed-top ">
            <button class="navbar-toggler " data-toggle="collapse" data-target="#mynavbar">
                <span class="navbar-toggler-icon "></span>
            </button>
            <a href="index.php" class="navbar-brand ml-5  float-lg-left"><img class="navbar-brand ml-5 d-sm-block d-none float-lg-left" src="img/food-logo1.png" width="180px" height="auto" alt=""></a>
            <ul class="nav ">
                <li class="nav-item">
                    <div style="position:relative;">
                        <input id="search" type="search" class="form-control border-0 search-box" placeholder="search here..." />
                        <div class="auto-complete" id="show-search"></div>
                        <span id="search-icon" style="position:absolute;top: 10px;right:10px;">
                            <i class="fa fa-search"></i>
                        </span>
                        <span id="close-search" style="position:absolute;top: 10px;right:10px; cursor: pointer; display: none;">
                            <i class="fa fa-times"></i>
                        </span>
                    </div>
                    <ul>
                    </ul>
            </ul>

            <div class="collapse navbar-collapse " id="mynavbar">
                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item  custom-active"><a href="index.php" class="nav-link nav-links ">Home</a></li>
                    <li class="nav-item  custom-active"><a href="offer.php" class="nav-link nav-links">Offer</a></li>
                    <li class="nav-item  custom-active"><a href="shop.php" class="nav-link nav-links">Shop</a></li>
                    <li class="nav-item custom-active" custom-active><a href="aboutUs.php" class="nav-link nav-links">About</a></li>
                    <li class="nav-item custom-active"><a href="contact.php" class="nav-link nav-links">Contact</a></li>
                    <ul class="d-flex nav-col">
                        <li class="nav-item ml-3 ml-lg-0"><a class="nav-link login " id="customer_id" href="#" data-toggle="popover" data-placement="bottom" data-content=" <a href='sign_in.php' class='sign-in'>Login / Sign Up</a>" data-html="true"><i class="fas fa-user "></i></a><span class="d-lg-none d-block nav-links">Login</span></li>
                        <li class="nav-item ml-3 ml-lg-0"><a href="my-wishlist.php" class="nav-link login"><i class="fas fa-heart "></i></a><span class="d-lg-none d-block nav-links">Wishlist</span></li>
                        <li class="nav-item ml-3 ml-lg-0"> <a href="add-to-cart.php" class="nav-link login sticky-basket"><i class="fas fa-shopping-basket   "></i></a><span class="d-lg-none d-block nav-links">My cart</span></li>
                        <!-- </ul> -->
                        <!-- <ul class="d-flex nav-col "> -->
                        <li class="nav-item ml-3 ml-lg-0">
                            <div class="custom-dropdown">
                                <select onchange="doGTranslate(this);">
                                    <!-- <option value="">Select Language</option> -->
                                    <option value="en">English</option>
                                    <option value="mr">Marathi</option>
                                    <option value="de">German</option>
                                    <option value="hi">Hindi</option>
                                    <option value="pa">Punjabi</option>
                                    <option value="gu">Gujarati</option>
                                    <option value="bn">Bengali</option>

                                    <!-- Add more languages as needed -->
                                </select>
                            </div>
                        </li>

                        <!-- </ul> -->
                    </ul>

            </div>

        </nav>

    </div>
    <div id="google_translate_element" style="display: none;"></div>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</header>

<script>
    $(document).ready(function() {
        console.log(sessionStorage.getItem('customer_id'));
        if (sessionStorage.getItem('customer_id') != null) {
            $("#customer_id").attr("data-content",
                "<a href='my_orders.php'>My orders</a><br><a href='' id='destroy' >logout</a>");

        }

        $(document).on("click", "#destroy", function(e) {
            e.preventDefault();

            $("#logoutConfirmationModal").modal("show");
            console.log("click");
        });

        $("#confirmLogout").click(function() {
            // Perform logout action
            sessionStorage.removeItem('customer_id');
            console.log("Logout successful");
            // Hide modal
            $("#logoutConfirmationModal").modal("hide");
        });


        $("#search").on("keyup", function() {
            var search = $(this).val();
            if (search != '') {


                $.ajax({
                    url: "api/search.php",
                    type: "POST",

                    data: {
                        search: search
                    },

                    success: function(data) {
                        console.log(data);

                        $("#show-search ").fadeIn("fast").html(data);


                    }
                });
            } else {
                $("#show-search").fadeOut();
            }


        });
    });
</script>
<!-- Logout Confirmation Modal -->
<div class="modal" id="logoutConfirmationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Confirm Logout</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p>Are you sure you want to log out?</p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmLogout">Logout</button>
            </div>
        </div>
    </div>
</div>

<a href="#" class="scrollToTop"><i class="fas fa-arrow-up"></i></a>