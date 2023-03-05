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
 $language=$_POST['language'];
 $catid=$_POST['catid'];
 $q_german=$_POST['q_german'];
 $question=$_POST['question'];
 $a1_german=$_POST['a1_german'];
 $a2_german=$_POST['a2_german'];
 $a3_german=$_POST['a3_german'];
 $a4_german=$_POST['a4_german'];
 $a1lang=$_POST['a1lang'];
 $a2lang=$_POST['a2lang'];
 $a3lang=$_POST['a3lang'];
 $a4lang=$_POST['a4lang'];
 $ans1id=$_POST['ans1id'];
 $ans2id=$_POST['ans2id'];
 $ans3id=$_POST['ans3id'];
 $ans4id=$_POST['ans4id'];
 $answer1=$_POST['answer1'];
 $answer2=$_POST['answer2'];
 $answer3=$_POST['answer3'];
 $answer4=$_POST['answer4'];
 $a1_value=$_POST['a1_value'];
 $a2_value=$_POST['a2_value'];
 $a3_value=$_POST['a3_value'];
 $a4_value=$_POST['a4_value'];
$audiofile=$_FILES['audiofile']['name'];
$audiofileg=$_FILES['audiofileg']['name'];
$answervideo=$_FILES['answervideo']['name'];
$question_image=$_FILES['question_image']['name'];
move_uploaded_file($_FILES['answervideo']['tmp_name'],"../uploads/".$answervideo);
move_uploaded_file($_FILES['question_image']['tmp_name'],"../uploads/".$question_image);
if($answervideo=='' || $question_image==''){
	$querya=mysqli_query($con, "UPDATE questions set q_german='$q_german', q_$language='$question' where id=$quesid");
}
if($answervideo!=''){
	$queryb=mysqli_query($con, "UPDATE questions set q_german='$q_german', q_$language='$question',answervideo ='$answervideo' where id=$quesid");
}
if($question_image!=''){
	$queryc=mysqli_query($con, "UPDATE questions set q_german='$q_german', q_$language='$question', question_image ='$question_image' where id=$quesid");
}
if($audiofile!=''){
    move_uploaded_file($_FILES['audiofile']['tmp_name'],"../uploads/".$language."_audio/".$audiofile);
    $queryb=mysqli_query($con, "UPDATE audiofiles set audio_$language='$audiofile' where qid=$quesid");
}
if($audiofileg!=''){
    move_uploaded_file($_FILES['audiofileg']['tmp_name'],"../uploads/german_audio/".$audiofileg);
    $queryb=mysqli_query($con, "UPDATE audiofiles set audio_german='$audiofileg' where qid=$quesid");
}

$query1=mysqli_query($con, "UPDATE answers set qid='$quesid',a_german ='$a1_german',a_$language='$a1lang',answer='$answer1',answer_value='$a1_value' where id=$ans1id");
$query2=mysqli_query($con, "UPDATE answers set qid='$quesid',a_german ='$a2_german',a_$language='$a2lang',answer='$answer2',answer_value='$a2_value'   where id=$ans2id");
$query3=mysqli_query($con, "UPDATE answers set qid='$quesid',a_german ='$a3_german',a_$language='$a3lang',answer='$answer3',answer_value='$a3_value'   where id=$ans3id");
$query354=mysqli_query($con, "UPDATE answers set qid='$quesid',a_german ='$a4_german',a_$language='$a4lang',answer='$answer4',answer_value='$a4_value'   where id=$ans4id");
if( $query1 && $query2 && $query3)
{
    $returnArray = [ 'return' => true, 'message' => 'Success','language'=>$language,'catid'=>$catid ];
echo json_encode($returnArray);
}
else{
$returnArray = [ 'return' => false, 'message' => 'Invalid Details' ];
echo json_encode($returnArray);
}
}
?>
