<?php 
include('../includes/config.php');	
require "vendor/autoload.php";
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$id = $_GET['user_id'];
$ret=mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
$num=mysqli_fetch_array($ret);

$id=$num['id'];
$language=$num['language'];
$getlangn = mysqli_query($con, "SELECT *, id as langid from languages where language_english='$language' ");
$showlang= mysqli_fetch_array($getlangn);
$name=$num['name'];
$email=$num['email'];
$phone=$num['phone'];
$gender=$num['gender'];
$status=$num['status'];
$is_login=$num['is_login'];
$password_changed=$num['is_pass_changed'];
$payment_status=$num['payment_status'];

$language_native=$showlang['language_native'];
$is_ltr=$showlang['is_ltr'];
$langid=$showlang['langid'];
$flag= 'uploads/'.$showlang['flag'];
$font_family=$showlang['font_family'];
$_SESSION['id']=$num['id'];
$_SESSION['language']=$num['language']; 
$returnArray = [ 'message' => 'User Details','success' => true, 'result' => ['id' => $id, 'name' => $name,'email' => $email,'phone' => $phone, 'gender' => $gender, 'status' => $status, 'password_changed' => $password_changed, 'is_login'=>$is_login, 'payment_status' => $payment_status, 'language' => $language,'native' => $language_native, 'is_ltr' => $is_ltr, 'font_family' => $font_family, 'langid' => $langid, 'image' => $flag]];
echo json_encode($returnArray);


?>