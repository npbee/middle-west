<?php 
    //require('../../wordpress/wp-blog-header.php');
    define('WP_USE_THEMES', false);
    require('./wp-blog-header.php');
    $id = $_GET['artist'];
    $album = $_GET['album'];
    $args = array(
        'p' => 'artist'
    );

    
?>
<div class="album-container">
    <img class="album-cover" src="{{ album.full-image }}" alt="{{ album.name }} cover" height="600" width="600" />

    <h3>{{ album.name }} ({{ album.year }})</h3>
    <span class="album-label">{{ album.label }}</span>

    <div class="album-links">
        {% if album.spotify-link %}<a class="icomoon" data-icon="&#xe001;" href="{{ album.spotify-link }}" target="_blank"><span class="hide">spotify</span></a>{% endif %}
        {% if album.itunes-link %}<a class="rondo" data-icon="&#x26;" href="{{ album.itunes-link }}" target="_blank"><span class="hide">apple</span></a>{% endif %}
        {% if album.amazon-link %}<a class="rondo" data-icon="&#x27;" href="{{ album.amazon-link }}" target="_blank"><span class="hide">amazon</span></a>{% endif %}
    </div>
</div>
