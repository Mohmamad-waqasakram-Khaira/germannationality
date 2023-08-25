<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
include("../includes/config.php");

$plan=$_POST['plan'];
$net_amount=$_POST['net_amount'];
$referral_amount=$_POST['referral_amount'];
$no_of_days=$_POST['no_of_days'];
 $query = mysqli_query($con, "insert into payment_plan(`plan`,`net_amount`, `referral_amount`, `no_of_days`) values('$plan','$net_amount', '$referral_amount', '$no_of_days')");
if($query)
{
	$returnArray = [ 'return' => true, 'message' => 'Success' ];
echo json_encode($returnArray);
}
else{
$returnArray = [ 'return' => false, 'message' => 'Invalid Details' ];
echo json_encode($returnArray);
}
}
?>
