<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', "tenhundreds2");


/** MySQL database username */
define('DB_USER', "root");

/** MySQL database password */
define('DB_PASSWORD', "root");


/** Имя сервера MySQL */
define('DB_HOST', "localhost");
define('WPCF7_AUTOP', false );

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');


/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Ib6a+z?,-L1et&w*|@7B#W[cT0WYLMQ_pv( bX`7B#Bzr`;2;~$(jD9L%$H#^BGk');

define('SECURE_AUTH_KEY',  '*imCD9G1U|J`u/-)0CVD@fB(ClpqR:8 E}cGMz7[jh&Fc{8jub%-_vXEsUFnwT*<');

define('LOGGED_IN_KEY',    '3]-^:/{&tVOZ[Rb{uGN2kpm*/S|q@o>k]4JHv{sTGbsiK@{v%Ws]dlXN?bbDx@IT');

define('NONCE_KEY',        'P`L4X7SiP8^j&,g|<B7w1>G^JwCIeaw!2lhR|%I36bp:wK3p*]T?n1ecnVW*SG v');

define('AUTH_SALT',        'SA)Wc0dVHRylbiGLbNIqnmQY-WJuamqXd9?c~>t@21_B&]#3y4~TbtX:`-%ABL0x');

define('SECURE_AUTH_SALT', ';SA?:>x)m=e!u?4B%D.)SNzfFx-1``ss-gDU/3GWVG4k&O5Wyf|yJF;wHbjl sRk');

define('LOGGED_IN_SALT',   '`xhakqmjv{VmER,O5{d7lcD^BlHv53a0XHTl{hQjE_}%`0I,}r5qCx7InTMAA[iE');

define('NONCE_SALT',       'U;-o;xcN-B[^!gdL`<`q+1?T#N#JC4~7$#8AYPBd0q skMxebh|XWLkbUXq6TD39');


/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';


/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
