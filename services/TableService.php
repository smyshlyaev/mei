<?php

namespace Services;

use PhpOffice\PhpSpreadsheet\IOFactory;

class TableService
{
    public function test()
    {
        $task = IOFactory::load("task.xlsx");
        var_dump($task);
        echo'service test' . PHP_EOL;
    }
}