<?php
// Routes

use App\Action\Api;

$container = $app->getContainer();


$app->group('/user', function () {

    //用户信息
    $user = Api\UserAction::class;

    $this->get('/info', $user . ':info');

})->add(new \App\Middleware\Jsonp());
