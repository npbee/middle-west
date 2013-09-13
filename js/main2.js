var mwm = (function($, window, document) {

    //Get window width
    var         winWidth = $(window).width(),
                  $mobileNavButton = $(" #mobile__menu__button "),
                  $navUl = $(" nav ul "),
                  $subNavLink = $(' .sub-nav ul a');


    //Check for window width size
    var isDesk = function() {
        if (winWidth >= 768) {
            return true;
        } else {
            return false;
        }
    };


    //Mailing List
    var mailingList = function(email, oid) {

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if (email == "") {
            $('.error--invalid').fadeOut(300);
            $(".error--empty").fadeIn(300);
            $("input#email").focus();
            return false;
        }

        else if (!emailReg.test(email)) {
            $(".error--empty").fadeOut(100);
            $(".error--invalid").fadeIn(300);
            $("input#email").focus();
            return false;
        }

        var dataString = $('.mailing-list form').serialize();

        $.ajax({
            type: "POST",
            url: "../../php/mailing-list-submit.php",
            data: dataString,
            success: function() {
                var thanks = "<div class='thanks'>Thanks!</div>";
                $('.error').hide();
                $(thanks).hide().appendTo("footer").fadeIn(300).delay(1000).fadeOut(300);
                $('.mailing-list form').each(function() {
                    this.reset();
                });
            },
            error: function() {
                $('footer').append("<div class='submit-error error'>There was an error processing this</div>");
            }
        });
        return false;

    };

    /*****
    * Tumblr
    ******/
    var tumblr = {
        init: function(tag, page) {
            var     postCount,
                      readMore;

            if ( page == "home" ) {
                postCount = 5;
                readMore = "<a class='load-more-posts'>Load More Posts</a>";
            } else {
                postCount = 2;
                readMore = "<a class='load-more-posts' target='_blank' href='http://middlewestmgmt.tumblr.com/tagged/" + tag +"'>Read More Posts</a>";
            }

            this.getPosts(postCount, tag, readMore);
        },

        getPosts: function(postCount, tag, readMore) {
            $.ajax({
                type: 'GET',
                dataType: 'jsonp',
                url: 'http://api.tumblr.com/v2/blog/middlewestmgmt.tumblr.com/posts?api_key=5cHAhSpCdCiLOdeoWeJAAwCbqFUW4LCvfe9GxwVJXWcgUH4XSl&tag=' + tag,
                data: { get_param: 'value'},
                success: function(data) {
                    for (i = 0; i < postCount; i++) {
                        var full_date = data.response.posts[i].date;
                        var split_date = full_date.split('-');
                        var split_day = split_date[2].split(' ');
                        var year = split_date[0];
                        var month = split_date[1];
                        var day = split_day[0];
                        $('.news .news-feed').append(""+
                                "<article>"+
                                    "<h3 class='post-title'>"+
                                        data.response.posts[i].title +
                                    "</h3>" +

                                    "<div class='post-date'>" +
                                        month + '/' + day + '/' + year +
                                    "</div>"+
                                    "<div>" +
                                        data.response.posts[i].body +
                                    "</div>" +
                                    "<div class='post-meta'>tags: "+
                                        "<span><a target='_blank' href='http://tumblr.com/tagged/" + data.response.posts[i].tags + "''>" + data.response.posts[i].tags + "</span>" +
                                        "<span><a href=" + data.response.posts[i].post_url + " target='_blank'>permalink</a></span>" +
                                    "</div>" +
                                "</article>"
                            );
                        $('.news').fitVids();
                    }

                    $('.news .news-feed').append(readMore);
                    //$('.news .news-feed').append("<a class='load-more-posts' target='_blank' href='http://middlewestmgmt.tumblr.com/tagged/" + mwmTumblr.tag +"'>Read More Posts</a>");
                }
            });
        }
    }



    return {

        init: function() {
            console.log(isMobile());
        },

        colorbox: function() {
            if( isDesk() ) {
                $(" .colorbox ").colorbox({
                    rel: "group"
                });
                $(" .colorbox-iframe ").colorbox({
                    iframe: true,
                    width:"80%",
                    height:"80%",
                    rel: "group-videos",
                    transition: "none",
                    reposition: false
                });
            }
        },

        mobileAlbum: function() {
            if ( !isDesk() ) {

                $(" .thumb-container ").on('click', function(e) {
                    var albumInfo = $(this).next();
                    $(albumInfo).toggleClass("show");
                    e.preventDefault();
                });

                $(" .mobile-album-info-close ").on('click', function() {
                    $(" .mobile-album-info ").removeClass("show");
                });

            }
        },

        expander: function() {
            $(" .expandable ").expander({
                expandText: "more",
                userCollapseText: "less",
                expandSpeed: 400,
                collapseSpeed: 400,
                moreClass: "read-more",
                lessClass: "read-less",
                slicePoint: 800
            });
        },

        flexslider: function() {

            $(" .flexslider ").flexslider({
                animation: "slide",
                useCSS: true
            });

            // Flexsider for album thumbnails when count > 6
            $(" .flexslider-mini ").flexslider({
                animation: "slide",
                slideshow: false,
                useCSS: true
            });

        },

        lazyload: function() {
            $(" img.lazy ").unveil(500);
        },

        mobileNav: function() {

            $mobileNavButton.on("click", function(e) {
                $navUl.toggleClass('mobile__menu--open');
                e.preventDefault();
            });

            $subNavLink.on('click', function() {
                var  target = $(this).attr('href');
                $navUl.removeClass('mobile__menu--open');
                $('html, body').stop().animate({
                    'scrollTop': $(target).offset().top
                }, 400, 'swing', function() {
                    window.location.hash = target;
                });
            });

        },

        mailingList: function() {
            var email = $("input#email").val();
            var oid = $("#oid").val();

            $(' #submit ').on('click', function(e) {
                e.preventDefault();
                var email = $('input#email').val();
                var oid = $('#oid').val();
                mailingList(email, oid);
            });
        },

        scrollable: function() {
            $(" .news .scrollable ").scroll(function() {
                var elem = $(this);
                var scroll = $(this).scrollTop();

                //Add bottom border if actively scrolling
                if (scroll >= 1) {
                    $(this).parent().addClass("bordered").addClass('no-fade');
                } else {
                    $(this).parent().removeClass("bordered");
                }
            });
        },

        soundcloud: function() {
            if ( isDesk() ) {
                $.stratus({
                    links: 'https://soundcloud.com/middlewestmgmt/sets/middlewestmgmt-com'
                });
            }
        },

        tumblr: function() {
            var tag = mwmTumblr.tag;
            var page = $(' body ').attr('class');
            tumblr.init(tag, page);
        }
    };


}(window.jQuery, window, document));

$(function() {
    mwm.colorbox();
    mwm.mobileAlbum();
    mwm.expander();
    mwm.flexslider();
    mwm.lazyload();
    mwm.mobileNav();
    mwm.mailingList();
    mwm.scrollable();
    mwm.soundcloud();
    mwm.tumblr();
});

// $(function() {







// });