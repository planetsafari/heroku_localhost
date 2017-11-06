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
$isValid=true;
$sql1="SELECT userId FROM users WHERE email='$email';";
if($result = mysqli_query($conn, $sql1)){
$num_rows = mysqli_num_rows($result);
if($num_rows>0){
$isValid=false;
echo "-1";
}

}

$sql2="SELECT userId FROM users WHERE phoneNo='$phoneno';";
if($isValid && ($result = mysqli_query($conn, $sql2))){
$num_rows = mysqli_num_rows($result);
if($num_rows>0){
$isValid=false;
echo "0";
}

}


$sql="INSERT INTO users(name,password,email,phoneNo,adress)VALUES('$name','$password','$email','$phoneno','$address');";


if ($isValid && ($conn->query($sql) === TRUE)) {
   //echo "New record created successfully ";
   $idSql="SELECT userId FROM users WHERE email='$email';";
   $result = mysqli_query($conn, $idSql);
   
   	while($i = mysqli_fetch_assoc($result)) {
  $j = $i['userId'];
  echo $j;
  break;
}

   
} 
}
?>