<?php 
include("connect.php");
$prod_id=$_POST['prod_id'];

$query="SELECT * FROM product_details  WHERE product_id='$prod_id'";
$sql=mysqli_query($connect,$query);
$output=mysqli_fetch_all($sql,MYSQLI_ASSOC);

echo json_encode($output);

?>