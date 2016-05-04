<?php
/**
 * Created by PhpStorm.
 * User: xinghaideng
 * Date: 16/4/5
 * Time: 19:04
 */

namespace App\Exception;

use Slim\Container;

class PhpError
{


    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }


    public function __invoke($code, $errstr, $file = NULL, $line = NULL)
    {


        if (ENV == 'dev') { // 开发模式在页面上展示所有错误
            throw new \ErrorException($errstr, $code, 1, $file, $line);
//            return false;
        }

        /**
         * @var \Monolog\logger $logger
         */
        $logger = $this->container->get('logger');


        $uin = 0;

        switch ($code) {
            case E_DEPRECATED:
            case E_NOTICE :
                $logger->addNotice($uin, ['code' => $code, 'file' => $file, 'line' => $line, 'errstr' => $errstr]);
                return true;
            case E_WARNING:
                $logger->addWarning($uin, ['code' => $code, 'file' => $file, 'line' => $line, 'errstr' => $errstr]);
//                $logger->addRecord($code,$uin,['code' => $code, 'file' => $file, 'line' => $line, 'errstr' => $errstr]);
                return true;
            default :
                break;
        }

        throw new \ErrorException($errstr, $code, 1, $file, $line);

    }
}