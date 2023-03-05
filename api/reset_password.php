<?php 
include('../includes/config.php');	
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$email = $_REQUEST['email'];
//$password = md5($_POST['password']);
$u_password = md5($_REQUEST['password']);
$c_password = $_REQUEST['password'];
	$insertlog = mysqli_query($con,"UPDATE users set password ='$u_password' , c_password = '$c_password' where email='$email'");
	if($insertlog){
	$returnArray = ['message' => "Passwort erfolgreich zurückgesetzt"];
		$returnArray1 = ['result' => ""];
		$success = ['success' => True];
		$result = array_merge($returnArray,$returnArray1,$success);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	
}else{
$message = ['message' => "Etwas ist schief gelaufen"];
	$success = ['success' => False];
	
	$return = array_merge($message,$success);
	echo json_encode($return, JSON_UNESCAPED_UNICODE);
	}


?>