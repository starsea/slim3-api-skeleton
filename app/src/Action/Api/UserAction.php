<?php
namespace App\Action\Api;

use Slim\Http\Request;
use Slim\Http\Response;

final class UserAction extends BaseAction
{

    /**
     * user info
     * @param Request $req
     * @param Response $res
     * @param $args
     * @return Response
     */

    public function info(Request $req, Response $res, $args)
    {
        $b = 1 / 0;


        $data = [
            'status'  => 0,
            'message' => 'ok',
            'data'    => [
                $this->container->get('user_info')
            ]
        ];
        return $res->withJson($data, 200);

    }
}
