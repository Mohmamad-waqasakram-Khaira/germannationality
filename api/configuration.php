<?php 
include('../includes/config.php');  
require "vendor/autoload.php";
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$query3= mysqli_query($con, "Select * from payment_methods");
            $i = 0;
            while ($rowcat = mysqli_fetch_array($query3)){
            
            $productResult[$i] = array(
            'paymentMethodId' => $rowcat['id'],
            'paymentMethodName' => $rowcat['method_name'],
            'amount' => '49.99',
            'referral_amount' => '44.99',
            'paymentMethodInstructionsUrl' => $rowcat['paymentMethodInstructionsUrl'],
            'paymentUrl' => $rowcat['paymentUrl'],
            'paymentSucessUrl' => $rowcat['paymentSucessUrl'],
            'paymentFailUrl' => $rowcat['paymentFailUrl'],
            'currencyUnit' => 'EUR',
            
            );
            $i++; 
            }
$method= array('paymentMethod' => $productResult, 'privacy_url' => 'http://www.germannationality.de/privacy_policy.html', 'test_instructions_url'=>'https://adminpanel.germannationality.de/api/test_instructions.php', 'android_version' => '1.0.0','ios_version' => '1.0.0','forceUpdate'=>'0','showUpdate'=>'0');            

$returnArray = [ 'message' => 'Payment Method','success' => True, 'result' => $method ];
    echo json_encode($returnArray);
?>
