<?php

namespace App\Console\Commands;

use App\Imports\ClientsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelClientsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:clients';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Clients from Excel';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $filePath = public_path().'/Excel/import/Шаблон импорта клиентов.xlsx';
        Excel::import(new ClientsImport(), $filePath);
    }
}
