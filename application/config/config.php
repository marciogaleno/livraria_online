<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Configuration for: Project URL/
 * Put your URL here, for local development "127.0.0.1" or "localhost" (plus sub-folder) is fine
 */
define('URL', 'http://localhost/livraria_online/');
define('PATH_PUBLIC', 'http://localhost/livraria_online/public/');
define('PATH_VIEW', 'http://localhost/livraria_online/application/views/');
define('LIBS_PATH', '/var/www/html/livraria_online/application/libs/');


/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'livraria');
define('DB_USER', 'root');
define('DB_PASS', '123456');
