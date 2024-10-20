<?php 
include("connect.php");
$id=$_POST['id'];
$query="DELETE FROM add_to_cart WHERE product_id='$id'";
$sql=mysqli_query($connect,$query);


if($sql==true){
    echo 1; 
}
else{
    echo 0;
}
?>