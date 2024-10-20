<?php 
include("connect.php");
$customer_id=$_POST['customer_id'];
$prod_id=$_POST['prod_id'];
    $query="INSERT INTO   wishlist SELECT c.customer_id,m.menu_id,m.menu_name,m.menu_image,m.menu_price FROM menu m JOIN customer_login c WHERE  menu_id='$prod_id' AND customer_id='$customer_id'";
$sql=mysqli_query($connect,$query);
if($sql==true){
    echo 1;
}
    else{
        echo 0;
    }
?>