<?php
$login = false;
$showError = false;
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   include 'C:\xampp\htdocs\strangerchat/db.php';
   $username = $_POST["username"];
   $password = $_POST["password"];
   $sql = "select * from chatapp where username='$username' AND password='$password'";
   $result = mysqli_query($conn, $sql);
   $num = mysqli_num_rows($result);
   if ($num == 1) {
   	   	   $login = true;
   	   	   session_start();
   	   	   $_SESSION['loggedin'] = true;
   	   	   $_SESSION['username'] = $username;
   	   	   header("location: chatroom.php");
          $showAlert = true;
   	   }
   	   else{
   	   	$showError = true;
   	   }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stranger chat</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<nav class="navbar">
	<div class="logo">
		<h1>STRANGER WEB</h1>
	</div>
	<div class="item1">
		<a href="register.php">Register Here</a>
	</div>
</nav>
<div class="main">
	<div class="up">
		<div class="left">
			<h1>Stranger Chat WebApp: </h1>
			<ul>
				<li>Chatting with friends.</li>
				<li>Chatting with Colleagues.</li>
				<li>Chatting with Family.</li>
			</ul>
			<p>This web application is used only for entertainment purpose.</p>
		</div>
		<div class="right">
			<img src="images\face.png">
		</div>
	</div>
	<div class="down">
		<form action="/strangerchat/index.php" method="POST">
			<input type="text" name="username" id="username" placeholder="USERNAME"><br>
			<input type="password" name="password" id="password" placeholder="PASSWORD"><br>
			<center><a href="#"><button type="submit">Login</button></a><br><br>
              <a href="register.php">Don't have an account ?</a>
			</center>
		</form>
	</div>
</div>
</body>
</html>