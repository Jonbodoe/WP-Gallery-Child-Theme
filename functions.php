<?php
/**
 * WP Gallery functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Gallery
 */

function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_bootstrap() { 
    wp_enqueue_style('enqueue_bootstrap', get_theme_file_uri('./node_modules/bootstrap/dist/css/bootstrap.min.css')); 
    wp_enqueue_script('enqueue_bootsrap',  get_theme_file_uri('./node_modules/bootstrap/dist/js/bootstrap.min.js'));
} 

add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

function enqueue_custom_styles(){
    wp_enqueue_style( 'mytheme-custom', get_theme_file_uri('/custom.css'));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
// function your_theme_enqueue_scripts() {
//     // all styles
//     wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css', array(), 20141119 );
//     wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/css/style.css', array(), 20141119 );
//     // all scripts
//     wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20120206', true );
//     wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20120206', true );
// }
// add_action( 'wp_enqueue_scripts', 'your_theme_enqueue_scripts' );

