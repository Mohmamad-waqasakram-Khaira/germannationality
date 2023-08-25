<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
include("../includes/config.php");

$notificationTitle=$_POST['notificationTitle'];
$notificationText=$_POST['notificationText'];
$notificationtypeID=$_POST['notificationtypeID'];

 $query = mysqli_query($con, "insert into notifications(`notificationTitle`,`notificationText`, `notificationtypeID`) values('$notificationTitle','$notificationText', '$notificationtypeID')");
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
