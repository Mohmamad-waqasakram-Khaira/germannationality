<?php 
 include('../includes/config.php');	
 header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();
$language = $_GET['language'];
$lang = 'c_name_'.$language;

$query3= mysqli_query($con, "SELECT * FROM `category` ORDER BY `category`.`id` DESC");
			$i = 0;
			while ($rowcat = mysqli_fetch_array($query3)){
			
			$productResult[$i] = array(
			'category_id' => $rowcat['id'],
			'primary' => $rowcat['c_name_german'],
			
			'image' =>     'uploads/'.$rowcat['c_image']

			);
			$i++; 
			}
$returnArray1 = ['result' => ( $productResult )] ;
$returnArray = ['message' => "Categories List"] ;
		$success = ['success' => True];
		$result = array_merge($returnArray,$returnArray1,$success);
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>