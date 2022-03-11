<?php

namespace App\Jobs;

use App\Imports\FertilizersImport;
use App\Models\ImportStatus;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ImportFertilizersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $filePath;
    private $statusMapping = [
        'error' => 1,
        'success' => 2
    ];
    private $importStatus;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath, $importStatus)
    {
        $this->filePath = $filePath;
        $this->importStatus = $importStatus;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            if (Excel::import(new FertilizersImport(), $this->filePath)) {
                $this->importStatus->update(['status' => $this->statusMapping['success']]);
            } else {
                $this->importStatus->update(['status' => $this->statusMapping['error']]);
            }
        } catch (Exception $e) {
            $this->importStatus->update(['status' => $this->statusMapping['error']]);
        }
    }
}
