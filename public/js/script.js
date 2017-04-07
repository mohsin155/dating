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