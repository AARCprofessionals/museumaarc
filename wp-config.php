<?php


define('DB_NAME', 'arcf');
define('DB_USER', 'arcf');
define('DB_PASSWORD', 'aaRC94@%');
define('DB_HOST', 'localhost');

define('DB_CHARSET', 'utf8');

define('DB_COLLATE', '');

define('AUTH_KEY',         'o@%o z.GHXws))R4 WIiyF8n[|p^f^x6_6aDtY=`-G_N1/r&aYeA-;]jSl^[y?^R');
define('SECURE_AUTH_KEY',  'SU_(?m6:cY.o#QyZrE.nWx=p7 --EV[Pwmn~8qc-98usPi.ov:r+BJD.HKXyDC;3');
define('LOGGED_IN_KEY',    'D+xZR8-kJ|?(!/jttwa7N?XiO+W0{& W^+J&(8x@ `Yxp01DB}+mSUL#Qn?Gpv[$');
define('NONCE_KEY',        'I[5(M|GV%|fpb?wfd+S#5$@sB2F M<{<]+?vz/V|/aGRiO_N8cV lJX+kiaJEi{]');
define('AUTH_SALT',        'R.]k-6,9R-:$l~ %db7Ewi)WyUPsEo5f3M]UO.t`i5(xPE|/vV9}t,^yrj`<Z*.z');
define('SECURE_AUTH_SALT', '6cz@ |9)&T}Fer9._Hx/JC9^Pr]Z&|5.yex7=yP4.L%g 3wK i@,Zx#id|-?DlAq');
define('LOGGED_IN_SALT',   'FP!DlW2R?TXt}X+A[b8gG!<yVv]7ewzTXO`2<--Ek|>`sb|T<v%{HRNLV+O |H~*');
define('NONCE_SALT',       '4hU8/#+8DE_Z].88--&Kk.6mzBV[~(_Y$[IOy5/Mr+VI#@?<ZNqkG-(Y4d2f=)_;');

$table_prefix  = 'wp_';

define('WPLANG', '');

define('WP_DEBUG', false);

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');

define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME'] . '/');
define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/');

require_once(ABSPATH . 'wp-settings.php');

define( 'AWS_ACCESS_KEY_ID', 'AKIAJ77KYNS7FHAPSTMQ' );
define( 'AWS_SECRET_ACCESS_KEY', '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' );

?>
