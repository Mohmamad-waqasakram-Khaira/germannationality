<?php

 $to = 'mwaqasakram63@gmail.com';
    $subject = 'Thank you for subscribing';
    $message = 'Hello';

    $from = "info@fahren123.de";
    $headers .= 'To: ' .$to. "\r\n";
    $headers .= 'From: ' .$from. "\r\n";
if(mail($to,$from,$subject,$message,$headers)){
      
}
else{
  echo "error";
}
?>