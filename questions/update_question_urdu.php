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
 $q_urdu=$_POST['q_urdu'];

 $a1_german=$_POST['a1_german'];
 $a1_urdu=$_POST['a1_urdu'];
 $a2_german=$_POST['a2_german'];
 $a2_urdu=$_POST['a2_urdu'];
 $a3_german=$_POST['a3_german'];
 $a3_urdu=$_POST['a3_urdu'];
 $ans1id=$_POST['ans1id'];
 $ans2id=$_POST['ans2id'];
 $ans3id=$_POST['ans3id'];
 $answer1=$_POST['answer1'];
 $answer2=$_POST['answer2'];
 $answer3=$_POST['answer3'];
 $a1_value=$_POST['a1_value'];
 $a2_value=$_POST['a2_value'];
 $a3_value=$_POST['a3_value'];
// $audio_pashto=$_FILES['audio_pashto']['name'];
// $audio_german=$_FILES['audio_german']['name'];
// $audio_urdu=$_FILES['audio_urdu']['name'];
$answervideo=$_FILES['answervideo']['name'];
$audiofile=$_FILES['audiofile']['name'];
$question_image=$_FILES['question_image']['name'];
move_uploaded_file($_FILES['answervideo']['tmp_name'],"../uploads/".$answervideo);
move_uploaded_file($_FILES['question_image']['tmp_name'],"../uploads/".$question_image);
if($answervideo=='' || $question_image==''){
	$querya=mysqli_query($con, "UPDATE questions set q_german='$q_german', q_urdu= '$q_urdu' where id=$quesid");
}
if($answervideo!=''){
	$queryb=mysqli_query($con, "UPDATE questions set q_german='$q_german',answervideo ='$answervideo' where id=$quesid");
}
if($audiofile!=''){
    move_uploaded_file($_FILES['audiofile']['tmp_name'],"../uploads/urdu_audio/".$audiofile);
    $queryb=mysqli_query($con, "UPDATE audiofiles set audio_urdu='$audiofile' where qid=$quesid");
}
if($question_image!=''){
	$queryc=mysqli_query($con, "UPDATE questions set q_german='$q_german',question_image ='$question_image' where id=$quesid");
}
$query1=mysqli_query($con, "UPDATE answers set a_german ='$a1_german',a_urdu = '$a1_urdu',answer='$answer1',answer_value='$a1_value'   where id=$ans1id");
$query2=mysqli_query($con, "UPDATE answers set a_german ='$a2_german',a_urdu = '$a2_urdu',answer='$answer2',answer_value='$a2_value'   where id=$ans2id");
$query3=mysqli_query($con, "UPDATE answers set a_german ='$a3_german',a_urdu = '$a3_urdu',answer='$answer3',answer_value='$a3_value'   where id=$ans3id");
       
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
