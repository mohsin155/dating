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

$(document).on('click', '#upload-file',function(e){
   $('#uploadForm2').trigger('click');
});
var increment = 0;
$("body").on('change', '#uploadForm2', function(e) {
    
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        var cur = this;
        var target = e.dataTransfer || e.target,
        file = target && target.files && target.files[0],
        options = {
            canvas: true
        };
        if (!file) {
        return;
    }
        var size = parseFloat(file.size / 1024).toFixed(2);
        var fileType = file["type"];
        var ValidImageTypes = ["image/png", "image/PNG", "image/jpg", "image/jpeg", "image/JPEG", "image/JPG"];
        if ($.inArray(fileType, ValidImageTypes) < 0) {
            // invalid file type code goes here.
            reader.onload = function(e) {
                //alert('Only .jpg,.png,.JPG,.PNG,.gif,.GIF,.jpeg,.JPEG, .mp4 type of files are allowed.');
                $("#image_error").html('<label class="error">Only .jpg,.png,.JPG,.PNG,.jpeg,.JPEG,type of files are allowed.</label>');
                $(this).val('');
                //$('.DocumentList li:last-child').remove();
                return false;
            };


        } else {

            reader.onload = function(e) {
                if (size > 10240) {
                    //alert('File size greater than 10MB not allowed');
                    $("#image_error").html('<label class="error">File size greater than 10MB not allowed</label>');
                    $(this).val('');
                    return false;
                }
                $('.upload_photo').submit();
                /*newimage = e.target.result;
                $('.photobg').each(function(index, value) {
                    console.log(index)
                    console.log(increment)
                    if(index==increment){
                    $(this).find('.photo').css('background-image', 'url(' + newimage + ')');
                    $(this).find('.replace').removeClass('hide');
                    }
                });
                increment++;
                $(this).val('');*/

            }

        }
        reader.readAsDataURL(this.files[0]);
    } else {
        alert('hi')
    }
});

$("body").on('click', '.photoOptions', function(e) {
    $(this).closest('.photobg').find('.photooverlay').toggle();
});
$("body").on('click', '.delete-photo', function(e) {
    if(!confirm("Are you sure want to delete this photo?")){
        e.preventDefault();
    }
    
//    var defaultimage = 'image/Affinity Photo 2.gif';
//    console.log(defaultimage);
//    $(this).closest('.photobg').find('.photo').css('background-image', '');
//    $(this).closest('.photobg').find('.photo').css('background-image', 'url(' + defaultimage + ')'); 
//    $(this).closest('.photobg').find('.photooverlay').css('display','none');
//    $(this).closest('.photobg').find('.replace').addClass('hide');
//    $('#uploadForm2').val('');
//    increment--;
});
$("body").on('click', '.dropdown-menu li a', function(e) {
    var imgsrc = $(this).find('img').attr('src');
    $('li.dropdown').find('a img:first').attr('src','');
     $('li.dropdown').find('a img:first').attr('src',imgsrc);
});


$(document).on('click','.icon-setting',function(){
    $('.up_caret').toggleClass('hide');
    $('.other-details .sidemenu .submenu').removeClass('submenuShow');
    
});
$(document).on('click',function(){
    $('.up_caret').addClass('hide');
   // $('.other-details .sidemenu .submenu').removeClass('submenuShow');
});
$(document).on('click', '.img-menu', function(){
    $('.other-details .sidemenu .submenu').addClass('submenuShow');
});

$(document).on('click', '.dropdown-toggle', function(){
    $('.other-details .sidemenu .submenu').removeClass('submenuShow');
});
