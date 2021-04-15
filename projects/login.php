<html>
<link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <body>
<div id="container_demo" >
	<div id="wrapper">
		<div id="login" class="animate form">
			<form  action="logining.php" method="POST"> 
                <h1 class="titles"><u>ONLINE BLOOD DONOR SYSTEM</u></h1>
				<h1 class="firsth1">LogIn</h1> <br/><br/><br/><br/><br/>
				<p> 
                <label class="phoneno"style="position: relative;
	left: -100;">Your Phone Number </label>
					<input id="username" name="phone" type="text" placeholder="Contact number" /><i class="fa fa-phone" aria-hidden="true" ></i>
				</p>
				
				<p> 
					<label > Your password </label>
					<input id="password" name="password" type="password" placeholder="Your Password" /> <i class="fa fa-eye" onclick="clicks()"></i>
				</p> 
				<p class="login button"> 
					<input type="submit" value="Login" name="loginings"/> 
				</p>
				<br/><br/>
				<p class="change_link">
					Not a member yet ?
					<a href="register.php" class="to_register" >Start Donating by Registering</a>
				</p>
			</form>
		</div>
	</div>
</div>  
<script src="login.js"></script>
</body>
</html>