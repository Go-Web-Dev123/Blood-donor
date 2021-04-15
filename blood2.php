<?php
session_start();
if(!isset($_SESSION['phone'])){
    header("location:login.php");
}
?>
<html>
    <title>Your Posts</title>
    <link href="blood2.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <body>
        <form action="" method="POST">
        <a id="back" href="blood.php">Back</a><br/><br/>
            <div id="fdiv">
        <input type="text" placeholder="Your Username" name="username" required><br/><br/>
        <input type="text" placeholder="Patient Name" name="pname" required><br/><br/>
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
        <input type="address" name="address" placeholder="Your Address" required><br/><br/>
        <input type="tel" name="phone" placeholder="Your Phone number" required><br/><br/>
        <input type="text" name="district" placeholder="District" required><br/><br/>
        <input type="text" name="hname" placeholder="Hospital Name" required><br/><br/>
        Need Blood Within:<br/><br/><input type="date" name="date" id="date" required><br/><br/>
        <button name="post" id="POST">POST</button>
        <div>
</form>
</body>
</html>
<?php
if(isset($_POST['post']))
{
    $con=mysqli_connect('localhost','root','');
    $db=mysqli_select_db($con,'postings');
    $blood=$_POST['blood'];
    $district=$_POST['district'];
    $username=$_POST['username'];
    $patient=$_POST['pname'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $hname=$_POST['hname'];
    $date=date('Y-m-d',strtotime($_POST['date']));
    $reg="insert into posts(phone_number,pname,username,blood,address,district,hname,date) values('$phone','$patient','$username','$blood','$address','$district','$hname','$date')";
    mysqli_query($con,$reg);
    echo"<script>alert('Succesfully Posted.View it in Post');</script>";
}
?>