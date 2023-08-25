<?php 
 include('../includes/config.php');
 header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$query3= mysqli_query($con, "Select * from languages");
			$i = 0;
			while ($rowcat = mysqli_fetch_array($query3)){
			
			$productResult[$i] = array(
			'langid' => $rowcat['id'],
			'language' => $rowcat['language_english'],
			'native' => $rowcat['language_native'],
			'is_ltr' => $rowcat['is_ltr'],
			'font_family' => $rowcat['font_family'],
			'image' =>    'uploads/'.$rowcat['flag']

			);
			$i++; 
			}
$returnArray1 = ['result' => ( $productResult )] ;
$returnArray = ['message' => "Sprachenliste"] ;
		$success = ['success' => True];
		$result = array_merge($returnArray,$returnArray1,$success);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>
