<?php 
/*
Template Name: Shows
 */
?>

<?php get_header(); ?>
<body class="shows">
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
                    <li class="sub-nav">
                        <a href="#" id="mobile__menu__button" class="mobile__menu__button icomoon" data-icon="&#x21;"><span>Shows</span></a>
                            <ul>
                                <li><a  href="#bon-iver" >Bon Iver</a></li>
                                <li><a  href="#gayngs" >Gayngs</a></li>
                                <li><a  href="#polica" >Poliça</a></li>
                                <li><a  href="#s-carey" >S. Carey</a></li>
                                <li><a  href="#solid-gold" >Solid Gold</a></li>
                                <li><a  href="#supreme-cuts" >Supreme Cuts</a></li>
                                <li><a  href="#the-4onthefloor" >The 4onthefloor</a></li>
                                <li><a  href="#the-farewell-circuit" >The Farewell Circuit</a></li>
                                <li><a  href="#the-shouting-matches" >The Shouting Matches</a></li>
                                <li><a  href="#volcano-choir" >Volcano Choir</a></li>
                            </ul>
                    </li>
                </ul>
            </nav>

        </header>
    </div>

    <div class="main-container">
        <div class="main wrapper clearfix">
            <article id="bon-iver">
                <h2>Bon Iver</h2>
                <hr>

                <div class="scroll">
                    <div id="shows" class="shows">
                        <script async type='text/javascript' src='http://www.bandsintown.com/javascripts/bit_widget.js'></script><a href="http://www.bandsintown.com/Bon&Iver" class="bit-widget-placeholder" data-artist="Bon Iver" data-separator-color="#d9d9d9" data-facebook-comments="false" data-link-color="#0989b8" data-force-narrow-layout="true"></a>
                    </div>
                </div>

            </article>
        </div>
    </div>

<?php get_footer(); ?>
