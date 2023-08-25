<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug =2; // Enable verbose debug output
 $mail->isSMTP(); // Set mailer to use SMTP
 $mail->Host = 'smtp.ionos.de'; // Specify main and backup SMTP servers
 $mail->SMTPAuth = true; // Enable SMTP authentication
 $mail->Username = 'info@fahren123.de'; // SMTP username
 $mail->Password = '@info#Fahren?@!7iru@?7'; // SMTP password
 $mail->SMTPSecure = 'tls'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
 $mail->Port = 587; // TCP port to connect to

//Recipients
 $mail->setFrom('noreply@fahren123.de', 'Fahren123');
 $mail->addAddress('mwaqasakram63@gmail.com', 'wiki'); // Add a recipient




// Content
 $mail->isHTML(true); // Set email format to HTML
 $mail->Subject = 'Here is the subject';
 $mail->Body = 'This is the HTML message body <b>in bold!</b>';
 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
 echo 'Message has been sent';

} catch (Exception $e) {
 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
