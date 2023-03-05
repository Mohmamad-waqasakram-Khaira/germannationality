<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
include("../includes/config.php");

 $user_id=$_POST['user_id'];
 $amount=$_POST['amount'];
 $currency= 'EUR';
$payment_status= 'approved';
$payment_type= 'admin';
 $query=  mysqli_query($con, "INSERT INTO payments(user_id,payment_type,amount, currency, payment_status) VALUES('". $user_id ."','". $payment_type ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
 $queryupdate1 = mysqli_query($con,"UPDATE users set payment_status ='1'  where id=$user_id");
}
?>
