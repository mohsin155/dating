$('body').on('click','#favorites-btn',function(){
        $(".bg-loader").addClass("show");
        users.addFavourite("#favorites-btn","profile",$("input[name=user_id]").val());
    });
    $('body').on('click','#favorites-rem',function(){
        $(".bg-loader").addClass("show");
        users.removeFavourite("#favorites-rem","profile",$("input[name=user_id]").val());
    });