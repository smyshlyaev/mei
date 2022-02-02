<?php

namespace Database;

use Illuminate\Database\Capsule\Manager;

class TableMigration implements MigrationInterface
{
    /**
     * @return void
     */
    public function up()
    {
        Manager::schema()->dropIfExists('table');

        Manager::schema()->create('table', function ($table) {
            $table->increments('id');
            $table->integer('table_id')->nullable();
            $table->string('company')->nullable();
            $table->enum('fact_or_forecast', ['fact', 'forecast'])->nullable();
            $table->enum('olign_or_ooil', ['olign', 'ooil'])->nullable();
            $table->date('date')->nullable();
        });
    }

}