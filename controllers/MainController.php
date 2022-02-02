<?php

namespace Controllers;

use Database\MigrationInterface;
use Illuminate\Database\Capsule\Manager;

class MainController
{
    private Manager $manager;

    private MigrationInterface $tableMigration;

    private TableRepositoryInterface $tableRepository;

    /**
     * @param Manager $manager
     * @param MigrationInterface $tableMigration
     * @param TableRepositoryInterface $tableRepository
     */
    public function __construct(
        Manager $manager,
        MigrationInterface $tableMigration,
        TableRepositoryInterface $tableRepository
    )
    {
        $this->manager = $manager;
        $this->tableMigration = $tableMigration;
        $this->tableRepository = $tableRepository;
    }

    /**
     * @return void
     */
    public function index()
    {
        $this->tableMigration->up();
        $this->tableRepository->test();
    }
}