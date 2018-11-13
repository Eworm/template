<?php

// Ajax callback for autocomplete
function wm_autocomplete() {

    $phrase = $_GET['phrase'];

    $args = array(
        "post_type" => array(
            "post"
        ),
        "s" => $phrase
    );
    $query = get_posts( $args );

    // Implement ajax function here
    header('Content-Type: application/json');

    $results = array();

    foreach($query as $post) : setup_postdata($post);
        $results[] = array(
          'permalink' => get_the_permalink($post->ID),
          'title' => get_the_title($post->ID)
        );
    endforeach;

    echo json_encode($results);

    wp_die();

}
add_action( 'wp_ajax_wm_autocomplete', 'wm_autocomplete' );    // If called from admin panel
add_action( 'wp_ajax_nopriv_wm_autocomplete', 'wm_autocomplete' );    // If called from front end
