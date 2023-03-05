<?php
include('../includes/config.php');
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id'=> $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
        
    ));
    $response = $transaction->send();
 
    if ($response->isSuccessful()) {
        // The customer has successfully paid.
        $arr_body = $response->getData();
        $user_id = $_GET['user_id'];
        $payment_id = $arr_body['paymentId'];
        $user_id = $_REQUEST['user_id'];
        $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        $payer_email = $arr_body['payer']['payer_info']['email'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $currency = PAYPAL_CURRENCY;
        $payment_status = $arr_body['state'];
 
        $query=  mysqli_query($con, "INSERT INTO payments(payment_id,user_id, payer_id, payer_email, amount, currency, payment_status) VALUES('". $payment_id ."','". $user_id ."', '". $payer_id ."', '". $payer_email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
            $query1 = mysqli_query($con, "UPDATE users set  payment_status ='1'  where id=$user_id");
$to = $payer_email;
$subject = 'Zahlungsbestätigung';
$headers  = "From: "."info@germannationality.de"."\r\n";
//$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$message = '<p><strong>Hallo,</strong></p>
<p>Vielen Dank, dass Sie sich für die Fahren123.de-App entschieden haben.<br>
Wir haben Ihre Zahlung erfolgreich erhalten (Betrag 49,99 EUR)
<br>
Wir wünschen Ihnen viel Erfolg bei Ihrem Test (Leben in Deutschland).
<br>
Wenn Sie Fragen haben, zögern Sie bitte nicht, uns zu kontaktieren. <br>
Weitere Informationen finden Sie unter www.germannationality.de</p>

<p>Mit freundlichen Grüßen</p>
<p>www.germannationality.de</p>
<p>E-Mail: info@germannationality.de</p>
<img src="https://adminpanel.germannationality.de/upload/logoff.png" width="150" />';

   mail($to, $subject, $message, $headers);

        $returnArray = [ 'return' => true, 'message' => 'Your Payment done successfully' ];
echo json_encode($returnArray);
    } else {
       echo json_encode($response->getMessage());
    }
} else {
    $returnArray = [ 'return' => true, 'message' => 'Transaction is declined' ];
echo json_encode($returnArray);
   
}