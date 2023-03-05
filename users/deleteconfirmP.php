<?php 
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
include('../includes/config.php');
	$userid=$_REQUEST['id'];
        $query=mysqli_query($con,"delete from payments where id='$userid'");
        if($query){
        	?>
        	<script>toastr.error("Payment Deleted", "Success");</script>
        	<?php
        }
        else{
        	?>
        	<script>toastr.error("Something Went Wrong", "Message");</script>
        	<?php
        }
} ?> 
