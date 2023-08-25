// Define form element
const categoryform = document.getElementById('create_category_form');
//var ccc = document.getElementById("kt_modal_create_api_key_cancel");
// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
var validator = FormValidation.formValidation(
    categoryform,
    {
        fields: {
            c_name_german: {
                        validators: {
                            notEmpty: {
                                message: "Category Name (German) is required"
                            }
                        }
                    },
            c_name_urdu: {
                        validators: {
                            notEmpty: {
                                message: "Category Name (Urdu) is required"
                            }
                        }
                    },
            c_name_pashto: {
                validators: {
                    notEmpty: {
                        message: 'Category Name (Pashto) is required'
                    }
                }
            },
            c_image: {
                        validators: {
                            notEmpty: {
                                message: "Category Image is required"
                            }
                        }
                    },
        },

        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: '.fv-row',
                eleInvalidClass: '',
                eleValidClass: ''
            })
        }
    }
);

// Submit button handler
const buttonscategory = document.getElementById('create_category_form_submit');
buttonscategory.addEventListener('click', function (e) {
    // Prevent default button action
    e.preventDefault();
    // Validate form before submit
    if (validator) {
        validator.validate().then(function (status) {
            console.log('validated!');

            if (status == 'Valid') {
                // Show loading indication
                buttonscategory.setAttribute('data-kt-indicator', 'on');

                // Disable button to avoid multiple click
                buttonscategory.disabled = true;

                // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                setTimeout(function () {
                    // Remove loading indication
                    buttonscategory.removeAttribute('data-kt-indicator');

                    // Enable button
                    buttonscategory.disabled = false;
                    //form_data = new FormData(document.getElementById("kt_payment_form"));
                    //form_data = '';
                     
                var form_data = new FormData(document.getElementById("create_category_form"));
                        $.ajax({
                     type:"post",
                     data:form_data,  
                     url: "category/add_category.php",
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                     dataType: "json",
                        success: function(data) {
                            console.log(data);
                           // $('#sectionID').html(data);
                           var res = data;
                           console.log(res);
                            
                           if(res.return){
                            Swal.fire({
                            text: "Your Category Added Successfully!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                //e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
                                var i = 'category.php';
                                i && (location.href = i)
                            }
                        }))
                        }else{
                            Swal.fire({
                        text: "Sorry, Invalid details, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                        }
                        }
                        })
                     

                    //form.submit(); // Submit form
                }, 2000); 
                 const cancelcat = document.getElementById('kt_modal_create_api_key_cancel');
                    cancelcat.addEventListener('click', function (e)  {
                    e.preventDefault(),
                        Swal.fire({
                            text: "Are you sure you would like to cancel?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, cancel it!",
                            cancelButtonText: "No, return",
                            customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                        }).then(function (e) {
                            e.value
                                ? (o.reset(), i.hide())
                                : "cancel" === e.dismiss && Swal.fire({ text: "Your form has not been cancelled!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                        });
                })
            }
            
        });

    } 
});