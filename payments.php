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
                    <li class="breadcrumb-item text-muted">Manage payments</li>
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
                   <div class="card-toolbar">
                    <!--begin::Add customer-->
                    <a href="javascript;" data-bs-toggle="modal" data-bs-target="#add_payment_modal" class="btn btn-primary"><i class="fas fa-plus" ></i> Add Payment</a>
                    <!--end::Add customer-->
                </div>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                  <form id="" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="payment_report.php" method="post" enctype="multipart">
                                <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-5 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                  <label class=" fs-5 fw-semibold mb-2">Select User</label>
                            <select class="form-select form-select-solid" data-control="select2" data-close-on-select="false" data-placeholder="Select User"  name="userid" id="userid" >
                                <option value="">Select User</option>
                             <?php $querylang= mysqli_query($con,"select id, name, email from users where payment_status='1'");
                                while($getlang= mysqli_fetch_array($querylang))
                                {
                             ?> 
                         <option value="<?php echo htmlentities($getlang['id'])?>"><?php echo htmlentities($getlang['name'].' - '.$getlang['email'])?></option>
                          <?php } ?>
                            </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                
                                        </div>
                                          <div class="col-lg-4">
                                            <div class="mb-5 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                  <label class=" fs-5 fw-semibold mb-2">Select Agent</label>
                            <select class="form-select form-select-solid" data-control="select2" data-close-on-select="false" data-placeholder="Select Agent"  name="agent_id" id="agent_id" >
                                <option value="">Select Agent</option>
                             <?php $queryagent= mysqli_query($con,"select * from agents where a_status='1'");
                                while($getagent= mysqli_fetch_array($queryagent))
                                {
                             ?> 
                         <option value="<?php echo htmlentities($getagent['agent_id'])?>"><?php echo htmlentities($getagent['agent_name'])?></option>
                          <?php } ?>
                            </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-5 fv-row fv-plugins-icon-container">
                                    
                                    <label class=" fs-5 fw-semibold mb-2">Payment Method</label>
                            <select class="form-select form-select-solid" data-control="select2" data-close-on-select="false" data-placeholder="Select Payment Method"  name="method" id="method">
                              
                         <option value="">Select Payment Method</option>
                         <option value="PayPal">PayPal</option>
                         <option value="bank">Bank</option>
                         <option value="admin">Admin</option>
                            </select>
                                    
                                </div>
                                        </div>
                                         <div class="col-lg-4">
                                            <div class="mb-5 fv-row fv-plugins-icon-container">
                                    
                                    <label class=" fs-5 fw-semibold mb-2">Payment Status</label>
                            <select class="form-select form-select-solid" data-control="select2" data-close-on-select="false" data-placeholder="Select Payment Status"  name="payment_status" id="payment_status" >
                              
                         <option value="">Select Payment Status</option>
                         <option value="0">Active</option>
                         <option value="1">Inactive</option>
                         
                            </select>
                                    
                                </div>
                                        </div>
                                        <div class="col-lg-4">
                                        <div class="mb-5 fv-row fv-plugins-icon-container mt-8"> <button type="submit" id="" value="Search" class="btn btn-success">Search</button> <a href="payments.php"><button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Reset</button></a></div></div>
                                       
                                        
                                    </div>
                                    </form>   
                                     
                <div class="table-responsive">

               <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">

                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                           
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Payment Image</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Details</th>
                            
                            <!-- <th class="min-w-70px">Actions</th> -->
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                     <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">
                        
                        <!--begin::Table row-->
                         <?php $query=mysqli_query($con,"select *, payments.id as pid from payments join users on users.id=payments.user_id");
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
                            </td><td>
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
                                        <!--begin::Title-->
                                       <a href="uploads/<?php echo $row['payment_image'] ?>" target="_blank" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url('uploads/<?php echo $row['payment_image'] ?>');"></span>
                                    </a>
                                        <!--end::Title-->
                                        
                                    </div>
                                </div>
                            </td>
                             <td>
                                <div class="d-flex">
                                    <div class="ms-5">
                                        <?php $payment_method= $row['payment_type'];
                                                if($payment_method=='Bank'){
                                                    $payment_method= '<span class="badge badge-success">Bank</span>';
                                                }
                                                elseif($payment_method=='Agent'){
                                                    $payment_method= '<span class="badge badge-warning">Agent</span>';
                                                }
                                                elseif($payment_method=='admin'){
                                                    $payment_method= '<span class="badge badge-info">Admin</span>';
                                                }
                                                else{
                                                    $payment_method= '<span class="badge badge-danger">PayPal</span>';
                                                } ?>
                                        <!--begin::Title-->
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"><?php echo $payment_method?></a>
                                        <!--end::Title-->
                                        
                                    </div>
                                </div>
                            </td>
                            
                           
                           
                            <!--end::Category=-->
                           <td>
                                 <form id="status_updateit">
                                <div class="d-flex">
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <?php
                                        $cheecked= "";
                                         $status = $row['payment_status'];
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
                                            <input class="form-check-input" type="checkbox" value="<?php echo $status ?>"  id="status" name="status" <?php echo $cheecked?> onClick="payment_update('<?php echo $row['id']; ?>','<?php echo $status ?>')" />
                                        </div>
                                        
                                    </div>
                                </div>
                                  </form>
                                        <div id="ststs"></div>
                            </td>
                            <!--begin::Action=-->
                            <td class="text-end">
                                <a href="javascript:void(0);" onClick="payment_details('<?php echo $row['pid']; ?>')"  class="badge badge-light-success px-2 mb-2"><i class="fas fa-eye text-success" ></i>&nbsp;&nbsp;View Details</a>
                                <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                               <a href="javascript:void(0);" onClick="payment_update12('<?php echo $row['pid']; ?>')"  class="badge badge-light-warning px-2 mb-2"><i class="fas fa-file text-warning" ></i>&nbsp;&nbsp;Update Status</a>
                                    <!--begin::Menu item-->
                                    <a href="#" class="badge badge-light-danger px-2" onClick="delete_payment('<?php echo $row['pid']; ?>')"data-kt-ecommerce-category-filter="delete_row"><i class="fas fa-trash text-danger" ></i>&nbsp;&nbsp;Delete</a>
                                    
                                        
                                    
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
<div class="modal fade" tabindex="-1" id="deletepaymentModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Delete Payment</h3>

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

            <div class="modal-body" id="deletepaymentModal_body">
                
            </div>

            
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="paymentdetailsModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Payment Details</h3>
                
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

            <div class="modal-body" id="paymentdetailsModal_body">
                    
                </div>

            
        </div>
    </div>
</div>
<div class="modal fade" id="add_payment_modal" tabindex="-1">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_create_api_key_header">
                        <!--begin::Modal title-->
                        <h2>Add Payment</h2>
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
                    <form id="create_payment_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                        <!--begin::Modal body-->
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px" style="max-height: 41px;">
                                
                                <!--begin::Input group-->
                                
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-5 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Select User  </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                     <select class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#add_payment_modal" data-placeholder="Select an option" data-allow-clear="true" name="user_id" id="useremail">
                                    <option></option>
                             <?php $querychap= mysqli_query($con,"select id, name,email from users");
                                while($getchap= mysqli_fetch_array($querychap))
                                {
                             ?> 
                         <option value="<?php echo htmlentities($getchap['id'])?>"><?php echo htmlentities($getchap['name'].'/'.$getchap['email'])?></option>
                          <?php } ?>
                            </select>
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-5 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Enter Amount</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Amount E.g 24.99" name="amount">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
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
                            <button type="button" onclick="create_payment()" class="btn btn-primary">
                                Submit
                                
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->
                    <div id="Adpay"></div></form>
                    <!--end::Form-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
<div class="modal fade" tabindex="-1" id="payment_edit_Modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Update Payment Status</h3>
                
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

            <div class="modal-body" id="payment_edit_Modal_body">
                    
                </div>

            
        </div>
    </div>
</div>
<?php include('includes/footer.php'); }?>

