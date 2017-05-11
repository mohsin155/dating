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
    addFavourite: function (response) {
        var id = $("input[name=user_id]").val();
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'GET',
            url: basepath+'/users/add-favourite/'+id,
            async: false,
            dataType: 'json',
            success: function (data) {
                if(data.status==0){
                    
                }else{
                    $('#favorites-btn').attr('src',basepath+'/image/btn-favorites-select.gif');
                    $('#favorites-btn').attr('id','favourites-rem');
                }
                $(".bg-loader").removeClass("show");
            }
        });
    },
    removeFavourite: function (response) {
        var id = $("input[name=user_id]").val();
        var basepath = $("input[name=basepath]").val();
        $.ajax({
            type: 'GET',
            url: basepath+'/users/remove-favourite/'+id,
            async: false,
            dataType: 'json',
            success: function (data) {
                if(data.status==0){
                    
                }else{
                    $('#favorites-rem').attr('src',basepath+'/image/btn-favorites-up.gif');
                    $('#favorites-rem').attr('id','favourites-btn');
                }
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
