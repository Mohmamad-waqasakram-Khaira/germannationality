<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
	include("../includes/config.php");
	$e_id= $_REQUEST['id'];
	
	$query=mysqli_query($con,"select * from payment_plan where id='$e_id'");

	while($row1=mysqli_fetch_array($query))
	{
		
	?>
	 <form class="user" id="deleteplan">
		<div class="form-group">
			<input type="number" name="id" value="<?php echo htmlentities($e_id) ?>" hidden>
		              <p>Do you really want to delete this Plan ?</p>
		<div class="modal-footer">
			 <button type="button"  onclick="deleteconfirm_plan('<?php echo $row1['id']; ?>')" class="btn btn-success btn-lg">Delete</button>
			<button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
      	</div> 
	</form>
	<div id="deletconfirmplan"></div>
	<?php } }?>