<?php

namespace App\Http\Controllers\Admin\CultureGroups;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\CultureGroup;


class ShowController extends Controller
{
    public function __invoke(CultureGroup $cultureGroup)
    {
        return view('admin.culturegroups.show', compact('cultureGroup'));
    }
}
