<?php
session_start();
if(strlen($_SESSION['alogin'])==0)
  { 
  header('location:index.php');
  }
  else{
error_reporting(0);
include("../includes/config.php");
 $q_german=$_POST['q_german'];
 $a1_german=$_POST['a1_german'];
 $a2_german=$_POST['a2_german'];
 $a3_german=$_POST['a3_german'];
 $a4_german=$_POST['a4_german'];
 $answer1=$_POST['answer1'];
 $answer2=$_POST['answer2'];
 $answer3=$_POST['answer3'];
 $answer4=$_POST['answer4'];
 $a1_value=$_POST['a1_value'];
 $a2_value=$_POST['a2_value'];
 $a3_value=$_POST['a3_value'];
 $a4_value=$_POST['a4_value'];
 $catid=$_POST['catid'];
$answervideo=$_FILES['answervideo']['name'];
$question_image=$_FILES['question_image']['name'];
move_uploaded_file($_FILES['answervideo']['tmp_name'],"../uploads/".$answervideo);
move_uploaded_file($_FILES['question_image']['tmp_name'],"../uploads/".$question_image);
 $query = mysqli_query($con, "insert into questions(`q_german`,`answervideo`,`question_image`) values('$q_german','$answervideo','$question_image')");
$qid =$con->insert_id;
 $query1 = mysqli_query($con,"insert into answers(`qid`,`a_german`,`answer`,`answer_value`) values('$qid','$a1_german','$answer1','$a1_value')");
$query2 = mysqli_query($con,"insert into answers(`qid`,`a_german`,`answer`,`answer_value`) values('$qid','$a2_german','$answer2','$a2_value')");
$query3 = mysqli_query($con,"insert into answers(`qid`,`a_german`,`answer`,`answer_value`) values('$qid','$a3_german','$answer3','$a3_value')");
$query6 = mysqli_query($con,"insert into answers(`qid`,`a_german`,`answer`,`answer_value`) values('$qid','$a4_german','$answer4','$a4_value')");
 $query4 = mysqli_query($con,"insert into audiofiles(`qid`,`audio_pashto`,`audio_german`,`audio_urdu`) values('$qid','$audio_pashto','$audio_german','$audio_urdu')");

 $query5 = mysqli_query($con,"insert into question_category(`question_id`,`category_id`) values('$qid','$catid')");
       
if($query)
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
