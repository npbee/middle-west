<?php
   /*
   Plugin Name: Middle West Album
   Description: Ajax actions for displaying an album from the color box plugin
   Author: Nick Ball
   Author URI: http://npbee.me
    */
add_action("wp_ajax_open_album_lightbox", "open_album_lightbox");

function open_album_lightbox() {
    $post_id = $_REQUEST['post_id'];
    $args = array(
        'post_type' => 'artist',
        'p' => $post_id
    );
    $post = new WP_Query($args);

    while ($post -> have_posts()): $post->the_post();
        $albums = get_field('albums');
        die(var_dump($albums));
    endwhile;

    //if ($query -> have_posts()) {
        //die('true');
    //} else {
        //die('false');
    //}
}
?>
