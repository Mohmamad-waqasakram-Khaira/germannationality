<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
include('../includes/config.php');
$e_id= $_REQUEST['id'];
$user_id= $_REQUEST['user_id'];
$plan_id= $_REQUEST['plan_id'];
$payment_status= $_REQUEST['payment_status'];

$queryupdate1=mysqli_query($con, "UPDATE users set paymentPlan_id ='$plan_id',payment_status='$payment_status' where id=$user_id");

}?>
<script>show_success('Chapter Updated')</script>