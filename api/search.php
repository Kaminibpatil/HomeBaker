<?php
include("connect.php");
$search = $_POST['search'];
$query = "
SELECT DISTINCT(product_name),product_id, product_category 
FROM product_details
WHERE product_name LIKE '%{$search}%' 
UNION 
SELECT product_city, product_id, product_category 
FROM product_details 
WHERE product_city LIKE '%{$search}%'
UNION
SELECT product_price, product_id, product_category 
FROM product_details 
WHERE product_price LIKE '%{$search}%'
";

$sql = mysqli_query($connect, $query) or die("connection");
$output = "<ul class='search-list'>";
if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_assoc($sql)) {
        $output .= "<li><a href='product_details.php?id={$row['product_id']}&type={$row['product_category']}'>{$row['product_name']}</a></li>";
    }
} else {
    $output .= "<li>not found</li>";
}

$output .= "</ul>";
echo $output;
// $output=mysqli_fetch_all($sql,MYSQLI_ASSOC);

// echo json_encode($output);
