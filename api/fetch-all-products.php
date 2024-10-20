<?php
include("connect.php");

$page=$_POST['page_no'];
$limit=6;
$offset=($page-1)*$limit;

$query="SELECT * FROM product_details LIMIT $offset,$limit";
$sql=mysqli_query($connect,$query);
$output=mysqli_fetch_all($sql,MYSQLI_ASSOC);

echo json_encode($output);

?>