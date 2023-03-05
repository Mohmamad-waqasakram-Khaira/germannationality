<?php 
include('../includes/config.php');	
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$user_id = $_POST['user_id'];
$password = md5($_POST['password']);
$u_password = md5($_POST['new_password']);
$c_password = $_POST['new_password'];

$sql=mysqli_query($con, "Select password from users where id='$user_id' AND password = '$password'");
$count = mysqli_num_rows($sql);
if ($count == 1) {
	$insertlog = mysqli_query($con,"UPDATE users set password ='$u_password' , c_password = '$c_password',is_pass_changed='1' where id=$user_id");
	$returnArray = ['message' => "Das Passwort wurde erfolgreich geändert"];
		$returnArray1 = ['result' => ""];
		$success = ['success' => True];
		$result = array_merge($returnArray,$returnArray1,$success);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	
}else{
	

$message = ['message' => "Invalid password"];
	$success = ['success' => False];
	
	$return = array_merge($message,$success);
	echo json_encode($return, JSON_UNESCAPED_UNICODE);
		
		
		
	}


?>