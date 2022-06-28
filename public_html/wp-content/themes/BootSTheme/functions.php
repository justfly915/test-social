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

/*
кастомный пост Новость
 */
add_action('init', 'test_social_register_post_type_news');

function test_social_register_post_type_news()
{

    $labels = array(
        'name' => 'Новости',
        'singular_name' => 'Новость',
        'add_new' => 'Добавить новость',
        'add_new_item' => 'Добавить новость',
        'edit_item' => 'Редактировать новость',
        'new_item' => 'Новая новость',
        'all_items' => 'Все новости',
        'search_items' => 'Искать новости',
        'not_found' => 'Новостей по заданным критериям не найдено.',
        'not_found_in_trash' => 'Не найдено в корзине',
        'menu_name' => 'Новости',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'has_archive' => false,
        'menu_icon' => 'dashicons-welcome-widgets-menus',
        'menu_position' => 2,
        'supports' => array('title', 'editor'),
    );

    register_post_type('news', $args);
}
/*
кастомный пост Продукт
 */
add_action('init', 'test_social_register_post_type_products');

function test_social_register_post_type_products()
{

    $labels = array(
        'name' => 'Продукты',
        'singular_name' => 'Продукт',
        'add_new' => 'Добавить продукт',
        'add_new_item' => 'Добавить продукт',
        'edit_item' => 'Редактировать продукт',
        'new_item' => 'Новый продукт',
        'all_items' => 'Все продукты',
        'search_items' => 'Искать продукты',
        'not_found' => 'Продуктов по заданным критериям не найдено.',
        'not_found_in_trash' => 'Не найдено в корзине',
        'menu_name' => 'Продукты',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'has_archive' => false,
        'menu_icon' => 'dashicons-products',
        'menu_position' => 3,
        'supports' => array('title', 'editor'),
    );

    register_post_type('products', $args);
}
