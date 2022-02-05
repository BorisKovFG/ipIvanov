<?php

namespace App\Http\Controllers\Admin\CultureGroups;

use App\Http\Controllers\Controller;
use App\Models\Client;


class CreateController extends Controller
{
    public function __invoke()
    {
        $cultureGroup = new Client();
        return view('admin.culturegroups.create', compact( 'cultureGroup'));
    }
}
