<?php
require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$manager = new Manager();
try {
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
} catch(\Throwable $e) {
    throw new Exception('Заполните реквизиты в .env-файле');
}
try {
    $manager->addConnection($requisites);
} catch(\Throwable $e) {
    throw new Exception('Ошибка подключения к базе данных');
}
$manager->setAsGlobal();
$manager->bootEloquent();