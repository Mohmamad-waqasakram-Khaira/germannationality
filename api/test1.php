<?php 
include('../includes/config.php');
//error_reporting(0);	
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$language= $_GET['language'];
$questlang= 'q_'.$language;
$anslang= 'a_'.$language;
$audiolang= 'audio_'.$language;
$audiofolderlang= $language.'_audio';
$querget=mysqli_query($con,"Select * from questions  where questions.id IN (19,28,62,93,131,142,155,176,286,357,394,404,410,480,489,528,567,572,602,643,687,689,712,854,855,862,936,954,958,1014
)");
	while($getq= mysqli_fetch_array($querget)){
		if($getq['question_image']=='NULL' || $getq['question_image']==""){
			$img= NULL;
		}
		else{
			
			$img='upload/'.$getq['question_image'];
		}
		if($getq['answervideo']=='NULL' || $getq['answervideo']==""){
			$vid= NULL;
		}
		else{
			
			$vid='upload/'.$getq['answervideo'];
		}
		$returnArray1 = ['Question' => ([ 'question_id' => $getq['id'],'primary' => $getq['q_german'], 'secondary' => $getq[$questlang],'marks'=>$getq['marks'], 'Image' => $img, 'Video' => $vid   ]) ];
		$qid= $getq['id'];
		$getans= mysqli_query($con, "select * from answers where answers.qid='$qid' ");
			$i = 0;
			while ($rowans = mysqli_fetch_array($getans)){
			$answervalue= $rowans['answer_value'];

			if($answervalue==0 || $answervalue=='NULL'){
				$answervalue= NULL;
			}
			$productResult[$i] = array(
			'ansid' => $rowans['id'],
			'primary' => $rowans['a_german'],
			'secondary' => $rowans[$anslang],
			'answer' => $rowans['answer'],
			'answervalue' => $answervalue

			);
			$i++; 
			}
$quergetaud=mysqli_query($con, "Select * from audiofiles where qid='$qid'");
$rowaudio = mysqli_fetch_array($quergetaud);
$audfile="";

if($rowaudio[$audiolang]=='NULL' || $rowaudio[$audiolang]==''){

				$audfile= NULL;
			}
else{
	$audfile= 'upload/'.$audiofolderlang.'/'.$rowaudio[$audiolang];
	}
$returnArray2 = ['Answers' => ( $productResult )];

$returnArray3 =  ['Audio' => ($audfile)] ;
$data[] = [
        'questions' => $returnArray1,
        'answers' => $returnArray2,
        'audio' => $returnArray3
    ];

}
$returnArray8 = ['result' => ( $data )] ;
$returnArray9 = ['message' => "Test1 Question Details"] ;
$success = ['success' => True];
$result1 = array_merge($returnArray9,$returnArray8,$success);
echo json_encode($result1, JSON_UNESCAPED_UNICODE);

 ?>

