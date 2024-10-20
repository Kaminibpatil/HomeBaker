<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Baker's Hub Products Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="../index.php">Home Baker</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="dashboard.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Manage
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="users.php" class="sidebar-link">User</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="products.php" class="sidebar-link">Products</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="order.php" class="sidebar-link">Orders</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Add
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="addproduct.php" class="sidebar-link">Product</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="image/profile.jpeg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              
                                <a href="#" class="dropdown-item" id='destroy'>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <h3 class="mb-3" id="totalReviewsHeader">Total Reviews: <span id="totalReviewsCount"></span></h3>
                    <div id="reviewsContainer" class="row">
                        <!-- Reviews will be dynamically added here -->
                    </div>
                </div>
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-12 text-center">
                            <p class="mb-1">
                                <a href="../index.php" class="text-muted">
                                    <strong>Home Baker's Hub</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>

    <script>
        $(document).ready(function() {
            // Function to fetch reviews data via AJAX
            function fetchReviews() {
                $.ajax({
                    url: 'fetchreviews.php', // PHP script to fetch reviews data
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#reviewsContainer').empty(); // Clear existing reviews
                        $('#totalReviewsCount').text(data.length); // Display total reviews count

                        // Iterate through each review object and append to reviewsContainer
                        $.each(data, function(index, review) {
                            var ratingStars = '';
                            for (var i = 0; i < review.review_rating; i++) {
                                ratingStars += '<i class="fas fa-star"></i>';
                            }

                            var reviewHtml = '<div class="col-md-6 mb-3">' +
                                '<div class="card">' +
                                '<div class="card-body">' +
                                '<h5 class="card-title">' + review.review_name + '</h5>' +
                                '<p class="card-text">' + review.review_desc + '</p>' +
                                '<p class="card-text">Rating: ' + ratingStars + '</p>' +
                                '<button class="btn btn-danger btn-sm delete-btn" data-r_id="' + review.r_id + '">Delete</button>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            $('#reviewsContainer').append(reviewHtml);
                        });

                        // Attach click event listener to delete buttons
                        $('.delete-btn').click(function() {
                            var r_id = $(this).data('r_id');
                            console.log(r_id);
                            deleteReview(r_id);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching reviews data:', error);
                    }
                });
            }

            // Function to delete review data via AJAX
            function deleteReview(r_id) {
                $.ajax({
                    url: 'deletereview.php', // PHP script to delete review
                    method: 'POST',
                    data: {
                        r_id: r_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            fetchReviews(); // Refresh reviews after deletion
                            alert('Review deleted successfully.');
                        } else {
                            alert('Failed to delete review. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting review:', error);
                    }
                });
            }

            fetchReviews(); // Initial fetch of reviews
        });
    </script>
</body>

</html>