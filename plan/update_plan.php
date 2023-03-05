<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
include('../includes/config.php');
$e_id= $_REQUEST['id'];
$plan=$_POST['plan'];
$net_amount=$_POST['net_amount'];
$referral_amount=$_POST['referral_amount'];
$no_of_days=$_POST['no_of_days'];
$queryupdate1=mysqli_query($con, "UPDATE payment_plan set plan ='$plan',net_amount='$net_amount',referral_amount='$referral_amount', no_of_days='$no_of_days'  where id=$e_id");

}?>
