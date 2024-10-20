<!DOCTYPE html>
<html lang="en">

<head>

    <title>wishlist page</title>
    <?php include("boostrap-files.php");?>
</head>

<body>

    <?php include("header.php");?>
    <div class="aboutus">
        <img height="auto" width="100%" src="img/about-background.jpg">



        <div class="content ">
            <h1>Wishlist</h1>
            <div class="more-links">
                <a href="index.php">Home</a>
                <i class=" fa fa-angle-double-right" style="font-size:15px; "></i>
                <span class="about-link">Wishlist</span>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="position:relative;">
        <div class="row  justify-content-around" id="show-wishlist">
          

        </div>

    </div>

    <script>
    $(document).ready(function() {
        var customer_id=sessionStorage.getItem('customer_id');
        var str = "";
        $.ajax({
            url: "api/fetch-wishlist.php",
            type: "POST",
            data:{customer_id:customer_id},
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                
                $.each(data, function(key, value) {
                    str += `<div class="col-lg-3  col-md-5 mt-3 col-sm-2 col-10 wishlist-cards">
                <div class="d-flex">

                   <a href="product_details.php"> <img width="200px" height="200px" src="image/${value.product_image}" alt=""></a>

                    <div class="mt-5 ml-2">
                        <p class="heading-h3">${value.product_name}</p>

                       

                        <p class="heading-h3 mt-2" style="font-size:25px">₹${value.product_price}/-</p>
                        <p class="heading-h3" style="font-size:14px">Order it now </p>
                        <p class="text-success" style="font-size:14px">In stock </p>


                    </div>


                </div>
                <div class="d-flex justify-content-around" id="${value.product_id}">
                    <a href="" type="button" role="button" class="remove-from-wishlist-btn " 
                        style="width:32%">Remove</a>
                    <a href="" type="button" role="button" class=" add-to-cart-btn  "
                        style="width:32%">Add to cart</a>
                </div>



            </div>`;

                });
                $("#show-wishlist").append(str);
            }
        });
        $(document).on("click",".remove-from-wishlist-btn ",function(e) {
            e.preventDefault();
            var wishlist_id=$(this).parent().attr("id");
            console.log(wishlist_id);
            $.ajax({
                 url:"api/remove-wishlist.php",
                 type:"POST",
                 data:{wishlist_id:wishlist_id,customer_id:customer_id},
                 dataType:"JSON",
                 success:function(data){
                     if(data==1){
                        console.log(data);
                        $("#"+wishlist_id).closest('.wishlist-cards').remove();
                     }
                     else{
                         console.log("error");
                     }
                        
                 }
            });
        });

        $(document).on("click",".add-to-cart-btn ",function(e) {
            
            e.preventDefault();
            var customer_id=sessionStorage.getItem('customer_id');
            var wishlist_id=$(this).parent().attr("id");
            console.log(wishlist_id);
            $.ajax({
                 url:"api/add-to-cart-from-wishlist.php",
                 type:"POST",
                 data:{wishlist_id:wishlist_id,customer_id:customer_id},
                 dataType:"JSON",
                 success:function(data){
                     if(data==1){
                        console.log(data);
                        $("#"+wishlist_id).closest('.wishlist-cards').remove();
                     }
                     else{
                         console.log("error");
                     }
                        
                 }
            });
        });
    });
    </script>
    <?php include('footer.php');?>
</body>

</html>