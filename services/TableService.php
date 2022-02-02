<?php

namespace Services;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Repositories\TableRepository;

class TableService implements TableServiceInterface
{
    private TableRepository $tableRepository;

    private Spreadsheet $spreadsheet;

    public function __construct()
    {
        $this->tableRepository = new TableRepository();
    }

    /**
     * @return void
     */
    public function seedTask()
    {
        $this->spreadsheet = IOFactory::load("task.xlsx");
        $task = $this->spreadsheet->getActiveSheet();

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
                $this->tableRepository->create(
                    $this->getItem($row, $task, ...$cell)
                );
            }
        }
    }

    public function createTotal()
    {
        $task = $this->spreadsheet->getActiveSheet();
        $height = $task->getHighestRow();
        $task->setCellValue("B$height", 'Total:');
        $cells = ['C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
        foreach($cells as $cell) {
            $task->setCellValue(
                "$cell$height", '=SUM(' . $cell . '4:' . $cell . $height . ')');
        }

        $writer = new Xlsx($this->spreadsheet);
        $writer->save('result.xlsx');
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
        $value = $task->getCell($cell)->getValue();

        return Date::excelToDateTimeObject($value)->format('Y-m-d');
    }
}