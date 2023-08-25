<?php 
 include('../includes/config.php');	
 header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$referral_code = $_REQUEST['referral_code'];
$user_id = $_REQUEST['user_id'];
$query3= mysqli_query($con, "SELECT * FROM `agents` where agent_id='$referral_code' AND a_status='1' ");
$count = mysqli_num_rows($query3);
if ($count>0) {
	$updatelogin = mysqli_query($con,"UPDATE users set agent_id ='$referral_code' where id='$user_id'");
	$returnArray = ['message' => 'Empfehlungscode abgeglichen', 'success' => true ];
	echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);
}
else{
$returnArray = ['message' => 'Empfehlungscode stimmte nicht überein', 'success' => false ];
	echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);
}
?>