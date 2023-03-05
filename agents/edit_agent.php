<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
	include("../includes/config.php");
	$e_id= $_REQUEST['id'];
	$query=mysqli_query($con,"select * from agents where id='$e_id'");

	while($row1=mysqli_fetch_array($query))
	{
		
	?>
	 <form class="user" id="editagnets">
		<div class="form-group">
			<label class=" fs-5 fw-semibold mb-2 mt-3">Number of Accounts</label>
			<input type="number" name="id" value="<?php echo htmlentities($e_id) ?>" hidden>
			<input type="number" class="form-control form-control-user"
				 aria-describedby="emailHelp" value="<?php echo htmlentities($row1['no_of_acc'])?>" name="no_of_acc" id="no_of_acc"
				placeholder="Enter Number of Accounts">
		</div>
		<div class="form-group">
				<!--begin::Title-->
				<?php
				$cheecked= "";
				 $status = $row1['a_status'];
				if($status==1){
				    $status = 0;
				    $cheecked= "checked";
				}
				else{
				        $status = 1;
				    $cheecked= "";
				    }
				?>
<label class=" fs-5 fw-semibold mb-2 mt-3">Agent Status</label>
				<div class="form-check form-switch form-check-custom form-check-solid mt-3 mb-3">
				    <input class="form-check-input" type="checkbox" value="<?php echo $status ?>"  id="a_status" name="a_status" <?php echo $cheecked?> />
				</div>
                                        
                                   
		</div>
		
		                
		<div class="modal-footer">
			 <button type="button"  onclick="update_agent('<?php echo $row1['id']; ?>')" class="btn btn-success btn-lg">Update</button>
			<button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
      	</div>
           
	</form>
	<div id="updateag"></div>
	<?php } }?>