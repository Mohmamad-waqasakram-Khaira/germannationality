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
			<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?php echo app_name ?></h1>
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
					<li class="breadcrumb-item text-muted">Manage Plans</li>
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
					
					<!--end::Search-->
				</div>
				<!--end::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
					<!--begin::Add customer-->
					<a href="javascript;" data-bs-toggle="modal" data-bs-target="#add_plan_modal" class="btn btn-primary"><i class="fas fa-plus" ></i> Add Plan</a>
					<!--end::Add customer-->
				</div>
				<!--end::Card toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body pt-0">
				<!--begin::Table-->
				<div id="kt_ecommerce_category_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
				<div class="table-responsive">
				<table class="table datatable align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
					<!--begin::Table head-->
					<thead>
						<!--begin::Table row-->
						<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
							<th class="w-10px pe-2">
								<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
									<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_category_table .form-check-input" value="1" />
								</div>
							</th>
							<th>#</th>
							<th class="min-w-150px">Plan</th>
							<th class="min-w-150px">Net Amount</th>
							<th class="min-w-150px">Discount Amount</th>
							<th class="min-w-150px">Days</th>
							<th class="text-end min-w-250px">Actions</th>
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="fw-semibold text-gray-600">
						<!--begin::Table row-->
						 <?php $query=mysqli_query($con,"select * from payment_plan");
                                $cnt=1;
                                while($row=mysqli_fetch_array($query))
                                {
                                ?>
						<tr>
							<!--begin::Checkbox-->
							<td>
								<div class="form-check form-check-sm form-check-custom form-check-solid">
									<input class="form-check-input" type="checkbox" value="1" />
								</div>
							</td>
							<!--end::Checkbox-->
							<!--begin::Category=-->
							<td><?php echo htmlentities($cnt);?></td>
							<td>
								<div class="d-flex">
									<div class="ms-5">
										<!--begin::Title-->
										<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1 text-capitalize" data-kt-ecommerce-category-filter="category_name"><?php echo htmlentities($row['plan']);?></a>
										<!--end::Title-->
										
									</div>
								</div>
							</td>
							<td>
								<div class="d-flex">
									<div class="ms-5">
										<!--begin::Title-->
										<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" data-kt-ecommerce-category-filter="category_name"><?php echo htmlentities($row['net_amount']);?>€</a>
										<!--end::Title-->
										
									</div>
								</div>
							</td>
							<!--end::Category=-->
							<!--begin::Type=-->
							<td>
								<!--begin::Badges-->
								<!--begin::Thumbnail-->
									<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" data-kt-ecommerce-category-filter="category_name"><?php echo htmlentities($row['referral_amount']);?>€</a>
									<!--end::Thumbnail-->
								<!--end::Badges-->
							</td>
							<td>
								<!--begin::Badges-->
								<!--begin::Thumbnail-->
									<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" data-kt-ecommerce-category-filter="category_name"><?php echo htmlentities($row['no_of_days']);?></a>
									<!--end::Thumbnail-->
								<!--end::Badges-->
							</td>
							<!--end::Type=-->
							<!--begin::Action=-->
							<td class="text-end">
								 
                                <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                               <a href="javascript:void(0);" onClick="edit_plan_payment('<?php echo $row['id']; ?>')"  class="badge badge-light-warning px-2 mb-2"><i class="fas fa-pencil text-warning" ></i>&nbsp;&nbsp;Edit Plan</a>
                                    <!--begin::Menu item-->
                                    <a href="#" class="badge badge-light-danger px-2" onClick="delete_payment_plan('<?php echo $row['id']; ?>')"data-kt-ecommerce-category-filter="delete_row"><i class="fas fa-trash text-danger" ></i>&nbsp;&nbsp;Delete</a>
                                    
                                        
                                    
                                    <!--end::Menu item-->
                                
                                <!--end::Menu-->
							</td>
							<!--end::Action=-->
						</tr>
						<!--end::Table row-->
						<?php $cnt++; } ?> 
					</tbody>
					<!--end::Table body-->
				</table>
				</div>
				</div>
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
<div class="modal fade" id="add_plan_modal" tabindex="-1">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header" id="kt_modal_create_api_key_header">
						<!--begin::Modal title-->
						<h2>Add a Plan</h2>
						<!--end::Modal title-->
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Form-->
					<form id="add_plan_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
						<!--begin::Modal body-->
						<div class="modal-body py-10 px-lg-17">
							<!--begin::Scroll-->
							<div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px" style="max-height: 41px;">
								
								<!--begin::Input group-->
								
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Plan Name</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Plan Name" name="plan">
									<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Net Amount</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Net Amount" name="net_amount">
									<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Discount Amount</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Referral/Discount Amount" name="referral_amount">
									<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<div class="mb-5 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">No. of Days</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Number of Days" name="no_of_days">
									<!--end::Input-->
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<!--end::Input group-->
								
    
    <!--end::Input group-->
							</div>
							<!--end::Scroll-->
						</div>
						<!--end::Modal body-->
						<!--begin::Modal footer-->
						<div class="modal-footer flex-center">
							<!--begin::Button-->
							<button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
							<!--end::Button-->
							<!--begin::Button-->
							<button type="submit" id="add_plan_form_submit" class="btn btn-primary">
								<span class="indicator-label">Add</span>
								<span class="indicator-progress">Please wait... 
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<!--end::Button-->
						</div>
						<!--end::Modal footer-->
					<div></div></form>
					<!--end::Form-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
<!--end::Content wrapper-->
<div class="modal fade" tabindex="-1" id="deletepaymentplanModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Delete Plan</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
								</svg>
							</span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body" id="deletepaymentplanModal_body">
                
            </div>

            
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="editplan_modal">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Plan</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
								</svg>
							</span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body py-10 px-lg-17" id="editplan_modal_body">
                
            </div>

            
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; }?>
<script type="text/javascript" src="plan/plan.js"></script>