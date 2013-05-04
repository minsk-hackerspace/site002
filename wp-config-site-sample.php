<?php
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
