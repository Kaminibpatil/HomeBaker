<?php
include("connect.php");
$customer_name=$_POST['customer_name'];
$customer_email=$_POST['customer_email'];
$customer_subject=$_POST['customer_subject'];
$customer_massage=$_POST['customer_massage'];

$massage=mysqli_query($connect,"insert into massage('customer_name','customer_email','customer_subject','customer_massage') values('$customer_name',$customer_email','$customer_subject','$customer_massage'") or die("query failed");
?>