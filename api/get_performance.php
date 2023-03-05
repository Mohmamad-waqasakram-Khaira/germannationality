<?php 
 include('../includes/config.php');
 header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$user_id = $_REQUEST['user_id'];
$query3= mysqli_query($con, "Select * from performance where user_id='$user_id'");
$getcount= mysqli_num_rows($query3);
$total= 300;
$averageq = ($getcount/300)*100;

$data[] = [
        'total_percentage' => '100',
        'read_percentage_question' => $averageq,
    ];
$returnArray1 = ['result' =>  $data ] ;
$returnArray = ['message' => "Leistung"] ;
		$success = ['success' => True];
		$result = array_merge($returnArray,$returnArray1,$success);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>
