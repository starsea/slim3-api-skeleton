<?php
namespace App\Action\Api;

use Slim\Container;

class BaseAction
{

    public function __construct(Container $container)
    {
        $this->container = $container;
    }


}
