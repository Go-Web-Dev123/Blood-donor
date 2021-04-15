<?php
session_start();
if(!isset($_SESSION['phone'])){
    header("location:login.php");
}
?>
<html>
    <title>Other Districts</title>
<body>
<link href="blood1.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<form action="" method="POST">
<a id="back" href="blood.php">Back</a><br/><br/>
<select id="selection" name="blood" style="width:400px;margin-left: 50px;margin-top:50px;height:30px;border-radius:8px;" required>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option> 
                    </select><br/><br/>
                <p class="submit"> 
				<input type="submit" id="submits" class="btn btn-primary" name="submit" value="Search Randomly">
                </p><br/><br/>
                </form>
<div id="firstdiv">
<?php
if(isset($_POST['submit']))
{
    $con=mysqli_connect('localhost','root','');
    $db=mysqli_select_db($con,'userdata');
    $blood=$_POST['blood'];
  $phones =$_SESSION['phone'];
    $s=("SELECT * 
    FROM userregistration 
    WHERE blood = '$blood' 
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
            echo "No records matching for the Blood Group (".$blood.") were found till now.";
           
            
        }
    
}
?>
</div>
</body>
</html>

