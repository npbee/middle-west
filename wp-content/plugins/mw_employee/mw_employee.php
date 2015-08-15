<?php
   /*
   Plugin Name: Middle West Employee
   Description: Custom post type for creating and displaying employees on the 'About' page.
   Author: Nick Ball
   Author URI: http://npbee.me
    */



function get_employee_social_data($twitter_handle, $instagram_user_id) {

    $social = array();

    $tweets = getTweets(1, $twitter_handle);
    if(is_array($tweets)){
        foreach($tweets as $tweet) {
            if ($tweet['text']) {
                $the_tweet = $tweet['text'];
                if(is_array($tweet['entities']['user_mentions'])){
                    foreach($tweet['entities']['user_mentions'] as $key => $user_mention){
                        $the_tweet = preg_replace(
                            '/@'.$user_mention['screen_name'].'/i',
                            '<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank">@'.$user_mention['screen_name'].'</a>',
                            $the_tweet);
                    }

                    // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
                    if(is_array($tweet['entities']['hashtags'])){
                        foreach($tweet['entities']['hashtags'] as $key => $hashtag){
                            $the_tweet = preg_replace(
                                '/#'.$hashtag['text'].'/i',
                                '<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank">#'.$hashtag['text'].'</a>',
                                $the_tweet);
                        }
                    }

                    // iii. Links in Tweet text must be displayed using the display_url
                    //      field in the URL entities API response, and link to the original t.co url field.
                    if(is_array($tweet['entities']['urls'])){
                        foreach($tweet['entities']['urls'] as $key => $link){
                            $the_tweet = preg_replace(
                                '`'.$link['url'].'`',
                                '<a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a>',
                                $the_tweet);
                        }
                    }
                }
            }
        }
    }

    $social['tweet'] = $the_tweet;

    $instagram = get_instagram_post($instagram_user_id);
    $social['instagram'] = $instagram;

    return $social;
}


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
