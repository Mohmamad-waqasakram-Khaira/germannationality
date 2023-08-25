<?php 
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
include('../includes/config.php');
	$userid=$_REQUEST['id'];
        $query=mysqli_query($con,"delete from category where id='$userid'");
} ?> 
<script>show_danger('Category Deleted')</script>