<?php
return [
    //settings registerDefaultServices
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => false,
        'debug'=> false,

        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => __ROOT__ . '/log/app.log',
        ],
    ],
    'other' => [

    ]
];
