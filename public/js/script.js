$("body").on('change','select[name=country]',function(){
   country.getState($(this).val()); 
});
$("body").on('change','select[name=state]',function(){
   country.getCity($(this).val()); 
});
var country = {
    getState : function(country_id){
        $.ajax({
                type:'GET',
                url:'state/'+country_id,
                async:false,
                dataType:'json',
                success:function(data){
                    $options = "<option value=0>--Select--</option>";
                    if(data.status==1){
                        $.each(data.states,function(key,value){
                            $options += "<option value='"+value.id+"'>"+value.name+"</option>";
                        })
                    }
                    $("select[name=state]").html($options);
                }
            });
    },
    
    getCity : function(state_id){
        $.ajax({
                type:'GET',
                url:'city/'+state_id,
                async:false,
                dataType:'json',
                success:function(data){
                    $options = "<option value=0>--Select--</option>";
                    if(data.status==1){
                        $.each(data.cities,function(key,value){
                            $options += "<option value='"+value.id+"'>"+value.name+"</option>";
                        })
                    }
                    $("select[name=city]").html($options);
                }
            });
    }
    
}

$("#fb").on('click',function(){
    var token = $("input[name=_token]").val();
FB.login(function(response) {
    if (response.authResponse) {
     console.log('Welcome!  Fetching your information.... ');
     FB.api('/me?fields=first_name,email,gender,id,birthday', function(response) {
        console.log(response_new);
        $.ajax({
                type:'POST',
                url:'fbsignup',
                data: {
                'first_name': response.first_name,
                'gender': response.gender,
                'facebook_id': response.id,
                'facebook_email':response.email,
                '_token':token
                },
                async:false,
                dataType:'json',
                success:function(data){
                    $options = "<option value=0>--Select--</option>";
                    if(data.status==1){
                        $.each(data.cities,function(key,value){
                            $options += "<option value='"+value.id+"'>"+value.name+"</option>";
                        })
                    }
                    $("select[name=city]").html($options);
                }
            });
     },{scope: 'public_profile,email'});
    } else {
     console.log('User cancelled login or did not fully authorize.');
    }
});
});