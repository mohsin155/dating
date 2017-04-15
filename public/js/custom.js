/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



 /* Validation in Login and signup  form */
    if ($("#signup-page").length > 0) {
        $("#signup-page").trigger('reset');
        var signUpForm = $("#signup-page");
        signUpForm.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.parents('.form-group').find('.control-label').after(error);
            },
            rules: {
                firstname: {
                    required: true
                },
                password: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                gender: {
                    required: true
                },
                terms_condition: {
                     required: true
                }
            },
            messages: {
                firstname: {
                    required: "Please enter your first name"
                },
                password: {
                    required: "Please enter your password"
                },
                 email: {
                   required: "Please enter your email"
                 
                 },
                gender: {
                    required: "Please select your gender"
                },
                 terms_condition: {
                     required: 'Please select terms and conditions'
                }
            }
        });
        signUpForm.validate().settings.ignore = "";
    }
     if ($("#login-page").length > 0) {
        $("#login-page").trigger('reset');
        var loginPage = $("#login-page");
        loginPage.validate({
            rules: {
                email: {
                    email: true,
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Please enter your first name"
                },
                password: {
                     required: "Please enter your password"
                }
              
            }
        });
        loginPage.validate().settings.ignore = "";
    }
    /* End Validation in Login and signup form */
if ($("#change-email").length > 0) {
        $("#change-email").trigger('reset');
        var changeemail = $("#change-email");
        changeemail.validate({
            rules: {
                email: {
                    email: true,
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Please enter your email address"
                }
            }
           
        });
        changeemail.validate().settings.ignore = "";
    }
    
    if ($("#change-password").length > 0) {
        $("#change-password").trigger('reset');
        var changepassword = $("#change-password");
        changepassword.validate({
            rules: {
                newpassword: {
                   required: true,
                   minlength: 6,
                   maxlength: 20
                },
                confirmpassword: {
                    required: true,
                    
                    equalTo : "#newpassword"
                }
            },
            messages: {
                newpassword: {
                   required: "Please enter new password"
                },
                confirmpassword: {
                   required: "Please enter confirm password"
                }
            },
            submitHandler: function (form, event) {
                event.preventDefault();
            }
        });
        changepassword.validate().settings.ignore = "";
    }
    /* End Validation in Login and signup form */

        /* Upgrade Page JS */
        $(document).on('click', '.platinum',function(e){
           $('.platinum-section').removeClass('hide');
            $('.gold-section').addClass('hide');
            $('.gold').removeClass('active');
            $(this).addClass('active');
        });
         $(document).on('click', '.gold',function(e){
            $('.gold-section').removeClass('hide'); 
            $('.platinum-section').addClass('hide');
            $('.platinum').removeClass('active');
            $(this).addClass('active');
        });
        $(document).on('change', '.payment-method input[type=radio]',function(e){
            if($(this).val()!=1){
                $('.subscription-text').css('display','none');
            }
            else {
                $('.subscription-text').css('display','block');
            }
        })
        /*End Upgrade Page JS */
