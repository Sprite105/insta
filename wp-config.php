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
define('DB_NAME', 'csgolott_insta');

/** Имя пользователя MySQL */
define('DB_USER', 'csgolott_insta');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'w4ggej3r');

/** Имя сервера MySQL */
define('DB_HOST', 'csgolott.mysql.ukraine.com.ua');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'e1q$)6 Twn15R;tN)>~E+g5er5z:kGEbzsi6=fHQM:GHFs$>p*1F*,}(&Mf0*aY8');
define('SECURE_AUTH_KEY',  'wG]VQ[6NmAkL< G|5FB4K30}t:i[qL2TZ3j*x}(,cyk1W[BJRE?r$B+2e[hin9yr');
define('LOGGED_IN_KEY',    '`labjK,Uz!fdAe0eId$^),Z+<P{2gDxwZ?{-=dr@9sBhF6n;Zrbi/k`jN[Lh.D $');
define('NONCE_KEY',        'K:QK1lK<N]O]rMV2v~)iAq/RWD1q<pTG8SK;o>Cc=Bna[:pq&|1|Q%vpC`BIspWM');
define('AUTH_SALT',        '8HTC|<K/Tn tQG]?`ASa{y/Z]e`!g-NN1:b6L0!}?9^]Xgz=4K.=xt8^Fvj7x6&}');
define('SECURE_AUTH_SALT', 'kZ1F&il}e#UpZplU*+<K!D=E2f=o5]xHKh1!1xAj>@rAcSS,/9qNk)GV>z&!W:Mr');
define('LOGGED_IN_SALT',   'Zp{~r|/d<dae-|[_1ny?SIQcNzWN:D70#sHX:*_8Yoc_MYs4[o~EZ8`,(qOtf#wF');
define('NONCE_SALT',       '%|Sr%-%jf|M>:Weh!yY/1rhwrk&Coh6`M)Nx^-ZhtP4`RqvYVho<T-=.G^&AXhR,');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'karma_';

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
