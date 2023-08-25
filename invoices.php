<?php
include('includes/config.php');
    $cnt=1;
    $querys = mysqli_query($con, "select * from agents");
   while($row1 = mysqli_fetch_array($querys)){
    $aid= $row1['id'];
    $a_name= $row1['agent_name'];
    $a_email= $row1['agent_email'];
    $a_phone= $row1['agent_phone'];
    $shop= $row1['agent_shop_name'];
    $date = date("d-m-Y");
    $a_address= $row1['agent_address'];
    $queryse = mysqli_query($con, "select * from users where agent_id='$aid'");
    $i = 0;
    while ($row2 = mysqli_fetch_array($queryse)){
      $feeResult[$i] = array(
      'sn' => $i,
      'name' => $row2['name'],
      'phone' => $row2['phone'],
      'email' => $row2['email'],
      'amount' => '49.99',
    );
      
    $i++;
    $total= $i*49.99;
    $comission= ($total*30)/100;
    $payable= $total- $comission; 
  }
  $html_table = '<table cellpadding="4" border="1"   cellspacing="4" style="text-align: center;"'; 
$html_table .=' <tr>';
$html_table .= '<th>SN#</th>';
$html_table .= '<th>Name</th>';
$html_table .= '<th>Email</th>';
$html_table .= '<th>Phone</th>';
$html_table .= '<th>Amount</th>';
$html_table .=' </tr>';

foreach($feeResult as $feeResults){
    $html_table .=' <tr>';
    $html_table .= "<td> ".$feeResults['sn']." </td>"; 
    $html_table .= "<td> ".$feeResults['name']." </td>"; 
    $html_table .= "<td> ".$feeResults['phone']." </td>"; 
    $html_table .= "<td> ".$feeResults['email']." </td>"; 
    $html_table .= "<td> ".$feeResults['amount']." </td>"; 
}
$html_table .=' </tr>';
$html_table .='<tr>';
$html_table .="<td></td>
      <td></td> 
  <td colspan='2'>Total Amount </td>
  <td><b>€ ".$total."</b></td>";
 $html_table .='</tr>';
 $html_table .='<tr>';
$html_table .="<td></td>
      <td></td> 
  <td colspan='2'>Your Commission </td>
  <td><b>€ ". $comission."</b></td>";
 $html_table .='</tr>';
 $html_table .='<tr>';
$html_table .="<td></td>
      <td></td> 
  <td colspan='2'>Total Payable </td>
  <td><b>€ ". $payable."</b></td>";
 $html_table .='</tr>';
$html_table .= '  </table>';
$subject = 'Invoice';
$headers  = "From: "."agents@Germannationality.de"."\r\n";
//$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = '<p><b>To,</b><br>
<b>Agent Name:</b> '.$a_name.' <br>
<b>Agent Phone:</b> '.$a_phone.' <br>
<b>Agent Email:</b> '.$a_email.' <br>
<b>Shop:</b> '.$shop.' <br>
<b>Address:</b> '.$a_address.' <br>
<b>Date:</b> '.$date.' <br>
<b>Invoice: </b> Germannationality App <br>
<b>Hello,</b><br>
<b>Please submit the Germannationality app fee of following user/s into following bank account.</b><br>
</p>';
$message .= $html_table;
$message .= 'Please transfer the amount on the below mentioned account.';
$message .= '<b>Bank Name:</b> SolarisBank AG.<br>
<b>Account Holder: </b>Germannationality.de <br>
<b>IBAN: </b> DE73 1101 0101 5711 9743 53
 <br>
<b>BIC: </b>SOBKDEB2XXX <br>
<b>Payment Ref:: </b>Your Email <br>
<b>Please Note: </b><br>
Please mention your<b> Email Address </b>when you transfer the amount.<br>
Thank you very much for your cooperation.';
$message .= '<p><b>Germannationality.de</b></p>';
$message .= '<p><b>Usman Masood Malik</b></p>';
$message .= '<img src="https://adminpanel.Germannationality.de/assets/sign.jpg"  width="100" />';
$message .= '<p>Breslauer Str.17<br>
36275, Kirchheim (Hessen)<br>
Germany<br>
0176 48095184</p>';
$message .= '<img src="https://adminpanel.Germannationality.de/uploads/Germannationalitylogo.png" width="150" />';
if(mail($a_email, $subject, $message, $headers)){
echo "Sent";
}
else{
    "dafa";
}
    $cnt++;
   }
   ?>