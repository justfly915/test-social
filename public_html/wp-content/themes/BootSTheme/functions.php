<?php

/**
 * Настройка carbon fields
 */

// поля carbon fields для NEWS
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'test_social_news');
function test_social_news()
{
    Container::make('post_meta', 'Настройки новости')
        ->show_on_post_type('news')
        ->add_fields(array(
            Field::make('text', 'test_social_news_header', 'Заголовок')->set_required(true),
            Field::make('textarea', 'test_social_news_text', 'Текст новости')->set_required(true),
            Field::make('image', 'test_social_news_img', 'Картинка')
                ->set_value_type( 'url'),
            Field::make('date', 'crb_event_start_date', 'Дата новости'),
        ));
}

add_action('carbon_fields_register_fields', 'test_social_products');
function test_social_products()
{
    Container::make('post_meta', 'Настройки продукта')
        ->show_on_post_type('products')
        ->add_fields(array(
            Field::make('text', 'test_social_products_header', 'Название')
                ->set_required(true),
            Field::make('textarea', 'test_social_products_text', 'Описание'),
            Field::make('media_gallery', 'test_social_products_gallery', 'Галерея')
                ->set_type('image')
                ->set_duplicates_allowed(false),
            Field::make('complex', 'test_social_products__complect', 'Комплектация')
                ->add_fields(array(
                    Field::make('text', 'test_social_products_item_name', 'Наименование'),
                )),
            Field::make('select', 'test_social_products_brands', 'Производитель')
                ->add_options(array(
                    'Apple' => 'Apple',
                    'Google' => 'Google',
                    'Xiaomi' => 'Xiaomi',
                )),
            Field::make('text', 'test_social_products_price', 'Стоимость')
                ->set_required(true)
                ->set_attribute('type', 'number'),
        ));
}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once ABSPATH . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
}

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
        'publicly_queryable' => true,
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
        'publicly_queryable' => true,
    );

    register_post_type('products', $args);
}


/**
 * Обрезает строку до определённого количества символов не разбивая слова.
 * Поддерживает многобайтовые кодировки.
 * @param string $str строка
 * @param int $length длина, до скольки символов обрезать
 * @param string $postfix постфикс, который добавляется к строке
 * @param string $encoding кодировка, по-умолчанию 'UTF-8'
 * @return string обрезанная строка
 */
function mbCutString($str, $length, $postfix='...', $encoding='UTF-8')
{
    if (mb_strlen($str, $encoding) <= $length) {
        return $str;
    }

    $tmp = mb_substr($str, 0, $length, $encoding);
    return mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $encoding), $encoding) . $postfix;
}