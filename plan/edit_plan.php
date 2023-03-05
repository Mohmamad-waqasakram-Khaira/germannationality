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
	 <form class="user" id="editplanpayment">
			<!--begin::Scroll-->
							<div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px" >
								
								<!--begin::Input group-->
								
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Plan Name</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Plan Name" value="<?php echo $row1['plan'] ?>" name="plan">
									<input type="text" name="id" value="<?php echo $row1['id']; ?>" hidden>
									<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Net Amount</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Net Amount" value="<?php echo $row1['net_amount'] ?>" name="net_amount">
									<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Discount Amount</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Referral/Discount Amount" name="referral_amount" value="<?php echo $row1['referral_amount'] ?>">
									<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">No. of Days</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Number of Days" name="no_of_days" value="<?php echo $row1['no_of_days'] ?>">
									<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<!--end::Input group-->
								
    
    <!--end::Input group-->
							</div>
							<!--end::Scroll-->
		                
		<div class="modal-footer">
			 <button type="button"  onclick="update_payment_plan('<?php echo $row1['id']; ?>')" class="btn btn-success btn-lg">Update</button>
			<button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
      	</div>
           
	</form>
	<div id="updatepaymentplan"></div>
	<?php } }?>