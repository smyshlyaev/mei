<?php

namespace Repositories;

use Controllers\TableRepositoryInterface;
use Models\Table;

class TableRepository implements TableRepositoryInterface
{
    public function test()
    {
        $table = Table::Create(
            [
                'table_id' => 333,
            ]
        );
        echo 'test' . PHP_EOL;
    }
}