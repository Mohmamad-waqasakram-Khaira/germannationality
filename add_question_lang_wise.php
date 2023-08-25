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
					<form id="add_question_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#" enctype="multipart">
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


							 
							<legend class="">Languages</legend>
									
								<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6 ">
									<?php $lang_q = mysqli_query($con,"select * from languages");
                                while($rec_lang= mysqli_fetch_array($lang_q))
                                {
                             ?> 
                       
                       	 <li class="nav-item text-capitalize">
								        <a class="nav-link <?php if($rec_lang['is_primary']==1){echo 'active';}?> btn btn-flex btn-active-success " data-bs-toggle="tab" href="#kt_tab_pane_<?php echo $rec_lang['id'];?>"><?php echo $rec_lang['language_english'];?></a>
								    </li>
                       	  <?php } ?>
								    
								     
								</ul>

								<div class="tab-content" id="myTabContent">

									<?php $lang_q = mysqli_query($con,"select * from languages");
                                while($rec_lang= mysqli_fetch_array($lang_q))
                                {
                             ?> 
                       
                       	  

								    <div class="tab-pane fade show <?php if($rec_lang['is_primary']==1){echo 'active';}?>" id="kt_tab_pane_<?php echo $rec_lang['id'];?>" role="tabpanel">
								    
							
						<fieldset class="setting-fieldset">
							<legend class="">Question Section</legend>
									<div class="row">
									
										<div class="col-lg-8">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2 text-capitalize">Question (<?php echo $rec_lang['language_english'];?>)</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid text-capitalize" placeholder="Enter Question (<?php echo $rec_lang['language_english'];?>)" name="q_<?php echo $rec_lang['language_english'];?>">
									<!--end::Input-->
								</div>
								
										</div>
								
									</div>
						</fieldset>
					
						<fieldset class="setting-fieldset">
							<legend class="">Answer Section</legend>
									<div class="row">
										
										<div class="col-lg-8">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="fs-5 fw-semibold mb-2 text-capitalize">Answer1 (<?php echo $rec_lang['language_english'];?>)</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid text-capitalize" placeholder="Enter Answer1 (<?php echo $rec_lang['language_english'];?>)" name="a1_<?php echo $rec_lang['language_english'];?>">
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
								
									</div>
											 
										</div>
									</div>
									<div class="row">
										<div class="col-lg-8">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									<label class=" fs-5 fw-semibold mb-2 text-capitalize">Answer2 (<?php echo $rec_lang['language_english'];?>)</label>
									<input type="text" class="form-control form-control-solid text-capitalize" placeholder="Enter Answer2 (<?php echo $rec_lang['language_english'];?>)" name="a2_<?php echo $rec_lang['language_english'];?>">
								</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<label class=" fs-5 fw-semibold mb-2">Enter Answer2 Value</label>
										<div class="col-lg-8 fv-row">
										<input type="text" class="form-control form-control-solid" placeholder="Enter Answer2 value" name="a2_value"> 
									</div> 
								
									</div>
											
										</div>
										<div class="col-lg-8">
											
									</div>
									<div class="row">
										
										<div class="col-lg-8">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									<label class=" fs-5 fw-semibold mb-2 text-capitalize">Answer3 (<?php echo $rec_lang['language_english'];?>)</label>
									<input type="text" class="form-control form-control-solid text-capitalize" placeholder="Enter Answer3 (<?php echo $rec_lang['language_english'];?>)" name="a3_<?php echo $rec_lang['language_english'];?>">
								</div>
								</div>
										<div class="col-lg-4">
											<div class="row">
												<label class=" fs-5 fw-semibold mb-2">Enter Answer3 Value</label>
										<div class="col-lg-8 fv-row">
										<input type="text" class="form-control form-control-solid" placeholder="Enter Answer3 value" name="a3_value"> 
									</div> 
								
									</div>
										
										</div>
										
											
									</div>
									<div class="row">
										
										<div class="col-lg-8">
											<div class="mb-5 fv-row fv-plugins-icon-container">
									<label class=" fs-5 fw-semibold mb-2 text-capitalize">Answer4 (<?php echo $rec_lang['language_english'];?>)</label>
									<input type="text" class="form-control form-control-solid text-capitalize" placeholder="Enter Answer4 (<?php echo $rec_lang['language_english'];?>)" name="a4_<?php echo $rec_lang['language_english'];?>">
								</div>
								</div>
										<div class="col-lg-4">
											<div class="row">
												<label class=" fs-5 fw-semibold mb-2">Enter Answer4 Value</label>
										<div class="col-lg-8 fv-row">
										<input type="text" class="form-control form-control-solid" placeholder="Enter Answer3 value" name="a4_value"> 
									</div> 
								
									</div>
										
										</div>
										
											
									</div>
						

						</fieldset>
						<fieldset class="setting-fieldset">
							<legend class="">Audio Section</legend>
							<div class="row mx-aut0">
		<div class="col-lg-6 fv-row">
			<label class=" fs-5 fw-semibold mb-2 text-capitalize">Upload Audio (<?php echo $rec_lang['language_english'];?>)</label>
			<input type="file" class="form-control form-control-solid" name="audio_<?php echo $rec_lang['language_english'];?>" accept="audio/*" >
									<!--end::Input-->
								</div>
	</div>

	
						</fieldset>
								    </div>
							
                       	  <?php } ?>
								    
								     
								</div>
<fieldset class="setting-fieldset">
							<legend class="">Mark Right Option</legend>
							<div class="row mx-aut0">
		<div class="col-lg-2 fv-row">
		<div class="form-check form-check-custom form-check-success form-check-solid">
		<input class="form-check-input" type="checkbox" value="1" name="answer1" />
		<label class="form-check-label" for="">1st Right</label>
		</div>
	</div>
	<div class="col-lg-2 fv-row">
		<div class="form-check form-check-custom form-check-success form-check-solid">
		<input class="form-check-input" type="checkbox" value="1" name="answer2" />
		<label class="form-check-label" for="">2nd Right</label>
		</div>
	</div>
	<div class="col-lg-2 fv-row">
		<div class="form-check form-check-custom form-check-success form-check-solid">
		<input class="form-check-input" type="checkbox" value="1" name="answer3" />
		<label class="form-check-label" for="">3rd Right</label>
		</div>
	</div>
	<div class="col-lg-2 fv-row">
		<div class="form-check form-check-custom form-check-success form-check-solid">
		<input class="form-check-input" type="checkbox" value="1" name="answer4" />
		<label class="form-check-label" for="">4th Right</label>
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
<script type="text/javascript" src="questions/question_lang_wise.js"></script>