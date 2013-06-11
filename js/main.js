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
        var elem = $(this);
        var scroll = $(this).scrollTop();

        //Add bottom border if actively scrolling
        if (scroll >= 1) {
            $(this).parent().addClass('bordered');
        } else {
            $(this).parent().removeClass('bordered');
        }

        //remove fade if scrolled to the bottom of the section
        if ( elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight() ) {
            $(this).parent().addClass('no-fade');
        } else {
            $(this).parent().removeClass('no-fade');
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
                height:"80%",
                rel: 'group-videos'
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



