<?php
	header("Access-Control-Allow-Origin: *");
	$servername = "localhost";
	$username = "root";
	$password1 = "";
	$database = "planet_safari";
	
	extract($_POST);
	$conn = mysqli_connect($servername, $username, $password1, $database);
	
	if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
else{
	//echo "Connected successfully ";
	$sql="SELECT name,email,phoneNo,adress FROM users WHERE userId='$uid';";
	//echo "$uid";
	if ($result = $conn->query($sql)) {
		$row = $result->fetch_row();
		$str = mysqli_num_rows($result);
		echo "$row[0];$row[1];$row[2];$row[3]";
	
}


/* close connection */
$conn->close();



}
?>