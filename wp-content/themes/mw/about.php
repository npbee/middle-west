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
                    'order' => 'ASC'
                );
                $loop = new WP_Query($args);
                while ($loop -> have_posts() ) : $loop->the_post();

                $index = $loop -> current_post === 3 ? 0 : $loop -> current_post;
                $photo = get_field('photo');
                $office = get_field('office');
                $twitter_handle = get_field('twitter_handle');
                $instagram_handle = get_field('instagram_handle');
                $clients = get_field('client_list');

                //$instagram_user_id = get_field('instagram_user_id');
                //$social = get_employee_social_data($twitter_handle, $instagram_user_id);
                //$instagram = $social['instagram'];
                //$low_res = ($instagram -> images -> low_resolution -> url);
                //$standard_res = ($instagram -> images -> standard_resolution -> url);
                //$thumb = ($instagram -> images -> thumbnail -> url);
                //$instagram_link = $instagram -> link; 
                
            ?>
            <div class="js-profile-card profile-card-v1 col<?php echo ($index + 1); ?>of3">
                <span class="profile-card__close"></span>
                <div class="profile-card__photo-wrapper">
                    <div class="profile-card__photo__image">
                        <img class="" src="<?php echo empty($photo['url']) ? '' : $photo['url']; ?>" />
                    </div>
                    <div class="profile-card__hidden">
                        <h4 class="profile-card__client-list-header">Clients</h4>
                        <ul class="profile-card__client-list">
                            <?php if ($clients): ?>
                            <?php foreach($clients as $client): ?>
                            <li>
                                <a href="<?php echo get_permalink($client->ID); ?>"><?php echo get_the_title($client->ID); ?></a>
                            </li>
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
                    <span class="twitter-branding "><a href="https://twitter.com/<?php echo $twitter_handle; ?>" target="_blank"><img class="branding-icon" src="<?php bloginfo('template_url'); ?>/img/icons/twitter-brand.png" alt="twitter logo" /></a></span>
                    <span class="instagram-branding"><a href="https://instagram.com/<?php echo $instagram_handle; ?>" target="_blank"><img class="branding-icon" src="<?php bloginfo('template_url'); ?>/img/icons/instagram-brand--black.png" alt="instagram logo" /></a></span>
                </div>
            </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>

<?php get_footer(); ?>
