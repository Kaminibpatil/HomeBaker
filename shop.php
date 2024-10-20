<!DOCTYPE html>
<html lang="en">

<head>
    <title>shop</title>
    <?php include("boostrap-files.php");?>
</head>

<body>
    <?php include("header.php");?>
    <div class="aboutus">
        <img height="auto" width="100%" src="img/about-background.jpg">



        <div class="content ">
            <h1>Shop</h1>
            <div class="more-links">
                <a href="index.php">Home</a>
                <i class=" fa fa-angle-double-right" style="font-size:15px; "></i>
                <span class="about-link">Shop</span>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-around">
            <form class="d-block d-md-none sorting" >
                <select name="category" id="select">
                    <option value="all">All</option>
                    <option value="cupcakes">Cupcakes</option>
                    <option value="cheesecakes">Cheesecakes</option>
                    <option value="donut">Donut</option>

                    <!-- <option value="cold-drinks">Cold Drinks</option> -->
                </select>
            </form>
            <div class="col-2 ml-3 d-none d-md-block  category-layout ">
                <h5 class="mt-2 ml-3">Categories</h5>

                <ul class="category-background">
                    <li class="product-category">
                        <a href="product-categories.php" id="cupcakes">
                            <i class="	fas fa-hamburger "></i>
                            <span>cupcakes</span>
                        </a>
                        <span class="count"></span>
                    </li>
                    <li class="product-category">
                        <a href="product-categories.php" id="cheesecakes">
                            <i class="fas fa-cheese "></i>
                            <span>Cheesecakes</span>
                        </a>
                        <span class="count"></span>
                    </li>
                    <li class="product-category">
                        <a href="product-categories.php" id="donut">
                            <!-- <i class="fas fa-drumstick-bite "></i> -->
                            <i class="fas fa-circle"></i>
                            <span>Donut</span>
                        </a>
                        <span class="count"></span>
                    </li>
                    <!-- <li class="product-category">
                        <a href="product-categories.php" id="cold-drinks">
                            <i class="	fas fa-glass-martini-alt "></i>
                            <span>Cold Drinks</span>
                        </a>
                        <span class="count"></span>
                    </li> -->
                    <li class="product-category">
                        <a href="product-categories.php" id="pastries">
                            <i class="fas fa-bread-slice"></i>
                            <span>Pastries</span>
                        </a>
                        <span class="count"></span>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-9 "> 
                <div class="row justify-content-around" id="show-all-products">

                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-around mt-5 p">
        <ul class="pagination " id="pagination">

        </ul>
    </div>
    <script>
        $(document).ready(function(){
            $("#select").on("change",function(){
            var category=$("#select").val();
            var url="product-categories.php";
                window.open(url+"?id="+category,"_parent");
        });
        });
         
    </script>


    <script src="form/js/pagination.js"></script>
    <script src="form/js/count-products.js"></script>

    <?php include('footer.php');?>
</body>

</html>