<?php 
session_start();
include('includes/config.php');
error_reporting(0);
require_once __DIR__ . '/mpdf/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
ob_start();
?>
<style type="text/css">
  body{
    font-family: Helvetica, "sans-serif";
  }
</style>
<?php
    $cnt=1;
    $querys = mysqli_query($con, "select * from agents where
      id='3'");
   $row1 = mysqli_fetch_array($querys);
   ?>
   <img style="width: 30%;height:auto;" src="assets/logologo.png">
       
<table widtd="50%" >
  <tr><td style="text-align: left; padding-top: 40px;"><b>To,</b></td></tr>
  <tr><td style="text-align: left"><b>Agent Name: </b> <?php echo $row1['agent_name'] ?></td></tr>
  <tr><td style="text-align: left;"><b>Agent Phone: </b> <?php echo $row1['agent_phone'] ?></td></tr>
  <tr><td><b>Agent Email: </b> <?php echo $row1['agent_email'] ?></td></tr>
  <tr><td><b>Agent Address: </b> <?php echo $row1['agent_address'] ?></td></tr>
  <tr ><td style="padding-top: 15px;"><b>Date: </b> <?php echo date("Y-m-d") ?></td></tr>
  <tr ><td style="padding-top: 15px;"><b>Invoice:  </b> Germannationality App</td></tr>
  <tr ><td style="padding-top: 15px;"><b>Hello,
</b></td></tr>
<tr ><td style="padding-top: 15px; padding-bottom: 10px;"><p>Please submit the Germannationality app fee of following user/s into following bank account. </p></td></tr>   
</table>
<table cellpadding="3" border="1"  id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
  <tr>
    <th>SN</th>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th>Amount</th>
  </tr>
    <?php
    $cnt=1;
    $queryse = mysqli_query($con, "select * from users where agent_id='3'");
    while ($row2 = mysqli_fetch_array($queryse))
    {
        $date= new DateTime($row1['date_time']);
    ?>
  <tr>
    <td><?php echo $cnt ?></td>
    <td><?php echo $row2['name'] ?></td>
    <td><?php echo $row2['phone']?></td>
    <td><?php echo $row2['email']?></td>
    <td><?php echo '49,99'?></td>
   
  </tr>
    <?php $cnt++;
    $total= $cnt*49.99;
    $comission= ($total*30)/100;
    $payable= $total- $comission;
     }
     ?>
    <tr>
      <td></td>
      <td></td>
     
  <td colspan="2">Total Amount </td>
  <td colspan=""><b>€<?php echo $total ?></b></td>
</tr>
 <tr>
  <td></td>
      <td></td>
  <td colspan="2">Your Commission </td>
  <td colspan=""><b>€<?php echo $comission ?></b></td>
</tr>
<tr>
  <td></td>
      <td></td>
  <td colspan="2">Total Payable </td>
  <td colspan=""><b>€<?php echo $payable ?></b></td>
</tr>

</table>
<table>
  <tbody>
    <tr>
      <td><p>Please transfer the amount on the below mentioned account. </p></td>
    </tr>
    <tr><td style="padding-top: 15px;"><b>Bank Name: </b> SolarisBank AG.</td></tr>
    <tr><td ><b>Account Holder:  </b> Germannationality.de</td></tr>
    <tr><td ><b>IBAN:  </b>  DE73 1101 0101 5711 9743 53</td></tr>
    <tr><td ><b>BIC:  </b>   SOBKDEB2XXX</td></tr>
    <tr><td ><b>Payment Ref:  </b>    Agent Id</td></tr>
    <tr><td style="padding-top: 15px;"><b>Please Note:<br>  </b> Please mention your <b>Agent Id</b> when you transfer the amount.</td></tr>
    <tr><td style="padding-top: 10px;">Thank you very much for your cooperation.</td></tr>
    <tr><td style="padding-top: 15px;"><b>Germannationality.de</b>
</td></tr>
<tr><td style="padding-bottom: 10px;"><b>Usman Masood Malik</b>
</td></tr>

  </tbody>
</table>
<img style="width: 20%;height:auto;" src="assets/sign.jpg">
<table>
  <tbody>
    <tr>
      <td style="padding-top: 10px;">
        <p>Breslauer Str.17<br>
36275, Kirchheim (Hessen)<br>
Germany<br>
0176 48095184
</p>
      </td>
    </tr>
  </tbody>
</table>
<?php 
$template = ob_get_clean();
$mpdf->WriteHTML($template);

$mpdf->output("invoice.pdf","D");
$pdf = $mpdf->output("","S");
$subject = 'PDF File';
$to='mwaqasakram63@gmail.com';
$headers  = "From: "."noreply@Germannationality.de"."\r\n";
//$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = '<p>Hello<strong style="color: #00CCFE;"> </strong></p>
<p>Greetings from Germannationality.de!</p>
<p>Your Germannationality.de Team</p>
<img src="https://adminpanel.Germannationality.de/uploads/Germannationalitylogo.png" />';
$message .= $pdf;
//$mail->addStringAttachment($pdf, 'invoice.pdf');
    mail($to, $subject, $message, $headers);
exit();
?>