<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title( ' | ', true, 'right' ); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <script type="text/javascript">
          (function() {
            var config = {
              kitId: 'dlk5zoz',
              scriptTimeout: 3000
            };
            var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
          })();
        </script>

        <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>favicon.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_url'); ?>/apple-touch-icon-144x144-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_url'); ?>/apple-touch-icon-114x114-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_url'); ?>/apple-touch-icon-72x72-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/apple-touch-icon-precomposed.png" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
        <!--[if lte IE 8]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css"><![endif]-->

        <script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.6.1.min.js"></script>
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
