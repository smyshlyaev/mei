<?php

use Controllers\MainController;
use Database\TableMigration;
use Illuminate\Database\Capsule\Manager;

require "bootstrap.php";


$main = new MainController(
    new Manager(),
    new TableMigration()
);
$main->index();

die();
$user = User::Create(
    [
        'email' => "ahmed33.khan@lbs.com",
    ]
);
