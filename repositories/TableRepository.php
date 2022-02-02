<?php

namespace Repositories;

use Controllers\TableRepositoryInterface;
use Illuminate\Database\Capsule\Manager as Capsule;

class TableRepository implements TableRepositoryInterface
{
    /**
     * @var Capsule
     */
    private $capsule;

    public function __construct()
    {
        $this->capsule = new Capsule();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function connection()
    {
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
        } catch ( \Throwable $e) {
            throw new \Exception('Не заполнен .env файл');
        }

        try {
            $this->capsule->addConnection($requisites);
        } catch ( \Throwable $e) {
            throw new \Exception('Ошибка соединения с БД');
        }

        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
    }
}