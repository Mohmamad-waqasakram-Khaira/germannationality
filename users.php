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
                    <li class="breadcrumb-item text-muted">Manage Active Users</li>
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
              
                    <!--end::Search-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Add customer-->
                    <a href="javascript;" data-bs-toggle="modal" data-bs-target="#add_userr_modal" class="btn btn-primary"><i class="fas fa-plus" ></i> Add User</a>
                    <!--end::Add customer-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                
                <div class="table-responsive">

               <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">

                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                           
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Details</th>
                            
                            <!-- <th class="min-w-70px">Actions</th> -->
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">
                        
                        <!--begin::Table row-->
                         <?php $query=mysqli_query($con,"select * from users where is_deleted='0'");
                                $cnt=1;
                                while($row=mysqli_fetch_array($query))
                                {
                                ?>
                        <tr>
                           
                            <!--begin::Checkbox-->
                            
                            <!--end::Checkbox-->
                            <!--begin::Category=-->
                            <td><?php echo htmlentities($cnt);?></td>
                            
                            <td>
                                <div class="d-flex">
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"><?php echo htmlentities($row['name']);?></a>
                                        <!--end::Title-->
                                        
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"><?php echo htmlentities($row['email']);?></a>
                                        <!--end::Title-->
                                        
                                    </div>
                                </div>
                            </td>
                             <td>
                                <div class="d-flex">
                                    <div class="ms-5">
                                        <?php $payment_status= $row['payment_status'];
                                                if($payment_status==1){
                                                    $payment_status= '<span class="badge badge-success">Verified</span>';
                                                }
                                                else{
                                                    $payment_status= '<span class="badge badge-danger">Not Verified</span>';
                                                } ?>
                                        <!--begin::Title-->
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"><?php echo $payment_status?></a>
                                        <!--end::Title-->
                                        
                                    </div>
                                </div>
                            </td>
                            <td>
                                 <form id="status_updateit">
                                <div class="d-flex">
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <?php
                                        $cheecked= "";
                                         $status = $row['status'];
                                        if($status==1){
                                            $status = 0;
                                            $cheecked= "checked";
                                        }
                                        else{
                                                $status = 1;
                                            $cheecked= "";
                                            }
                                        ?>
                                       
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
                                            <input class="form-check-input" type="checkbox" value="<?php echo $status ?>"  id="status" name="status" <?php echo $cheecked?> onClick="status_update('<?php echo $row['id']; ?>','<?php echo $status ?>')" />
                                        </div>
                                        
                                    </div>
                                </div>
                                  </form>
                                        <div id="ststs"></div>
                            </td>
                            <td>
                                 <a href="javascript:void(0);" onClick="users_details('<?php echo $row['id']; ?>')" class="badge badge-light-success px-3 mb-2"><i class="fas fa-eye text-success" ></i>&nbsp;&nbsp;View Details</a>
                            </td>
                           
                           
                            <!--end::Category=-->
                           
                            <!--begin::Action=-->
                           <!--  <td class="text-end">
                                <a href="javascript:void(0);" onClick="question_details('<?php echo $row['id']; ?>')" class="badge badge-light-success px-3 mb-2"><i class="fas fa-eye text-success" ></i>&nbsp;&nbsp;View Details</a> -->
                                <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                               <!-- <a href="edit_question.php?id=<?php echo $row['id']; ?>"  class="badge badge-light-warning px-3"><i class="fas fa-pencil text-warning" ></i>&nbsp;&nbsp;Edit</a> -->
                                    <!--begin::Menu item-->
                                    <!-- <a href="#" class="badge badge-light-danger px-3"  onClick="delete_question('<?php echo $row['id']; ?>')" data-kt-ecommerce-category-filter="delete_row"><i class="fas fa-trash text-danger" ></i>&nbsp;&nbsp;Delete</a> -->
                                    
                                        
                                    
                                    <!--end::Menu item-->
                                
                                <!--end::Menu-->
                            <!-- </td> -->
                            <!--end::Action=-->

                        </tr>

                        <!--end::Table row-->
                        <?php $cnt++; } ?> 
                      
                    </tbody>
                    <!--end::Table body-->
                    
                </table>
                
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
<!--end::Content wrapper-->
<div class="modal fade" tabindex="-1" id="detailsModal">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Question Details</h3>

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

            <div class="modal-body" id="detailsModal_body">
                
            </div>
<div class="modal-footer">
             
            <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
        </div> 
            
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="deletequesModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Delete Category</h3>

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

            <div class="modal-body" id="deletequesModal_body">
                
            </div>

            
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="userdetailsModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Users Details</h3>
                
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

            <div class="modal-body" id="userdetailsModal_body">
                    
                </div>

            
        </div>
    </div>
</div>
<div class="modal fade" id="add_userr_modal" tabindex="-1">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-950px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_create_api_key_header">
                        <!--begin::Modal title-->
                        <h2>Add User</h2>
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
                    <form id="create_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                        <!--begin::Modal body-->
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px" style="max-height: 41px;">
                                
                                <!--begin::Input group-->
                                
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-5 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">UserName</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter UserName" name="name">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-5 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">User Phone</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter User Phone Number" name="phone">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Input group-->
                                <div class="mb-5 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">User Email</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter User email" name="email">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <div class="mb-5 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">User Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter User Password" name="password">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
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
                            <button type="submit" id="create_user_form_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
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
<?php include('includes/footer.php'); }?>
<script type="text/javascript" src="users/users.js"></script>
