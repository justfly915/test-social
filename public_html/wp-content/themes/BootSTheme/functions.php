<?php
/**
 * Подключение стилей и скриптов
 */
function test_social_scripts()
{
    wp_enqueue_style('test-social_bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css'); // bootstrap css
    wp_enqueue_style('test-social_style', get_stylesheet_uri()); // главный файл стилей

    wp_enqueue_script('test-social__bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js');
}
add_action('wp_enqueue_scripts', 'test_social_scripts');