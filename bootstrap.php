<?php
require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$manager = new Manager();

$requisites = [
    'driver' => $_ENV['DB_DRIVER'],
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_DATABASE'],
    'username' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => $_ENV['DB_CHARSET'],
    'collation' => $_ENV['DB_COLLATION'],
    'prefix' => $_ENV['DB_PREFIX'],
];
$manager->addConnection($requisites);

$manager->setAsGlobal();
$manager->bootEloquent();