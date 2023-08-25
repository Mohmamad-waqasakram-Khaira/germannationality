// Define form element
const userform = document.getElementById('create_user_form');
//var ccc = document.getElementById("kt_modal_register_api_key_cancel");
// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
var validator = FormValidation.formValidation(
    userform,
    {
        fields: {
            name: {
                        validators: {
                            notEmpty: {
                                message: "Name is required"
                            }
                        }
                    },
             phone: {
                validators: {
                    notEmpty: {
                        message: 'Phone Number is required'
                    }
                }
            },
            email: {
                         validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: "The value is not a valid email address"
                            },
                            notEmpty: {
                                message: "Email address is required"
                            }
                        }
                    },
           
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
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
const buttonsuserregister = document.getElementById('create_user_form_submit');
buttonsuserregister.addEventListener('click', function (e) {
    // Prevent default button action
    e.preventDefault();
    // Validate form before submit
    if (validator) {
        validator.validate().then(function (status) {
            console.log('validated!');

            if (status == 'Valid') {
                // Show loading indication
                buttonsuserregister.setAttribute('data-kt-indicator', 'on');

                // Disable button to avoid multiple click
                buttonsuserregister.disabled = true;

                // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                setTimeout(function () {
                    // Remove loading indication
                    buttonsuserregister.removeAttribute('data-kt-indicator');

                    // Enable button
                    buttonsuserregister.disabled = false;
                    //form_data = new FormData(document.getElementById("kt_payment_form"));
                    //form_data = '';
                     
                var form_data = new FormData(document.getElementById("create_user_form"));
                        $.ajax({
                     type:"post",
                     data:form_data,  
                     url: "users/add_user.php",
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
                            text: "User Added Successfully!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                //e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
                                var i = 'users.php';
                                i && (location.href = i)
                            }
                        }))
                        }else{
                            Swal.fire({
                        text: "Sorry, Something went wrong",
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
                 
            }
            
        });

    } 
});