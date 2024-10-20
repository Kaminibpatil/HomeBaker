$(document).on("click", ".wishlist i", function () {
  if (sessionStorage.getItem("customer_id") != null) {
    var customer_id = sessionStorage.getItem("customer_id");
    var prod_id = $(this).attr("prod_id");

    $.ajax({
      url: "api/add-wishlist.php",
      type: "POST",
      dataType: "JSON",
      data: {
        prod_id: prod_id,
        customer_id: customer_id,
      },
      success: function (data) {
        if (data == 1) {
          $(".wishlist [prod_id=" + prod_id + "]").css("color", "red");
        } else {
          alert("This item already in your wishlist");
        }
      },
    });
  } else window.location.assign("sign_in.php");
});

$(document).on("click", "a .add-to-cart", function (e) {
  e.preventDefault();
  if (sessionStorage.getItem("customer_id") != null) {
    var customer_id = sessionStorage.getItem("customer_id");
    var prod_id = $(this).attr("id");
    console.log(prod_id);
    $.ajax({
      url: "api/add-to-cart-main.php",
      type: "POST",
      dataType: "JSON",
      data: {
        prod_id: prod_id,
        customer_id: customer_id,
        type: "",
      },
      success: function (data) {
        if (data == 1) {
          alert("Product added to your cart successfully");
        } else {
          alert("This item already in cart");
        }
      },
    });
  } else window.location.assign("sign_in.php");
});
$(document).ready(function () {
  var session = sessionStorage.getItem("customer_id");
  $.ajax({
    url: "api/fetch-wishlist.php",
    type: "POST",
    data: { customer_id: session },
    dataType: "JSON",
    success: function (data) {
      $.each(data, function (key, value) {
        console.log(value.product_id);

        $(".wishlist [prod_id=" + value.product_id + "]").css("color", "red");
      });
    },
  });
});
