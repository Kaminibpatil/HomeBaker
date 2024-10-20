<?php 
include("connect.php");
$query="SELECT COUNT(product_id) as count,product_category FROM product_details GROUP BY product_category";
$sql=mysqli_query($connect,$query);
$output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
 echo json_encode($output);
?>