<?php
session_start();
if(!isset($_SESSION['phone'])){
    header("location:login.php");
}
?>
<html>
    <body>
        <title>Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="profile.css?v=<?php echo time(); ?>">    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div id="container_demo" >
	<div id="wrapper">
		<div id="login" class="animate form">
			<form  action="profile.php" method="POST">
                <div id=firstdiv>
            <a id="back" href="homepage.php">Back</a><br/><br/>
            <a id="settings" href="settings.php" >Update Profile</a>
                </div><br/>
                <div id="seconddiv">
                <br/><br/><br/><br/>
                <h1 id="cprofile">Your Current Profile</h1><br/><br/>
                <div id="seconddiv">
                <?php

if(!isset($_SESSION['phone'])){
    header("location:login.php");
}

$con=mysqli_connect('localhost','root','');
    $db=mysqli_select_db($con,'userdata');
  $phones =$_SESSION['phone'];
  $id=$_SESSION['id'];
    $s=("SELECT * 
    FROM userregistration 
    WHERE  id = '$id'");
    $data=mysqli_query($con,$s) or die(mysql_error());
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_array($data)){
            $phone=$row['phone_number'];
            $username=$row['username'];
            $address=$row['addresses'];
            $blood=$row['blood'];
            $district=$row['district'];           
            echo "Username-"."\r".$username.".";
            echo"<br>";
            echo "<hr/>";
            echo "Phone no-"."\r".$phone.".";
            echo"<br>";
            echo "<hr/>";
            if($address!=''){
            echo "Address-"."\r".$address.".";
        }else{
            echo "Address-"."\rNote yet Updated.";
        }
            echo"<br>"; 
            echo "<hr/>";
            if($district!=''){
            echo "District-"."\r".$district.".";
        }else{
            echo "District-"."\rNote yet Updated";
        }
            echo"<br>"; 
            echo "<hr/>";
            if($blood!=''){
            echo "Blood Group-"."\r(".$blood.")";
        }else{
            echo "Blood Group-"."\rNot Yet Updated";
        }
        

        }
    }
    

?>
</div>
                <img src="bloods.jpeg" id="firstimg">

			</form>
		</div>
	</div>
</div>  
</body>
</html>