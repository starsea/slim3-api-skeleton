<?php
namespace App\Action\Api;
//use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

final class HomeAction extends BaseAction
{


    public function dispatch(Request $req, Response $res, $args)
    {
        $conf = $this->container->get('config');

        $data = [
            'status'   => 0,
            'message' => 'ok ',
            'data'    => []
        ];
        return $res->withJson($data, 200);

    }
}
