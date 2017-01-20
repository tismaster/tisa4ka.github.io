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
define('DB_NAME', 'wpblog');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'k #Enroe(TjQ&OaQ=~^t#oH,cxn*/6, L(pe29PIcd@-<fm5GnWkW<m3,MP`;Y]Z');
define('SECURE_AUTH_KEY',  'YM_o>+Ua[|7MSF*w}f_{Bk18j1d?Q.c{FZ/M9h<[ROu&,7s*_v$Jkz5&xi6Z[J5R');
define('LOGGED_IN_KEY',    'cR)?,iwyE9BY6+!s_o?=E(~76AiD-Weg<OMf=lCDqvJJ]HC8)Tdw4 4Te}3X;Tz/');
define('NONCE_KEY',        'x2${~6d;)aE}R%x<lq3v0r3 iIg:4G97F?miN28dCZvjfTFb21vxyP{TFVXFQMF`');
define('AUTH_SALT',        '1;N+:,<0VVS #mHLD7n]kpbcp+)[*ANF4UibCt:z?@vhf$kVcct1[hDpGPZV4Gxn');
define('SECURE_AUTH_SALT', 'POqa4fzPyf[n*uTTqS8:7`T_rcr6;PSCKkbqiZnsQ8bOx&v4AGvYl8!8U#{c=&yf');
define('LOGGED_IN_SALT',   '93FU4dh_/<c{Zj{Oeu_ oZ.H8b2@n4Y=wUhc i^e9c +HCRLF}fnH`A{U%*/#f h');
define('NONCE_SALT',       '$fA_C7$@FzyatI[@<e`q2juY@T`^3_N>FTz11zhEx#,.,[|]|P8p|_8#C%c~td^P');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'qwe_';

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
