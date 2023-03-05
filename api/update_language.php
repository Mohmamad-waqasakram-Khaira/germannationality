<?php 
 include('../includes/config.php');	
session_start();
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$language = $_REQUEST['language'];
$user_id = $_REQUEST['id'];
$queryupdate1=mysqli_query($con, "UPDATE users set language ='$language'  where id=$user_id");
if($queryupdate1){
	
	$returnArray1 = ['result' => ( $language )] ;
$returnArray = ['message' => "Sprache ausgewählt"] ;
		$success = ['success' => True];
		$result = array_merge($returnArray,$returnArray1,$success);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else{
	$returnArray1 = ['result' => ""] ;
	$returnArray = ['message' => "Sprache nicht ausgewählt"] ;
		$success = ['success' => False];
		$result = array_merge($returnArray,$returnArray1,$success);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

?>
