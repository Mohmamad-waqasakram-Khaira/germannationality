// Define form element
const agentform = document.getElementById('create_agent_form');
//var ccc = document.getElementById("kt_modal_create_api_key_cancel");
// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
var validator = FormValidation.formValidation(
    agentform,
    {
        fields: {
            agent_name: {
                        validators: {
                            notEmpty: {
                                message: "Agent Name is required"
                            }
                        }
                    },
             agent_phone: {
                validators: {
                    notEmpty: {
                        message: 'Agent Phone is required'
                    }
                }
            },
            agent_email: {
                        validators: {
                            notEmpty: {
                                message: "Agent Email is required"
                            }
                        }
                    },
           
            agent_password: {
                validators: {
                    notEmpty: {
                        message: 'Agent Password is required'
                    }
                }
            },
            no_of_acc: {
                validators: {
                    notEmpty: {
                        message: 'Number of accounts is required'
                    }
                }
            },
            agent_address: {
                validators: {
                    notEmpty: {
                        message: 'Agent Address is required'
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
const buttonsagent = document.getElementById('create_agent_form_submit');
buttonsagent.addEventListener('click', function (e) {
    // Prevent default button action
    e.preventDefault();
    // Validate form before submit
    if (validator) {
        validator.validate().then(function (status) {
            console.log('validated!');

            if (status == 'Valid') {
                // Show loading indication
                buttonsagent.setAttribute('data-kt-indicator', 'on');

                // Disable button to avoid multiple click
                buttonsagent.disabled = true;

                // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                setTimeout(function () {
                    // Remove loading indication
                    buttonsagent.removeAttribute('data-kt-indicator');

                    // Enable button
                    buttonsagent.disabled = false;
                    //form_data = new FormData(document.getElementById("kt_payment_form"));
                    //form_data = '';
                     
                var form_data = new FormData(document.getElementById("create_agent_form"));
                        $.ajax({
                     type:"post",
                     data:form_data,  
                     url: "agents/add_agent.php",
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
                            text: "Your Agent Added Successfully!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                //e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
                                var i = 'agents.php';
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