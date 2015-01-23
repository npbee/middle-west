<?php 
/*
Template Name: Home
 */
?>

<?php get_header(); ?>
<body class="home">
    <!--[if lt IE 9]>
        <p class="chromeframe">You are using an outdated browser. <a href="http:/browsehappy.com/">Upgrade your browser today</a> or <a href="http:/www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

    <div class="header-container">
        <header class="clearfix">

            <div class="logo-container">
                <a href="/">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Middle West Management" class="logo">
                </a>
            </div>

            <nav>
                <ul>
                    <!-- <li class="selected"><a href="index">Home</a></li> -->
                    <li><a class="about-nav" href="/about">About</a></li>
                    <li><a class="artists-nav" href="/artists">Artists</a></li>
                    <li><a class="shows-nav" href="/shows">Shows</a></li>
                </ul>
            </nav>

        </header>
    </div>

    <div class="main-container">
        <article>
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <a href="artists/bon-iver">
                            <h2 class="caption">Bon Iver</h2>
                            <div data-picture data-alt="Bon Iver">
                                <div data-src="<?php bloginfo('template_url'); ?>/img/artists/bon-iver/featured/featured-boniver-s.jpg"></div>
                                <div data-src="<?php bloginfo('template_url'); ?>/img/artists/bon-iver/featured/featured-boniver-m.jpg" data-media="(min-width: 480px)"></div>
                                <div data-src="<?php bloginfo('template_url'); ?>/img/artists/bon-iver/featured/featured-boniver-l.jpg" data-media="(min-width: 660px)"></div>
                                <!--[if lte IE 8]><div data-src="<?php bloginfo('template_url'); ?>/img/artists/bon-iver/featured/featured-boniver-l.jpg"></div><![endif]-->
                            </div>
                            <noscript>
                                <img src="<?php bloginfo('template_url'); ?>/img/artists/bon-iver/featured/featured-boniver-s.jpg" alt="Bon Iver">
                            </noscript>
                        </a>
                    </li>
                </ul>
            </div>
        </article>

        <div class="main wrapper clearfix">

            <div class="news col1_2of3">
                <h1>News</h1>
                <hr>
                <div class="scrollable news-feed"></div>
            </div>

            <div class="tweets col3of3">
                <h1>Latest</h1>
                <span class="twitter-branding"><a href="https://twitter.com/middlewestmgmt" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/icons/twitter-brand.png" alt="twitter logo" /></a></span>
                <hr>
                <div class="scrollable">
                    <a class="twitter-timeline" href="https://twitter.com/middlewestmgmt" data-widget-id="323618451409207297" data-chrome="noheader nofooter noscrollbar" height="500" data-tweet-limit="5">Tweets by @middlewestmgmt</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>

            </div> <!-- #main -->

        </div>
    </div>

<?php get_footer(); ?>
