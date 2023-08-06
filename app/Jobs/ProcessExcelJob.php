<?php

namespace App\Jobs;

use App\Services\RowService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProcessExcelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $path;

    protected $rowService;

    public function __construct($path)
    {
        $this->path = $path;
        $this->rowService = new RowService;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $spreadSheet = IOFactory::load(storage_path('app/'.$this->path));
        $workSheet = $spreadSheet->getActiveSheet();
        $rows = $workSheet->toArray();
        unset($rows[0]);

        $chunks = array_chunk($rows, 1000);

        foreach ($chunks as $chunk) {

            foreach ($chunk as $row) {
                $row = array_filter($row);

                if (count($row) == 3) {
                    $this->rowService->insertRows($row);
                }
            }
        }
    }
}
