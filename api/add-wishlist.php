<?php 
include("connect.php");
$prod_id=$_POST['prod_id'];
$customer_id=$_POST['customer_id'];
$query="INSERT INTO   wishlist  SELECT c.customer_id,product_id,product_name,product_image,product_price FROM product_details  INNER JOIN customer_login c  WHERE  product_id='$prod_id' AND customer_id='$customer_id'";
$sql=mysqli_query($connect,$query);
if($sql==true){
    echo 1;
}
    else{
        echo 0;
    }

?>