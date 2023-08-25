<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
 include 'includes/header.php';
 $catid= $_GET['catid'];
 $language = $_GET['language']; ?>
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
                    <li class="breadcrumb-item text-muted">Manage Questions</li>
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
                    <a href="add_question.php"class="btn btn-primary"><i class="fas fa-plus" ></i> Add Question</a>
                    <!--end::Add customer-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <div class="table-responsive">
               <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                           
                            <th>#</th>
                            <th>Question German</th>
                            
                            <th class="min-w-70px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">
                        <!--begin::Table row-->
                         <?php $query=mysqli_query($con,"select id,q_german from questions");
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
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"><?php echo htmlentities($row['q_german']);?></a>
                                        <!--end::Title-->
                                        
                                    </div>
                                </div>
                            </td>
                           
                            <!--end::Category=-->
                           
                            <!--begin::Action=-->
                            <td class="text-end">
                                <a href="javascript:void(0);" onClick="question_details('<?php echo $row['id'].$language; ?>')" class="badge badge-light-success px-3 mb-2"><i class="fas fa-eye text-success" ></i>&nbsp;&nbsp;View Details</a>
                                <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                               <a href="edit_question.php?id=<?php echo $row['id']; ?>&catid=<?php echo $catid; ?>&language=<?php echo $language; ?>"  class="badge badge-light-warning px-3"><i class="fas fa-pencil text-warning" ></i>&nbsp;&nbsp;Edit</a>
                                    <!--begin::Menu item-->
                                    <a href="#" class="badge badge-light-danger px-3"  onClick="delete_question('<?php echo $row['id']; ?>')" data-kt-ecommerce-category-filter="delete_row"><i class="fas fa-trash text-danger" ></i>&nbsp;&nbsp;Delete</a>
                                    
                                        
                                    
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
<?php include('includes/footer.php'); }?>
<script type="text/javascript">
    $("#kt_datatable_zero_configuration").DataTable();
</script>