<?php
include("connect.php");
$product_id=rand();
$p_category=$_POST['select'];
$p_name=$_POST['p_name'];
$p_price=$_POST['p_price'];
$p_ratting=$_POST['p_ratting'];
$p_description=$_POST['p_description'];
$p_image=$_FILES['file']['name'];
$temp_image=$_FILES['file']['tmp_name'];
$folder = "../image/".$p_image;



if(move_uploaded_file($temp_image,$folder)){

  $add=mysqli_query($connect,"insert into product_details(product_id,product_category,product_name,product_image,product_price,product_ratting,product_description) values ('$product_id','$p_category','$p_name','$p_image','$p_price','$p_ratting','$p_description')");
if($add==true){
  echo '<img src="'.$folder.'">';
}
else{
   echo 0;
}
}

?>