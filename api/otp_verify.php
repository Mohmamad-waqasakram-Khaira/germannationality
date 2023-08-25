<?php 
include('../includes/config.php');	
require "vendor/autoload.php";
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$user_id = $_REQUEST['user_id'];
$otp = $_REQUEST['otp'];
$sql=mysqli_query($con, "Select otp from users where id='$user_id'");
$count = mysqli_fetch_array($sql);
$ott= $count['otp'];
if ($ott==$otp) {
	$query1 = mysqli_query($con, "UPDATE users set status ='1'  where id=$user_id");
	
	$returnArray = [ 'message' => 'OTP erfolgreich verifiziert','success' => true ];
	echo json_encode($returnArray);
}else{
$returnArray = [ 'message' => 'Falsches OTP','success' => False ];
	echo json_encode($returnArray);
}

?>
