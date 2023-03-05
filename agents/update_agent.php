<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
include('../includes/config.php');
$e_id= $_REQUEST['id'];
$no_of_acc= $_REQUEST['no_of_acc'];
$a_status= $_REQUEST['a_status'];
$queryupdate1=mysqli_query($con, "UPDATE agents set no_of_acc ='$no_of_acc',a_status='$a_status' where id=$e_id");

}?>
<script>show_success('Chapter Updated')</script>