<?php
include('../includes/config.php');	
session_start();
session_unset();
$id= $_GET['user_id'];
$logout_time = date("Y-m-d h:i:sa");
$updatelogin = mysqli_query($con,"UPDATE users set is_login ='0' where id='$id'");
$updatelogin = mysqli_query($con,"UPDATE userlogs set logout_time ='$logout_time' where user_id='$id'");
	$returnArray = ['message' => 'Abmeldung erfolgreich', 'success' => true ];
echo json_encode($returnArray);
?>