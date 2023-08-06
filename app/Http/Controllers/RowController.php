<?php

namespace App\Http\Controllers;

use App\Http\Resources\RowCollection;
use App\Services\RowService;

class RowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RowService $rowService)
    {
        $rows = $rowService->index();

        return new RowCollection($rows);
    }
}
