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
                            <?php 
                                $args = array(
                                    'post_type' => 'artist',
                                    'orderby' => 'title',
                                    'order' => 'ASC',
                                    'posts_per_page' => '-1'
                                );
                                $loop = new WP_Query($args);
                                while ($loop -> have_posts()): $loop->the_post();
                            ?>
                            <li><a href="#<?php echo the_title(); ?>"><?php echo the_title(); ?></a></li>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            ?>
                            </ul>
                    </li>
                </ul>
            </nav>

        </header>
    </div>

    <div class="main-container">
        <div class="main wrapper clearfix">
            <?php while($loop -> have_posts()) : $loop->the_post(); ?>
                <article id="<?php echo the_title(); ?>">
                <h2><?php echo the_title(); ?></h2>
                <hr>

                <div class="scroll">
                    <div id="shows" class="shows">
                    <?php the_field('bands_in_town_widget'); ?>
                    </div>
                </div>

            </article>
            <?php endwhile; ?>
        </div>
    </div>

<?php get_footer(); ?>
