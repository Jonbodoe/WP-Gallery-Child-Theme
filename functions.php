<?php

/**
 * WP Gallery functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Gallery
 */
if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

function enqueue_parent_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css', array(), _S_VERSION);
}
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function enqueue_bootstrap()
{
    wp_enqueue_style('enqueue_bootstrap', get_theme_file_uri('./node_modules/bootstrap/dist/css/bootstrap.min.css'));
    wp_enqueue_script('enqueue_bootstrap', get_theme_file_uri('./node_modules/bootstrap/dist/js/bootstrap.js'), array('jquery'), '', true);
    wp_enqueue_style('enqueque_bootstrap', get_theme_file_uri('./styles.css'));
}

add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

function register_my_menu()
{
    register_nav_menu('footer-menu', __('Footer menu'));
}
add_action('init', 'register_my_menu');

function enqueue_custom_styles()
{
    wp_enqueue_style('mytheme-custom', get_theme_file_uri('/custom.css'));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

function register_social_menu() { 
    register_nav_menu('social-links',__('Social Links')); 
} 
add_action('init', 'register_social_menu');