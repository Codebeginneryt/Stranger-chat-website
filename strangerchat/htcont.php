<?php

$room = $_POST['room'];
include 'C:\xampp\htdocs\strangerchat/db.php';
$sql = "SELECT msg, stime FROM message WHERE room = '$room'";
$res = "";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)>0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$res = $res . '<div class="message-box">';
		$res = $res . "<p style='padding: 20px;'><mark style='padding: 8px; background: white; margin: 20px; border-radius: 6px;'>".$row['msg']; "</mark></p>";
	}
}
echo $res;

?>