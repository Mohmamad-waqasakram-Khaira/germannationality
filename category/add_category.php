<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
include("../includes/config.php");

 $c_name_pashto=$_POST['c_name_pashto'];
 $c_name_german=$_POST['c_name_german'];
 $c_name_urdu=$_POST['c_name_urdu'];
$c_image=$_FILES['c_image']['name'];
move_uploaded_file($_FILES['c_image']['tmp_name'],"../uploads/".$c_image);
 $query = mysqli_query($con, "insert into category(`c_name_pashto`,`c_name_german`,`c_name_urdu`, `c_image`) values('$c_name_pashto','$c_name_german','$c_name_urdu', '$c_image')");
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
