<?php 
include('../includes/config.php');	
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$category_id = $_GET['category_id'];
$language= $_GET['language'];
$questlang= 'q_'.$language;
$anslang= 'a_'.$language;
$audiolang= 'audio_'.$language;
$audiofolderlang= $language.'_audio';
$querget=mysqli_query($con,"SELECT * FROM question_category JOIN questions on questions.id= question_category.question_id where category_id='$category_id'");
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
		$returnArray1 = ['Question' => ([ 'question_id' => $getq['id'],'primary' => $getq['q_german'], 'secondary' => $getq[$questlang],'tertiary' => $getq['q_english'],'Image' => $img, 'Video' => $vid   ]) ];
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
			'tertiary' => $rowans['a_english'],
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
$germanaudfile= 'uploads/german_audio/'.$rowaudio['audio_german'];
$returnArray2 = ['Answers' => ( $productResult )];

$returnArray3 =  ['Audio' => ($audfile), 'german_audio' => $germanaudfile] ;
$data[] = [
        'questions' => $returnArray1,
        'answers' => $returnArray2,
        'audio' => $returnArray3
    ];

}
$returnArray8 = ['result' => ( $data )] ;
$returnArray9 = ['message' => "Question Details"] ;
$success = ['success' => True];
$result1 = array_merge($returnArray9,$returnArray8,$success);
echo json_encode($result1, JSON_UNESCAPED_UNICODE);

 ?>

	
