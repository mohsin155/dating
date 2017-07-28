$('body').on('click','#favorites-btn',function(){
        $(".bg-loader").addClass("show");
        users.addFavourite("#favorites-btn","profile",$("input[name=user_id]").val());
    });
    $('body').on('click','#favorites-rem',function(){
        $(".bg-loader").addClass("show");
        users.removeFavourite("#favorites-rem","profile",$("input[name=user_id]").val());
    });
    
    $("#sendEmailBtn").on('click',function(e){
        e.preventDefault();
    var user_id = $('#emailreplyform').find("input[name=to]").val();
    var basepath = $("input[name=basepath]").val();
    $.ajax({
        type: 'POST',
        url: basepath+'/message/send-message-popup',
        async: false,
        data: $("#emailreplyform").serialize(),
        success: function () {
            $.ajax({
            type: 'GET',
            url: basepath+'/message/popup-message/'+user_id,
            async: false,
            success: function (data) {
                //alert(data);
                $('.message-popup').html(data);
            }
        });
        }
    });
});