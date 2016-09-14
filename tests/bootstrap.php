<?php 

//require 'vendor/autoload.php';
// load application config (error reporting etc.)
// require __DIR__  . "/../application/config/config.php";
// require  __DIR__ . "/../application/config/autoload.php";

// // load application class
// require __DIR__ . "/../application/libs/application.php";
// require __DIR__ . "/../application/libs/controller.php";

define('URL', 'http://localhost/livraria_online/');
define('PATH_PUBLIC', 'http://localhost/livraria_online/public/');
define('PATH_VIEW', 'http://localhost/livraria_online/application/views/');
define('LIBS_PATH', dirname(__DIR__) . '/libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'livraria');
define('DB_USER', 'root');
define('DB_PASS', '123456');

$path_libs = dirname(__DIR__) . '/application/libs/*.php';

foreach (glob($path_libs) as $filename)
{
    include_once $filename;
}

$path_controller = dirname(__DIR__) . '/application/controller/*.php';

foreach (glob($path_controller) as $filename)
{
    include_once $filename;
}

$path_models = dirname(__DIR__) . '/application/models/*.php';

foreach (glob($path_controller) as $filename)
{
    include_once $filename;
}


