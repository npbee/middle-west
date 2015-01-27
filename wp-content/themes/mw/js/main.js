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
            if ( page == "home" && isDesk() ) {
                postCount = 5;
                readMore = "<a class='load-more-posts'>Load More Posts</a>";
            } else if ( page == "home" ) {
                postCount = 3;
                readMore = "<a class='load-more-posts'>Load More Posts</a>";
            } else {
                postCount = 2;
                readMore = "<a class='read-more-posts' target='_blank' href='http://middlewestmgmt.tumblr.com/tagged/" + tag +"'>Read More Posts</a>";
            }

            this.getPosts(postCount, tag, readMore);
        },

        getPosts: function(postCount, tag, readMore) {

            var     offset = $('.news article').length,
                      count;

            $.ajax({
                type: 'GET',
                dataType: 'jsonp',
                url: 'http://api.tumblr.com/v2/blog/middlewestmgmt.tumblr.com/posts?api_key=5cHAhSpCdCiLOdeoWeJAAwCbqFUW4LCvfe9GxwVJXWcgUH4XSl&offset=' + offset + '&limit=' + postCount + '&tag=' + tag,
                data: { get_param: 'value'},
                success: function(data) {
                    tumblr.display(data, 0, postCount, readMore);
                }
            });
        },

        display: function(data, offset, postCount, readMore) {

            for ( var i = 0; i < postCount; i++) {
                (function(n) {
                    var full_date = data.response.posts[n].date;
                    var split_date = full_date.split('-');
                    var split_day = split_date[2].split(' ');
                    var year = split_date[0];
                    var month = split_date[1];
                    var day = split_day[0];
                    var tags = data.response.posts[n].tags;

                    $('.news .news-feed').append(function() {
                        var $container = $('<article/>');

                        var $title = $('<h3/>', {
                            class: 'post-title',
                            text: data.response.posts[n].title
                        });

                        var $date = $('<div/>', {
                            class: 'post-date',
                            text: month + '/' + day + '/' + year
                        });

                        var $body = $('<div/>', {
                            html: data.response.posts[n].body
                        });

                        var $tags = $('<div/>', {
                            class: 'post-meta'
                        });

                        $.each(tags, function(t, item) {
                            $tags.append("<span><a target='_blank' href='http://middlewestmgmt.tumblr.com/tagged/" + data.response.posts[n].tags[t] + "''>" + data.response.posts[n].tags[t] + "</span>");
                        });

                        var $permalink = $('<span/>', {
                            html: "<span><a href=" + data.response.posts[i].post_url + " target='_blank'>permalink</a></span>"
                        });

                        $tags.append($permalink);

                        $container.append($title);
                        $container.append($date);
                        $container.append($body);
                        $container.append($tags);

                        return $container;
                    });

                    $('.news').fitVids({
                        customSelector: "iframe[src*='nbc.com']"
                    });
                })(i);
            }
            $('.news .news-feed').append(readMore);
        },

        loadMore: function(tag) {
            $('.load-more-posts').live('click', function() {
                var     postCount = $('.news article').length,
                          offset = postCount + 1,
                          $this = $(this),
                          readmore;
                //$(this).append("<span class='loading'><img src='/img/misc/loading.gif' >");
                $(this).addClass('loading');
                $.ajax({
                    type: 'GET',
                    dataType: 'jsonp',
                    url: 'http://api.tumblr.com/v2/blog/middlewestmgmt.tumblr.com/posts?api_key=5cHAhSpCdCiLOdeoWeJAAwCbqFUW4LCvfe9GxwVJXWcgUH4XSl&offset='+ offset + '&tag=' + mwmTumblr.tag,
                    data: { get_param: 'value'},
                    success: function(data) {
                        if ( data.response.blog.posts - offset <= 5 ) {
                            readmore = "";
                            console.log("true");
                        } else {
                            readmore = "<a class='load-more-posts'>Load More Posts</a>";
                        }
                        for (i = 0; i < 5; i++) {
                            (function(n) {
                            var full_date = data.response.posts[n].date;
                            var split_date = full_date.split('-');
                            var split_day = split_date[2].split(' ');
                            var year = split_date[0];
                            var month = split_date[1];
                            var day = split_day[0];
                            var tags = data.response.posts[n].tags;

                            $('.news .news-feed').append(function() {
                                var $container = $('<article/>');

                                var $title = $('<h3/>', {
                                    class: 'post-title',
                                    text: data.response.posts[n].title
                                });

                                var $date = $('<div/>', {
                                    class: 'post-date',
                                    text: month + '/' + day + '/' + year
                                });

                                var $body = $('<div/>', {
                                    html: data.response.posts[n].body
                                });

                                var $tags = $('<div/>', {
                                    class: 'post-meta'
                                });

                                $.each(tags, function(t, item) {
                                    $tags.append("<span><a target='_blank' href='http://middlewestmgmt.tumblr.com/tagged/" + data.response.posts[n].tags[t] + "''>" + data.response.posts[n].tags[t] + "</span>");
                                });

                                var $permalink = $('<span/>', {
                                    html: "<span><a href=" + data.response.posts[i].post_url + " target='_blank'>permalink</a></span>"
                                });

                                $tags.append($permalink);

                                $container.append($title);
                                $container.append($date);
                                $container.append($body);
                                $container.append($tags);

                                return $container;
                            });

                            $('.news').fitVids({
                                customSelector: "iframe[src*='nbc.com']"
                            });
                        })(i);
                            //$this.fadeOut();
                            $this.addClass('destroy');
                        }
                        $('.news').fitVids({
                            customSelector: "iframe[src*='nbc.com']"
                        });
                        $('.news .scrollable').append(readmore);
                    }
                });
            });

        }
    };



    return {

        init: function() {
            console.log(isMobile());
        },

        colorbox: function() {
            if( isDesk() ) {
                $(" .colorbox ").colorbox({
                    rel: "group",
                    returnFocus: false
                });
                $(" .colorbox-extContent ").colorbox({
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
                useCSS: true,
                start: function() {
                    mwm.colorbox();
                }
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
            tumblr.loadMore();
        },

        profile: function() {
            var profiles = $('.js-profile-card');
            profiles.each(function(index, profile) {
                var twitterHandle = $(this).attr('data-twitter-handle');
                var instagramHandle = $(this).attr('data-instagram-handle');
                console.log(twitterHandle, instagramHandle);
            });
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
    mwm.profile();
});

