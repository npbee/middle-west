$(document).ready(function(){$(".flexslider").flexslider({animation:"slide"});$("div.main").fitVids();$("img.lazy").lazyload({effect:"fadeIn",threshold:200});$(".expandable").expander({expandText:"more",userCollapseText:"less",expandSpeed:400,collapseSpeed:400,moreClass:"read-more",lessClass:"read-less",slicePoint:800});$(".news .scrollable").scroll(function(){var e=$(this),t=$(this).scrollTop();t>=1?$(this).parent().addClass("bordered"):$(this).parent().removeClass("bordered");e[0].scrollHeight-e.scrollTop()==e.outerHeight()?$(this).parent().addClass("no-fade"):$(this).parent().removeClass("no-fade")});var e=$(window).width();if(e>=768){$.stratus({links:"https://soundcloud.com/middlewestmgmt/sets/middlewestmgmt-com"});$(".colorbox").colorbox({rel:"group"});$(".colorbox-iframe").colorbox({iframe:!0,width:"80%",height:"80%"})}else{$(".colorbox").click(function(){var e=$(this).parent().next();$(e).toggleClass("show");return!1});$(".mobile-album-info-close").click(function(){$(".mobile-album-info").removeClass("show")})}});