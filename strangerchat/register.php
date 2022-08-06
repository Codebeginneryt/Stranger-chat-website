<?php
$showAlert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
   include 'C:\xampp\htdocs\strangerchat/db.php';
   $username = $_POST["username"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $cpassword = $_POST["cpassword"];
   $exists = false;
   if(($password == $cpassword) && $exists==false){
   $sql = "INSERT INTO `chatapp` ( `username`, `email`, `password`, `dt`) VALUES ('$username', '$email', '$password', current_timestamp());";
   $result = mysqli_query($conn, $sql);
   if($result){
   $showAlert = true;
   header('location: index.php');
}
}
else{
	$showError = "Passwords do not match";
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="signin.css">
	<title>Login Form</title>
</head>
<body>
	<nav class="navbar">
	<div class="logo">
		<h1>STRANGER WEB</h1>
	</div>
	<div class="item1">
		<a href="index.php">Login</a>
	</div>
</nav>
	<div class="main">
		<div class="left">
			<img src="images\face.png"><br><br>
			<h1>Hello! <span>How are you ?</span></h1>
			<button id="fine" onclick="alert('Thank You! Have a nice day.');">Fine</button>
			<button id="sad" onclick="alert('Sorry! Please take care and feel happy.');">Sad</button>
		</div>
		<div class="right">
			<div class="form">
				<form action="/strangerchat/register.php" method="POST">
				<h1>STRANGER CHAT</h1><br>
				<h3>Register your account</h3>
				<input type="text" name="username" id="username" placeholder="Username"><br>
				<input type="Email" name="email" id="email" placeholder="E-mail"><br>
				<input type="password" name="password" id="password" placeholder="Password"><br>
				<input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password"><br>
				<button>Register</button><br>
       			</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
</script>
</html>