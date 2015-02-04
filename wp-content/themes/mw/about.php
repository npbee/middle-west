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
            <p>Middle West is an artist management firm dedicated to managing musicians as best it can in the most professional and diverse of ways within the ever-changing music industry. Founded by Kyle Frenette in 2010, Middle West specializes in artists' career development and business management.</p>
            
            <h2>Employees</h2>
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

                $_index = $wp_query->current_post;
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
                        <h3 class="profile-card__client-list-header">Clients</h3>
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
