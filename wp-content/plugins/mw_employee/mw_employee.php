<?php
   /*
   Plugin Name: Middle West Employee
   Description: Custom post type for creating and displaying employees on the 'About' page.
   Author: Nick Ball
   Author URI: http://npbee.me
    */
add_action('init', 'create_employee');

function create_employee() {
    register_post_type( 'employee',
        array(
            'labels' => array(
                'name' => 'Employees',
                'singular_name' => 'Employee',
                'add_new' => 'Add New',
                'add_new_item' => 'Add a New Employee',
                'edit' => 'Edit',
                'edit_item' => 'Edit Employee',
                'new_item' => 'New Employee',
                'view' => 'View',
                'view_item' => 'View Employee',
                'search_items' => 'Search Employees',
                'not_found' => 'No Employees Found',
                'not_found_in_trash' => 'No Employees Found in Trash',
                'parent' => 'Parent Employee'
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
