<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
include("../includes/config.php");

$language_english=$_POST['language_english'];
$language_native=$_POST['language_native'];
$flag=$_FILES['flag']['name'];
$extension = substr($flag,strlen($flag)-4,strlen($flag));
$imgnewfile=md5($flag).$extension;

move_uploaded_file($_FILES['flag']['tmp_name'],"../uploads/".$imgnewfile);
 $query = mysqli_query($con, "insert into languages(`language_english`,`language_native`, `flag`) values('$language_english','$language_native', '$imgnewfile')");
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
