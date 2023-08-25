<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
include('../includes/config.php');
$e_id= $_REQUEST['id'];
$c_name_english=$_POST['c_name_english'];
$c_name_german=$_POST['c_name_german'];
$c_name_urdu=$_POST['c_name_urdu'];
$c_image=$_FILES['c_image']['name'];
move_uploaded_file($_FILES['c_image']['tmp_name'],"../uploads/".$c_image);
$queryupdate1=mysqli_query($con, "UPDATE chapters set c_name_english ='$c_name_english',c_name_german='$c_name_german',c_name_urdu='$c_name_urdu', c_image='$c_image'  where id=$e_id");

}?>
<script>show_success('Chapter Updated')</script>