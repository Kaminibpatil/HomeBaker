<!DOCTYPE html>
<html lang="en">

<head>
  <title>My Orders page</title>
  <?php include("boostrap-files.php"); ?>
</head>

<body>
  <?php include("header.php"); ?>
  <div class="aboutus">
    <img height="auto" width="100%" src="img/about-background.jpg">
    <div class="content">
      <h1>My Orders</h1>
      <div class="more-links">
        <a href="index.php">Home</a>
        <i class="fa fa-angle-double-right" style="font-size:15px;"></i>
        <span class="about-link">My orders</span>
      </div>
    </div>
  </div>

  <div class="container-fluid" style="position:relative;">
    <div class="row justify-content-around" id="show-order"></div>
  </div>

  <script src="form/js/new-account-validation.js"></script>
  <script>
    $(document).ready(function() {
      var customer_id = sessionStorage.getItem('customer_id');
      var str = "";

      // Fetch order items via AJAX
      $.ajax({
        url: "api/fetch-order-items.php",
        type: "POST",
        data: {
          customer_id: customer_id
        },
        dataType: "json",
        success: function(data) {
          console.log(data);
          $.each(data, function(key, value) {
            str += `<div class="col-lg-3 col-md-5 mt-3 col-sm-2 col-10 wishlist-cards">
                      <div class="d-flex">
                        <a href="product_details.php"><img width="200px" height="200px" src="${value.product_image}" alt=""></a>
                        <div class="mt-5 ml-2">
                          <p class="heading-h3">${value.product_name.replace(/\+/g, ' ')}</p>
                          <p class="heading-h3 mt-2" style="font-size:25px">₹${value.product_price}/-</p>
                          <div class="d-flex justify-content-around mt-3" id="${value.product_id}">
                            <a href="#" class="btn btn-danger add-to-cart-btn cancel-order-btn" data-toggle="modal" data-target="#cancelOrderModal" data-product-id="${value.product_id}">Cancel Order</a>
                          </div>
                        </div>
                      </div>
                    </div>`;
          });
          $("#show-order").append(str);
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", error);
          alert("Error fetching order items. Please try again later.");
        }
      });

      // Click event handler for cancel order button in modal
      $(document).on("click", ".cancel-order-btn", function() {
        var productId = $(this).data("product-id");
        console.log("Clicked cancel order for product ID:", productId);
        $("#confirmCancelOrder").data("product-id", productId); // Store productId in modal data
      });

      // Click event handler for confirm cancel order button in modal
      $("#confirmCancelOrder").click(function(e) {
        e.preventDefault();
        var productId = $(this).data("product-id");
        console.log("Confirming cancel order for product ID:", productId);

        // AJAX to remove order from database
        $.ajax({
          url: "api/cancle-order.php",
          type: "POST",
          data: {
            productId: productId
          },
          dataType: "json",
          success: function(response) {
            console.log(response);
            if (response.status === "success") {
              $("#" + productId).closest('.wishlist-cards').remove();
              $('#cancelOrderModal').modal('hide');
              alert("Order canceled successfully.");
            } else {
              alert("Failed to cancel order. Please try again later.");
            }
          },
          error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
            alert("Error canceling order. Please try again later.");
          }
        });
      });
    });
  </script>

  <div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cancelOrderModalLabel">Cancel Order Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to cancel this order?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="confirmCancelOrder" class="btn btn-danger">Confirm Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <?php include('footer.php'); ?>
</body>

</html>
