<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */


/** ---[пропатчено minsk-hackerspace]---
 *
 *  Пароли от главного сайта вынесены в wp-config-site.php
 *  чтобы не хранить их в репозитории. Здесь остались настройки
 *  по умолчанию для работы над сайтом ХС на локальной машине.
 */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

define('SITECONFIG', ABSPATH . 'wp-config-site.php');
if ( file_exists(SITECONFIG) ) {
	require_once( SITECONFIG );
} else {

	// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
	/** Имя базы данных для WordPress */
	define('DB_NAME', 'wordpress');

	/** Имя пользователя MySQL */
	define('DB_USER', 'username');

	/** Пароль к базе данных MySQL */
	define('DB_PASSWORD', 'password');

	/** Имя сервера MySQL */
	define('DB_HOST', 'localhost');

	/**#@+
	 * Уникальные ключи и соли для аутентификации.
	 *
	 * Смените значение каждой константы на уникальную фразу.
	 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
	 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
	 *
	 * @since 2.6.0
	 */
	define('AUTH_KEY',         '+T$@JrGKJ$K$r5M*T+6,vwpbT:7M>^cF-e>ow*-CSr_!>_4t!lG:)OWwE6eZ.kB]');
	define('SECURE_AUTH_KEY',  'J7fwHhLlNg,zn)m|(a.,N;K;~*}2+v=FKDiEF_|}qW,9Y|}FMvyG43e+hcj fBN=');
	define('LOGGED_IN_KEY',    'gB5XR?GiR2N<JWC6W5f?Km#s0bN%qhoT.bYr[r&I-xUTjx/QM#2$7AR+G|=i.5;|');
	define('NONCE_KEY',        '%%%yz7OjIUJw~JWpeN|fDeyyV&=(?HVniHh#DJ%(2s9C|9Yp_.0d1tr]cylL%=n~');
	define('AUTH_SALT',        'A[?>61?Nt9GQ-|Y^W)h&e W3D V<@Owxulyw70#xgS6fdCL|!;5UXxPuoOo)ICC5');
	define('SECURE_AUTH_SALT', '0KpI`*5+StoQ|!b/_z=he6=S/36r9V$1]VOBIxjUhbI[GWk0,lx7w2X3]zR%*O0h');
	define('LOGGED_IN_SALT',   '_6Uf- !`XbRzNe)(ROfQ&?CxToSpq~E[c#eUCTbsSWulZ-*>EARmKYqh5Oa72eo+');
	define('NONCE_SALT',       '@;<7XQQA<;-P+Wb=2<4^h-Qf{_mWAC_+@)`3.YJb G~-MlO3HWSwZ>z!ZIqO4$;#');
}

/** --/ **/

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');


/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
