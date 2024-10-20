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
                    <h3 class="mb-3" id="totalProductsHeader">Total Contacts: <span id="totalProductsCount"></span></h3>
                    <table id="productTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Message</th>
                                <th>Date Time</th>
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
                    url: 'fetchcontact.php', // PHP script to fetch data
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        table.clear().draw();
                        // Iterate through each product object and append to table
                        $.each(data, function(index, product) {
                            var row = '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + product.customer_name + '</td>' +
                                '<td>' + product.customer_email + '</td>' +
                                '<td>' + product.message + '</td>' +
                                '<td>' + product.dt + '</td>' +
                                '</tr>';
                            table.row.add($(row)).draw();
                        });
                        $('#totalProductsCount').text(data.length);
                        $('.send-email-btn').click(function() {
                            var customer_email = $(this).data('customer_email');
                            openSendEmailModal(customer_email);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching product data:', error);
                    }
                });
            }

            fetchProducts();



        });
    </script>