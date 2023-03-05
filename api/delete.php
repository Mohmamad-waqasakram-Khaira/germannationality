<?php 
 include('../includes/config.php');	
session_start();
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$user_id = $_REQUEST['id'];

$queryupdate1=mysqli_query($con, "UPDATE users set is_deleted ='1'  where id=$user_id");
if($queryupdate1){
	$returnArray1 = ['result' => "is_deleted ='1'"] ;
$returnArray = ['message' => "Ihr Konto wurde erfolgreich gelöscht"] ;
		$success = ['success' => True];
		$result = array_merge($returnArray,$returnArray1,$success);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else{
	$returnArray1 = ['result' => ""] ;
	$returnArray = ['message' => "Etwas ist schief gelaufen"] ;
		$success = ['success' => False];
		$result = array_merge($returnArray,$returnArray1,$success);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

?>

