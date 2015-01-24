<?php 
    $large_image = get_field('large_featured_image');
    $medium_image = get_field('medium_featured_image');
    $small_image = get_field('small_featured_image');

    $website_url = get_field('website_url');
    $twitter_url = get_field('twitter_url');
    $facebook_url = get_field('facebook_url');
    $instagram_url = get_field('instagram_url');

    $bio = get_field('bio');
?>

<?php get_header(); ?>
<body class="">
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
                <div class="header-image">
                    <h2 class="caption"><?php the_title(); ?></h2>
                    <div data-picture data-alt="<?php the_title(); ?>">
                        <div data-src="<?php echo $small_image['url'] ?>"></div>
                        <div data-src="<?php echo $medium_image['url'] ?>" data-media="(min-width: 480px)"></div>
                        <div data-src="<?php echo $large_image['url'] ?>" data-media="(min-width: 660px)"></div>
                        <!--[if lte IE 8]><div data-src="<?php echo $small_image['url'] ?>"></div><![endif]-->
                    </div>
                    <noscript>
                        <img src="<?php echo $small_image['url'] ?>" alt="<?php the_title() ?>" />
                    </noscript>
                </div>

                <span class="social">
                    <?php if (!empty($website_url)) { ?>
                    <a class="icomoon" data-icon="&#xe000;" aria-hidden="true" href="<?php echo $website_url ?>" target="_blank"><span class="hide">website</span></a>
                    <? } ?>
                    <?php if (!empty($facebook_url)) { ?>
                    <a class="rondo" data-icon="&#x24;" href="<?php echo $facebook_url ?>"  target="_blank"><span class="hide">facebook</span></a>
                    <? } ?>
                    <?php if (!empty($twitter_url)) { ?>
                    <a class="rondo" data-icon="&#x22;" href="<?php echo $twitter_url ?>"  target="_blank"><span class="hide">twitter</span></a>
                    <? } ?>
                    <?php if (!empty($instagram_url)) { ?>
                    <a class="rondo" data-icon="&#x23;" href="<?php echo $instagram_url ?>"  target="_blank"><span class="hide">instagram</span></a>
                    <? } ?>
                </span>

            </article>
        <div class="main wrapper clearfix">
            <section class="col1_2of3">

                    <div class="news news--nofade">
                        <h2>News</h2>
                        <hr>
                        <div class="news-feed"></div>
                    </div>

                    <article class="bio">
                        <h2>Bio</h2>
                        <hr>
                        <div class="_expandable">
                            <?php echo $bio ?>
                        </div>
                    </article>

                </section><!-- End main section -->

                <section class="col3of3">

                    <article class="discography">
                        <h2>Discography</h2>
                        <hr>


                        <div class="flexslider-mini">
                            <ul class="slides">
                                <li>
                                    {% for album in page.albums limit:2 %}
                                        <div class="album_thumb col{% cycle '1', '2' %}of2">
                                            <div class="thumb-container">
                                                <a class="group colorbox" href="discography/{{ album.hash }}.html">
                                                    <img class="album-cover" src="{{ album.thumb-image }}" alt="{{ album.name }} cover" height="300" width="300" />
                                                </a>
                                            </div>

                                            <div class="mobile-album-info">
                                                <span class="mobile-album-info-close"></span>
                                                <h3>{{ album.name }} ({{ album.year }})</h3>
                                                <span class="album-label">{{ album.label }}</span>

                                                <div class="album-links">
                                                    <a class="icomoon" data-icon="&#xe001;" href="{{ album.spotify-link }}" target="_blank"><span class="hide">spotify</span></a>
                                                    <a class="rondo" data-icon="&#x26;" href="{{ album.itunes-link }}" target="_blank"><span class="hide">apple</span></a>
                                                    <a class="rondo" data-icon="&#x27;" href="{{ album.amazon-link }}" target="_blank"><span class="hide">amazon</span></a>
                                                </div>

                                            </div>
                                        </div>
                                    {% endfor %}
                                </li>
                                {% if page.album-count > 2 %}
                                <li>
                                    {% for album in page.albums limit:2 offset:2 %}
                                        <div class="album_thumb col{% cycle '1', '2' %}of2">
                                            <div class="thumb-container">
                                                <a class="group colorbox" href="discography/{{ album.hash }}.html">
                                                    <img class="album-cover" src="{{ album.thumb-image }}" alt="{{ album.name }} cover" height="300" width="300" />
                                                </a>
                                            </div>

                                            <div class="mobile-album-info">
                                                <span class="mobile-album-info-close"></span>
                                                <h3>{{ album.name }} ({{ album.year }})</h3>
                                                <span class="album-label">{{ album.label }}</span>

                                                <div class="album-links">
                                                    <a class="icomoon" data-icon="&#xe001;" href="{{ album.spotify-link }}" target="_blank"><span class="hide">spotify</span></a>
                                                    <a class="rondo" data-icon="&#x26;" href="{{ album.itunes-link }}" target="_blank"><span class="hide">apple</span></a>
                                                    <a class="rondo" data-icon="&#x27;" href="{{ album.amazon-link }}" target="_blank"><span class="hide">amazon</span></a>
                                                </div>

                                            </div>
                                        </div>
                                    {% endfor %}
                                </li>
                                {% endif %}
                                {% if page.album-count > 4 %}
                                <li>
                                    {% for album in page.albums limit:2 offset:4 %}
                                        <div class="album_thumb col{% cycle '1', '2' %}of2">
                                            <div class="thumb-container">
                                                <a class="group colorbox" href="discography/{{ album.hash }}.html">
                                                    <img class="album-cover" src="{{ album.thumb-image }}" alt="{{ album.name }} cover" height="300" width="300" />
                                                </a>
                                            </div>

                                            <div class="mobile-album-info">
                                                <span class="mobile-album-info-close"></span>
                                                <h3>{{ album.name }} ({{ album.year }})</h3>
                                                <span class="album-label">{{ album.label }}</span>

                                                <div class="album-links">
                                                    <a class="icomoon" data-icon="&#xe001;" href="{{ album.spotify-link }}" target="_blank"><span class="hide">spotify</span></a>
                                                    <a class="rondo" data-icon="&#x26;" href="{{ album.itunes-link }}" target="_blank"><span class="hide">apple</span></a>
                                                    <a class="rondo" data-icon="&#x27;" href="{{ album.amazon-link }}" target="_blank"><span class="hide">amazon</span></a>
                                                </div>

                                            </div>
                                        </div>
                                    {% endfor %}
                                </li>
                                {% endif %}
                                {% if page.album-count > 6 %}
                                <li>
                                    {% for album in page.albums limit:2 offset:6 %}
                                        <div class="album_thumb col{% cycle '1', '2' %}of2">
                                            <div class="thumb-container">
                                                <a class="group colorbox" href="discography/{{ album.hash }}.html">
                                                    <img class="album-cover" src="{{ album.thumb-image }}" alt="{{ album.name }} cover" height="300" width="300" />
                                                </a>
                                            </div>

                                            <div class="mobile-album-info">
                                                <span class="mobile-album-info-close"></span>
                                                <h3>{{ album.name }} ({{ album.year }})</h3>
                                                <span class="album-label">{{ album.label }}</span>

                                                <div class="album-links">
                                                    <a class="icomoon" data-icon="&#xe001;" href="{{ album.spotify-link }}" target="_blank"><span class="hide">spotify</span></a>
                                                    <a class="rondo" data-icon="&#x26;" href="{{ album.itunes-link }}" target="_blank"><span class="hide">apple</span></a>
                                                    <a class="rondo" data-icon="&#x27;" href="{{ album.amazon-link }}" target="_blank"><span class="hide">amazon</span></a>
                                                </div>

                                            </div>
                                        </div>
                                    {% endfor %}
                                </li>
                                {% endif %}
                            </ul>
                        </div>

                </article>

                <div class="videos">
                    <h2>Videos</h2>
                    <hr>
                        <div class="flexslider-mini">
                            <ul class="slides">
                                <li>
                                    {% for video in page.videos limit:2 %}
                                        <a class="group-videos colorbox-extContent" href="{{ video.embed-URL }}"><img src="{{ video.thumbnail }}" /></a>
                                    {% endfor %}
                                </li>
                                {% if page.video-count > 2 %}
                                <li>
                                    {% for video in page.videos limit:2 offset:2 %}
                                        <a class="group-videos colorbox-extContent" href="{{ video.embed-URL }}"><img src="{{ video.thumbnail }}" /></a>
                                    {% endfor %}
                                </li>
                                {% endif %}

                            </ul>
                        </div>
                </div>

                {% if page.shows == 1 %}

                    <article class="shows">
                        <h2 class="main-head">Shows</h2><span class="sub-head"><a href="/shows/#{{ page.hash}}">Full Show List</a></span>
                        <hr>
                        <div class="scroll">
                            <div id="shows" class="shows scrollable">
                                {{ page.bandsintown-widget }}
                            </div>
                        </div>
                    </article>

                    <!-- <article class="tweets">
                        <h2 class="main-head">Latest</h2>
                        <span class="sub-head"><a href="https://twitter.com/middlewestmgmt" target="_blank"><img src="../../img/icons/twitter-brand.png" /></a></span>
                        <hr>
                        <div class="">
                            <a class="twitter-timeline" href="https://twitter.com/{{ page.twitter-username }}" height="500" data-widget-id="{{ page.twitter-widgetid }}" data-chrome="noscrollbar nofooter noheader" data-tweet-limit="4">Tweets by @{{ page.twitter-username }}</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>
                    </article> -->

                {% else %}

                    <!-- <article>
                        <h2 class="main-head">Shows</h2><span class="sub-head"><a href="/shows/#{{ page.hash}}">Full Show List</a></span>
                        <hr>
                        <div class="scroll">
                            <div id="shows" class="shows scrollable">
                                {{ page.bandsintown-widget }}
                            </div>
                        </div>
                    </article> -->

                    <article class="tweets">
                        <h2 class="main-head">Latest</h2>
                        <span class="sub-head"><a href="https://twitter.com/{{ page.twitter-username }}" target="_blank"><img src="../../img/icons/twitter-brand.png" /></a></span>
                        <hr>
                        <div class="">
                            <a class="twitter-timeline" href="https://twitter.com/{{ page.twitter-username }}" height="500" data-widget-id="{{ page.twitter-widgetid }}" data-chrome="noscrollbar nofooter noheader" data-tweet-limit="5">Tweets by @{{ page.twitter-username }}</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                        </div>
                    </article>

                {% endif %}

                    <article class="contact">
                        <h2>Contact</h2>
                        <hr>
                        {% for contact in page.contact %}
                        <div class="__col{% cycle 'contact': '1', '2' %}of2">
                                <h3>{{ contact.type }}</h3>
                                <ul class="contacts">
                                    {% if contact.regions %}
                                        {% for region in contact.regions %}
                                        <li>
                                            <span>{{ region.region }} / {{ region.company }}: {{ region.name }}</span>
                                            <span><a href="mailto: {{ region.email }}">{{ region.email }}</a></span>
                                        </li>
                                        {% endfor %}

                                        {% else %}
                                        <li>
                                            <span>{% if contact.company %}{{ contact.company }}: {% endif %}{{ contact.name }}</span>
                                            <span><a href="mailto:{{ contact.email }}">{{ contact.email }}</a></span>
                                        </li>
                                    {% endif %}
                                </ul>
                        </div>

                        {% endfor %}
                    </article>

                </section> <!-- end sidebar -->




            </div> <!-- .main -->
        </div>
    </div>

<?php get_footer(); ?>
