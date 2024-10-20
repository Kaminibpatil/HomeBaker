<?php
include("connect.php");


$limit=6;
$total_records="SELECT * FROM product_details";
$sql=mysqli_query($connect,$total_records);
$count=mysqli_num_rows($sql);

$total_pages=ceil($count/$limit);
$data="";
 
for($i=1;$i<=$total_pages;$i++){
    $data.=" 
    <li class='page-item'><a class='page-link ml-3' id='{$i}'>{$i}</a></li>";
    

}

$data.="</ul>";
echo $data;


?>