<?php 
ob_start(); 
require 'config.php';

$view = $_POST['view'];
$name = $_POST['name'];
$comments = $_POST['comments'];
$email = $_POST['email'];
$num = $_POST['num'];

$query = mysqli_query($con, "INSERT INTO `feedback`(`name`, `email`, `phone`, `feedback`) VALUES ('$name','$email','$num','$comments')");
echo '<script>alert("Thank You..! Your Feedback is Valuable to Us"); location.replace(document.referrer);</script>';
?>
