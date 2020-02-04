<?php

return [

    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver' => $_ENV['DB_CONNECTION'],
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'database' => $_ENV['DB_DATABASE'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],

        'php_ini' => [
            'date.timezone' => $_ENV['APP_TIMEZONE'],
        ],
    ]

];
