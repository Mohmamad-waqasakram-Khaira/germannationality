// Define form element
const languageform = document.getElementById('add_plan_form');
//var ccc = document.getElementById("kt_modal_create_api_key_cancel");
// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
var validator = FormValidation.formValidation(
    languageform,
    {
        fields: {
            plan: {
                        validators: {
                            notEmpty: {
                                message: "Plan Name is required"
                            }
                        }
                    },
            net_amount: {
                        validators: {
                            notEmpty: {
                                message: "Net Amount is required"
                            }
                        }
                    },
            referral_amount: {
                        validators: {
                            notEmpty: {
                                message: "Referral Amount is required"
                            }
                        }
                    },
           
            no_of_days: {
                        validators: {
                            notEmpty: {
                                message: "Number of days required"
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
const buttonslanguage = document.getElementById('add_plan_form_submit');
buttonslanguage.addEventListener('click', function (e) {
    // Prevent default button action
    e.preventDefault();
    // Validate form before submit
    if (validator) {
        validator.validate().then(function (status) {
            console.log('validated!');

            if (status == 'Valid') {
                // Show loading indication
                buttonslanguage.setAttribute('data-kt-indicator', 'on');

                // Disable button to avoid multiple click
                buttonslanguage.disabled = true;

                // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                setTimeout(function () {
                    // Remove loading indication
                    buttonslanguage.removeAttribute('data-kt-indicator');

                    // Enable button
                    buttonslanguage.disabled = false;
                    //form_data = new FormData(document.getElementById("kt_payment_form"));
                    //form_data = '';
                     
                var form_data = new FormData(document.getElementById("add_plan_form"));
                        $.ajax({
                     type:"post",
                     data:form_data,  
                     url: "plan/add_plan.php",
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
                            text: "Your Plan Added Successfully!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                //e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
                                var i = 'plans.php';
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
                
            }
            
        });

    } 
});