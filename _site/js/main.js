// runs the slider across the site
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});

$(document).ready(function(){
    // fits iframe videos to fluid column widths
    $("div.main").fitVids();

    $("img.lazy").lazyload();

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

    //Album cover flips
    $('.album-block img').click(function() {
        $(this).parent().parent().toggleClass('flipped');
    });

    $.localScroll({
        hash: true,
        duration: 400
    });

    //Soundcloud player
    $(window).load(function() {
        var width = $(window).width();
        if (width < 960) {
            $.stratus({
                links: 'https://soundcloud.com/middlewestmgmt/sets/middlewestmgmt-com',
                stats: false
            });
            $(".share").css("display", "none");
        } else {
            $.stratus({
                links: 'https://soundcloud.com/middlewestmgmt/sets/middlewestmgmt-com'
            });
        }
    });
    
    //Colorbox
    $('.colorbox-inline').colorbox({
        inline: true,
        //width: "50%",
        rel: 'group'
    });
    $('.colorbox-iframe').colorbox({
        iframe: true,
        width:"80%",
        height:"80%"
    });

});



