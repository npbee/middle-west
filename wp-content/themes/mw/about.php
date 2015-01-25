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
                    'post_type' => 'employee'
                );
                $loop = new WP_Query($args);
                while ($loop -> have_posts() ) : $loop->the_post();
                $photo = get_field('photo');
                $role = get_field('position');
                $office = get_field('office');
                $about_fact = get_field('about_fact');
                $twitter_widget = get_field('twitter_widget');
            ?>
            <div class="profile-card col<?php echo ($current_post + 1); ?>of2">
                <a class="profile-card__image">
                    <img class="" src="<?php echo $photo['url']; ?>" />
                    <h3 class="profile-card__name"><?php the_title(); ?></h3>
                </a>
                <p class="profile-card__fact"><?php echo $about_fact; ?></p>
                <p class="profile-card__location"><?php echo $office; ?></p>
                <?php echo $twitter_widget; ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

<?php get_footer(); ?>
