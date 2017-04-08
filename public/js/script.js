$("body").on('change', 'select[name=country]', function () {
    country.getState($(this).val());
});
$("body").on('change', 'select[name=state]', function () {
    country.getCity($(this).val());
});
var country = {
    getState: function (country_id) {
        $.ajax({
            type: 'GET',
            url: 'state/' + country_id,
            async: false,
            dataType: 'json',
            success: function (data) {
                $options = "<option value=0>--Select--</option>";
                if (data.status == 1) {
                    $.each(data.states, function (key, value) {
                        $options += "<option value='" + value.id + "'>" + value.name + "</option>";
                    })
                }
                $("select[name=state]").html($options);
            }
        });
    },
    getCity: function (state_id) {
        $.ajax({
            type: 'GET',
            url: 'city/' + state_id,
            async: false,
            dataType: 'json',
            success: function (data) {
                $options = "<option value=0>--Select--</option>";
                if (data.status == 1) {
                    $.each(data.cities, function (key, value) {
                        $options += "<option value='" + value.id + "'>" + value.name + "</option>";
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
        $.ajax({
            type: 'POST',
            url: 'users/fbsignup',
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
                    $.each(data.errors,function(index,value){
                        //$html += '<li>'+value.+'</li>'
                    });
                }
            }
        });
    }
}

$("#fb").on('click', function () {
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