<?php
/**
 * @Author: xinghaideng
 * @Date: 16/4/24 20:49
 * @GitHub: https://github.com/starsea
 * @Desc: ...
 */
return [
    'database' => [
        'default' => [
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'database'  => 'test',
            'username'  => 'admin',
            'password'  => '123456789',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => 'db_',
        ],
        'test' => [
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'database'  => 'test',
            'username'  => 'admin',
            'password'  => '123456789',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => 'db2_',
        ],

    ]
];