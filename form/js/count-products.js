$(document).ready(function() {


    $.ajax({
        url: "api/count-products.php",
        type: "POST",
        dataType: "JSON",
        success: function(data) {

            $.each(data, function(key, value) {
                $("#" + value.product_category + " + .count").html("(" + value.count +
                    ")");
            });


        }
    });
    $(".product-category a").click(function(e) {
        e.preventDefault();
        var prod_id = $(this).attr("id");
        var url = $(this).attr("href");

        window.open(url + "?id=" + prod_id, "_parent");


    });
});