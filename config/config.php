<?php

use App\Service\ServiceContainer;

$configuration = [
    'db' => [
        'dsn'      => 'mysql:dbname=hbhotelmanager;host=localhost;port=3306;charset=utf8',
        'username' => 'root',
        'password' => '',
    ],
    'env' => [
        'base_path' => 'http://localhost/Fred%20-%20HotelManager/',
        'site_name' => 'HB Hotel Manager'
    ]
];

require_once __DIR__ . '/../vendor/autoload.php';

$container = new ServiceContainer($configuration);

require_once __DIR__ . '/routes.php';