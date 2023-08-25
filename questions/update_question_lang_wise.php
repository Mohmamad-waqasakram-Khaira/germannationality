<?php
session_start();
if(strlen($_SESSION['alogin'])==0)
  { 
  header('location:index.php');
  }
  else{
error_reporting(0);
include("../includes/config.php");
 extract($_POST, $_FILES); 
$quesid=$_REQUEST['quesid'];
 $answer1=$_POST['answer1'];
 $answer2=$_POST['answer2'];
 $answer3=$_POST['answer3'];
 $answer4=$_POST['answer4'];
 $a1_value=$_POST['a1_value'];
 $a2_value=$_POST['a2_value'];
 $a3_value=$_POST['a3_value'];
 $a4_value=$_POST['a4_value'];
 //$catid=$_POST['catid'];
$answervideo=$_FILES['answervideo']['name'];
$question_image=$_FILES['question_image']['name'];
move_uploaded_file($_FILES['answervideo']['tmp_name'],"../uploads/".$answervideo);
move_uploaded_file($_FILES['question_image']['tmp_name'],"../uploads/".$question_image);

$lang_q = mysqli_query($con,"select * from languages");
                        $sql  = "`answervideo`,`question_image`";
                        $sql2  = "'$answervideo','$question_image'";
                        while($rec_lang= mysqli_fetch_array($lang_q))
                        {
                           $val = 'q_'.$rec_lang['language_english'];

                           $sql  .= ",`q_".$rec_lang['language_english']."`";
                           $sql2  .= ",'$_POST[$val]'";

                        } 
 echo ("Update questions SET $sql[0] = '$sql2[0]' where questions.id='$quesid'");
 die();

if ($query) { 

$lang_q = mysqli_query($con,"select * from languages");
                        $sql_1  = "`qid` ,`answer_value`, `answer`";
                        $sql2_1  = "'$qid','$a1_value','$answer1'";

                        $sql_2  = "`qid` ,`answer_value`, `answer`";
                        $sql2_2  = "'$qid','$a2_value','$answer2'";

                        $sql_3  = "`qid` ,`answer_value`, `answer`";
                        $sql2_3  = "'$qid','$a3_value','$answer3'";

                        $sql_4  = "`qid` ,`answer_value`, `answer`";
                        $sql2_4  = "'$qid','$a4_value','$answer4'";

                        while($rec_lang= mysqli_fetch_array($lang_q))
                        {
                           $val_1 = 'a1_'.$rec_lang['language_english'];
                           
                           $sql_1  .= ",`a_".$rec_lang['language_english']."`";
                           $sql2_1  .= ",'$_POST[$val_1]'";


                           $val_2 = 'a2_'.$rec_lang['language_english'];
                           
                           $sql_2  .= ",`a_".$rec_lang['language_english']."`";
                           $sql2_2  .= ",'$_POST[$val_2]'";


                           $val_3 = 'a3_'.$rec_lang['language_english'];
                           
                           $sql_3  .= ",`a_".$rec_lang['language_english']."`";
                           $sql2_3  .= ",'$_POST[$val_3]'";


                           $val_4 = 'a4_'.$rec_lang['language_english'];
                           
                           $sql_4  .= ",`a_".$rec_lang['language_english']."`";
                           $sql2_4  .= ",'$_POST[$val_4]'";

                        }
 $query1 = mysqli_query($con,"insert into answers($sql_1) values($sql2_1)"); 
 $query2 = mysqli_query($con,"insert into answers($sql_2) values($sql2_2)"); 
 $query3 = mysqli_query($con,"insert into answers($sql_3) values($sql2_3)"); 
 $query4 = mysqli_query($con,"insert into answers($sql_4) values($sql2_4)"); 
$lang_q = mysqli_query($con,"select * from languages");
                        $sql222  = "`qid`";
                        $sql33  = "'$qid'";
                        while($rec_lang= mysqli_fetch_array($lang_q))
                        {
                           $fiels= 'audio_'.$rec_lang['language_english'];
                           $val = $_FILES[$fiels]['name'];

                           $sql222  .= ",`audio_".$rec_lang['language_english']."`";
                           $sql33  .= ",'$val'";
move_uploaded_file($_FILES[$fiels]['tmp_name'],"../uploads/".$rec_lang['language_english']."_audio/".$_FILES[$fiels]['name']);
                        } 

 
  $query545 = mysqli_query($con,"insert into audiofiles($sql222) values($sql33)");
 
 $query5 = mysqli_query($con,"insert into question_category(`question_id`,`category_id`) values('$qid','$catid')");
    }   
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
