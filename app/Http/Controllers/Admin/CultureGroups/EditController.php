<?php

namespace App\Http\Controllers\Admin\CultureGroups;

use App\Http\Controllers\Controller;
use App\Models\CultureGroup;


class EditController extends Controller
{
    public function __invoke(CultureGroup $cultureGroup)
    {
        return view('admin.culturegroups.edit', compact('cultureGroup'));
    }
}
