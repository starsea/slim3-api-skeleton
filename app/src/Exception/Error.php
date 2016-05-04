<?php
/**
 *
 * Created by PhpStorm.
 * User: xinghaideng
 * Date: 16/4/5
 * Time: 19:04
 */

namespace App\Exception;

use Slim\Container;

final class Error
{


    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }


    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, \Exception $e)
    {

        $status = -1000;// 内部异常

        if ($e instanceof \ErrorException) {
            $data = [
                'status' => -1001, // 错误异常
                'code'   => $e->getCode(),
                'msg'    => $e->getMessage(),
            ];
        }

        if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            $data = [
                'status' => -1002, //
                'code'   => $e->getCode(),
                'msg'    => '非法参数',
            ];
        }

        $data || $data = [
            'status' => $status,
            'code'   => $e->getCode(),
            'msg'    => $e->getMessage(),
        ];

        if (ENV !== 'dev') {
            $data += [
                'file'  => $e->getFile(),
                'line'  => $e->getLine(),
                'trace' => explode("\n", $e->getTraceAsString()),
            ];

        }

        return $response->write(json_encode($data));
    }
}