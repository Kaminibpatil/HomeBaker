$(document).ready(function () {
  var display = "#cheesecakes-details";
  var category = "cheesecakes";
  getData(category, display);
  //  var id=$("a[href$='#cheesecakes']").val("cheesecakes");
  function getData(category, display) {
    var str = "";
    $.ajax({
      url: "api/fetch-product.php",
      type: "POST",
      data: { category: category },

      dataType: "JSON",
      success: function (data) {
        console.log(data);
        $.each(data, function (key, value) {
          str += `<div class=" col-11 col-sm-5  col-lg-2 column-background ">

                            <div class="row div-background">
                                <div class=" col-10   div-col" id="cheesecakes-image">
                               
                                    <a href="#"  ><img style="border-radius:140px" width="260px" height="260px" src="image/${value.product_image}" prod_id="${value.product_id}" > </a>
                                </div>
                                
                                <div class=" col-2 wishlist">
                                    <i class="fa fa-heart" prod_id="${value.product_id}" ></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col " >
                                    <p class="price">${value.product_ratting}/5</p>
                                    <h3 class="heading-h3" id="cheesecakes-name">${value.product_name}</h3>
                                    <div class="short-description" id="cheesecakes-description">${value.product_description}</div>
                                    <a href=""><i class="fas fa-shopping-basket add-to-cart"  id="${value.product_id}"></i></a>
                                    <span class="price" style="float: left; " id="cheesecakes-price">₹${value.product_price}/-</span>


                                </div>

                            </div>
                        </div>`;
        });
        $(display).append(str);
      },
    });
  }

  function cupcakes() {
    var category = "cupcakes";
    var display = "#cupcakes-details";

    // $("#cupcakes-details").append(str);
    getData(category, display);
  }
  cupcakes();
  // $("a[href$='#cupcakes']").click(function() {

  //     var category = "cupcakes";
  //     var display = "#cupcakes-details";
  //     $("#cheesecakes-details").empty();
  //     // $("#cupcakes-details").append(str);
  //     getData(category,display);

  // });

  function pastries() {
    var category = "pastries";
    var display = "#pastries-details";

    // $("#cupcakes-details").append(str);
    getData(category, display);
  }
  pastries();

  function donut() {
    var category = "donut";
    var display = "#donut-details";

    // $("#cupcakes-details").append(str);
    getData(category, display);
  }
  donut();

  $(document).on("click", "a img", function () {
    var prod_id = $(this).attr("prod_id");
    console.log(prod_id);
    var url = "product_details.php";
    window.open(url + "?id=" + prod_id + "&type=cheesecakes", "_parent");
  });
});
