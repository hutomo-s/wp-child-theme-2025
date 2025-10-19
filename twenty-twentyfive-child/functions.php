<?php
/**
 * Enqueue parent and child theme styles and the logo replacement script.
 */

function twentytwentyfive_child_enqueue_styles() {
    // Parent theme stylesheet
    wp_enqueue_style( 'twentytwentyfive-parent', get_template_directory_uri() . '/style.css' );

    // Child theme stylesheet
    wp_enqueue_style( 'twentytwentyfive-child', get_stylesheet_directory_uri() . '/style.css', array('twentytwentyfive-parent') );

    // Register and enqueue replacement JS
    wp_register_script( 'tt25-logo-replace', get_stylesheet_directory_uri() . '/assets/js/logo-replace.js', array(), '1.0', true );

    // Pass the logo URL to JS
    $logo_url = get_stylesheet_directory_uri() . '/logo-hutomo-id.png';
    wp_localize_script( 'tt25-logo-replace', 'TT25_CHILD_LOGO_URL', $logo_url );
    wp_enqueue_script( 'tt25-logo-replace' );
}
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_styles' );
?>
