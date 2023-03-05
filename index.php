<?php
error_reporting(1);
session_start();
if(strlen($_SESSION['alogin'])!=0)
    {   
    header('location:dashboard.php');
    }
    else{
 include('includes/config.php'); ?>
<html class="white-bg-login" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>Germannationality</title>
    <link rel="shortcut icon" href="https://www.Germannationality.de/favicon.png" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
   
    <!--end::Global Stylesheets Bundle-->
</head>

<!--end::Head-->
    <!--begin::Body-->
    <!--begin::Body-->
    <body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat" >
        
        <!--End::Google Tag Manager (noscript) -->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <!--begin::Page bg image-->
            <style>body { background-image: url('assets/media/auth/bg4.jpg'); } [data-theme="dark"] body { background-image: url('../../../assets/media/auth/bg4-dark.jpg'); }</style>
            <!--end::Page bg image-->
            <!--begin::Authentication - Sign-up -->
            <div class="d-flex flex-column flex-column-fluid flex-lg-row">
                <!--begin::Aside-->
                <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                    <!--begin::Aside-->
                    <div class="d-flex flex-center flex-lg-start flex-column">
                        <!--begin::Logo-->
                        <a href="#" class="mb-7">
                            <img alt="Logo" src="uploads/germanlogobg.png" class="h-85px" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Title-->
                        <h2 class="text-white fw-normal m-0">Germannationality A Theorie Lernen App
                        </h2>
                        <!--end::Title-->
                    </div>
                    <!--begin::Aside-->
                </div>
                <!--begin::Aside-->
                <!--begin::Body-->
                <div class="d-flex flex-center w-lg-50 p-10">
                    <!--begin::Card-->
                    <div class="card rounded-3 w-md-550px">
                        <!--begin::Card body-->
                        <div class="card-body p-10 p-lg-20">
                            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"  action="">
<!--begin::Heading-->
    <div class="text-center mb-11">
        <!--begin::Title-->
        <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
        <!--end::Title-->
        <!--begin::Subtitle-->
        <div class="text-gray-500 fw-semibold fs-6">Germannationality.de</div>
        <!--end::Subtitle=-->
    </div>
    <div class="fv-row mb-8">
         <label class="form-label fw-semibold fs-6 mb-2">
            Username
        </label>
        <!--begin::Email-->
        <input type="text" placeholder="Username" name="email" autocomplete="off" class="form-control bg-transparent">
        <!--end::Email-->
    </div>
    <!--end::Input group=-->
    <!--begin::Main wrapper-->
<div class="fv-row" data-kt-password-meter="true">
    <!--begin::Wrapper-->
    <div class="mb-1">
        <!--begin::Label-->
        <label class="form-label fw-semibold fs-6 mb-2">
            Password
        </label>
        <!--end::Label-->

        <!--begin::Input wrapper-->
        <div class="position-relative mb-3">
            <input class="form-control form-control-lg bg-transparent"
                type="password" placeholder="Password" name="password" autocomplete="off" />

            <!--begin::Visibility toggle-->
            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                data-kt-password-meter-control="visibility">
                <i class="fa fa-eye-slash fs-2"></i>

                <i class="fa fa-eye fs-2 d-none"></i>
            </span>
            <!--end::Visibility toggle-->
        </div>
        <!--end::Input wrapper-->

        <!--begin::Highlight meter-->
        
        <!--end::Highlight meter-->
    </div>
    <!--end::Wrapper-->

    <!--begin::Hint-->
    
    <!--end::Hint-->
</div>
<!--end::Main wrapper-->
    <!--end::Input group=-->
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>
        <!--begin::Link-->
        
        <!--end::Link-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            <!--begin::Indicator label-->
            <span class="indicator-label">Sign In</span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait... 
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
    </div>
    <!--end::Submit button-->
    <!--begin::Sign up-->
    
    <!--end::Sign up-->
    </form>

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Authentication - Sign-up-->
        </div>
        <!--end::Root-->
        <!--begin::Javascript-->
        <script>var hostUrl = "assets/index.html";</script>
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="assets/plugins/global/plugins.bundle.js"></script>
        <script src="assets/js/scripts.bundle.js"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Custom Javascript(used by this page)-->
        <script src="assets/js/custom/authentication/sign-up/general.js"></script>
        <!--end::Custom Javascript-->
        <script src="assets/js/custom/authentication/sign-in/general.js"></script>
       
        <script src="assets/js/custom/authentication/reset-password/reset-password.js"></script>

        <!--end::Javascript-->
    </body>
    <!--end::Body-->
</html>
<?php } ?>