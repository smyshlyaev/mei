<?php

namespace Controllers;

use Database\MigrationInterface;
use Illuminate\Database\Capsule\Manager;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Services\TableService;

class MainController
{
    private Manager $manager;

    private MigrationInterface $tableMigration;

    private TableRepositoryInterface $tableRepository;

    private TableService $tableService;

    /**
     * @param Manager $manager
     * @param MigrationInterface $tableMigration
     * @param TableRepositoryInterface $tableRepository
     * @param TableService $tableService
     */
    public function __construct(
        Manager $manager,
        MigrationInterface $tableMigration,
        TableRepositoryInterface $tableRepository,
        TableService $tableService
    )
    {
        $this->manager = $manager;
        $this->tableMigration = $tableMigration;
        $this->tableRepository = $tableRepository;
        $this->tableService = $tableService;
    }

    /**
     * @return void
     */
    public function index()
    {
        $this->tableMigration->up();
        $this->tableService->seedTask();
        $this->tableService->addTotal();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', '2Hello World !');

        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');
    }
}