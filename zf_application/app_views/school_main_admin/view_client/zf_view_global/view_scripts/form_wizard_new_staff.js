var NewStaffFormWizard = function () {


    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            function format(state) {
                if (!state.id) return state.text; // optgroup
                return "<img class='flag' src='assets/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

            $("#country_list").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            var form = $(' #new_staff_form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                
                rules: {
                    
                    //THESE RULES GOVERN THE VALIDATION OF NEW STAFF REGISTRATION FORM
                    
                    //First name
                    staffFirstName: {
                        required: true,
                        maxlength: 30,
                        minlength: 1
                    },
                    
                    //Last name
                    staffLastName: {
                        required: true,
                        maxlength: 30,
                        minlength: 1
                    },
                    
                    //Id number
                    staffIdNumber: {
                        required: true,
                        maxlength: 30,
                        minlength: 3
                    },
                    
                    //Gender
                    staffGender: {
                        required: true
                    },
                    
                    //Marital status
                    staffMaritalStatus: {
                        required: true
                    },
                    
                    //Date of brith
                    staffDateOfBirth: {
                        required: true
                    },
                    
                    //Religion
                    staffReligion: {
                        required: true
                    },
                    
                    //Country
                    staffCountry: {
                        required: true
                    },
                    
                    //Locality
                    staffLocality: {
                        required: true
                    },
                    
                    //Box address
                    staffBoxAddress: {
                        required: true,
                        maxlength: 30,
                        minlength: 3
                    },
                    
                    //Phone number
                    staffPhoneNumber: {
                        required: true,
                        maxlength: 15,
                        minlength: 10
                    },
                    
                    //Admission number
                    staffAdmissionNumber: {
                        required: true,
                        maxlength: 30,
                        minlength: 3
                    },
                    
                    //Language
                    staffLanguage: {
                        required: true
                    },
                    
                    //Email address
                    staffEmailAddress: {
                       required: true, 
                       email: true
                    },
                    
                    //School role
                    staffSchoolRole: {
                        required: true
                    },
                    
                    //Password
                    staffPassword: {
                        required: true,
                        maxlength: 30,
                        minlength: 5
                    },
                    
                    //Password 2
                    staffPassword2: {
                        required: true,
                        equalTo: "#staffPassword"
                    }
                    
                
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'gender': {
                        required: "Select at one option",
                        minlength: jQuery.format("Select at one option")
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "adminGender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#adminGender_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "adminGender") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                    form.submit();
                }

            });
            

            var displayConfirm = function() {
                $('#confirmNewStaffInfo .form-control-static', form).each(function(){
                    var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                    if (input.is(":radio")) {
                        input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
                    }
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment') {
                        var payment = [];
                        $('[name="payment[]"]').each(function(){
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    } 
                });
            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $(' #newStaff')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $(' #newStaff')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $(' #newStaff').find('.button-previous').hide();
                } else {
                    $(' #newStaff').find('.button-previous').show();
                }

                if (current >= total) {
                    $(' #newStaff').find('.button-next').hide();
                    $(' #newStaff').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $(' #newStaff').find('.button-next').show();
                    $(' #newStaff').find('.button-submit').hide();
                }
                App.scrollTo($('.page-title'));
            }

            // default form wizard
            $(' #new_staff_form').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    if (form.valid() == false) {
                        return false;
                    }

                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $(' #newStaff').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $(' #new_staff_form').find('.button-previous').hide();
            $(' #new_staff_form .button-submit').click(function () {
                
                //form.submit();
                
            }).hide();
        }

    };

}();