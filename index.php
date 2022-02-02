<?php

use Controllers\MainController;
use Database\TableMigration;
use Illuminate\Database\Capsule\Manager;
use Repositories\TableRepository;
use Services\TableService;

require "bootstrap.php";

$main = new MainController(
    new Manager(),
    new TableMigration(),
    new TableRepository(),
    new TableService()
);
$main->index();
