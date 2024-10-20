<?php
include ("connect.php");
$menu_id=rand();
$menu_name=$_POST['m_name'];
$menu_price=$_POST['m_price'];

$menu_category=$_POST['menu_category'];
$menu_file=$_FILES['m_file']['name'];
$temp_file=$_FILES['m_file']['tmp_name'];
$folder = "../menu-image/".$menu_file;
if(file_exists($folder)){
  echo 0;
}
else{
if(move_uploaded_file($temp_file,$folder)){

  $add=mysqli_query($connect,"insert into menu(menu_id,menu_category,menu_name,menu_image,menu_price) values ('$menu_id','$menu_category','$menu_name','$menu_file','$menu_price')");
if($add==true){
  echo '<img src="'.$folder.'">';
}
else{
   echo 0;
}
}
}
?>