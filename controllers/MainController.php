<?php

namespace Controllers;

use Database\MigrationInterface;
use Illuminate\Database\Capsule\Manager;

class MainController
{
    /**
     * @var Manager
     */
    private $manager;

    /**
     * @var MigrationInterface
     */
    private $tableMigration;

    /**
     * @param Manager $manager
     * @param MigrationInterface $tableMigration
     */
    public function __construct(
        Manager $manager,
        MigrationInterface $tableMigration
    )
    {
        $this->manager = $manager;
        $this->tableMigration = $tableMigration;
    }

    /**
     * @return void
     */
    public function index()
    {
        $this->tableMigration->up();
    }
}