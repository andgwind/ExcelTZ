<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExcelUploadRequest;
use App\Services\ExcelUploadService;

class ExcelUploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ExcelUploadRequest $request, ExcelUploadService $excelUploadService)
    {
        $file = $request->file('file');
        $status = $excelUploadService->handleUploadFile($file);

        return response()->json(['message' => $status]);
    }
}
