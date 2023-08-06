<?php

namespace App\Repositories;

use App\Models\Row;
use Illuminate\Support\Facades\Redis;

class RowRepository
{
    public function index()
    {
        $rows = Row::groupBy(['id', 'date'])->paginate();

        return $rows;
    }

    public function insertRows($row)
    {
        Row::create([
            'id_excel' => $row[0],
            'name' => $row[1],
            'date' => $row[2],
        ]);
        Redis::incr('excel:processed');
    }
}
