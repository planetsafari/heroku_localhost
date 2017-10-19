<?php
header("Access-Control-Allow-Origin: *");
	$servername = "localhost";
	$username = "root";
	$password1 = "";
	$database = "planet_safari";
	
	$conn = mysqli_connect($servername, $username, $password1, $database);
	if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
else{
	$sql="alter table users AUTO_INCREMENT=1001;";
	$result = $conn->query($sql);
}
?>