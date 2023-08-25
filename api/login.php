<?php 
include('../includes/config.php');	
require "vendor/autoload.php";
use \Firebase\JWT\JWT;
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$email = $_POST['email'];
$fcm_token = $_POST['fcm_token'];
$password = md5($_POST['password']);
$sql=mysqli_query($con, "Select email from users where email='$email'");
$count = mysqli_num_rows($sql);

if ($count <= 0) {
	$returnArray = [ 'message' => 'E-Mail existierte nicht','success' => false ];
	echo json_encode($returnArray);
}else{
$ret=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password' and is_deleted='0' and status='1'");
$num=mysqli_fetch_array($ret);
if($num['password']==$password)
{
	$secret_key = "nm3XPZZfN0NOml3z9FMfmpgXwovR9fp6ryDIoGRM8EPHAB6iHsc0fb";
        $issuer_claim = "localhost"; // this can be the servername
        $audience_claim = "THE_AUDIENCE";
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim + 10; //not before in seconds
        $expire_claim = $issuedat_claim + 60; // expire time in seconds
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "id" => $num['id'],
                "phone" => $num['name'],
                "email" => $num['email'],
                "phone" => $num['phone']
        ));
        http_response_code(200);
        $jwt = jwt::encode($token,$secret_key,'HS256');
$id=$num['id'];
$language=$num['language'];
$updatelogin = mysqli_query($con,"UPDATE users set is_login ='1', fcm_token='$fcm_token' where id='$id'");
$logintime = date("Y-m-d h:i:sa");
$user_ip = $_SERVER['REMOTE_ADDR'];
$updatelogs = mysqli_query($con,"insert into userlogs(`user_id`,`login_time`,`user_ip`) values('$id','$logintime','$user_ip')");
$getlangn = mysqli_query($con, "SELECT *, id as langid from languages where language_english='$language' ");
$showlang= mysqli_fetch_array($getlangn);
$name=$num['name'];
$email=$num['email'];
$phone=$num['phone'];
$gender=$num['gender'];
$status=$num['status'];
$is_login=$num['is_login'];
if($email=='test1@gmail.com' || $email=='test2@gmail.com'){
    $is_login='0';
}
$referral_code=$num['agent_id'];
$password_changed=$num['is_pass_changed'];
$payment_status=$num['payment_status'];
$language_native=$showlang['language_native'];
$is_ltr=$showlang['is_ltr'];
$langid=$showlang['langid'];
$flag= 'uploads/'.$showlang['flag'];
$font_family=$showlang['font_family'];
$returnArray = [ 'message' => 'Einloggen erfolgreich','success' => true, 'result' => ['token' =>$jwt, 'id' => $id, 'name' => $name,'email' => $email,'phone' => $phone, 'gender' => $gender, 'status' => $status,'password_changed' => $password_changed, 'is_login' => $is_login,'referral_code' => $referral_code, 'payment_status' => $payment_status, 'language' => $language,'native' => $language_native, 'is_ltr' => $is_ltr, 'font_family' => $font_family, 'langid' => $langid, 'image' => $flag]];
echo json_encode($returnArray);
}
else{
$returnArray = ['message' => 'Ungültige Angaben', 'success' => false, 'data' => $jwt ];
echo json_encode($returnArray);
}
}

?>