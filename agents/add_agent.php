<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
include("../includes/config.php");

 $agent_name=$_POST['agent_name'];
 $agent_email=$_POST['agent_email'];
 $agent_phone=$_POST['agent_phone'];
$agent_password = md5($_POST['agent_password']);
$agent_pass_plain = $_POST['agent_password'];
$no_of_acc = $_POST['no_of_acc'];
$agent_address= $_POST['agent_address'];
$agent_shop_name= $_POST['agent_shop_name'];
$agent_business_type= $_POST['agent_business_type'];
$codename= strtoupper(substr($agent_name,0,3));
$agent_id =  $codename.generateRandomString();

 $query = mysqli_query($con, "insert into agents(`agent_id`,`agent_name`,`agent_email`,`agent_phone`, `agent_password`, `agent_pass_plain`, `no_of_acc`, `agent_address`,`agent_shop_name`,`agent_business_type`,`a_status`) values('$agent_id','$agent_name','$agent_email','$agent_phone', '$agent_password', '$agent_pass_plain', '$no_of_acc', '$agent_address', '$agent_shop_name','$agent_business_type','1')");
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
