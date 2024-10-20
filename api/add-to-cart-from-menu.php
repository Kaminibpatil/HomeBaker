<?php 
include("connect.php");
$prod_id=$_POST['prod_id'];
$customer_id=$_POST['customer_id'];
$query="INSERT INTO add_to_cart SELECT c.customer_id, m.menu_id,m.menu_name, m.menu_image, m.menu_price FROM menu m JOIN customer_login c WHERE m.menu_id='$prod_id' AND c.customer_id='$customer_id'";
$sql=mysqli_query($connect,$query);

if($sql==true){
    echo 1; 
}
else{
    echo 0;
}
?>