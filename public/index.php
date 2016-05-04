<?php

error_reporting(E_ALL);
date_default_timezone_set('PRC');

//session_start();

define('ENV', 'dev');
define('__PUBLIC__', __DIR__);
define('__ROOT__', realpath(__PUBLIC__ . '/../'));
define('__APP__', realpath(__ROOT__ . '/app'));

// To help the built-in PHP dev server, check if the request was actually for
// something which should probably be served as a static file
if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}


require __DIR__ . '/../vendor/autoload.php';


$settings = require __APP__ . '/config/' . ENV . '/settings.php';
$app      = new \Slim\App($settings);


require __APP__ . '/bootstrap/dependencies.php';
require __APP__ . '/bootstrap/bootstrap.php';
require __APP__ . '/bootstrap/routes.php';


$app->run();
