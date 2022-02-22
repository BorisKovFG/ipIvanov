<?php

namespace App\Console\Commands;

use App\Imports\FertilizersImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelFertilizersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:fertilizers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Fertilizers from Excel';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $filePath = public_path().'/Excel/import/Шаблон импорта удобрений.xlsx';
        Excel::import(new FertilizersImport(), $filePath);
    }
}
