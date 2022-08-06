<?php
session_start();
include 'C:\xampp\htdocs\strangerchat/db.php';
$sql = "select * from chatapp";
//include 'C:\xampp\htdocs\strangerchat/conversations.php';

//$user = getUser($username, $conn);
//$conversations = getConversation($user['sno'], $conn);
//print_r($conversations);
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Starnger Chat Room</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="roomstyle.css">
</head>
<body>
<div class="chatroom">
	<div class="user">
		<div class="user-title">
			<img src="images\face.png">
			<p><?php 

			echo $_SESSION['username'];  

			?><br><span id="active">Active...</span></p>
		</div>
		<div class="user-list">
			<ul>
				<?php
				$sql = "select * from chatapp";
				$list = mysqli_query($conn, $sql);
				//$list = mysqli_fetch_array($result);
				while($result = mysqli_fetch_array($list)){
				?>
				<li>
					<div class="user-image" id="userList" style="display: inline-flex; background: white; width: 100%; border-bottom: 1px solid grey; cursor: pointer;">
						<img src="images\face.png" width="50" height="50" style="margin:10px;">
						<p style="font-size: 20px; font-weight: normal; margin: 25px 15px 15px 15px; "><?php echo $result['username']; ?></p>
					</div>
				</li>
				<?php 
			      }
				?>
			</ul>
		</div>
		<div class="user-logout">
			<a href="#">Logout</a> 
			<a href="#"><i class="fa fa-forward"></i></a>
		</div>
	</div>
	<div class="stranger" style="width: 72%;">
		<div class="stranger-title">
			<p><?php echo $_SESSION['username']; ?><span id="online">Online</span></p>
		</div>
		<div class="message-box">
			<div class="anyClass" id="chatbox" style="float: right; width: 950px; overflow: auto;">
			<!--<p style="padding: 20px;"><mark style="padding: 8px; background: white; margin: 20px; border-radius: 6px;">hello</mark></p>-->
		</div>
		</div>
		<div class="text-message" style="background: white; padding: 5px;">
			<form method="post" style="display: inline-flex;">
			<input class="form-control" type="text" name="msg" id="msg" placeholder="Type something to send..." style="margin-right: 500px;">
			<!--<a href=""><i class="fa fa-paper-plane"></i></a>-->
			<button name="send" id="send" style="width: 200px; height: 30px; border:none;background: #2f2346; color: white;">send</button>
		</form>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">

	setInterval(runFunction, 1000);
	function runFunction(){
		$.post("htcont.php",{
			room:'<?php echo $_SESSION['username']; ?>'},
			function(data, status){
				document.getElementsByClassName('anyClass')[0].innerHTML = data;
		});
	}


   var input = document.getElementById("msg");
   input.addEventListener("keyup",function(event){
   	event.preventDefault();
   	if (event.keyCode === 13) {
   		document.getElementById("send").click();
   	}

   });
	
    $("#send").click(function() {
		var clientmsg = $("#msg").val();
		$.post("postmsg.php",{
			text: clientmsg,
			room:'<?php echo $_SESSION['username']; ?>',
			ip: '<?php echo $_SERVER['REMOTE_ADDR'] ?>'},
		function(data, status){
			document.getElementsByClassName('anyClass')[0].innerHTML = data;
		});

		$("#msg").val("");
		return false;
	});


</script>

</body>
</html>