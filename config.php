<?php

session_start();

define('MYSQL_SERVER', 'localhost');
define('MYSQL_DATABASE', 'my_db');
define('MYSQL_USERNAME', 'kiki');
define('MYSQL_PASSWORD', 'king.kian');

define('SITE_URL', $_SERVER['REQUEST_SCHEME'].'://mycrm7.herokuapp.com/');
define('SITE_PATH', __DIR__. DIRECTORY_SEPARATOR);
define('APP_TITLE', 'MyCRM');

foreach (glob('lib/*.php') as $lib_file){
    include_once ($lib_file);
}

connect_to_db();
//initialize_users();