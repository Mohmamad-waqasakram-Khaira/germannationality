<?php session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
include 'includes/header.php';
$query= mysqli_query($con, "Select id from questions");
$queryimg= mysqli_query($con, "Select id from questions where question_image!=''");
$queryvd= mysqli_query($con, "Select id from questions where answervideo!=''");
$query1= mysqli_query($con, "Select id from category");
$query2= mysqli_query($con, "Select id from users where is_deleted!='1'");
$query4= mysqli_query($con, "Select id from users where
	status='1' and is_deleted!='1' ");
$query5= mysqli_query($con, "Select id from users where
	status='0'and is_deleted!='1' ");
$query3= mysqli_query($con, "Select id from agents");
$query10= mysqli_query($con, "Select id from agents where a_status='1'");
$query11= mysqli_query($con, "Select id from agents where a_status='0'");
$query6= mysqli_query($con, "Select id from payments");
$query7= mysqli_query($con, "Select id from payments where payment_type='Bank'");
$query9= mysqli_query($con, "Select id from payments where payment_type='Agent'");
$query8= mysqli_query($con, "Select id from payments where payment_type IS NULL");
$countpayment= mysqli_num_rows($query6);
$countbank= mysqli_num_rows($query7);
$countpaypal= mysqli_num_rows($query8);
$countagent= mysqli_num_rows($query9);
$paypal= $countpaypal*49.99;
$agent= $countagent*49.99;
$agentc= ($agent*30)/100;
$comissionagent= $agent- $agentc;
$bank= $countbank*49.99;
$sales= $countpayment*49.99;
$countag= mysqli_num_rows($query3);
$countit= mysqli_num_rows($query);
$countcat= mysqli_num_rows($query1);
$countusers= mysqli_num_rows($query2);
$countusersactive= mysqli_num_rows($query4);
$countusersinactive= mysqli_num_rows($query5);
$countagentactive= mysqli_num_rows($query10);
$countagentinactive= mysqli_num_rows($query11);
$countimg= mysqli_num_rows($queryimg);
$countvid= mysqli_num_rows($queryvd);

 ?>
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
						<a href="index.html" class="text-muted text-hover-primary">Home</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="breadcrumb-item">
						<span class="bullet bg-gray-400 w-5px h-2px"></span>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="breadcrumb-item text-muted">Dashboard</li>
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
			<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
				<!--begin::Col-->
				<div class="col-xxl-12">
					<!--begin::Engage widget 10-->
					<div class="card card-flush h-md-100">
						<!--begin::Body-->
						<div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url('assets/media/stock/900x600/42.png')">
							<!--begin::Wrapper-->
							 <div class="row g-5 g-xl-8 mb-5">
							 	<div class="col-xl-4">
							 		<a href="questions.php"class="btn btn-light-success"><i class="fas fa-gear" ></i> Manage Questions</a>
							 	</div>
							 </div>
						<div class="row g-5 g-xl-8">
				<div class="col-xl-4">
					<!--begin: Statistics Widget 6-->
					<div class="card bg-light-success card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body my-3">
							<a href="#" class="card-title fw-bold text-success fs-5 mb-3 d-block">Total Categories</a>
							<div class="py-1">
								<span class="text-dark fs-1 fw-bold me-2"><?php echo $countcat ?></span>
								<span class="fw-semibold text-muted fs-7">Categories</span>
							</div>
							<div class="progress h-7px bg-success bg-opacity-50 mt-7">
								<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<!--end:: Body-->
					</div>
					<!--end: Statistics Widget 6-->
				</div>
				<div class="col-xl-4">
					<!--begin: Statistics Widget 6-->
					<div class="card bg-light-warning card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body my-3">
							<a href="#" class="card-title fw-bold text-warning fs-5 mb-3 d-block">Total Questions</a>
							<div class="py-1">
								<span class="text-dark fs-1 fw-bold me-2"><?php echo $countit ?></span>
								<span class="fw-semibold text-muted fs-7">All Uploaded</span>
							</div>
							<div class="progress h-7px bg-success bg-opacity-50 mt-7">
								<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<!--end:: Body-->
					</div>
					<!--end: Statistics Widget 6-->
				</div>
				<div class="col-xl-4">
					<!--begin: Statistics Widget 6-->
					<div class="card bg-light-primary card-xl-stretch mb-5 mb-xl-8">
						<!--begin::Body-->
						<div class="card-body my-3">
							<a href="#" class="card-title fw-bold text-primary fs-5 mb-3 d-block">Total Users</a>
							<div class="py-1">
								<span class="text-dark fs-1 fw-bold me-2"><?php echo $countusers ?></span>
								<span class="fw-semibold text-muted fs-7">Registered</span>
							</div>
							
								<div class="py-1 float-end">
								<span class="text-dark fs-1 fw-bold me-2"><?php echo $countusersactive ?></span>
								<span class="fw-semibold text-muted fs-7 mx-3">Active</span><span class="text-dark fs-1 fw-bold me-2"><?php echo $countusersinactive ?></span>
								<span class="fw-semibold text-muted fs-7">Inactive</span>
							</div>
						</div>
						<!--end:: Body-->
					</div>
					<!--end: Statistics Widget 6-->
				</div>
			</div>
			<div class="row g-5 g-xl-8">
				<div class="col-xl-4">
	<!--begin::Mixed Widget 1-->
	<div class="card card-xl-stretch mb-xl-8">
		<!--begin::Body-->
		<div class="card-body p-0">
			<!--begin::Header-->
			<div class="px-9 pt-7 card-rounded h-275px w-100 bg-primary">
				<!--begin::Heading-->
				<div class="d-flex flex-stack">
					<h3 class="m-0 text-white fw-bold fs-3">Sales Summary</h3>
					<div class="ms-1">
						
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Heading-->
				<!--begin::Balance-->
				<div class="d-flex text-center flex-column text-white pt-8">
					<span class="fw-semibold fs-7">You Sales</span>
					<span class="fw-bold fs-2x pt-1">€<?php echo $sales; ?></span>
				</div>
				<!--end::Balance-->
			</div>
			<!--end::Header-->
			<!--begin::Items-->
			<div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
				<!--begin::Item-->
				<div class="d-flex align-items-center mb-6">
					<!--begin::Symbol-->
					<div class="symbol symbol-45px w-40px me-5">
						<span class="symbol-label bg-lighten">
							<!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor"></path>
									<path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor"></path>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
					</div>
					<!--end::Symbol-->
					<!--begin::Description-->
					<div class="d-flex align-items-center flex-wrap w-100">
						<!--begin::Title-->
						<div class="mb-1 pe-3 flex-grow-1">
							<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">Via PayPal</a>
							<div class="text-gray-400 fw-semibold fs-7">Online by PayPal</div>
						</div>
						<!--end::Title-->
						<!--begin::Label-->
						<div class="d-flex align-items-center">
							<div class="fw-bold fs-5 text-gray-800 pe-1">€<?php echo $paypal ?></div>
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
							<span class="svg-icon svg-icon-5 svg-icon-success ms-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
									<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Label-->
					</div>
					<!--end::Description-->
				</div>
				<!--end::Item-->
				<!--begin::Item-->
				<div class="d-flex align-items-center mb-6">
					<!--begin::Symbol-->
					<div class="symbol symbol-45px w-40px me-5">
						<span class="symbol-label bg-lighten">
							<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
									<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
									<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
									<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
					</div>
					<!--end::Symbol-->
					<!--begin::Description-->
					<div class="d-flex align-items-center flex-wrap w-100">
						<!--begin::Title-->
						<div class="mb-1 pe-3 flex-grow-1">
							<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">Via Bank</a>
							<div class="text-gray-400 fw-semibold fs-7">Bank Transfer</div>
						</div>
						<!--end::Title-->
						<!--begin::Label-->
						<div class="d-flex align-items-center">
							<div class="fw-bold fs-5 text-gray-800 pe-1">€<?php echo $bank ?></div>
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
							<span class="svg-icon svg-icon-5 svg-icon-danger ms-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
									<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Label-->
					</div>
					<!--end::Description-->
				</div>
				<!--end::Item-->
				<!--begin::Item-->
				<div class="d-flex align-items-center mb-6">
					<!--begin::Symbol-->
					<div class="symbol symbol-45px w-40px me-5">
						<span class="symbol-label bg-lighten">
							<!--begin::Svg Icon | path: icons/duotune/electronics/elc005.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path opacity="0.3" d="M15 19H7C5.9 19 5 18.1 5 17V7C5 5.9 5.9 5 7 5H15C16.1 5 17 5.9 17 7V17C17 18.1 16.1 19 15 19Z" fill="currentColor"></path>
									<path d="M8.5 2H13.4C14 2 14.5 2.4 14.6 3L14.9 5H6.89999L7.2 3C7.4 2.4 7.9 2 8.5 2ZM7.3 21C7.4 21.6 7.9 22 8.5 22H13.4C14 22 14.5 21.6 14.6 21L14.9 19H6.89999L7.3 21ZM18.3 10.2C18.5 9.39995 18.5 8.49995 18.3 7.69995C18.2 7.29995 17.8 6.90002 17.3 6.90002H17V10.9H17.3C17.8 11 18.2 10.7 18.3 10.2Z" fill="currentColor"></path>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
					</div>
					<!--end::Symbol-->
					<!--begin::Description-->
					<div class="d-flex align-items-center flex-wrap w-100">
						<!--begin::Title-->
						<div class="mb-1 pe-3 flex-grow-1">
							<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bold">Via Agent</a>
							<div class="text-gray-400 fw-semibold fs-7">After Commission</div>
						</div>
						<!--end::Title-->
						<!--begin::Label-->
						<div class="d-flex align-items-center">
							<div class="fw-bold fs-5 text-gray-800 pe-1">€<?php echo $comissionagent ?></div>
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
							<span class="svg-icon svg-icon-5 svg-icon-success ms-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
									<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Label-->
					</div>
					<!--end::Description-->
				</div>
				<!--end::Item-->
				<!--begin::Item-->
				
				<!--end::Item-->
			</div>
			<!--end::Items-->
		</div>
		<!--end::Body-->
	</div>
	<!--end::Mixed Widget 1-->
</div>
<div class="col-xl-4">
					<!--begin: Statistics Widget 6-->
					<div class="card bg-light-primary card-xl-stretch mb-5 mb-xl-8">
						<!--begin::Body-->
						<div class="card-body my-3">
							<a href="#" class="card-title fw-bold text-primary fs-5 mb-3 d-block">Total Agents</a>
							<div class="py-1">
								<span class="text-dark fs-1 fw-bold me-2"><?php echo $countag ?></span>
								<span class="fw-semibold text-muted fs-7">Registered</span>
							</div>
							
								<div class="py-1 float-end">
								<span class="text-dark fs-1 fw-bold me-2"><?php echo $countagentactive ?></span>
								<span class="fw-semibold text-muted fs-7 mx-3">Active</span><span class="text-dark fs-1 fw-bold me-2"><?php echo $countagentinactive ?></span>
								<span class="fw-semibold text-muted fs-7">Inactive</span>
							</div>
						</div>
						<!--end:: Body-->
					</div>
					<!--end: Statistics Widget 6-->
				</div>
			</div>
							<!--begin::Wrapper-->
							<!--begin::Illustration-->
						
							<!--end::Illustration--><!--begin::Illustration-->
					
							<!--end::Illustration-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Engage widget 10-->

				</div>
				<!--end::Col-->
			</div>
			<!--end::Row-->
			<div class="row g-5 g-xl-8">
				<div class="col-xl-12">
					<!--begin::List Widget 9-->
					<div class="card card-xl-stretch mb-5 mb-xl-8">
						<!--begin::Header-->
						<div class="card-header align-items-center border-0 mt-3">
							<h3 class="card-title align-items-start flex-column">
								<span class="fw-bold text-dark fs-3">Category Wise Questions</span>
							</h3>
							
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-5">
							<!--begin::Item-->
							<div class="row">
								<?php $query3= mysqli_query($con, "Select * from category"); 
								while($getdet= mysqli_fetch_array($query3)){
									$catid= $getdet['id'];
								$query55= mysqli_query($con, "Select id from question_category where category_id='$catid'");
								$countit55= mysqli_num_rows($query55);
								if($catid=='26'){
									$countit55='430';
								}
								elseif($catid=='27'){
									$countit55='135';
								}
								elseif($catid=='28'){
									$countit55='1147';
								}
								else{
									$countit55=$countit55;
								}
								?>
								<div class="col-lg-6">
									<div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
									
								<!--begin::Symbol-->
								
									<a href="category_questions.php?id=<?php echo $catid ?>" class="symbol symbol-50px">
										<span class="symbol-label" style="background-image:url('uploads/<?php echo $getdet['c_image'] ?>');"></span>
									</a>
									
								<!--end::Symbol-->
								<!--begin::Section-->
								<div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
									<!--begin::Title-->
									<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3 mx-3">
										<a href="questions.php" class="fs-5 text-gray-800 text-hover-primary fw-bold"><?php echo $getdet['c_name_german'] ?></a>
										
									</div>
									<!--end::Title-->
									<!--begin::Info-->
									<div class="text-end py-lg-0 py-2">
										<span class="text-gray-800 fw-bolder fs-3"><?php echo $countit55?></span>
										<span class="text-gray-400 fs-7 fw-semibold d-block">Question</span>
									</div>
									<!--end::Info-->
								</div>
								<!--end::Section-->
							
								</div>
							</div>
								<?php }?>							
							</div>
							<!--end::Item-->
							
						</div>
						<!--end::Body-->
					</div>
					<!--end::List Widget 9-->
				</div>
			</div>
		</div>
		<!--end::Content container-->
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->
<?php  include 'includes/footer.php'; } ?>