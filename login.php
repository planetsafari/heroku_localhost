<?php
	header("Access-Control-Allow-Origin: *");
	$servername = "us-cdbr-iron-east-05.cleardb.net";
	$username = "bb61e79e8bd17e";
	$password1 = "5a9b8e41";
	$database = "";
	
	extract($_POST);
	// Create connection
	$conn = mysqli_connect($servername, $username, $password1, $database);

// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
else{
	//echo "Connected successfully ";
	$sql="SELECT password FROM users WHERE email='$email';";
	if ($result = $conn->query($sql)) {
    /* fetch object array */
	$num_rows = mysqli_num_rows($result);
	if($num_rows != 0)
	{
		$row = $result->fetch_row();
    if(strcmp($password,$row[0])!=0) {
		echo "Wrong password!";
	}
	else{
		$sql1 = "SELECT userId FROM users WHERE email='$email';";
		if ($result1 = $conn->query($sql1)){
			$row1 = $result1->fetch_row();
			echo "$row1[0]";
		}
	}
    /* free result set */
    $result->close();
	}
	else{
	echo "Email id not found. Register first!";
}
	
}


/* close connection */
$conn->close();



}
?>