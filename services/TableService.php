<?php

namespace Services;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TableService implements TableServiceInterface
{
    /**
     * @return void
     */
    public function saveTask()
    {
        $task = IOFactory::load("task.xlsx")->getActiveSheet();
        $items = [];
        for ($row = 4; $row <= $task->getHighestRow() - 1; $row++) {
            $cells = [
                ['C1','C2','C3'],
                ['C1','C2','D3'],
                ['C1','E2','E3'],
                ['C1','E2','F3'],
                ['C1','G2','G3'],
                ['G1','G2','H3'],
                ['G1','I2','I3'],
                ['G1','I2','J3'],
            ];
            foreach ($cells as $cell) {
                $item = $this->getItem($row, $task, ...$cell);
                dd($item);
            }
        }
        dd($items);
    }

    /**
     * @param int $row
     * @param Worksheet $task
     * @param string $factOrForecastCell
     * @param string $oliqOrQoilCell
     * @param string $dateCell
     * @return array
     */
    private function getItem(
        int       $row,
        Worksheet $task,
        string    $factOrForecastCell,
        string    $oliqOrQoilCell,
        string    $dateCell
    ): array
    {
        $item = [];
        $item['value'] = $task->getCell("C$row")->getValue();
        $item['table_id'] = $task->getCell("A$row")->getValue();
        $item['company'] = $task->getCell("B$row")->getValue();
        $item['fact_or_forecast'] = $task->getCell($factOrForecastCell)->getValue();
        $item['oliq_or_qoil'] = $task->getCell($oliqOrQoilCell)->getValue();
        $item['date'] = $this->getDate($dateCell, $task);

        return $item;
    }

    /**
     * @param string $cell
     * @param Worksheet $task
     * @return string
     */
    private function getDate(string $cell, Worksheet $task)
    {
        $value = $task->getCell("C3")->getValue();

        return Date::excelToDateTimeObject($value)->format('Y-m-d');
    }
}