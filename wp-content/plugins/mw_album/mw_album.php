<?php
   /*
   Plugin Name: Middle West Album
   Description: Custom Post Type - Album
   Author: Nick Ball
   Author URI: http://npbee.me
    */
add_action('init', 'create_album');

function create_album() {
    register_post_type( 'album',
        array(
            'labels' => array(
                'name' => 'Albums',
                'singular_name' => 'Album',
                'add_new' => 'Add New',
                'add_new_item' => 'Add a New Album',
                'edit' => 'Edit',
                'edit_item' => 'Edit Album',
                'new_item' => 'New Album',
                'view' => 'View',
                'view_item' => 'View Album',
                'search_items' => 'Search Albums',
                'not_found' => 'No Albums Found',
                'not_found_in_trash' => 'No Albums Found in Trash',
                'parent' => 'Parent Album'
            ),

            'public' => true,
            'menu_position' => 15,
            'rewrite' => array('slug' => 'albums'),
            'supports' => array( 'title'),
            'taxonomies' => array( '' ),
            'has_archive' => true
        )
    );
} 
?>
