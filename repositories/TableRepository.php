<?php

namespace Repositories;

use Controllers\TableRepositoryInterface;
use Models\Table;

class TableRepository implements TableRepositoryInterface
{
    public function create($item)
    {
        try {
            return Table::Create($item);
        } catch(\Throwable $e) {
            throw new \Exception('Ошибка во время записи в базу. Проверьте правильность формата данных.');
        }
    }
}