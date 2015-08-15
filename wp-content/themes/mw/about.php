<?php 
/*
Template Name: About
 */
?>

<?php get_header(); ?>
<body class="about">
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
        <div class="main wrapper clearfix">
            <h2>About</h2>
            <p>Middle West is an artist management firm founded on the acute quiet of Midwestern work ethic. Independently strong since 2010, Middle West is dedicated to fostering good music and the musicians who make it in the most professional and diverse of ways within the ever-changing landscape of its industry.  With offices in Minneapolis, MN, Brooklyn, NY, and Durham, NC, Middle West also offers label and business management services to its artists.</p>

            <p>Co-founded by Kyle Frenette on the strength and experience of Bon Iver, Middle West began as just an idea on how to structure a new type of artist management firm. It has since grown into an evolving experiment that’s mission is to cultivate the next generation of artist managers. Middle West strives to establish a collaborative and professional environment for its managers to flourish, perfect their skills and provide the absolute best services they can for their artists. This is accomplished by way of a shared brain trust between all managers and personnel as well as Middle West’s atypical linear business model in which all members of the greater team are encouraged to contribute, learn and grow alongside each other and as a whole within the firm.</p>

            <blockquote><i>"That's my middle-west--not the wheat of the prairies or the lost Swede towns but the thrilling, returning trains of my youth and the street lamps of sleigh bells in the frosty dark and the shadows of holly wreaths thrown by lighten windows on the snow.  I am part of that. . . "</i> <br /><span style="float:right"><b>-F. Scott Fitzgerald</b></span></blockquote>
            
            <br /><br />

            <h2>Team</h2>
            <?php 
                $args = array(
                    'post_type' => 'employee',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'posts_per_page' => '-1'
                );
                $index = 0;
                $loop = new WP_Query($args);
                while ($loop -> have_posts() ) : $loop->the_post();

                $_index = $loop->current_post;
                if ($_index % 3 == 0) {
                    $index = 1;
                } else {
                    $index++;
                }

                $photo = get_field('photo');
                $office = get_field('office');
                $twitter_handle = get_field('twitter_handle');
                $instagram_handle = get_field('instagram_handle');
                $clients = get_field('client_list');

            ?>
            <div class="js-profile-card profile-card-v1 col<?php echo $index; ?>of3">
                <span class="profile-card__close"></span>
                <div class="profile-card__photo-wrapper">
                    <div class="profile-card__photo__image">
                        <img class="" src="<?php echo empty($photo['url']) ? '' : $photo['url']; ?>" />
                    </div>
                    <div class="profile-card__hidden">
                        <h3 class="profile-card__client-list-header">Artists</h3>
                        <ul class="profile-card__client-list">
                            <?php if ($clients): ?>
                            <?php foreach($clients as $client): ?>
                            <li><?php echo get_the_title($client->ID); ?></li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <h3 class="profile-card__name"><?php the_title(); ?></h3>
                <p class="profile-card__location">
                    <?php echo $office; ?>
                </p>
                <div class="profile-card__social">
                    <a class="rondo" data-icon="&#x22;" href="https://twitter.com/<?php echo $twitter_handle; ?>" target="_blank"><span class="hide">twitter</span></a>
                    <a class="rondo" data-icon="&#x23;" href="http://instagram.com/<?php echo $instagram_handle; ?>" target="_blank"><span class="hide">instagram</span></a>
                </div>
            </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>

<?php get_footer(); ?>