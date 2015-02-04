<?php
   /*
   Plugin Name: Middle West Album
   Description: Ajax actions for displaying an album from the color box plugin
   Author: Nick Ball
   Author URI: http://npbee.me
    */
add_action("wp_ajax_open_album_lightbox", "open_album_lightbox");
add_action("wp_ajax_nopriv_open_album_lightbox", "open_album_lightbox");

function open_album_lightbox() {
    $post_id = $_REQUEST['post_id'];
    $provided_album = $_REQUEST['album'];

    $args = array(
        'post_type' => 'artist',
        'p' => $post_id
    );
    $post = new WP_Query($args);

    function findAlbum($id, $array) {
        $id = urldecode($id);
        $id = stripslashes($id);
        foreach ($array as $key => $val) {
            if ($val['album_name'] === $id) {
                return $key;
            }
        }
        return null;
    }

    while ($post -> have_posts()): $post->the_post();
        $albums = get_field('albums');
        $album_index = findAlbum($provided_album, $albums);
        $album = $albums[$album_index];
        ?>
        <div class="album-container">
            <img class="album-cover" src="<?php echo $album['full_image']['url'] ?>" alt="<?php echo $album['album_name']; ?>" height="600" width="600" />

            <h3><?php echo $album['album_name'] . ' (' . $album['release_year'] . ')' ?></h3>
            <span class="album-label"><?php echo $album['label']; ?></span>

            <div class="album-links">
            <?php if (!empty($album['spotify_link'])) { ?>
                <a class="icomoon" data-icon="&#xe001;" href="<?php echo $album['spotify_link']; ?>" target="_blank"><span class="hide">spotify</span></a>
            <?php } ?>
            <?php if (!empty($album['itunes_link'])) { ?>
                <a class="rondo" data-icon="&#x26;" href="<?php echo $album['itunes_link']; ?>" target="_blank"><span class="hide">apple</span></a>
            <?php } ?>
            <?php if (!empty($album['itunes_link'])) { ?>
                <a class="rondo" data-icon="&#x27;" href="<?php echo $album['amazon_link']; ?>" target="_blank"><span class="hide">amazon</span></a>
            <?php } ?>
        </div>
        </div>
    <?php 
    endwhile;
        die();
}
?>
