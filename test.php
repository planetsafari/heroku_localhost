<?php 
header("Access-Control-Allow-Origin: *"); 
// header("Origin:http://localhost");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/'); 
curl_setopt($ch, CURLOPT_HEADER, FALSE); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
curl_setopt($ch, CURLOPT_HTTPHEADER, 
array("X-Api-Key:532e149c850442d4ad6aa55d484b9ff3", 
"X-Auth-Token:2ca8c886b00a6994183eacecf3235ed3")); 
$payload = Array( 
'purpose' => 'FIFA', 
'amount' => '20', 
'phone' => '9999999998', 
'buyer_name' => 'John', 
'redirect_url' => 'http://localhost/suc.php', 
'send_email' => true, 
'webhook' => '', 
'send_sms' => true, 
'email' => 'sahana.ys2@gmail.com', 
'allow_repeated_payments' => true 
);
// foreach ($payload as $key => $val) { 
// echo $val." "; 
// } 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload)); 
$response = curl_exec($ch); 
//echo $response; 
curl_close($ch);
//echo "hi";
//echo $response;
$myArray = array(json_decode($response, true));

$longu = $myArray[0]["payment_request"]["longurl"];
//echo $longu;
header('Location:' .$longu);

?>  
