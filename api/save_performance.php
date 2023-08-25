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
$q_id = $_REQUEST['q_id'];
$selectq = mysqli_query($con, "Select * from performance where q_id='$q_id' AND user_id='$user_id'");
$getqq= mysqli_num_rows($selectq);
if($getqq<=0){
   $updatelogs = mysqli_query($con,"insert into performance(`user_id`,`q_id`) values('$user_id','$q_id')"); 
   $returnArray = ['message' => 'Leistung gespart', 'success' => true];
    echo json_encode($returnArray);
}

else{
$returnArray = ['message' => 'Frage ist bereits aktualisiert', 'success' => false];
echo json_encode($returnArray);
}


?>