<?php
include('../includes/config.php');	
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$payment_id=$_POST['payment_id'];
$amount=$_POST['amount'];
$userid=$_REQUEST['user_id'];
//$currencyUnit=$_REQUEST['currencyUnit'];
$p_image=$_FILES['payment_image']['name'];
$extension = substr($p_image,strlen($p_image)-4,strlen($p_image));
$imgnewfile=md5($p_image).$extension;
move_uploaded_file($_FILES['payment_image']['tmp_name'],"../uploads/".$imgnewfile);
 $query = mysqli_query($con, "insert into payments(`user_id`,`payment_image`,`payment_id`, `payment_type`,`amount`,currency) values('$userid','$imgnewfile','$payment_id', 'Bank', '$amount','EUR')");
  $query1 = mysqli_query($con, "SELECT email FROM users  where id=$userid");
  $getamil = mysqli_fetch_array($query1);
  $emaill= $getamil['email'];
if($query)
{
    $to = $emaill;
    $subject = 'Payment Confirmation';
$headers  = "From: "."info@germannationality.de"."\r\n";
//$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$message = '<p><strong>Hello,</strong></p>
<p>Thank you for selecting the bank transfer option. Once your payment has been received, your account will be activated.<br>
Please note: it may take 2 business days for us to receive payment.<br>
Best regards<br>
www.ukcarlicense.com</p>
<img src="https://adminpanel.germannationality.de/upload/logoff.png" width="150" />';

   mail($to, $subject, $message, $headers);
	$returnArray = [ 'success' => true, 'message' => 'Your Payment done successfully, Our Team will be in touch soon to activate Your Account!!' ];
echo json_encode($returnArray);
}
else{
$returnArray = [ 'success' => false, 'message' => 'Invalid Details' ];
echo json_encode($returnArray);
}
?>
