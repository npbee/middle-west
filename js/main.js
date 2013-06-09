$(document).ready(function(){

    $('.flexslider').flexslider({
        animation: "slide"
    });

    // fits iframe videos to fluid column widths
    $("div.main").fitVids();

    $("img.lazy").lazyload({
        effect: "fadeIn",
        threshold: 200
    });

    // Expandable sections
    $('.expandable').expander({
        expandText: "more",
        userCollapseText: "less",
        expandSpeed: 400,
        collapseSpeed: 400,
        moreClass: "read-more",
        lessClass: "read-less",
        slicePoint: 800
    });

    $('.news .scrollable').scroll(function() {
        var scroll = $(this).scrollTop();
        console.log(scroll);
        if (scroll >= 1) {
            $(this).parent().addClass('bordered');
        } else {
            $(this).parent().removeClass('bordered');
        }
    });

    var width = $(window).width();

    if ((width>= 768)) {
            //Souncloud player
            $.stratus({
                links: 'https://soundcloud.com/middlewestmgmt/sets/middlewestmgmt-com'
            });
            //Colorbox
            $('.colorbox').colorbox({
                rel: 'group'
            });
            $('.colorbox-iframe').colorbox({
                iframe: true,
                width:"80%",
                height:"80%"
            });
    } else {
        $('.colorbox').click(function() {
            var info = $(this).parent().next();
            $(info).toggleClass('show');
            return false;
        });
        $('.mobile-album-info-close').click(function() {
            $('.mobile-album-info').removeClass('show');
        });
    }

});



