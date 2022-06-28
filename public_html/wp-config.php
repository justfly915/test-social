<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'justfly915' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'justfly915' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'rkjygisd*Xep8swi' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+0,+|>k:5Jk;B9[jrLecen~wFnC-L4pM`q~f-aLq*0$5^qWI_a.*K3itA;QW{OlA' );
define( 'SECURE_AUTH_KEY',  '-M!1k#vilN_3?C!Wafkkpm=qze&%G_pzX-6E#AYBbS>j|Q_htmx tsHlgaw`5->F' );
define( 'LOGGED_IN_KEY',    'S/:|mn4a5r %~{*BhI$zr`Fz9)hk+PVG>f;@Pu;x]7Jw8W,Fw=pfw#?xyLSKWPRM' );
define( 'NONCE_KEY',        'j+jB_[XE0|a5j2}!h`(RhUQ3W07G8H&78>Yy,i,aD$K}%{7luRl6qIJSAhroLb3$' );
define( 'AUTH_SALT',        'XD#oe3?vA/LEf;+.^pB}$;IvR`W{;I2CJf^++t2t7H>g>%Qh1TG ]<6&@^~:wHk_' );
define( 'SECURE_AUTH_SALT', 'q2>lmJg>)n_yO%I[hU{nxN-y]-~b>+LFE{qwOzd.1)duV0yxD2<Kd Z/1&0tq+z]' );
define( 'LOGGED_IN_SALT',   'Mh,Q{amH&h9LA:e9x)!cN.i|~&]Yd+XG4Q.S{P0T{i&h6Y.9_N>pE)_pIc.Flp=T' );
define( 'NONCE_SALT',       '<cVB=jOv:6*Z?J@Wj):{BTOM#uBygp^dl|7[S7Tv`-JazZ`5N122=p{A*m~/X?SU' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
