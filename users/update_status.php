<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
include('../includes/config.php');
$u_id= $_POST['id'];
$status=$_POST['status'];
$queryupdate1 = mysqli_query($con,"UPDATE users set status ='$status'  where id=$u_id");
$query1 = mysqli_query($con, "SELECT email FROM users  where id=$u_id");
  $getamil = mysqli_fetch_array($query1);
  $emaill= $getamil['email'];
if($status==1){
	 $to = $emaill;
    $subject = 'Acount Activation';
$headers  = "From: "."info@Germannationality.de"."\r\n";
//$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$message = '<p><strong>Hello,</strong></p>
<p>Thank you for buying Germannationality.de App.</p>
<p>We have activated your account.</p>
<p>We wish you all the best with your driving license preparation. </p>
<p>If you have any questions, please do not hesitate to contact us.
For more details, please visit www.Germannationality.de</p>
<p>Kind regards</p>
<p>Your Germannationality.de Team</p>
<p>Germannationality.de</p>
<p>Email: info@Germannationality.de</p>
<img  src="https://adminpanel.Germannationality.de/uploads/Germannationalitylogo.png" width="150"/>';

   mail($to, $subject, $message, $headers);
}
if($queryupdate1){?>
	
	<script>toastr.success("Status Updated Successfully!", "Success");</script>
<?php 

}
else{?>
<script>toastr.error("Something Went Wrong", "Success");</script>
<?php
}
}
?>

