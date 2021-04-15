<?php
session_start();
if(!isset($_SESSION['phone'])){
    header("location:login.php");
}
?>
<html>
<title>Need Blood</title>
<body>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="blood.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <form  action="" method="POST">
        <a id="back" href="homepage.php">Back</a><br/><br/>
        <input type="submit" style="height: 40px;
    background-color: #286090;
    color: white;
    font-size: medium;
    font-weight: 100;
    float:right;
    margin-right:30px;"value="Search other District Randomly" name="others" id="otdistricts"><br/><br/><br/><br/>
    <input type="submit" style="height: 40px;
    background-color: #286090;
    color: white;
    font-size: medium;
    font-weight: 100;
    float:right;
    margin-right:30px;"value="Post in need of Blood" name="posting" id="posts"><br/><br/><br/><br/>
    <input type="submit" style="height: 40px;
    background-color: #286090;
    color: white;
    font-size: medium;
    font-weight: 100;
    float:right;
    margin-right:30px;"value="View Posts" name="posts" id="posting">

    <div id="firstdiv">
    <label>Need:</lable>
    <select id="selection" name="blood" style="width:300px" required>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option> 
                    </select><br/><br/>
                    <p class="District">District:
                <input id="district" name="district" type="text" placeholder="District"/>
				</p> <br/>
                <p class="submit"> 
				<input type="submit" id="submits" class="btn btn-primary" name="submit" value="Search">
                </p><br/><br/>
                
                <div id="secondiv">
                <?php
                 $_SESSION['phone'];
if(isset($_POST['submit']))
{
    $con=mysqli_connect('localhost','root','');
    $db=mysqli_select_db($con,'userdata');
    $blood=$_POST['blood'];
    $district=$_POST['district'];
  $phones =$_SESSION['phone'];
  $_SESSION['blood']=$_POST['blood'];
  $blodess=$_SESSION['blood'];
  
    $s=("SELECT * 
    FROM userregistration 
    WHERE blood = '$blood' AND district='$district'
    AND phone_number != '$phones'");
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
            echo "Phone no-"."\r".$phone.".";
            echo"<br>";
            echo "Address-"."\r".$address.".";
            echo"<br>"; 
            echo "District-"."\r".$district.".";
            echo"<br>"; 
            echo "Blood Group-"."\r(".$blood.")";
            echo"<hr>";  
        }
        
        }else{
            echo "No records matching your Districts were found till now.";
           
            
        }
    
}
if(isset($_POST['others'])){
    header("location:blood1.php");
}
if(isset($_POST['posting'])){
    header("location:blood2.php");
}
if(isset($_POST['posts'])){
    header("location:blood3.php");
}
?>
</div>

                
</div>        
</body>
</html>