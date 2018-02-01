/**
 * Created by AXEL DJAHA on 30/01/2017.
 */
$(document).ready(function(){
    $(window).scroll(function() {
        $(".slideanim").each(function(){
            var pos = $(this).offset().top;

            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
                $(this).addClass("slide");
            }
        });
    });

})