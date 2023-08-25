<?php
include('../includes/config.php');
   
    try {
        
        $response = $gateway->purchase(array(
            'amount' => $_REQUEST['amount'],
            'user_id' => $_REQUEST['user_id'],
            'currency' => PAYPAL_CURRENCY,
            'returnUrl' => PAYPAL_RETURN_URL.'?user_id='.$_REQUEST['user_id'],
            'cancelUrl' => PAYPAL_CANCEL_URL,
        ))->send();
 
        if ($response->isRedirect()) {
            $response->redirect(); // this will automatically forward the customer
        } else {
            // not successful
            echo $response->getMessage();
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
