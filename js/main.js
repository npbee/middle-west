$(document).ready(function(){

/********************************************
* Lazyload images
*********************************************/
$(" img.lazy ").lazyload({
    effect: "fadeIn",
    threshold: 1000
});

/********************************************
* Flexslider
*********************************************/
$(" .flexslider ").flexslider({
    animation: "slide"
});

    // Flexsider for album thumbnails when count > 6
    $(" .flexslider-albums ").flexslider({
        animation: "slide",
        slideshow: false
    });

/********************************************
* Fitvids
*********************************************/
$(" div.main ").fitVids();


/********************************************
* Expandable sections
*********************************************/
$(" .expandable ").expander({
    expandText: "more",
    userCollapseText: "less",
    expandSpeed: 400,
    collapseSpeed: 400,
    moreClass: "read-more",
    lessClass: "read-less",
    slicePoint: 800
});

/********************************************
* Alcove mobile menu
*********************************************/
$(" #mobile__menu__button ").click(function() {
    $("nav ul").toggleClass("mobile__menu--open");
    return false;
});


/********************************************
* Scrollable sections
*********************************************/

// Check inner content height for scrollable sections
var scrollableContentHeight = $(" .scrollable ").innerHeight();
console.log(scrollableContentHeight);

// If less than 500, collapse and remove overflow prop
if ( scrollableContentHeight <= 500 ) {
    $(" .scrollable ").css("overflow-y", "auto");
} else {
    $(" .scrollable ").css("overflow-y", "scroll");
}

// Add faded element when scrolling
$(" .news .scrollable ").scroll(function() {
    var elem = $(this);
    var scroll = $(this).scrollTop();

    //Add bottom border if actively scrolling
    if (scroll >= 1) {
        $(this).parent().addClass("bordered");
    } else {
        $(this).parent().removeClass("bordered");
    }

    //remove fade if scrolled to the bottom of the section
    if ( elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight() ) {
        $(this).parent().addClass("no-fade");
    } else {
        $(this).parent().removeClass("no-fade");
    }
    
});


/********************************************
* Soundcloud player
* Colorbox
* Check window width and disable for small screens
*********************************************/
var width = $(window).width();

if ((width>= 768)) {
        //Souncloud player
        $.stratus({
            links: 'https://soundcloud.com/middlewestmgmt/sets/middlewestmgmt-com'
        });
        //Colorbox
        $(" .colorbox ").colorbox({
            rel: "group"
        });
        $(" .colorbox-iframe ").colorbox({
            iframe: true,
            width:"80%",
            height:"80%",
            rel: "group-videos"
        });
} else {
    $(" .colorbox ").click(function() {
        var info = $(this).parent().next();
        $(info).toggleClass("show");
        return false;
    });
    $(" .mobile-album-info-close ").click(function() {
        $(" .mobile-album-info ").removeClass("show");
    });
}

});



