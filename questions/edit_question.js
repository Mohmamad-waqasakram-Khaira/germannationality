// Define form element
const editquestionform = document.getElementById('edit_question_form');
//var ccc = document.getElementById("kt_modal_create_api_key_cancel");
// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
var validator = FormValidation.formValidation(
    editquestionform,
    {
        fields: {
            catid: {
                validators: {
                    notEmpty: {
                        message: 'Select at least one category'
                    }
                }
            },
            
            q_german: {
                        validators: {
                            notEmpty: {
                                message: "Question (German) is required"
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
const editbuttonsquestion = document.getElementById('kt_editquestion_submit');
editbuttonsquestion.addEventListener('click', function (e) {
    // Prevent default button action
    e.preventDefault();
    // Validate form before submit
    if (validator) {
        validator.validate().then(function (status) {
            console.log('validated!');

            if (status == 'Valid') {
                // Show loading indication
                editbuttonsquestion.setAttribute('data-kt-indicator', 'on');

                // Disable button to avoid multiple click
                editbuttonsquestion.disabled = true;

                // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                setTimeout(function () {
                    // Remove loading indication
                    editbuttonsquestion.removeAttribute('data-kt-indicator');

                    // Enable button
                    editbuttonsquestion.disabled = false;
                    //form_data = new FormData(document.getElementById("kt_payment_form"));
                    //form_data = '';
                     
                var form_data = new FormData(document.getElementById("edit_question_form"));
                     $.ajax({
                     type:"post",
                     data:form_data,  
                     url: "questions/update_question.php",
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
                            text: "Your Question Updated Successfully!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                
                                //e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
                                var i = 'questions.php?language=' +res.language+'&catid=' +res.catid;
                                i && (location.href = i)
                            }
                        }))
                        }else{
                            Swal.fire({
                        text: "Sorry, Something went wrong.",
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
                }, 2000)

            }
            // Swal.fire({
            //             text: "Sorry, looks like there are some errors detected, please try again.",
            //             icon: "error",
            //             buttonsStyling: !1,
            //             confirmButtonText: "Ok, got it!",
            //             customClass: {
            //                 confirmButton: "btn btn-primary"
            //             }
            //         })
            
        });

    } 
});