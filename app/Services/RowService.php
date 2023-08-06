<?php

namespace App\Services;

use App\Repositories\RowRepository;

class RowService
{
    protected RowRepository $rowRepository;

    public function __construct()
    {
        $this->rowRepository = new RowRepository;
    }

    public function insertRows($row)
    {
        $rows = $this->rowRepository->insertRows($row);

        return $rows;
    }

    public function index()
    {
        $rows = $this->rowRepository->index();

        return $rows;
    }
}
