<?php
    $posts = get_field('artist');
    if ($posts):
        foreach($posts as $p):
            $large_image = get_field('large_featured_image', $p->ID);
            $medium_image = get_field('medium_featured_image', $p->ID);
            $small_image = get_field('small_featured_image', $p->ID);

            $website_url = get_field('website_url', $p->ID);
            $twitter_url = get_field('twitter_url', $p->ID);
            $facebook_url = get_field('facebook_url', $p->ID);
            $instagram_url = get_field('instagram_url', $p->ID);

            $bio = get_field('bio', $p->ID);

            $per_page = 2;

            $album_pages = array_chunk(get_field('albums', $p->ID), $per_page);
            $video_pages = array_chunk(get_field('videos', $p->ID), $per_page);
            $booking_contacts = get_field('booking', $p->ID);
            $licensing_contacts = get_field('licensing', $p->ID);
            $publicity_contacts = get_field('publicity', $p->ID);
            $management_contacts = get_field('management', $p->ID);

            $stream = get_field('stream', $p->ID);
            $downloads = get_field('downloads', $p->ID);
            $press = get_field('press', $p->ID);
	    $alcove_bio = get_field('alcove_bio', $p->ID);
	    $linked_content = get_field('linked_content', $p->ID);
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
<?php if ( post_password_required() ) {
  echo get_the_password_form();
} else { ?>
        <article>
                <div class="header-image">
                    <h2 class="caption"><?php echo get_the_title($p->ID); ?></h2>
                    <div data-picture data-alt="<?php echo get_the_title($p->ID); ?>">
                        <div data-src="<?php echo $small_image['url'] ?>"></div>
                        <div data-src="<?php echo $medium_image['url'] ?>" data-media="(min-width: 480px)"></div>
                        <div data-src="<?php echo $large_image['url'] ?>" data-media="(min-width: 660px)"></div>
                        <!--[if lte IE 8]><div data-src="<?php echo $small_image['url'] ?>"></div><![endif]-->
                    </div>
                    <noscript>
                        <img src="<?php echo $small_image['url'] ?>" alt="<?php get_the_title($p->ID) ?>" />
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

                    <article class="stream">
                        <h2>STREAM</h2>
                        <hr>
                        <div>
                        <?php echo $stream ? $stream : "Coming Soon..."?>
                        </div>
                    </article>

                    <article class="press">
                        <h2>Press</h2>
                        <hr>
                        <div class="_expandable">
                        <?php echo $press ? $press : "Coming Soon..." ?>
                        </div>
                    </article>

                    <article class="bio">
                        <h2>Bio</h2>
                        <hr>
                        <div class="_expandable">
                            <?php echo $alcove_bio ? $alcove_bio : "Coming Soon..." ?>
                        </div>
                    </article>

                </section><!-- End main section -->

                <section class="col3of3">

                    <article class="">
                        <h2>Downloads</h2>
                        <hr>

                        <div class="">
                            <?php if (!empty($downloads)) {
                                foreach($downloads as $download) {
                                    $title = $download['file']['title'];
                                    $url = $download['file']['url'];
                            ?>
                        <a class="download-link" data-icon="&#x21;" href="<?php echo $url; ?>"><?php echo $title; ?></a>
                            <?php } } else echo "Coming Soon..." ?>
                        </div>

			<div class="">
                            <?php if (!empty($linked_content)) {
                                foreach($linked_content as $linked_content) {
                                    $title = $linked_content['file_name'];
                                    $url = $linked_content['url'];
                            ?>
                        <a class="download-link" data-icon="&#x21;" href="<?php echo $url; ?>" target="_blank"><?php echo $title; ?></a>
				<?php } } else echo "" ?>
                        </div>

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
                    <h2 class="main-head">Shows</h2><span class="sub-head"><a href="/shows/#<?php echo get_the_title($p->ID); ?>">Full Show List</a></span>
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
                        <?php foreach($management_contacts as $contact) { ?>
                        <div class="">
                            <h3>Management</h3>
                                <ul class="contacts">
                                    <li>
                                        <span><?php echo $contact['name']; ?></span>
                                        <span><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></span>
                                    </li>
                                </ul>
                        </div>
                        <?php } ?>
                        <?php foreach($licensing_contacts as $contact) { ?>
                        <div class="">
                            <h3>Licensing</h3>
                                <ul class="contacts">
                                    <li>
                                        <?php $separator = empty($contact['name']) ? ' ' : ': '; ?>
                                        <span><?php echo $contact['company'] . $separator . $contact['name']; ?></span>
                                        <span><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></span>
                                    </li>
                                </ul>
                        </div>
                        <?php } ?>
                        <?php foreach($publicity_contacts as $contact) { ?>
                        <div class="">
                            <h3>Publicity</h3>
                                <ul class="contacts">
                                    <li>
                                        <span><?php echo $contact['company'] . ': ' .  $contact['name']; ?></span>
                                        <span><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></span>
					<span><?php echo $contact['region']; ?></span>
                                    </li>
                                </ul>
                        </div>
                        <?php } ?>
                        <?php foreach($booking_contacts as $contact) { ?>
                        <div class="">
                            <h3>Booking</h3>
                                <ul class="contacts">
                                    <li>
                                        <span><?php echo $contact['company'] . ': ' .  $contact['name']; ?></span>
                                        <span><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></span>
					<span><?php echo $contact['region']; ?></span>
                                    </li>
                                </ul>
                        </div>
                        <?php } ?>
                    </article>

                </section> <!-- end sidebar -->




<?php } ?>
            </div> <!-- .main -->
        </div>
    </div>

<?php
    endforeach;
    endif;
    get_footer();
?>
