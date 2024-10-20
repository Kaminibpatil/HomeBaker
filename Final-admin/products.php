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
                      
                                <a href="" class="dropdown-item" id='destroy'>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <h3 class="mb-3" id="totalProductsHeader">Total Products: <span id="totalProductsCount"></span></h3>
                    <table id="productTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Category</th>
                                <th>Product Rating</th>
                                <th>Product Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody">
                            <!-- Table body content will be dynamically added here -->
                        </tbody>
                    </table>
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

    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm">
                        <input type="hidden" id="editProductId">
                        <div class="mb-3">
                            <label for="editProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="editProductName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductPrice" class="form-label">Product Price</label>
                            <input type="number" class="form-control" id="editProductPrice" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductCategory" class="form-label">Product Category</label>
                            <input type="text" class="form-control" id="editProductCategory" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductRating" class="form-label">Product Rating</label>
                            <input type="number" class="form-control" id="editProductRating" step="0.1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductDescription" class="form-label">Product Description</label>
                            <textarea class="form-control" id="editProductDescription" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#productTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });

            // Function to fetch product data via AJAX
            function fetchProducts() {
                $.ajax({
                    url: 'fetchproducts.php', // PHP script to fetch data
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        table.clear().draw();
                        // Iterate through each product object and append to table
                        $.each(data, function(index, product) {
                            var row = '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + product.product_id + '</td>' +
                                '<td>' + product.product_name + '</td>' +
                                '<td>' + product.product_price + '</td>' +
                                '<td>' + product.product_category + '</td>' +
                                '<td>' + product.product_ratting + '</td>' +
                                '<td>' + product.product_description + '</td>' +
                                '<td>' +
                                '<button class="btn btn-primary btn-sm edit-btn" data-product_id="' + product.product_id + '"><i class="fas fa-edit"></i></button> ' +
                                '<button class="btn btn-danger btn-sm delete-btn" data-product_id="' + product.product_id + '"><i class="fas fa-trash"></i></button>' +
                                '</td>' +
                                '</tr>';
                            table.row.add($(row)).draw();
                        });
                        $('#totalProductsCount').text(data.length);

                        // Attach click event listener to delete buttons
                        $('#productTable').on('click', '.delete-btn', function() {
                            var product_id = $(this).data('product_id');
                            deleteProductData(product_id);
                        });

                        // Attach click event listener to edit buttons
                        $('#productTable').on('click', '.edit-btn', function() {
                            var product_id = $(this).data('product_id');
                            editProductData(product_id);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching product data:', error);
                    }
                });
            }

            // Function to delete product data via AJAX
            function deleteProductData(product_id) {
                $.ajax({
                    url: 'deleteproduct.php', // PHP script to delete product
                    method: 'POST',
                    data: {
                        product_id: product_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Handle success response
                        if (response.success) {
                            // Refresh product table after deletion
                            fetchProducts();
                            alert('Product deleted successfully.');
                        } else {
                            alert('Failed to delete product. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting product:', error);
                    }
                });
            }

            // Function to edit product data via AJAX
            function editProductData(product_id) {
                console.log('Edit product with ID:', product_id);
                $.ajax({
                    url: 'get_product.php', // PHP script to get product details
                    method: 'GET',
                    data: {
                        product_id: product_id
                    },
                    dataType: 'json',
                    success: function(product) {
                        $('#editProductId').val(product.product_id);
                        $('#editProductName').val(product.product_name);
                        $('#editProductPrice').val(product.product_price);
                        $('#editProductCategory').val(product.product_category);
                        $('#editProductRating').val(product.product_ratting);
                        $('#editProductDescription').val(product.product_description);

                        $('#editProductModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching product details:', error);
                    }
                });
            }

            $('#editProductForm').submit(function(event) {
                event.preventDefault();
                var productData = {
                    product_id: $('#editProductId').val(),
                    product_name: $('#editProductName').val(),
                    product_price: $('#editProductPrice').val(),
                    product_category: $('#editProductCategory').val(),
                    product_rating: $('#editProductRating').val(),
                    product_description: $('#editProductDescription').val()
                };

                $.ajax({
                    url: 'edit_product.php', // PHP script to update product
                    method: 'POST',
                    data: productData,
                    dataType: 'json',
                    success: function(response) {

                        if (response.success) {
                            // Refresh product table after editing
                            fetchProducts();
                            $('#editProductModal').modal('hide');
                            alert('Product updated successfully.');
                        } else {
                            alert('Failed to update product. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating product:', error);
                    }
                });
            });

            fetchProducts();
        });
    </script>