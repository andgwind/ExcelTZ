<?php

namespace App\Services;

use App\Jobs\ProcessExcelJob;

class ExcelUploadService
{
    public function handleUploadFile($file)
    {
        $path = $file->store('public/uploads');
        ProcessExcelJob::dispatch($path);

        return 'Excel file success upload';
    }
}
