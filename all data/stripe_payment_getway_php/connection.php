<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "headnface";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn) {
	// echo "connected";
}
else{
	echo "error";
}
?>