<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'userdata');
$phone=$_POST['phone'];
$password=$_POST['password'];
$s="select * from userregistration where phone_number='$phone' && password='$password'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
    $_SESSION['phone']=$_POST['phone'];
    header('location:homepage.php');
}else{
    echo"<script>alert('Password is Incorrect');</script>";
    echo("<script>window.location = 'login.php';</script>");
}


?>

