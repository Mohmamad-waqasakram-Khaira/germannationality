<?php
error_reporting(0);
include('includes/config.php');
// $querys = mysqli_query($con, "select email from users where mail_sent='0' LIMIT 200");
// while($row1 = mysqli_fetch_array($querys)){
//     $toemail= $row1['email']; 
    // echo "<pre>";
    // echo $toemail;
    // echo "<pre>";
$to= "mwaqasakram63@gmail.com";
$subject = 'Führerschein Theorie App (50% Off)';
$headers  = "From: "."noreply@Germannationality.de"."\r\n";
//$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// $htmlContent = file_get_contents("get.php");
// $message = 'Please transfer the amount on the below mentioned account.';
// $message .= '<p><b>Germannationality.de</b></p>';
// $message .= '<p><b>Usman Masood Malik</b></p>';
// $message .= '<img src="https://adminpanel.Germannationality.de/upload/50.png"  width="100" />';
// $message .= '<p>Breslauer Str.17<br>
// 36275, Kirchheim (Hessen)<br>
// Germany<br>
// 0176 48095184</p>';
// $message .= '<img src="https://adminpanel.Germannationality.de/uploads/Germannationalitylogo.png" width="150" />';echo phpinfo();
if(mail($to, $subject, $htmlContent, $headers)){
//    $update= mysqli_query($con, "UPDATE users set mail_sent='1' where email='$toemail'");
//    echo "<pre>";
echo "Email Sent to $to";
//  echo "<pre>";
}
else{
    echo "<pre>";
    echo "email notsent to $to";
    echo "<pre>";
}
     //}

   
   ?>