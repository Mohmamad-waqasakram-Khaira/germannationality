<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
include("../includes/config.php");
$agent_id= '123';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = md5($_POST['password']);
$c_password = $_POST['password'];
$amount= 49.99;
$currency= 'EUR';
$payment_status= 'approved';
$payment_type= 'admin';

$insertlog = mysqli_query($con,"insert into users(`name`,`email`,`phone`,`agent_id`,`password`,`c_password`,`status`,`payment_status`) values('$name','$email','$phone','$agent_id','$password','$c_password','1','1')");
    $lastId = mysqli_insert_id($con);
    $query=  mysqli_query($con, "INSERT INTO payments(agent_id,user_id, payer_email, amount, currency, payment_status) VALUES('". $agent_id ."','". $lastId ."', '". $email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
      
if($insertlog){
$returnArray = [ 'return' => true, 'message' => 'Success' ];
      echo json_encode($returnArray);
}
else{
    $returnArray = [ 'return' => false, 'message' => 'Success' ];
    echo json_encode($returnArray);
}

}


?>
