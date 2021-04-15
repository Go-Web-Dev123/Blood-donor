<?php
session_start();
if(!isset($_SESSION['phone'])){
    header("location:login.php");
}
?>
<html>
    <body>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="homepage.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
        <title>Home Page</title>
        <form action="homepage1.php" method="POST">
        <div id="firstdiv" style="border-radius:20px;">
        <input  name="profile" type="submit" value="Profile" id="profiles" style="position:relative;z-index:1;"/>
        <a id="logout"href="logout.php"style="position:relative;z-index:1;">Logout</a>
        </div>
        <h1 id="blood" ><a href="blood.php"style="position:relative;z-index:1;">Need in Blood</a></h1>
        <div id="banner" style="height: 100vh;width: 100%;overflow: hidden;display:flex;justify-content: center;align-content: center;">
    <video src="1.mp4" autoplay loop muted id="video" style="position: absolute;top: 0;left: 0;object-fit: cover;width: 100%;height: 100%;pointer-events: none;"></video>
</div>
        </form>
</body>
</html>