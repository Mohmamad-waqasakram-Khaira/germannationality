<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
include('../includes/config.php');
$e_id= $_REQUEST['e_id'];
$notificationTitle=$_POST['notificationTitle'];
$notificationText=$_POST['notificationText'];
$notificationtypeID=$_POST['notificationtypeID'];
$queryupdate1=mysqli_query($con, "UPDATE notifications set notificationTitle ='$notificationTitle',notificationText='$notificationText',notificationtypeID='$notificationtypeID' where notificationID=$e_id");

}?>