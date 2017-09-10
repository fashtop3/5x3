    
$(document).ready(function(){
    
    /* MAKE NAVBAR CHANGE COLOR ON SCROLL */
    $(window).on("scroll",function(){
    var wn = $(window).scrollTop();
    if(wn > 10){
        $(".navbar").css("background","#333333");
        $(".navbar").css("color","#FFF");
        $(".navbar").css("opacity","0.9");
    }
    else{
        $(".navbar").css("background","#999");
        $(".navbar").css("opacity","0.7");
    }
    });
    /* MAKE NAVBAR CHANGE COLOR ON SCROLL */

    
});
