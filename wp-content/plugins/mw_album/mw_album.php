<?php
   /*
   Plugin Name: Middle West Album
   Description: Custom Post Type - Album
   Author: Nick Ball
   Author URI: http://npbee.me
    */
add_action("wp_ajax_my_user_vote", "my_user_vote");

function my_user_vote() {
    die('hello world');
}
?>
