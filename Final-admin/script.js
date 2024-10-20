$(document).ready(function () {
  // Function to fetch data
  function fetchData() {
    $.ajax({
      url: "fetch_counts.php", // Endpoint to fetch counts
      method: "GET",
      dataType: "json",
      success: function (data) {
        // Update card texts with fetched data
        $("#totalUsers").text(data.totalUsers);
        $("#totalProducts").text(data.totalProducts);
        $("#totalOrders").text(data.totalOrders);
      },
      error: function (xhr, status, error) {
        console.error("Error fetching data:", error);
      },
    });
  }

  // Initial data fetch
  fetchData();

  // Example logout modal script
  $(document).on("click", "#destroy", function (e) {
    e.preventDefault();

    $("#logoutConfirmationModal").modal("show");
    console.log("click");
  });

  $("#confirmLogout").click(function () {
    // Perform logout action
    sessionStorage.removeItem("aid");
    console.log("Logout successful");
    // Hide modal
    $("#logoutConfirmationModal").modal("hide");
    window.location.assign("index.php");
  });
});
