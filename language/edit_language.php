<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
	include("../includes/config.php");
	$e_id= $_REQUEST['id'];
	$query=mysqli_query($con,"select * from chapters where id='$e_id'");

	while($row1=mysqli_fetch_array($query))
	{
		
	?>
	 <form class="user" id="editchapter">
		<div class="form-group">
			<input type="number" name="id" value="<?php echo htmlentities($e_id) ?>" hidden>
			<input type="text" class="form-control form-control-user"
				 aria-describedby="emailHelp" value="<?php echo htmlentities($row1['cgerman'])?>" name="cgerman" id="cgerman"
				placeholder="Enter Chapter Name ( German )">
		</div>
		<div class="form-group">
			<input type="number" name="id" value="<?php echo htmlentities($e_id) ?>" hidden>
			<input type="text" class="form-control form-control-user"
				 aria-describedby="emailHelp" value="<?php echo htmlentities($row1['cenglish'])?>" name="cenglish" id="cenglish"
				placeholder="Enter Chapter Name ( English )">
		</div>
		<div class="form-group">
			<input type="number" name="id" value="<?php echo htmlentities($e_id) ?>" hidden>
			<input type="text" class="form-control form-control-user"
				 aria-describedby="emailHelp" value="<?php echo htmlentities($row1['curdu'])?>" name="curdu" id="curdu"
				placeholder="Enter Chapter Name ( Urdu )">
		</div>
		                
		<div class="modal-footer">
			 <button type="button"  onclick="update_chapter('<?php echo $row1['id']; ?>')" class="btn btn-success btn-lg">Update</button>
			<button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
      	</div>
           
	</form>
	<div id="updatechapter"></div>
	<?php } }?>