<?php


namespace Library\Cache;

use Exception;

class Redis extends \Redis
{


    public function  __destruct()
    {
        $this->close();
    }

}