$("body").on('change', 'select[name=country]', function () {
    country.getState($(this).val());
});
$("body").on('change', 'select[name=state]', function () {
    country.getCity($(this).val());
});

var country = {
    getState: function (country_id) {
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'GET',
            url: basepath+'/users/state/' + country_id,
            async: false,
            dataType: 'json',
            success: function (data) {
                $options = "<option value=0>--Select--</option>";
                $prev = $("input[name=state_pre]").val();
                if (data.status == 1) {
                    $.each(data.states, function (key, value) {
                        if($prev==value.id){
                            $options += "<option value='" + value.id + "' selected >" + value.name + "</option>";
                        }else{
                            $options += "<option value='" + value.id + "' >" + value.name + "</option>";
                        }
                    })
                }
                $("select[name=state]").html($options);
                $( "select[name=state]" ).trigger( "change" ); 
            }
        });
    },
    getCity: function (state_id) {
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'GET',
            url: basepath+'/users/city/' + state_id,
            async: false,
            dataType: 'json',
            success: function (data) {
                $options = "<option value=0>--Select--</option>";
                $prev = $("input[name=city_pre]").val();
                if (data.status == 1) {
                    $.each(data.cities, function (key, value) {
                        if($prev==value.id){
                            $options += "<option value='" + value.id + "' selected >" + value.name + "</option>";
                        }else{
                            $options += "<option value='" + value.id + "' >" + value.name + "</option>";
                        }
                    })
                }
                $("select[name=city]").html($options);
            }
        });
    }

}

var users = {
    fbsignup: function (response) {
        var token = $("input[name=_token]").val();
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'POST',
            url: basepath+'/users/fbsignup',
            data: {
                'first_name': response.first_name,
                'gender': response.gender,
                'facebook_id': response.id,
                'email': response.email,
                '_token': token
            },
            async: false,
            dataType: 'json',
            success: function (data) {
                if(data.status==0){
                    console.log(data.errors);
                    $(".fberror").removeClass('hide').addClass('show').html('<li>'+data.errors+'</li>');
                }else{
                    window.location.href = data.redirect_url;
                }
                $(".bg-loader").removeClass("show");
            }
        });
    },
    fblogin: function (response) {
        var token = $("input[name=_token]").val();
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'POST',
            url: basepath+'/users/fblogin',
            data: {
                'facebook_id': response.id,
                '_token': token
            },
            async: false,
            dataType: 'json',
            success: function (data) {
                if(data.status==0){
                    console.log(data.errors);
                    $(".fberror").removeClass('hide').addClass('show').html('<li>'+data.errors+'</li>');
                }else{
                    window.location.href = data.redirect_url;
                }
                $(".bg-loader").removeClass("show");
            }
        });
    },
    addFavourite: function (elem_id,page,id) {
        //var id = $("input[name=user_id]").val();
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'GET',
            url: basepath+'/users/add-favourite/'+id,
            async: false,
            dataType: 'json',
            success: function (data) {
                if(data.status==0){
                    
                }else{
                    if(page== 'profile'){
                    $(elem_id).attr('src',basepath+'/image/btn-favorites-select.gif');
                    $(elem_id).attr('id','favorites-rem');
                }
                if(page == 'search'){
                        $(elem_id).removeClass("addfavorites").removeClass("iconfavorites");
                        $(elem_id).addClass("remfavorites").addClass("iconremfavorites");
                    }
                }
                $(".bg-loader").removeClass("show");
            }
        });
    },
    removeFavourite: function (elem_id,page,id) {
        //var id = $("input[name=user_id]").val();
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'GET',
            url: basepath+'/users/remove-favourite/'+id,
            async: false,
            dataType: 'json',
            success: function (data) {
                if(data.status==0){
                    
                }else{
                    if(page == 'profile'){
                    $(elem_id).attr('src',basepath+'/image/btn-favorites-up.gif');
                    $(elem_id).attr('id','favorites-btn');
                    }
                    if(page == 'search'){
                        $(elem_id).removeClass("remfavorites").removeClass("iconremfavorites");
                        $(elem_id).addClass("addfavorites").addClass("iconfavorites");
                    }
                }
                $(".bg-loader").removeClass("show");
            }
        });
    },
    blockUser: function (elem_id,page,id) {
        //var id = $("input[name=user_id]").val();
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'GET',
            url: basepath+'/users/block-user/'+id,
            async: false,
            dataType: 'json',
            success: function (data) {
                if(data.status==0){
                    
                }else{
                    if(page== 'profile'){
                        $(elem_id).attr('src',basepath+'/image/btn-blockuser-select.gif');
                        $(elem_id).attr('id','blockuser-rem');
                    }
                    if(page == 'search'){
                        $(elem_id).removeClass("addfavorites").removeClass("iconfavorites");
                        $(elem_id).addClass("remfavorites").addClass("iconremfavorites");
                    }
                }
                $(".bg-loader").removeClass("show");
            }
        });
    },
    unblockUser: function (elem_id,page,id) {
        //var id = $("input[name=user_id]").val();
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'GET',
            url: basepath+'/users/remove-block/'+id,
            async: false,
            dataType: 'json',
            success: function (data) {
                if(data.status==0){
                    
                }else{
                    if(page == 'profile'){
                    $(elem_id).attr('src',basepath+'/image/btn-blockuser-up.gif');
                    $(elem_id).attr('id','blockuser-btn');
                    }
                    if(page == 'search'){
                        $(elem_id).removeClass("remfavorites").removeClass("iconremfavorites");
                        $(elem_id).addClass("addfavorites").addClass("iconfavorites");
                    }
                }
                $(".bg-loader").removeClass("show");
            }
        });
    },
    addInterest: function (elem_id,page,id) {
        //var id = $("input[name=user_id]").val();
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'GET',
            url: basepath+'/users/add-interest/'+id,
            async: false,
            dataType: 'json',
            success: function (data) {
                if(data.status==0){
                    
                }else{
                    if(page== 'profile'){
                    $(elem_id).attr('src',basepath+'/image/btn-interest-select.gif');
                    $(elem_id).attr('id','interest-rem');
                }
                if(page == 'search'){
                        $(elem_id).removeClass("sendinterest").removeClass("iconinterest");
                        $(elem_id).addClass("iconreminterest");
                    }
                }
                $(".bg-loader").removeClass("show");
            }
        });
    },
    getProfile:function(user_id){
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'GET',
            url: basepath+'/users/popup-profile/'+user_id,
            async: false,
            success: function (data) {
                //alert(data);
                $('.modal-profile').html(data);
                $('.popup').trigger('click');
                $(".bg-loader").removeClass("show");
            }
        });
    }
}

$("#fb").on('click', function () {
    $(".bg-loader").addClass("show");
    FB.login(function (response) {
        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me?fields=first_name,email,gender,id,birthday', function (response) {
                console.log(response);
                users.fbsignup(response);
            }, {scope: 'public_profile,email'});
        } else {
            console.log('User cancelled login or did not fully authorize.');
        }
    });
});

$("#fblogin").on('click', function () {
    $(".bg-loader").addClass("show");
    FB.login(function (response) {
        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me?fields=first_name,email,gender,id,birthday', function (response) {
                console.log(response);
                users.fblogin(response);
            }, {scope: 'public_profile,email'});
        } else {
            console.log('User cancelled login or did not fully authorize.');
        }
    });
});

$('#myModal').on('shown.bs.modal', function () {
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 210,
            itemMargin: 5,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
    
$(".open-email-popup").on('click',function(){
    var user_id = $(this).attr('data-userid');
    var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'GET',
            url: basepath+'/message/popup-message/'+user_id,
            async: false,
            success: function (data) {
                //alert(data);
                $('.message-popup').html(data);
                $('#message-modal').modal('show'); 
            }
        });
   
});



