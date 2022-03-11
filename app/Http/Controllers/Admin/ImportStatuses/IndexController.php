<?php

namespace App\Http\Controllers\Admin\ImportStatuses;

use App\Http\Controllers\Controller;
use App\Models\ImportStatus;

class IndexController extends Controller
{
    public function __invoke()
    {
        $statuses = ImportStatus::paginate(10)->withQueryString();;

        return view('admin.import_statuses.index', compact('statuses'));
    }
}
