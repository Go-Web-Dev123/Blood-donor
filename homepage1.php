<?php

session_start();
$profile=$_POST['profile'];
if($profile){
    header('location:profile.php');
}
$con=mysqli_connect('localhost','root','');
    $db=mysqli_select_db($con,'userdata');
  $phones =$_SESSION['phone'];
    $s=("SELECT * 
    FROM userregistration 
    WHERE  phone_number = '$phones'");
    $data=mysqli_query($con,$s) or die(mysql_error());
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_array($data)){
            $_SESSION['id']=$row['id'];
        }
    }


?>