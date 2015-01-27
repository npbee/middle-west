<?php
   /*
   Plugin Name: Middle West Instagram API Client
   Description: Fetches most recent media by user
   Author: Nick Ball
   Author URI: http://npbee.me
    */

    function get_instagram_post($user_id) {
        $str = '';
        $result = wp_remote_get('https://api.instagram.com/v1/users/' . $user_id . '/media/recent/?client_id=f93a7e7b66234c048fae01970c48ab7d&count=1');

        $result = json_decode($result['body']);
        $main_array = array();

        return $result -> data[0];
    }
?>
