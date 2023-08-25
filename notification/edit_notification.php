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
	 <form class="user" id="edit_notification_form">
		<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Notification Title</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" name="e_id" value="<?php echo $e_id ?>" hidden>
									<input type="text" class="form-control form-control-solid" placeholder="Enter Notification Title" value="<?php echo $row1['notificationTitle']?>" name="notificationTitle">
									<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Notification Text</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Enter Notification Text" value="<?php echo $row1['notificationText']?>" name="notificationText">
									<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Notification Type</label>
									<!--end::Label-->
									<!--begin::Input-->
									 <select class="form-select form-select-solid" data-control="select2" data-close-on-select="false" data-placeholder="Select notification type"  name="notificationtypeID" id="notificationtypeID" required="required">
                                <option value="" >Select Notification Type</option>
                             <?php $querylang= mysqli_query($con,"select * from notificationtypes");
                                while($getlang= mysqli_fetch_array($querylang))
                                {
                             ?> 
                         <option value="<?php echo htmlentities($getlang['notificationtypeID'])?>"><?php echo htmlentities($getlang['title'])?></option>
                          <?php } ?>
                            </select>
									<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
		                
		<div class="modal-footer">
			 <button type="button"  onclick="update_notification('<?php echo $e_id; ?>')" class="btn btn-success btn-lg">Update</button>
			<button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
      	</div>
           
	</form>
	<div id="updatenotification"></div>
	<?php } }?>