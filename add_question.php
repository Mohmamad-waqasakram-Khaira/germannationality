<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
 include 'includes/header.php'; ?>
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
	<!--begin::Toolbar container-->
	<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
			<!--begin::Title-->
			<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Germannationality</h1>
			<!--end::Title-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
				<!--begin::Item-->
				<li class="breadcrumb-item text-muted">
					<a href="dashboard.php" class="text-muted text-hover-primary">Home</a>
				</li>
				<!--end::Item-->
				<li class="breadcrumb-item">
						<span class="bullet bg-gray-400 w-5px h-2px"></span>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="breadcrumb-item text-muted">Add Question</li>
					<!--end::Item-->
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Page title-->
		
	</div>
	<!--end::Toolbar container-->
</div>
<!--end::Toolbar-->
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-fluid">
		<!--begin::Row-->
	<!--begin::Category-->
		<div class="card card-flush">
			<!--begin::Card header-->
			<div class="card-header align-items-center py-5 gap-2 gap-md-5">
				<!--begin::Card title-->
				<div class="card-title">
					<!--begin::Search-->
					<h3>Add Question</h3>
					<!--end::Search-->
				</div>
				<!--end::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
					<!--begin::Add customer-->
					<a href="questions.php" class="btn btn-primary"><i class="fas fa-eye" ></i> View Questions</a>
					<!--end::Add customer-->
				</div>
				<!--end::Card toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body pt-0">
				<!--begin::Table-->
					<form id="add_question_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
						<!--begin::Modal body-->
						<div class="mb-5 fv-row">
							<label class="required fs-5 fw-semibold mb-2">Select State</label>
							<select class="form-select form-select-solid" data-control="select2" data-close-on-select="false" data-placeholder="Select State"  name="catid" id="catid" required="required">
								<option value="">Select State</option>
							 <?php $querychap= mysqli_query($con,"select id, c_name_german from category");
                                while($getchap= mysqli_fetch_array($querychap))
                                {
                             ?> 
                       	 <option value="<?php echo htmlentities($getchap['id'])?>"><?php echo htmlentities($getchap['c_name_german'])?></option>
                       	  <?php } ?>
							</select>
						</div>
							
						<fieldset class="setting-fieldset">
							<legend class="">Question Section</legend>
									<div class="row">
									
										<div class="col-lg-8">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Question (German)</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Enter Question ( German )" name="q_german">
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								
										</div>
										<!-- <div class="col-lg-4">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									
									<label class=" fs-5 fw-semibold mb-2">Question (Urdu)</label>
									
									<input type="text" class="form-control form-control-solid" placeholder="Enter Question ( Urdu )" name="q_urdu">
									
								</div>
										</div> -->
											<!-- <div class="col-lg-4">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									
									<label class=" fs-5 fw-semibold mb-2">Question (Pashto)</label>
									
									<input type="text" class="form-control form-control-solid" placeholder="Enter Question  ( Pashto )" name="q_pashto">
									</div>
								
										</div> -->
									</div>
						</fieldset>
						<fieldset class="setting-fieldset">
							<legend class="">Answer Section</legend>
									<div class="row">
										
										<div class="col-lg-4">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="fs-5 fw-semibold mb-2">Answer1 (German)</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Enter Answer1 ( German )" name="a1_german">
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								
										</div>
										<div class="col-lg-4">
											<div class="row">
											<label class=" fs-5 fw-semibold mb-2">Enter Answer1 Value</label>
										<div class="col-lg-8 fv-row">
										<input type="text" class="form-control form-control-solid" placeholder="Enter Answer1 value" name="a1_value"> 
									</div> 
									<div class="col-lg-3 fv-row">
									<div class="form-check form-check-custom form-check-success form-check-solid">
								    <input class="form-check-input" type="checkbox" value="1" name="answer1" />
								    <label class="form-check-label" for="">
								        Right
								    </label>
									</div>
								</div>
									</div>
											<!-- <div class="mb-5 fv-row fv-plugins-icon-container">
										<label class="fs-5 fw-semibold mb-2">Answer1 (Urdu)</label>
										<input type="text" class="form-control form-control-solid" placeholder="Enter Answer2 ( Urdu )" name="a1_urdu">
									    </div>
										</div> -->
										<div class="col-lg-4">
											<!-- <div class="mb-5 fv-row fv-plugins-icon-container">
									
									<label class=" fs-5 fw-semibold mb-2">Answer1 (Pashto)</label>
									
									<input type="text" class="form-control form-control-solid" placeholder="Enter Answer1  ( Pashto )" name="a1_pashto">
									</div> -->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									<label class=" fs-5 fw-semibold mb-2">Answer2 (German)</label>
									<input type="text" class="form-control form-control-solid" placeholder="Enter Answer2 ( German )" name="a2_german">
								</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<label class=" fs-5 fw-semibold mb-2">Enter Answer2 Value</label>
										<div class="col-lg-8 fv-row">
										<input type="text" class="form-control form-control-solid" placeholder="Enter Answer2 value" name="a2_value"> 
									</div> 
									<div class="col-lg-3 fv-row">
									<div class="form-check form-check-custom form-check-success form-check-solid">
								    <input class="form-check-input" type="checkbox" value="1" name="answer2" />
								    <label class="form-check-label" for="">
								        Right
								    </label>
									</div>
								</div>
									</div>
											<!-- <div class="mb-5 fv-row fv-plugins-icon-container">
									<label class=" fs-5 fw-semibold mb-2">Answer2 (Urdu)</label>
									<input type="text" class="form-control form-control-solid" placeholder="Enter Answer2 ( Urdu )" name="a2_urdu">
								</div> -->
										</div>
										<div class="col-lg-4">
											<!-- <div class="mb-5 fv-row fv-plugins-icon-container">
									<label class=" fs-5 fw-semibold mb-2">Answer2 (Pashto)</label>
									<input type="text" class="form-control form-control-solid" placeholder="Enter Answer2 ( Pashto )" name="a2_pashto"></div>
										</div> -->
									</div>
									<div class="row">
										
										<div class="col-lg-4">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									<label class=" fs-5 fw-semibold mb-2">Answer3 (German)</label>
									<input type="text" class="form-control form-control-solid" placeholder="Enter Answer3 ( German )" name="a3_german">
								</div>
								</div>
										<div class="col-lg-4">
											<div class="row">
												<label class=" fs-5 fw-semibold mb-2">Enter Answer3 Value</label>
										<div class="col-lg-8 fv-row">
										<input type="text" class="form-control form-control-solid" placeholder="Enter Answer3 value" name="a3_value"> 
									</div> 
									<div class="col-lg-3 fv-row">
									<div class="form-check form-check-custom form-check-success form-check-solid">
								    <input class="form-check-input" type="checkbox" value="1" name="answer3" />
								    <label class="form-check-label" for="">
								        Right
								    </label>
									</div>
								</div>
									</div>
										
										</div>
										
											
									</div>
									<div class="row">
										
										<div class="col-lg-4">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									<label class=" fs-5 fw-semibold mb-2">Answer4 (German)</label>
									<input type="text" class="form-control form-control-solid" placeholder="Enter Answer4 ( German )" name="a4_german">
								</div>
								</div>
										<div class="col-lg-4">
											<div class="row">
												<label class=" fs-5 fw-semibold mb-2">Enter Answer4 Value</label>
										<div class="col-lg-8 fv-row">
										<input type="text" class="form-control form-control-solid" placeholder="Enter Answer3 value" name="a4_value"> 
									</div> 
									<div class="col-lg-3 fv-row">
									<div class="form-check form-check-custom form-check-success form-check-solid">
								    <input class="form-check-input" type="checkbox" value="1" name="answer4" />
								    <label class="form-check-label" for="">
								        Right
								    </label>
									</div>
								</div>
									</div>
										
										</div>
										
											
									</div>
						

						</fieldset>
						
   <div class="row">
   	<div class="col-lg-6">
   		 <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="d-block fw-semibold fs-6 mb-5">Upload Question Image</label>
        <!--end::Label-->

        <!--begin::Image input-->
        <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
            <!--begin::Preview existing avatar-->
            <div class="image-input-wrapper w-125px h-125px"></div>
            <!--end::Preview existing avatar-->

            <!--begin::Label-->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                <i class="fa fa-pencil"></i>

                <!--begin::Inputs-->
                <input type="file" name="question_image" id="file"  />
                <input type="hidden" name="avatar_remove" />
                <!--end::Inputs-->
            </label>
            <!--end::Label-->

            <!--begin::Cancel-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                <i class="fa fa-x"></i>
            </span>
            <!--end::Cancel-->

            <!--begin::Remove-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                <i class="bi bi-x fs-2"></i>
            </span>
            <!--end::Remove-->
        </div>
        <!--end::Image input-->

        <!--begin::Hint-->
        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
        <!--end::Hint-->
    </div>
   	</div>
   	<div class="col-lg-6">
   		<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class=" fs-5 fw-semibold mb-2">Upload Question Video</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="file" class="form-control form-control-solid" placeholder="Enter Question Name ( Urdu )" name="answervideo" accept="video/*">
									<!--end::Input-->
								</div>
   	</div>
   </div>
    <!--end::Input group-->
							<!--end::Scroll-->
						
						<!--end::Modal body-->
						<!--begin::Modal footer-->
						<div class="d-grid mb-10">
<button type="submit" id="kt_question_submit" value="register" class="btn btn-primary">
<!--begin::Indicator label-->
<span class="indicator-label">Add Question</span>
<!--end::Indicator label-->
<!--begin::Indicator progress-->
<span class="indicator-progress">Please wait... 
<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
<!--end::Indicator progress-->
</button>
</div>
						<!--end::Modal footer-->
					<div></div></form>
				<!--end::Table-->
			</div>
			<!--end::Card body-->
		</div>
		<!--end::Category-->
		<!--end::Row-->
	</div>
	<!--end::Content container-->
</div>
<!--end::Content-->
</div>
<?php include 'includes/footer.php';  }?>
<script type="text/javascript" src="questions/question.js"></script>