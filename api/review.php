<?php
session_start();
include("connect.php");
$reviewName = $_POST['reviewName'];
$reviewDescription = $_POST['reviewDescription'];
// $reviewProfilePic = $_POST['reviewProfilePic'];
$reviewRating = $_POST['reviewRating'];
$reviewmob = $_POST['reviewmob'];

$reviewProfilePic = $_FILES['reviewProfilePic']['name'];
$temp_image = $_FILES['reviewProfilePic']['tmp_name'];
$folder = "../review/" . $reviewProfilePic;



if (move_uploaded_file($temp_image, $folder)) {
    $add = mysqli_query($connect, "INSERT INTO reviews(`review_name`, `review_desc`, `review_rating`, `review_pic`, `reviewmob`) VALUES ('$reviewName','$reviewDescription','$reviewRating','$reviewProfilePic','$reviewmob')");
    if ($add == true) {
        echo 1;
    } else {
        echo 0;
    }
}
