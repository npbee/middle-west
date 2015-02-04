<?php 
    $large_image = get_field('large_featured_image');
    $medium_image = get_field('medium_featured_image');
    $small_image = get_field('small_featured_image');

    $website_url = get_field('website_url');
    $twitter_url = get_field('twitter_url');
    $facebook_url = get_field('facebook_url');
    $instagram_url = get_field('instagram_url');

    $bio = get_field('bio');

    $per_page = 2;

    $album_pages = array_chunk(get_field('albums'), $per_page);
    $video_pages = array_chunk(get_field('videos'), $per_page);
    $booking_contacts = get_field('booking');
    $licensing_contacts = get_field('licensing');
    $publicity_contacts = get_field('publicity');
    $management_contacts = get_field('management');

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
                            <?php echo $bio ? $bio : "Coming Soon..." ?>
                        </div>
                    </article>

                </section><!-- End main section -->

                <section class="col3of3">

                    <article class="discography">
                        <h2>Discography</h2>
                        <hr>

                        <?php if (count($album_pages)) { ?>
                        <div class="flexslider-mini">
                            <ul class="slides">
                                <?php 
                                    foreach($album_pages as $page) { 
                                ?>
                                <li> 
                                    <?php 
                                        foreach($page as $index=>$album) {
                                        $link = admin_url('admin-ajax.php?action=open_album_lightbox&post_id=' . get_the_id() . '&album=' . urlencode($album['album_name']));
                                    ?>
                                        <div class="album_thumb col<?php echo ($index + 1) ?>of2">
                                            <div class="thumb-container">
                                            <a class="group colorbox" href="<?php echo $link; ?>">
                                                <img class="album-cover" src="<?php echo $album['thumbnail']['url']; ?>" alt="<?php echo $album['album_name'] ?>" height="300" width="300" />
                                                </a>
                                            </div>

                                            <div class="mobile-album-info">
                                                <span class="mobile-album-info-close"></span>
                                                <h3><?php echo $album['album_name']; ?> (<?php echo $album['release_year']; ?>)</h3>
                                                <span class="album-label"><?php echo $album['label']; ?></span>

                                                <div class="album-links">
                                                    <a class="icomoon" data-icon="&#xe001;" href="<?php echo $album['spotify_link']; ?>" target="_blank"><span class="hide">spotify</span></a>
                                                    <a class="rondo" data-icon="&#x26;" href="<?php echo $album['itunes_link']; ?>" target="_blank"><span class="hide">apple</span></a>
                                                    <a class="rondo" data-icon="&#x27;" href="<?php echo $album['amazon_link']; ?>" target="_blank"><span class="hide">amazon</span></a>
                                                </div>

                                            </div>
                                        </div>
                                    <?php } ?>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } else echo "Coming Soon..." ?>

                </article>

                <div class="videos">
                    <h2>Videos</h2>
                    <hr>
                        <?php if (count($video_pages)) { ?>
                        <div class="flexslider-mini">
                            <ul class="slides">
                                <?php 
                                    foreach($video_pages as $page) { 
                                ?>
                                <li>
                                    <?php 
                                        foreach($page as $index=>$video) {
                                    ?>
                                        <a class="group-videos colorbox-extContent" href="<?php echo $video['embed_url']; ?>"><img src="<?php echo $video['thumbnail']; ?>" /></a>
                                    <?php } ?>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } else echo "Coming Soon..." ?>
                </div>

                <?php if (get_field('show_bandsintown_widget')) { ?>
                    <article class="shows">
                    <h2 class="main-head">Shows</h2><span class="sub-head"><a href="/shows/#<?php echo the_title(); ?>">Full Show List</a></span>
                        <hr>
                        <div class="scroll">
                            <div id="shows" class="shows scrollable">
                                <?php the_field('bands_in_town_widget'); ?>
                            </div>
                        </div>
                    </article>
                <?php } ?>

                <?php if (get_field('show_twitter_widget')) { ?>
                    <article class="tweets">
                        <h2 class="main-head">Latest</h2>
                        <span class="sub-head"><a href="<?php echo get_field('twitter_url'); ?>" target="_blank"><img class="branding-icon" src="<?php bloginfo('template_url'); ?>/img/icons/twitter-brand.png" /></a></span>
                        <hr>
                        <div class="">
                            <?php the_field('twitter_widget'); ?>
                        </div>
                    </article>
                <?php } ?>


                    <article class="contact">
                        <h2>Contact</h2>
                        <hr>
                            <?php if (empty($management_contacts) && 
                                    empty($licensing_contacts) &&
                                    empty($publicity_contacts) &&
                                    empty($booking_contacts)) {
                                        echo "Coming Soon...";
                                }
                            ?>
                        <?php if (!empty($management_contacts)) { ?>
                        <div class="">
                            <h3>Management</h3>
                                <ul class="contacts">
                                    <?php foreach($management_contacts as $contact) { ?>
                                    <li>
                                        <span><?php echo $contact['name']; ?></span>
                                        <span><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></span>
                                    </li>
                                    <?php } ?>
                                </ul>
                        </div>
                        <?php } ?>
                        <?php if (!empty($licensing_contacts)) { ?>
                        <div class="">
                            <h3>Licensing</h3>
                                <ul class="contacts">
                                    <?php foreach($licensing_contacts as $contact) { ?>
                                    <li>
                                        <?php $separator = empty($contact['name']) ? ' ' : ': '; ?>
                                        <span><?php echo $contact['company'] . $separator . $contact['name']; ?></span>
                                        <span><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></span>
                                    </li>
                                    <?php } ?>
                                </ul>
                        </div>
                        <?php } ?>
                        <?php if (!empty($publicity_contacts)) { ?>
                        <div class="">
                            <h3>Publicity</h3>
                                <ul class="contacts">
                                    <?php foreach($publicity_contacts as $contact) { ?>
                                    <li>
                                        <span><?php echo $contact['region'] .  ' / ' . $contact['company'] . ': ' .  $contact['name']; ?></span>
                                        <span><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></span>
                                    </li>
                                    <?php } ?>
                                </ul>
                        </div>
                        <?php } ?>
                        <?php if (!empty($booking_contacts)) { ?>
                        <div class="">
                            <h3>Booking</h3>
                                <ul class="contacts">
                                    <?php foreach($booking_contacts as $contact) { ?>
                                    <li>
                                        <span><?php echo $contact['region'] .  ' / ' . $contact['company'] . ': ' .  $contact['name']; ?></span>
                                        <span><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></span>
                                    </li>
                                    <?php } ?>
                                </ul>
                        </div>
                        <?php } ?>
                    </article>

                </section> <!-- end sidebar -->




            </div> <!-- .main -->
        </div>
    </div>

<?php get_footer(); ?>
