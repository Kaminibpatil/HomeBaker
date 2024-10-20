<?php 
include("connect.php");
$customer_id=$_POST['customer_id'];
$query="SELECT * FROM add_to_cart  WHERE customer_id='$customer_id' GROUP BY product_id";
$sql=mysqli_query($connect,$query);
$output=mysqli_fetch_all($sql,MYSQLI_ASSOC);
echo json_encode($output);
?>