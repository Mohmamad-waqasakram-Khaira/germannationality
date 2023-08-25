<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
error_reporting(0);
include("../includes/config.php");
 $quesid=$_REQUEST['quesid'];
 $q_german=$_POST['q_german'];
 $q_english=$_POST['q_english'];
 
 $a1_german=$_POST['a1_german'];
 $a1_english=$_POST['a1_english'];
 $a2_german=$_POST['a2_german'];
 $a2_english=$_POST['a2_english'];
 $a3_german=$_POST['a3_german'];
 $a3_english=$_POST['a3_english'];
 $ans1id=$_POST['ans1id'];
 $ans2id=$_POST['ans2id'];
 $ans3id=$_POST['ans3id'];
 $answer1=$_POST['answer1'];
 $answer2=$_POST['answer2'];
 $answer3=$_POST['answer3'];
 $a1_value=$_POST['a1_value'];
 $a2_value=$_POST['a2_value'];
 $a3_value=$_POST['a3_value'];
// $audio_english=$_FILES['audio_english']['name'];
// $audio_german=$_FILES['audio_german']['name'];
// $audio_english=$_FILES['audio_english']['name'];
$answervideo=$_FILES['answervideo']['name'];
$audiofile=$_FILES['audiofile']['name'];
$question_image=$_FILES['question_image']['name'];
move_uploaded_file($_FILES['answervideo']['tmp_name'],"../uploads/".$answervideo);
move_uploaded_file($_FILES['question_image']['tmp_name'],"../uploads/".$question_image);
if($answervideo=='' || $question_image==''){
	$querya=mysqli_query($con, "UPDATE questions set q_german='$q_german', q_english= '$q_english' where id=$quesid");
}
if($answervideo!=''){
	$queryb=mysqli_query($con, "UPDATE questions set q_german='$q_german',answervideo ='$answervideo' where id=$quesid");
}
if($audiofile!=''){
    move_uploaded_file($_FILES['audiofile']['tmp_name'],"../uploads/english_audio/".$audiofile);
    $queryb=mysqli_query($con, "UPDATE audiofiles set audio_english='$audiofile' where qid=$quesid");
}
if($question_image!=''){
	$queryc=mysqli_query($con, "UPDATE questions set q_german='$q_german',question_image ='$question_image' where id=$quesid");
}
$query1=mysqli_query($con, "UPDATE answers set a_german ='$a1_german',a_english = '$a1_english',answer='$answer1',answer_value='$a1_value'   where id=$ans1id");
$query2=mysqli_query($con, "UPDATE answers set a_german ='$a2_german',a_english = '$a2_english',answer='$answer2',answer_value='$a2_value'   where id=$ans2id");
$query3=mysqli_query($con, "UPDATE answers set a_german ='$a3_german',a_english = '$a3_english',answer='$answer3',answer_value='$a3_value'   where id=$ans3id");
       
if( $query1 && $query2 && $query3)
{
    $returnArray = [ 'return' => true, 'message' => 'Success' ];
echo json_encode($returnArray);
}
else{
$returnArray = [ 'return' => false, 'message' => 'Invalid Details' ];
echo json_encode($returnArray);
}
}
?>
