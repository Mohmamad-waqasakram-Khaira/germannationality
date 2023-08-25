<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
 include('../includes/config.php');
	$userid=$_REQUEST['id'];
        $query=mysqli_query($con,"delete from questions where id='$userid'");
        $query=mysqli_query($con,"delete from answers where qid='$userid'");
        $query=mysqli_query($con,"delete from question_category where qid='$userid'");
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
