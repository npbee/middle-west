<?php 

?>

<?php get_header(); ?>
<body class="artists">
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
            <article>
    <ul class="artist-list">
    <?php 
    $index = 0;
    if (have_posts()) : 
        query_posts('post_type=artist&orderby=title&order=ASC&posts_per_page=-1');
        while (have_posts()) : the_post();
        $_index = $wp_query->current_post;
        if ($_index % 3 == 0) {
            $index = 1;
        } else {
            $index++;
        }
        $image = get_field('medium_featured_image');
    ?>
        <li class="col<?php echo $index; ?>of3"><a href="<?php echo get_permalink(); ?>">
        <h2 class="caption"><?php echo the_title(); ?></h2>
        <img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?php echo $image['url'] ?>" alt="<?php echo the_title(); ?>"></a>
        </li>
    <?php
        endwhile; endif;
    ?>
    </ul>
</article>
        </div>
    </div>

<?php get_footer(); ?>
