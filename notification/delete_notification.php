<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
	include("../includes/config.php");
	$e_id= $_REQUEST['id'];
	
	$query=mysqli_query($con,"select * from notifications where notificationID='$e_id'");

	while($row1=mysqli_fetch_array($query))
	{
		
	?>
	 <form class="user" id="deletenot">
		<div class="form-group">
			<input type="number" name="id" value="<?php echo htmlentities($e_id) ?>" hidden>
		              <p>Do you really want to delete this Notification ?</p>
		<div class="modal-footer">
			 <button type="button"  onclick="deleteconfirm_notification('<?php echo $row1['notificationID']; ?>')" class="btn btn-success btn-lg">Delete</button>
			<button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
      	</div> 
	</form>
	<div id="deletconfirmnotification"></div>
	<?php } }?>