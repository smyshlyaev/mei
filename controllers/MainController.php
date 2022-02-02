<?php

namespace Controllers;

use Database\MigrationInterface;
use Illuminate\Database\Capsule\Manager;
use Services\TableService;
use Services\TableServiceInterface;

class MainController
{
    private Manager $manager;

    private MigrationInterface $tableMigration;

    private TableRepositoryInterface $tableRepository;

    private TableServiceInterface $tableService;

    /**
     * @param Manager $manager
     * @param MigrationInterface $tableMigration
     * @param TableRepositoryInterface $tableRepository
     * @param TableServiceInterface $tableService
     */
    public function __construct(
        Manager $manager,
        MigrationInterface $tableMigration,
        TableRepositoryInterface $tableRepository,
        TableServiceInterface $tableService
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
        $this->tableService->createTotal();

        echo 'Выполнение скрипта завершено успешно' . PHP_EOL;
    }
}