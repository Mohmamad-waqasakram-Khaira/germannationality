<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
include('../includes/config.php')
?>
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
                            <th class="min-w-250px">Category German</th>
                            <th class="min-w-250px">Category Urdu</th>
                            <th class="min-w-150px">Category Image</th>
                            <th class="text-end min-w-70px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">
                        <!--begin::Table row-->
                         <?php $query=mysqli_query($con,"select * from category");
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
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" data-kt-ecommerce-category-filter="category_name"><?php echo htmlentities($row['c_name_german']);?></a>
                                        <!--end::Title-->
                                        
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" data-kt-ecommerce-category-filter="category_name"><?php echo htmlentities($row['c_name_urdu']);?></a>
                                        <!--end::Title-->
                                        
                                    </div>
                                </div>
                            </td>
                            <!--end::Category=-->
                            <!--begin::Type=-->
                            <td>
                                <!--begin::Badges-->
                                <!--begin::Thumbnail-->
                                    <a href="#" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url('uploads/<?php echo $row['c_image'] ?>');"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                <!--end::Badges-->
                            </td>
                            <!--end::Type=-->
                            <!--begin::Action=-->
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" onClick="edit_category('<?php echo $row['id']; ?>')" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3"  onClick="delete_category('<?php echo $row['id']; ?>')"data-kt-ecommerce-category-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
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
                <?php }?>