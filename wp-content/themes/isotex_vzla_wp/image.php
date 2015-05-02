<?php
global $post;
$post_parent = $post->post_parent;
if ( $post_parent ){
    wp_redirect(get_permalink($post_parent));
} else {
    $home_url = home_url();
    wp_redirect( $home_url);
}
?>