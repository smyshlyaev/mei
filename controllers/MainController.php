<?php

namespace Controllers;

use Database\MigrationInterface;
use Illuminate\Database\Capsule\Manager;
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
        $this->tableService->createTotal();
    }
}