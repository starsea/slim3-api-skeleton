<?php
/**
 * Created by PhpStorm.
 * User: xinghaideng
 * Date: 16/4/5
 * Time: 17:32
 */


use Illuminate\Database\Capsule\Manager as Capsule;

//use Illuminate\Events\Dispatcher;
//use Illuminate\Container\Container;


$container = $app->getContainer();



//================laravel db  component init

$capsule = new Capsule;

foreach ($container['config']->get('database') as $name => $conn) {
    $capsule->addConnection($conn, $name);
}

// $capsule->setEventDispatcher(new Dispatcher(new Container));

$capsule->setAsGlobal();
$capsule->bootEloquent();


//===============  init redis conf

foreach ($container['config']->get('redis') as $target => $conn) {
    \Library\Cache\RedisClient::addConfig($target, $conn);
}

// =============




