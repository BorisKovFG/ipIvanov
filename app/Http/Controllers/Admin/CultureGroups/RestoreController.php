<?php

namespace App\Http\Controllers\Admin\CultureGroups;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\CultureGroup;
use App\Models\User;


class RestoreController extends Controller
{
    public function __invoke($id)
    {
        CultureGroup::withTrashed()->findorFail($id)->restore();
        return redirect()->route('admin.culturegroups.index');    }
}
