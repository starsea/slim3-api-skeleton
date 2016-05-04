<?php
namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class Jsonp
{
    /**
     * jsonp 处理
     *
     * @param  Request $req
     * @param  Response $res
     * @param  callable $next
     * @return Response $res
     */

    public function __invoke(Request $req, Response $res, $next)
    {
        /**
         * @var \Slim\Http\Body $body
         * @var \Slim\Http\Response $res
         */

        $res = $next($req, $res);

        $jsonp = $req->getParam('callback');

        if ($jsonp) {


            $body    = $res->getBody();
            $content = (string)$body;
            $body->rewind();
            $body->write($jsonp . '(' . $content . ')');
            return $res->withHeader('Content-type', 'application/javascript');

        }

        return $res;


    }
}