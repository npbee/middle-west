<?php
   /*
   Plugin Name: Middle West Alcove
   Description: Custom Post Type - Alcove
   Author: Nick Ball
   Author URI: http://npbee.me
    */
add_action('init', 'create_alcove');

function create_alcove() {
    register_post_type( 'alcove',
        array(
            'labels' => array(
                'name' => 'Alcove',
                'singular_name' => 'Alcove',
                'add_new' => 'Add New',
                'add_new_item' => 'Add a New Alcove',
                'edit' => 'Edit',
                'edit_item' => 'Edit Alcove',
                'new_item' => 'New Alcove',
                'view' => 'View',
                'view_item' => 'View Alcove',
                'search_items' => 'Search Alcove',
                'not_found' => 'No Alcove Found',
                'not_found_in_trash' => 'No Alcove Found in Trash',
                'parent' => 'Parent Alcove'
            ),

            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title'),
            'taxonomies' => array( '' ),
            'has_archive' => true
        )
    );
} 
?>
