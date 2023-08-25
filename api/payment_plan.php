<?php 
 include('../includes/config.php');
 header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$query3= mysqli_query($con, "Select * from payment_plan");
			$i = 0;
			while ($rowcat = mysqli_fetch_array($query3)){
			
			$productResult[$i] = array(
			'paymentPlan_id' => $rowcat['id'],
			'plan' => $rowcat['plan'],
			'net_amount' => $rowcat['net_amount'],
			'referral_amount' => $rowcat['referral_amount'],
			'notes' => $rowcat['notes'],
			'no_of_days' =>    $rowcat['no_of_days']

			);
			$i++; 
			}
$returnArray1 = ['result' => ( $productResult )] ;
$returnArray = ['message' => "Zahlungspläne"] ;
		$success = ['success' => True];
		$result = array_merge($returnArray,$returnArray1,$success);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>
