var mwm=function(e,t,n){var r=e(t).width(),s=e(" #mobile__menu__button "),o=e(" nav ul "),u=e(" .sub-nav ul a"),a=function(){return r>=768?!0:!1},f=function(t,n){var r=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;if(t==""){e(".error--invalid").fadeOut(300);e(".error--empty").fadeIn(300);e("input#email").focus();return!1}if(!r.test(t)){e(".error--empty").fadeOut(100);e(".error--invalid").fadeIn(300);e("input#email").focus();return!1}var i=e(".mailing-list form").serialize();e.ajax({type:"POST",url:"../../php/mailing-list-submit.php",data:i,success:function(){var t="<div class='thanks'>Thanks!</div>";e(".error").hide();e(t).hide().appendTo("footer").fadeIn(300).delay(1e3).fadeOut(300);e(".mailing-list form").each(function(){this.reset()})},error:function(){e("footer").append("<div class='submit-error error'>There was an error processing this</div>")}});return!1},l={init:function(e,t){var n,r;if(t=="home"&&a()){n=5;r="<a class='load-more-posts'>Load More Posts</a>"}else if(t=="home"){n=3;r="<a class='load-more-posts'>Load More Posts</a>"}else{n=2;r="<a class='read-more-posts' target='_blank' href='http://middlewestmgmt.tumblr.com/tagged/"+e+"'>Read More Posts</a>"}this.getPosts(n,e,r)},getPosts:function(t,n,r){var i=e(".news article").length,s;e.ajax({type:"GET",dataType:"jsonp",url:"http://api.tumblr.com/v2/blog/middlewestmgmt.tumblr.com/posts?api_key=5cHAhSpCdCiLOdeoWeJAAwCbqFUW4LCvfe9GxwVJXWcgUH4XSl&offset="+i+"&limit="+t+"&tag="+n,data:{get_param:"value"},success:function(e){l.display(e,0,t,r)}})},display:function(t,n,r,i){for(var s=0;s<r;s++)(function(n){var r=t.response.posts[n].date,i=r.split("-"),o=i[2].split(" "),u=i[0],a=i[1],f=o[0],l=t.response.posts[n].tags;e(".news .news-feed").append(function(){var r=e("<article/>"),i=e("<h3/>",{"class":"post-title",text:t.response.posts[n].title}),o=e("<div/>",{"class":"post-date",text:a+"/"+f+"/"+u}),c=e("<div/>",{html:t.response.posts[n].body}),h=e("<div/>",{"class":"post-meta"});e.each(l,function(e,r){h.append("<span><a target='_blank' href='http://middlewestmgmt.tumblr.com/tagged/"+t.response.posts[n].tags[e]+"''>"+t.response.posts[n].tags[e]+"</span>")});var p=e("<span/>",{html:"<span><a href="+t.response.posts[s].post_url+" target='_blank'>permalink</a></span>"});h.append(p);r.append(i);r.append(o);r.append(c);r.append(h);return r});e(".news").fitVids({customSelector:"iframe[src*='nbc.com']"})})(s);e(".news .news-feed").append(i)},loadMore:function(t){e(".load-more-posts").live("click",function(){var t=e(".news article").length,n=t+1,r=e(this),s;e(this).addClass("loading");e.ajax({type:"GET",dataType:"jsonp",url:"http://api.tumblr.com/v2/blog/middlewestmgmt.tumblr.com/posts?api_key=5cHAhSpCdCiLOdeoWeJAAwCbqFUW4LCvfe9GxwVJXWcgUH4XSl&offset="+n+"&tag="+mwmTumblr.tag,data:{get_param:"value"},success:function(t){if(t.response.blog.posts-n<=5){s="";console.log("true")}else s="<a class='load-more-posts'>Load More Posts</a>";for(i=0;i<5;i++){(function(n){var r=t.response.posts[n].date,s=r.split("-"),o=s[2].split(" "),u=s[0],a=s[1],f=o[0],l=t.response.posts[n].tags;e(".news .news-feed").append(function(){var r=e("<article/>"),s=e("<h3/>",{"class":"post-title",text:t.response.posts[n].title}),o=e("<div/>",{"class":"post-date",text:a+"/"+f+"/"+u}),c=e("<div/>",{html:t.response.posts[n].body}),h=e("<div/>",{"class":"post-meta"});e.each(l,function(e,r){h.append("<span><a target='_blank' href='http://middlewestmgmt.tumblr.com/tagged/"+t.response.posts[n].tags[e]+"''>"+t.response.posts[n].tags[e]+"</span>")});var p=e("<span/>",{html:"<span><a href="+t.response.posts[i].post_url+" target='_blank'>permalink</a></span>"});h.append(p);r.append(s);r.append(o);r.append(c);r.append(h);return r});e(".news").fitVids({customSelector:"iframe[src*='nbc.com']"})})(i);r.addClass("destroy")}e(".news").fitVids({customSelector:"iframe[src*='nbc.com']"});e(".news .scrollable").append(s)}})})}};return{init:function(){console.log(isMobile())},colorbox:function(){if(a()){e(" .colorbox ").colorbox({rel:"group",returnFocus:!1});e(" .colorbox-extContent ").colorbox({iframe:!0,width:"80%",height:"80%",rel:"group-videos",transition:"none",reposition:!1})}},mobileAlbum:function(){if(!a()){e(" .thumb-container ").on("click",function(t){var n=e(this).next();e(n).toggleClass("show");t.preventDefault()});e(" .mobile-album-info-close ").on("click",function(){e(" .mobile-album-info ").removeClass("show")})}},expander:function(){e(" .expandable ").expander({expandText:"more",userCollapseText:"less",expandSpeed:400,collapseSpeed:400,moreClass:"read-more",lessClass:"read-less",slicePoint:800})},flexslider:function(){e(" .flexslider ").flexslider({animation:"slide",useCSS:!0});e(" .flexslider-mini ").flexslider({animation:"slide",slideshow:!1,useCSS:!0,start:function(){mwm.colorbox()}})},lazyload:function(){e(" img.lazy ").unveil(500)},mobileNav:function(){s.on("click",function(e){o.toggleClass("mobile__menu--open");e.preventDefault()});u.on("click",function(){var n=e(this).attr("href");o.removeClass("mobile__menu--open");e("html, body").stop().animate({scrollTop:e(n).offset().top},400,"swing",function(){t.location.hash=n})})},mailingList:function(){var t=e("input#email").val(),n=e("#oid").val();e(" #submit ").on("click",function(t){t.preventDefault();var n=e("input#email").val(),r=e("#oid").val();f(n,r)})},scrollable:function(){e(" .news .scrollable ").scroll(function(){var t=e(this),n=e(this).scrollTop();n>=1?e(this).parent().addClass("bordered").addClass("no-fade"):e(this).parent().removeClass("bordered")})},soundcloud:function(){a()&&e.stratus({links:"https://soundcloud.com/middlewestmgmt/sets/middlewestmgmt-com"})},tumblr:function(){var t=mwmTumblr.tag,n=e(" body ").attr("class");l.init(t,n);l.loadMore()}}}(window.jQuery,window,document);$(function(){mwm.colorbox();mwm.mobileAlbum();mwm.expander();mwm.flexslider();mwm.lazyload();mwm.mobileNav();mwm.mailingList();mwm.scrollable();mwm.soundcloud();mwm.tumblr()});