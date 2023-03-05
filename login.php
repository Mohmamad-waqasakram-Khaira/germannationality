<?php
session_start();
error_reporting(0);
include("includes/config.php");


	$username= $_POST['username'];

	$password=md5($_POST['password']);
	// echo "SELECT * FROM admin WHERE username='$username' and password='$password'";
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{

$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$returnArray = [ 'return' => true, 'message' => 'Success' ];
echo json_encode($returnArray);
}
else{
$returnArray = [ 'return' => false, 'message' => 'Invalid Details' ];
echo json_encode($returnArray);
}
?>