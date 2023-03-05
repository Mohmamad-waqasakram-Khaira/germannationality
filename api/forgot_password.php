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
$sql=mysqli_query($con, "Select email from users where email='$email'");

$count = mysqli_num_rows($sql);
if ($count != 1) {
	$returnArray = [ 'message' => 'E-Mail existierte nicht. Bitte registrieren Sie Ihr Konto','success' => false ];
	echo json_encode($returnArray);
}else{

$to = $email;
$otp = rand(1000,9999);
$queryupdate1=mysqli_query($con, "UPDATE users set pass_otp ='$otp'  where email='$email'");
$subject = 'Passwort vergessen';

$headers  = "From: "."noreply@germannationality.de"."\r\n";
//$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = '
<p><strong>Hallo,</strong></p>
<p>viele Grüße von GermanNationality.de!</p>
<p>Wir freuen uns sehr, dass Sie die GermanNationality.de App nutzen möchten. Bitte geben Sie den folgenden OTP-Code ein, um Ihr Passwort zurückzusetzen:</p>
<h1 style="color: #FFC000;">'.$otp.'</h1>
<p>Mit freundlichen Grüßen,</p>
<p>www.germannationality.de</p>
<img src="https://adminpanel.germannationality.de/upload/logoff.png" width="150" />';

    mail($to, $subject, $message, $headers);
        $returnArray = ['message' => "Wir haben Ihnen ein OTP per E-Mail gesendet, um das Passwort zurückzusetzen"];
        $returnArray1 = ['result' => (['otp' => $otp, 'email' => $email])];
        $success = ['success' => True];
        $result = array_merge($returnArray,$returnArray1,$success);
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
}


?>