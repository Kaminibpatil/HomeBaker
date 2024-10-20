<?php
include("connect.php");
$wishlist_id=$_POST['wishlist_id'];
$customer_id=$_POST['customer_id'];
$query="DELETE  FROM wishlist WHERE product_id='$wishlist_id' AND customer_id='$customer_id'";
$sql=mysqli_query($connect,$query);
if($sql==true){
    echo 1;
}
else{
    echo 0;
}
?>