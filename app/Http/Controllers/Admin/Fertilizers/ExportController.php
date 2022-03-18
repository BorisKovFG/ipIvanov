<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Exports\FertilizersExport;
use App\Http\Controllers\Controller;
use App\Models\Fertilizer;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function __invoke()
    {
        $fertilizers = Fertilizer::get();
        return Excel::download(new FertilizersExport($fertilizers), 'fertilizers'. date('m-d-Y_h:i', time()) . '.xlsx');
    }
}
