<?php

namespace Controllers;

interface TableRepositoryInterface
{
    public function __construct();

    public function connection();
}