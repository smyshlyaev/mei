<?php

namespace Repositories;

use Controllers\TableRepositoryInterface;
use Models\Table;

class TableRepository implements TableRepositoryInterface
{
    public function create($item)
    {
        return Table::Create($item);
    }
}