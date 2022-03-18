<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Exports\ClientsExport;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function __invoke()
    {
        $clients= Client::get();
        return Excel::download(new ClientsExport($clients), 'clients'. date('m-d-Y_h:i', time()) . '.xlsx');
    }
}
