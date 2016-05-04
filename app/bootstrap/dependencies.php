<?php
// DIC configuration

$container = $app->getContainer();

//config

$container['config'] = function ($c) {
    $config = new \Noodlehaus\Config(__APP__ . '/config/' . ENV);
    return $config;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->config->get('settings');
    $logger   = new \Monolog\Logger($settings['logger']['name']);
    //$logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['logger']['path'], \Monolog\Logger::DEBUG));
    return $logger;
};


// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

$container['errorHandler'] = function ($c) {
    return new \App\Exception\Error($c);

};

//unset($app->getContainer()['errorHandler']);


// PHP Error Handle
$container['phpError'] = function ($c) {

    return new \App\Exception\PhpError($c);

};
set_error_handler($container['phpError']);


//$container['redis'] = function ($c) {
//
//    return function ($con) use ($c) {
//        $redis_conf = $c->config->get('redis')[$con];
//        $redis      = new \Redis();
//        $redis->connect($redis_conf['host'], $redis_conf['port']);
//        return $redis;
//    };
//
//
//};

//$container['db'] = function ($c) use ($capsule) {
//
//    return $capsule;
//};

