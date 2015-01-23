<?php
   /*
   Plugin Name: Middle West Artist
   Description: Custom Post Type - Artist
   Author: Nick Ball
   Author URI: http://npbee.me
    */
add_action('init', 'create_artist');

function create_artist() {
    register_post_type( 'artist',
        array(
            'labels' => array(
                'name' => 'Artists',
                'singular_name' => 'Artist',
                'add_new' => 'Add New',
                'add_new_item' => 'Add a New Artist',
                'edit' => 'Edit',
                'edit_item' => 'Edit Artist',
                'new_item' => 'New Artist',
                'view' => 'View',
                'view_item' => 'View Artist',
                'search_items' => 'Search Artists',
                'not_found' => 'No Artists Found',
                'not_found_in_trash' => 'No Artists Found in Trash',
                'parent' => 'Parent Artist'
            ),

            'public' => true,
            'menu_position' => 15,
            'rewrite' => array('slug' => 'artists'),
            'supports' => array( 'title'),
            'taxonomies' => array( '' ),
            'has_archive' => true
        )
    );
} 
?>
