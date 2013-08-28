$(function() {

/*****
* Flexslider
******/
$(" .flexslider ").flexslider({
    animation: "slide"
});

// Flexsider for album thumbnails when count > 6
$(" .flexslider-albums ").flexslider({
    animation: "slide",
    slideshow: false
});


/*****
* Mailing List Signup
******/
$("#submit").click(function() {

    var email = $("input#email").val();
    var oid = $("#oid").val();
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
});


/*****
* Scrollable Sections
******/
// Check inner content height for scrollable sections
var scrollableContentHeight = $(" .scrollable ").innerHeight();

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
        $(this).parent().addClass("bordered").addClass('no-fade');
    } else {
        $(this).parent().removeClass("bordered");
    }

});


/*****
* Soundcloud
******/
var width = $(window).width();

if (width>= 768) {

        $.stratus({
            links: 'https://soundcloud.com/middlewestmgmt/sets/middlewestmgmt-com'
        });

}


/*****
* Tumblr API
******/
if (width >= 728) {
    $.ajax({
        type: 'GET',
        dataType: 'jsonp',
        url: 'http://api.tumblr.com/v2/blog/middlewestmgmt.tumblr.com/posts?api_key=5cHAhSpCdCiLOdeoWeJAAwCbqFUW4LCvfe9GxwVJXWcgUH4XSl&tag=' + mwmTumblr.tag,
        data: { get_param: 'value'},
        success: function(data) {
            for (i = 0; i <= 9; i++) {
                var full_date = data.response.posts[i].date;
                var split_date = full_date.split('-');
                var split_day = split_date[2].split(' ');
                var year = split_date[0];
                var month = split_date[1];
                var day = split_day[0];
                $('.news .scrollable').append(""+
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
            $('.news .scrollable').append("<a class='load-more-posts'>Load More Posts</a>");
        }
    });
} else {
    $.ajax({
        type: 'GET',
        dataType: 'jsonp',
        url: 'http://api.tumblr.com/v2/blog/middlewestmgmt.tumblr.com/posts?api_key=5cHAhSpCdCiLOdeoWeJAAwCbqFUW4LCvfe9GxwVJXWcgUH4XSl&tag=' + mwmTumblr.tag,
        data: { get_param: 'value'},
        success: function(data) {
            for (i = 0; i <= 2; i++) {
                var full_date = data.response.posts[i].date;
                var split_date = full_date.split('-');
                var split_day = split_date[2].split(' ');
                var year = split_date[0];
                var month = split_date[1];
                var day = split_day[0];
                $('.news .scrollable').append(""+
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
            }
            $('.news .scrollable').append("<a class='load-more-posts'>Load More Posts</a>");
        }
    });
}

//load more posts
$('.load-more-posts').live('click', function() {
    var     postCount = $('.news article').length,
              offset = postCount
              $this = $(this);
    $(this).append("<span class='loading'><img src='/img/misc/loading.gif' >");
    $.ajax({
        type: 'GET',
        dataType: 'jsonp',
        url: 'http://api.tumblr.com/v2/blog/middlewestmgmt.tumblr.com/posts?api_key=5cHAhSpCdCiLOdeoWeJAAwCbqFUW4LCvfe9GxwVJXWcgUH4XSl&offset='+ offset + '&tag=' + mwmTumblr.tag,
        data: { get_param: 'value'},
        success: function(data) {
            for (i = 0; i <= 5; i++) {
                var full_date = data.response.posts[i].date;
                var split_date = full_date.split('-');
                var split_day = split_date[2].split(' ');
                var year = split_date[0];
                var month = split_date[1];
                var day = split_day[0];
                $('.news .scrollable').append(""+
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
                $this.fadeOut();
            }
            $('.news .scrollable').append("<a class='load-more-posts'>Load More Posts</a>");
        }
    });
});


});