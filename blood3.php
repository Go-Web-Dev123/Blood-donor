<?php
session_start();
if(!isset($_SESSION['phone'])){
    header("location:login.php");
}
?>
<html>
    <title>POSTS</title>
<link rel="stylesheet" href="blood3.css">
    <body>
    
    <a id="back" href="blood.php">Back</a><br/><br/>
        <?php
$con=mysqli_connect('localhost','root','');
    $db=mysqli_select_db($con,'postings');
    $s=("SELECT * 
    FROM posts");
    $data=mysqli_query($con,$s) or die(mysql_error());
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_array($data)){
            $phone=$row['phone_number'];
            $username=$row['username'];
            $address=$row['address'];
            $blood=$row['blood'];
            $district=$row['district'];
            $pname=$row['pname'];
            $hname=$row['hname'];
            $time=$row['time'];
            $date=$row['date'];
            if($time>$date){
            $query="DELETE FROM `posts` WHERE `time` > `date` ";
            $query_run=mysqli_query($con,$query);
            if(mysqli_num_rows($data)<0){
                ?>
        <div class="nothing">
        <h1 id="firsth2" style="position: absolute;
    left: 40%;">No posts Found</h1>
    </div>
    </div>
    <?php

            }
            }
            else{
                ?>

                
                <div class="correct">
                    <h1 id="header1">Active</h1>
                <?php
                date('Y-m-d',strtotime($date));
            echo "Username-"."\r".$username.".";
            echo"<br>";
            echo "Phone no-"."\r".$phone.".";
            echo"<br>";
            echo "Address-"."\r".$address.".";
            echo"<br>"; 
            echo "District-"."\r".$district.".";
            echo"<br>"; 
            echo "Blood Group-"."\r(".$blood.")";
            echo"<br>"; 
            echo "District-"."\r(".$district.")";
            echo"<br>"; 
            echo "Patient Name-"."\r(".$pname.")";
            echo"<br>"; 
            echo "Hospital Name-"."\r(".$hname.")";
            echo"<br>"; 
            echo"<hr>";
            }
              
        }
    }
    else{
        ?>
        <div id="nothing">
        <h1 class="firsth1" style="position: absolute;
    left: 40%;">No posts Found</h1>
    </div>
    <?php
    }
    ?>
        </div>
        <?php
    
?></div>
</body>
</html>