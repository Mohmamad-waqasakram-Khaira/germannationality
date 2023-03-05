<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
	include("../includes/config.php");
	$e_id= $_REQUEST['id'];
	$query=mysqli_query($con,"select * from payments join users on users.id=payments.user_id where payments.id='$e_id'");

	while($row1=mysqli_fetch_array($query))
	{
		
	?>
	<table class="table table-striped table-hover p-10">
		<tbody>
			<tr><th>User Name: <?php echo $row1['name']; ?></th></tr>
			<tr><th>User Phone: <?php echo $row1['phone']; ?></th></tr>
			<tr><th>User Email: <?php echo $row1['email']; ?></th></tr>
			<tr><th>Referral Code: <?php echo $row1['agent_id']; ?></th></tr>
			<tr><th>Amount: <?php echo $row1['amount']; ?></th></tr>
			
		</tbody>
	</table>
	 <form class="user" id="editplan">
		<div class="form-group">
			<label class=" fs-5 fw-semibold mb-2 mt-3">Select Plan</label>
			<select class="form-select form-select-solid" data-control="select2" data-close-on-select="false" data-placeholder="Select Plan" data-allow-clear="true"  name="plan_id" id="plan_id" required="required">
							<option value="">Select Plan</option>
							<option value="1">Monthly</option>
							<option value="2">Yearly</option>
							</select>
			<input type="number" name="id" value="<?php echo htmlentities($e_id) ?>" hidden>
			<input type="number" name="user_id" value="<?php echo htmlentities($row1['user_id']) ?>" hidden>
			
		</div>
		<div class="form-group">
				<!--begin::Title-->
				<?php
				$cheecked= "";
				 $status = $row1['payment_status'];
				if($status==1){
				    $status = 0;
				    $cheecked= "checked";
				}
				else{
				        $status = 1;
				    $cheecked= "";
				    }
				?>
<label class=" fs-5 fw-semibold mb-2 mt-3">Payment Status</label>
				<div class="form-check form-switch form-check-custom form-check-solid mt-3 mb-3">
				    <input class="form-check-input" type="checkbox" value="<?php echo $status ?>"  id="payment_status" name="payment_status" <?php echo $cheecked?> />
				</div>
                                        
                                   
		</div>
		
		                
		<div class="modal-footer">
			 <button type="button"  onclick="update_plan('<?php echo $row1['id']; ?>')" class="btn btn-success btn-lg">Update</button>
			<button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
      	</div>
           
	</form>
	<div id="updatep"></div>
	<?php } }?>