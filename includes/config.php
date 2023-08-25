<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'online');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
 define('base_url','http://localhost/adminpanelg/');
 define('app_name','Germannationality');
 require_once dirname(__FILE__)."/../api/vendor/autoload.php";
 
 use Omnipay\Omnipay;
 
 define('CLIENT_ID', 'ASDrFMCY8ZYZnZtmDADcEpjFQf0Zm7TbA_itm7SjcZ2Kvu6nwfNU9FUArFPK_0C8OSKHLRACSNdwFZ0X');
define('CLIENT_SECRET', 'EH7nVLIxyiTqnXgceOlDt7QGi2mNAX3v6FByJQw57cvPBpASp-qEfTwl5KMfiTAHAs1jB-0koIZ26u1N');
 
 define('PAYPAL_RETURN_URL', 'https://adminpanel.germannationality.de/api/success.php');
 define('PAYPAL_CANCEL_URL', 'https://adminpanel.germannationality.de/api/cancel.php');
 define('PAYPAL_CURRENCY', 'EUR'); // set your currency here
 

 //$gateway = Omnipay::create('PayPal_Rest');
// $gateway->setClientId(CLIENT_ID);
 //$gateway->setSecret(CLIENT_SECRET);
 //$gateway->setTestMode(true); //set it to 'false' when go live
function generateRandomString($length = 3) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
