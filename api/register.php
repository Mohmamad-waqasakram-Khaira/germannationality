<?php 
include('../includes/config.php');	
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = md5($_POST['password']);
$c_password = $_POST['password'];
$gender = $_POST['gender'];
// $lang = $_POST['lang'];
$otp = rand(1000,9999);
$sql=mysqli_query($con, "Select * from users where email='$email' AND is_deleted='0'");
$count = mysqli_num_rows($sql);
$status=$count['status'];
$u_id=$count['id'];
$umail=$count['email'];

if ($count>=1) {
	
	$message = ['message' => "E-Mail existiert bereits. Bitte loggen Sie sich ein"];
	$success = ['success' => False];
	$return = array_merge($message,$success);
	echo json_encode($return, JSON_UNESCAPED_UNICODE);
}
// elseif($status==0 && $umail==$email){
// 	$updq= mysqli_query($con, "UPDATE users set name ='$name', email='$email', phone='$phone', password='$password',c_password='$c_password',gender='$gender', otp='$otp',status='1'  where email='$email'");
	
// 		$to = $email;

// $subject = 'OTP Verification Code';

// $headers  = "From: "."noreply@germannationality.de/"."\r\n";
//$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
// $headers .= "MIME-Version: 1.0\r\n";
// $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// $message = '<p>Hallo<strong style="color: #FFC000;"> '.$name.' </strong>,</p>
// <p>viele Grüße von GermanNationality.de!</p>
// <p>Wir freuen uns sehr, dass Sie die GermanNationality.de App nutzen möchten.
// Um Ihre E-Mail-Adresse zu aktivieren und die Registrierung abzuschließen, geben Sie bitte folgenden OTP-Code ein:</p>
// <h1 style="color: #FFC000;">'.$otp.'</h1>
// <p>Mit freundlichen Grüßen</p>
// <p>www.germanNationality.de</p>
// <img src="https://adminpanel.germannationality.de/upload/logoff.png" width="150" />';

//     mail($to, $subject, $message, $headers);
// 		$returnArray = ['message' => "Konto erfolgreich aktualisiert, wir haben Ihnen ein OTP per E-Mail gesendet"];
// 		$returnArray1 = ['result' => (['otp' => $otp, 'user_id' => $u_id ])];
// 		$success = ['success' => True];
// 		$result = array_merge($returnArray,$returnArray1,$success);
// 		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	
// }
else{
	$insertlog = mysqli_query($con, "insert into users(`name`,`email`,`phone`,`password`,`c_password`,`gender`,`otp`,`status`) values('$name','$email','$phone','$password','$c_password','$gender','$otp','1')");
	$lastId = mysqli_insert_id($con);
	if ($insertlog) {
		
		$returnArray = ['message' => "Konto erfolgreich erstellt"];
		$returnArray1 = ['result' => (['otp' => $otp, 'user_id' => $lastId])];
		$success = ['success' => True];
		$result = array_merge($returnArray,$returnArray1,$success);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
		
		
	}
}

?>