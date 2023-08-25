<?php 
include('../includes/config.php');	
require "vendor/autoload.php";
use \Firebase\JWT\JWT;
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$email = $_REQUEST['email'];
$otp = $_REQUEST['otp'];
$sql=mysqli_query($con, "Select pass_otp from users where email='$email'");
$count = mysqli_fetch_array($sql);
$ottpp= $count['pass_otp'];
if ($ottpp==$otp) {
	$query1 = mysqli_query($con, "UPDATE users set pass_otp_status ='1'  where email='$email'");
	
	$returnArray = [ 'message' => 'OTP erfolgreich verifiziert','success' => true ];
	echo json_encode($returnArray);
}else{
$returnArray = [ 'message' => 'Falsches OTP','success' => False ];
	echo json_encode($returnArray);
}

?>
