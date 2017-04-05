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
            },
            submitHandler: function (form, event) {
                event.preventDefault();
              
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
              
            },
            submitHandler: function (form, event) {
                event.preventDefault();
              
            }
        });
        loginPage.validate().settings.ignore = "";
    }
    /* End Validation in Login and signup form */


